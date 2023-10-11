<?php

class Ih_Gdpr_Settings {

  private Ih_Gdpr_Page_Settings $page_settings;

  public function __construct(Ih_Gdpr_Page_Settings $page_settings) {
    $this->page_settings = $page_settings;
  }

  private function fields(): array {
    return array(
      array(
        'id'   => 'ih_gdpr_title',
        'name' => __('Title', IH_GDPR_PLUGIN_DOMAIN),
        'type' => 'inputtext',
        'page' => 'ih_gdpr'
      ),
      array(
        'id'   => 'ih_gdpr_description',
        'name' => __('Description', IH_GDPR_PLUGIN_DOMAIN),
        'type' => 'textarea',
        'page' => 'ih_gdpr'
      ),
      array(
        'id'   => 'ih_gdpr_policy_privacy_page',
        'name' => __('Select Privacy Policy Page', IH_GDPR_PLUGIN_DOMAIN),
        'type' => 'select',
        'page' => 'ih_gdpr',
        'config' => array(
          'placeholder' => __('Select page', IH_GDPR_PLUGIN_DOMAIN),
          'options' => $this->get_pages()
        )
      )
    );
  }

  public function register() {

    foreach ($this->fields() as $field) {
      register_setting($field['page'], $field['id']);
    }

    add_settings_section('ih_gdpr_section',
                         __('General settings', IH_GDPR_PLUGIN_DOMAIN),
                         array( $this->page_settings, 'section_callback' ),
                         'ih_gdpr');

    foreach ($this->fields() as $field) {
      add_settings_field('ih_gdpr_' . $field['id'],
                         $field['name'],
                         array( $this->page_settings, 'settings_field_callback' ),
                         $field['page'],
                         'ih_gdpr_section',
                         array(
                           'type'  => $field['type'],
                           'name'  => $field['id'],
                           'value' => get_option($field['id']),
                           'config' => $field['config'] ?? null
                         ));
    }
  }

  private function get_pages(): array {
    global $wpdb;

    $prefix = $wpdb->prefix;

    return $wpdb->get_results("SELECT id AS 'key', post_title AS 'value' FROM {$prefix}posts WHERE post_status LIKE 'publish';");
  }
}
