<?php

class Ih_Gdpr_Menu {

  private Ih_Gdpr_Admin $plugin_admin;

  public function __construct(Ih_Gdpr_Admin $plugin_admin) {
    $this->plugin_admin = $plugin_admin;
  }

  public function register() {
    add_menu_page('GDPR Settings',
                  'GDPR Settings',
                  'administrator',
                  IH_GDPR_PLUGIN_SLUG,
                  array(
                    $this->plugin_admin,
                    'settings_page'
                  ));
    add_submenu_page(IH_GDPR_PLUGIN_SLUG,
                     'Tracking Codes',
                     'Tracking Codes',
                     'administrator',
                     IH_GDPR_PLUGIN_SLUG . '-codes',
                     array(
                       $this->plugin_admin,
                       'codes_page'
                     ));
    add_submenu_page(IH_GDPR_PLUGIN_SLUG,
                     'Code Types',
                     'Code Types',
                     'administrator',
                     IH_GDPR_PLUGIN_SLUG . '-types',
                     array(
                       $this->plugin_admin,
                       'types_page'
                     ));
  }
}
