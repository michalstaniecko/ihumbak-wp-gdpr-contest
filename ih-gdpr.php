<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ihumbak.website
 * @since             1.0.0
 * @package           Ih_Gdpr
 *
 * @wordpress-plugin
 * Plugin Name:       IH GDPR
 * Plugin URI:        https://ihumbak.website
 * Description:       GDPR
 * Version:           1.0.0
 * Author:            Michał Staniecko
 * Author URI:        https://ihumbak.website
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ih-gdpr
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
  die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define('IH_GDPR_VERSION', '1.0.0');
define('IH_GDPR_PLUGIN_SLUG', 'ih-gdpr-settings');
define('IH_GDPR_PLUGIN_DOMAIN', 'ih-gdpr');
define('IH_GDPR_ADMIN_URL',
       add_query_arg(
         array( 'page' => IH_GDPR_PLUGIN_SLUG ),
         admin_url('admin.php')
       ));
define('IH_GDPR_ADMIN_URL_CODES',
       add_query_arg(
         array( 'page' => IH_GDPR_PLUGIN_SLUG . '-codes' ),
         admin_url('admin.php')
       ));
define('IH_GDPR_ADMIN_URL_TYPES',
       add_query_arg(
         array( 'page' => IH_GDPR_PLUGIN_SLUG . '-types' ),
         admin_url('admin.php')
       ));
define('IH_GDPR_PLUGIN_URL', plugin_dir_url(__FILE__));
define('IH_GDPR_PLUGIN_PATH', plugin_dir_path(__FILE__));

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ih-gdpr-activator.php
 */
function activate_ih_gdpr() {
  require_once plugin_dir_path(__FILE__) . 'includes/class-ih-gdpr-activator.php';
  $activator = new Ih_Gdpr_Activator;
  $activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ih-gdpr-deactivator.php
 */
function deactivate_ih_gdpr() {
  require_once plugin_dir_path(__FILE__) . 'includes/class-ih-gdpr-deactivator.php';
  Ih_Gdpr_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_ih_gdpr');
register_deactivation_hook(__FILE__, 'deactivate_ih_gdpr');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-ih-gdpr.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ih_gdpr() {
  require_once plugin_dir_path(__FILE__) . 'includes/class-ih-gdpr-activator.php';

  $plugin = new Ih_Gdpr(new Ih_Gdpr_Activator);
  $plugin->run();

}

run_ih_gdpr();
