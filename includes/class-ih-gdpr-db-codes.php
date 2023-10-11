<?php

class Ih_Gdpr_Db_Codes extends Ih_Gdpr_Db {

  private $table_types;

  public function __construct($table_name, $table_types) {
    parent::__construct($table_name);
    $this->table_types = $table_types;
  }

  public function prepare_data($data) {
    $this->data = $data;

    return $this;
  }

  /**
   * @param $fields array|null Fields to return
   * @return array|object|null
   */
  public function get_all($fields = null, $return = true) {
    $select_fields = 'codes.*';
    if (!empty($fields)) {
      $select_fields = join(',', array_map(function ($field) {
        return "codes.$field";
      }, $fields));
    }
    $this->collection = $this->wpdb->get_results(
      "SELECT $select_fields, types.name as type_name FROM $this->table_name as codes LEFT JOIN $this->table_types types ON codes.type_id = types.id;"
    );
    if ($return) {
      return $this->collection;
    }
    return $this;
  }

  public function to_html() {
    return array_map(function($item) {
      $item->script = stripslashes($item->script);
      return $item;
    }, $this->collection);
  }
}

