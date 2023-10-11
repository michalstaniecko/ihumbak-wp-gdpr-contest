<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       https://ihumbak.website
 * @since      1.0.0
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/includes
 * @author     Michał Staniecko <michal.staniecko@gmail.com>
 */
class Ih_Gdpr {

  /**
   * The loader that's responsible for maintaining and registering all hooks that power
   * the plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      Ih_Gdpr_Loader $loader Maintains and registers all hooks for the plugin.
   */
  protected $loader;

  /**
   * The unique identifier of this plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      string $plugin_name The string used to uniquely identify this plugin.
   */
  protected $plugin_name;

  /**
   * The current version of the plugin.
   *
   * @since    1.0.0
   * @access   protected
   * @var      string $version The current version of the plugin.
   */
  protected $version;

  protected $activator;

  /**
   * Define the core functionality of the plugin.
   *
   * Set the plugin name and the plugin version that can be used throughout the plugin.
   * Load the dependencies, define the locale, and set the hooks for the admin area and
   * the public-facing side of the site.
   *
   * @since    1.0.0
   */
  public function __construct(Ih_Gdpr_Activator $activator) {
    if (defined('IH_GDPR_VERSION')) {
      $this->version = IH_GDPR_VERSION;
    } else {
      $this->version = '1.0.0';
    }
    $this->plugin_name = 'ih-gdpr';

    $this->activator = $activator;

    $this->load_dependencies();
    $this->set_locale();
    $this->define_admin_hooks();
    $this->define_public_hooks();

  }

  /**
   * Load the required dependencies for this plugin.
   *
   * Include the following files that make up the plugin:
   *
   * - Ih_Gdpr_Loader. Orchestrates the hooks of the plugin.
   * - Ih_Gdpr_i18n. Defines internationalization functionality.
   * - Ih_Gdpr_Admin. Defines all hooks for the admin area.
   * - Ih_Gdpr_Public. Defines all hooks for the public side of the site.
   *
   * Create an instance of the loader which will be used to register the hooks
   * with WordPress.
   *
   * @since    1.0.0
   * @access   private
   */
  private function load_dependencies() {

    /**
     * The class responsible for orchestrating the actions and filters of the
     * core plugin.
     */
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-ih-gdpr-loader.php';

    /**
     * The class responsible for defining internationalization functionality
     * of the plugin.
     */
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-ih-gdpr-i18n.php';

    /**
     * The class responsible for defining database functionality
     * of the plugin.
     */
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-ih-gdpr-db.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'includes/class-ih-gdpr-db-codes.php';

    /**
     * The class responsible for defining all actions that occur in the admin area.
     */
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ih-gdpr-admin.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ih-gdpr-menu.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ih-gdpr-settings.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ih-gdpr-page.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ih-gdpr-page-codes.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ih-gdpr-page-types.php';
    require_once plugin_dir_path(dirname(__FILE__)) . 'admin/class-ih-gdpr-page-settings.php';

    /**
     * The class responsible for defining all actions that occur in the public-facing
     * side of the site.
     */
    require_once plugin_dir_path(dirname(__FILE__)) . 'public/class-ih-gdpr-public.php';

    $this->loader = new Ih_Gdpr_Loader();

  }

  /**
   * Define the locale for this plugin for internationalization.
   *
   * Uses the Ih_Gdpr_i18n class in order to set the domain and to register the hook
   * with WordPress.
   *
   * @since    1.0.0
   * @access   private
   */
  private function set_locale() {

    $plugin_i18n = new Ih_Gdpr_i18n();

    $this->loader->add_action('plugins_loaded', $plugin_i18n, 'load_plugin_textdomain');

  }

  /**
   * Register all of the hooks related to the admin area functionality
   * of the plugin.
   *
   * @since    1.0.0
   * @access   private
   */
  private function define_admin_hooks() {

    $plugin_admin = new Ih_Gdpr_Admin($this->get_plugin_name(), $this->get_version());
    $menu_admin = new Ih_Gdpr_Menu($plugin_admin);
    $settings_admin = new Ih_Gdpr_Settings($plugin_admin->get_page_settings());

    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_styles');
    $this->loader->add_action('admin_enqueue_scripts', $plugin_admin, 'enqueue_scripts');

    $this->loader->add_action('admin_menu', $menu_admin, 'register');
    $this->loader->add_action('admin_init', $settings_admin, 'register');

    $this->loader->add_action('admin_post_set_tracking_code', $plugin_admin, 'set_tracking_code');
    $this->loader->add_action('admin_post_set_tracking_code_type', $plugin_admin, 'set_tracking_code_type');

  }

  /**
   * Register all of the hooks related to the public-facing functionality
   * of the plugin.
   *
   * @since    1.0.0
   * @access   private
   */
  private function define_public_hooks() {

    $plugin_public = new Ih_Gdpr_Public($this->get_plugin_name(),
                                        $this->get_version(),
                                        new Ih_Gdpr_Db_Codes($this->activator->wp_ih_tracking_codes(),
                                                             $this->activator->wp_ih_tracking_codes_types()),
                                        new Ih_Gdpr_Db($this->activator->wp_ih_tracking_codes_types()));

    $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_styles');
    $this->loader->add_action('wp_enqueue_scripts', $plugin_public, 'enqueue_scripts');

    $this->loader->add_action('wp_footer', $plugin_public, 'display_gdpr');

    $this->loader->add_filter('body_class', $plugin_public, 'body_class', 10, 2);

  }

  /**
   * Run the loader to execute all of the hooks with WordPress.
   *
   * @since    1.0.0
   */
  public function run() {
    $this->loader->run();
  }

  /**
   * The name of the plugin used to uniquely identify it within the context of
   * WordPress and to define internationalization functionality.
   *
   * @return    string    The name of the plugin.
   * @since     1.0.0
   */
  public function get_plugin_name() {
    return $this->plugin_name;
  }

  /**
   * The reference to the class that orchestrates the hooks with the plugin.
   *
   * @return    Ih_Gdpr_Loader    Orchestrates the hooks of the plugin.
   * @since     1.0.0
   */
  public function get_loader() {
    return $this->loader;
  }

  /**
   * Retrieve the version number of the plugin.
   *
   * @return    string    The version number of the plugin.
   * @since     1.0.0
   */
  public function get_version() {
    return $this->version;
  }

}
