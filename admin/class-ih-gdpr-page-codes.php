<?php

class Ih_Gdpr_Page_Codes extends Ih_Gdpr_Page {

  public const URL = IH_GDPR_ADMIN_URL . '-codes';

  public function __construct($codes, $types) {
    parent::__construct($codes, $types);
  }

  public function config() {

  }

  public function add() {
    $this->include_template('admin/partials/ih-gdpr-admin-add.php', array(
      "types"      => $this->codes->get_all(),
      "action_url" => self::URL
    ));
  }

  public function edit() {
    $action_url = self::URL;
    $id = $_GET['id'];
    $script = $this->codes->get_by_id($id);
    $types = $this->types->get_all();
    $this->include_template('admin/partials/ih-gdpr-admin-edit.php', array(
      "action_url" => $action_url,
      "id"         => $id,
      "script"     => $script,
      "types"      => $types
    ));

  }

  public function remove() {
    if (!isset($_GET['id'])) {
      $this->list();
      return;
    }

    $this->codes->remove($_GET['id']);
    $this->list();
  }

  public function list() {
    $this->include_template('admin/partials/ih-gdpr-admin-display.php', array(
      'codes'      => $this->codes->get_all(),
      "action_url" => add_query_arg(array(
                                      "action" => "add"
                                    ))
    ));

  }
}
