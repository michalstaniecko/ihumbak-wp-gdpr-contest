<?php

/**
 * Fired during plugin activation
 *
 * @link       https://ihumbak.website
 * @since      1.0.0
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/includes
 * @author     Michał Staniecko <michal.staniecko@gmail.com>
 */
class Ih_Gdpr_Activator {

  /**
   * Short Description. (use period)
   *
   * Long Description.
   *
   * @since    1.0.0
   */

  public function __construct() {
  }

  public function activate() {
    global $wpdb;

    $tbl_tracking_codes = $this->wp_ih_tracking_codes();
    $tbl_tracking_codes_types = $this->wp_ih_tracking_codes_types();

    $charset_collate = $wpdb->get_charset_collate();

    $sql_tracking_codes = "CREATE TABLE $tbl_tracking_codes (
    id int(11) NOT NULL AUTO_INCREMENT,
    name tinytext NOT NULL,
    type_id int(11) NOT NULL,
    script tinytext NOT NULL,
    description text,
    expires varchar(200),
		PRIMARY KEY  (id)
) $charset_collate;";

    $sql_tracking_code_types = "CREATE TABLE $tbl_tracking_codes_types (
    id int(11) NOT NULL AUTO_INCREMENT,
    name tinytext NOT NULL,
    enable int DEFAULT 0,
    description text,
		PRIMARY KEY  (id)
) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    dbDelta($sql_tracking_codes);
    dbDelta($sql_tracking_code_types);

  }

  public function wp_ih_tracking_codes() {
    global $wpdb;
    return $wpdb->prefix . 'ih_tracking_codes';
  }

  public function wp_ih_tracking_codes_types() {
    global $wpdb;
    return $wpdb->prefix . 'ih_tracking_codes_types';
  }

}
