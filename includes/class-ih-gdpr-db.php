<?php

class Ih_Gdpr_Db {

  protected $table_name;

  protected $wpdb;

  protected $data;

  protected $format;

  protected $collection;

  protected $results;

  public function __construct($table_name) {
    global $wpdb;
    $this->table_name = $table_name;
    $this->wpdb = $wpdb;
  }

  public function prepare_data($data) {
    $this->data = $data;

    return $this;
  }

  public function prepare_format($format) {
    $this->format = $format;

    return $this;
  }

  public function update($id = null) {
    if ($id === null) {
      return $this->insert();
    }
    $this->results = $this->wpdb->update(
      $this->table_name,
      $this->data,
      array( 'id' => $id)
    );
    return $this;
  }

  public function insert() {
    $this->results = $this->wpdb->insert(
      $this->table_name,
      $this->data,
      $this->format
    );
    return $this;
  }

  public function remove($id) {
    return $this->wpdb->delete($this->table_name, array('id' => $id));
  }

  public function get_by_id($id) {
    return $this->wpdb->get_row("SELECT * FROM $this->table_name WHERE id = $id;");
  }

  public function get_all() {
    return $this->wpdb->get_results("SELECT * FROM $this->table_name;");
  }

  public function send_json() {
    if ($this->results > 0) {
      wp_send_json_success();
    } else {
      wp_send_json_error(new WP_Error('400', 'Something went wrong', wp_date('YYYY-MM-DD HH:MM:SS')));
    }
  }

  public function redirect_to($url) {
    if ($this->results > 0) {
      wp_redirect($url);
    } else {
      wp_send_json_error(new WP_Error('400', 'Something went wrong', wp_date('YYYY-MM-DD HH:MM:SS')));
    }
  }
}

