<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ihumbak.website
 * @since      1.0.0
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/admin
 * @author     Michał Staniecko <michal.staniecko@gmail.com>
 */
class Ih_Gdpr_Admin {

  /**
   * The ID of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string $plugin_name The ID of this plugin.
   */
  private string $plugin_name;

  /**
   * The version of this plugin.
   *
   * @since    1.0.0
   * @access   private
   * @var      string $version The current version of this plugin.
   */
  private string $version;

  private Ih_Gdpr_Activator $activator;

  private Ih_Gdpr_Db_Codes $tracking_codes;

  private Ih_Gdpr_Db $tracking_codes_types;

  private Ih_Gdpr_Page_Codes $page_codes;

  private Ih_Gdpr_Page_Types $page_types;

  private Ih_Gdpr_Page_Settings $page_settings;

  /**
   * Initialize the class and set its properties.
   *
   * @param string $plugin_name The name of this plugin.
   * @param string $version     The version of this plugin.
   * @since    1.0.0
   */
  public function __construct(string $plugin_name, string $version) {

    $this->plugin_name = $plugin_name;
    $this->version = $version;

    require_once trailingslashit(IH_GDPR_PLUGIN_PATH) . 'includes/class-ih-gdpr-activator.php';

    $this->activator = new Ih_Gdpr_Activator();

    $this->tracking_codes = new Ih_Gdpr_Db_Codes($this->activator->wp_ih_tracking_codes(),
                                                 $this->activator->wp_ih_tracking_codes_types());

    $this->tracking_codes_types = new Ih_Gdpr_Db($this->activator->wp_ih_tracking_codes_types());

    $this->page_codes = new Ih_Gdpr_Page_Codes($this->tracking_codes, $this->tracking_codes_types);
    $this->page_types = new Ih_Gdpr_Page_Types($this->tracking_codes, $this->tracking_codes_types);
    $this->page_settings = new Ih_Gdpr_Page_Settings($this->tracking_codes, $this->tracking_codes_types);
  }

  /**
   * Register the stylesheets for the admin area.
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
                     plugin_dir_url(__FILE__) . 'css/ih-gdpr-admin.css',
                     array(),
                     $this->version,
                     'all');
  }

  /**
   * Register the JavaScript for the admin area.
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

    wp_enqueue_script($this->plugin_name,
                      plugin_dir_url(__FILE__) . 'js/ih-gdpr-admin.js',
                      array( 'jquery' ),
                      $this->version,
                      false);
  }


  public function set_tracking_code() {
    $id = $_POST['id'] ?? null;
    $this->tracking_codes
      ->prepare_data(
        array(
          "name"    => $_POST['name'] ?? '',
          "type_id" => $_POST['type_id'] ?? '',
          "script"  => $_POST['script'] ?? '',
          "expires" => $_POST['expires'] ?? ''
        ))
      ->update($id)
      ->redirect_to(IH_GDPR_ADMIN_URL_CODES);
  }

  public function set_tracking_code_type() {
    $id = $_POST['id'] ?? null;
    $this->tracking_codes_types
      ->prepare_data(
        array(
          "name"        => $_POST['name'] ?? '',
          "description" => $_POST['description'] ?? '',
          "enable"      => isset($_POST['enable']) ? 1 : 0,
        )
      )
      ->update($id)
      ->redirect_to(IH_GDPR_ADMIN_URL_TYPES);
  }

  public function codes_page() {
    $action = $_GET['action'] ?? null;
    $this->page_codes->render_page($action);
  }

  public function types_page() {
    $action = $_GET['action'] ?? null;
    $this->page_types->render_page($action);
  }

  public function settings_page() {
    $this->page_settings->edit();
  }

  public function get_page_settings(): Ih_Gdpr_Page_Settings {
    return $this->page_settings;
  }

}
