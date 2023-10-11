<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://ihumbak.website
 * @since      1.0.0
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/public
 * @author     Michał Staniecko <michal.staniecko@gmail.com>
 */
class Ih_Gdpr_Public {

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string $plugin_name The ID of this plugin.
   */
  private $plugin_name;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string $version The current version of this plugin.
   */
  private $version;

  private $tracking_codes;

  private $tracking_codes_types;

  /**
   * Initialize the class and set its properties.
   *
   * @param string $plugin_name The name of the plugin.
   * @param string $version     The version of this plugin.
   * @since    1.0.0
   */
  public function __construct($plugin_name,
    $version,
                              Ih_Gdpr_Db_Codes $tracking_codes,
                              Ih_Gdpr_Db $tracking_codes_types) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;

    $this->tracking_codes = $tracking_codes;
    $this->tracking_codes_types = $tracking_codes_types;

  }

  /**
   * Register the stylesheets for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_styles() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Ih_Gdpr_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Ih_Gdpr_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

    wp_enqueue_style($this->plugin_name,
                     plugin_dir_url(__FILE__) . 'css/ih-gdpr-public.css',
                     array(),
                     $this->version,
                     'all');

  }

  /**
   * Register the JavaScript for the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function enqueue_scripts() {

    /**
     * This function is provided for demonstration purposes only.
     *
     * An instance of this class should be passed to the run() function
     * defined in Ih_Gdpr_Loader as all of the hooks are defined
     * in that particular class.
     *
     * The Ih_Gdpr_Loader will then create the relationship
     * between the defined hooks and the functions defined in this
     * class.
     */

    wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/ih-gdpr-public.js', false, rand(), true);

    $fields = array( 'script', 'type_id' );

    wp_localize_script($this->plugin_name, 'ih_gdpr_scripts', $this->tracking_codes->get_all($fields, false)->to_html());
    wp_localize_script($this->plugin_name, 'ih_gdpr_types', $this->tracking_codes_types->get_all());
  }

  public function display_gdpr() {
    ob_start();

    $types = $this->tracking_codes_types->get_all();

    include_once trailingslashit(IH_GDPR_PLUGIN_PATH) . 'public/partials/ih-gdpr-public-display.php';

    $template = ob_get_clean();

    echo $template;
  }

  public function body_class($classes) {
    global $post;
    if ($post->ID != get_option('ih_gdpr_policy_privacy_page')) {
      return $classes;
    }
    $classes[] = 'ih-gdpr-privacy-policy-page';
    return $classes;
  }

}
