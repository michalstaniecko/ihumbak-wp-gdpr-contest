<?php

class Ih_Gdpr_Page_Types extends Ih_Gdpr_Page {

  public const URL = IH_GDPR_ADMIN_URL . '-types';

  public function __construct($codes, $types) {
    parent::__construct($codes, $types);
  }

  public function config() {

  }

  public function add() {
    $action_url = self::URL;
    $this->include_template('admin/partials/ih-gdpr-admin-type-add.php', array(
      "action_url" => $action_url
    ));
  }

  public function edit() {
    $action_url = self::URL;
    $id = $_GET['id'];
    $script = $this->types->get_by_id($id);
    $this->include_template('admin/partials/ih-gdpr-admin-type-edit.php', array(
      "action_url" => $action_url,
      "id"         => $id,
      "script"     => $script,
    ));
  }

  public function remove() {

    if (!isset($_GET['id'])) {
      $this->list();
      return;
    }

    $this->types->remove($_GET['id']);
    $this->list();
  }

  public function list() {
    $action_url = add_query_arg(array(
                                  "action" => "add"
                                ));
    $types = $this->types->get_all();
    $this->include_template('admin/partials/ih-gdpr-admin-type-display.php', array(
      'action_url' => $action_url,
      "types"      => $types
    ));
  }

}
