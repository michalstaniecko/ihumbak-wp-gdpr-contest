<?php

class Ih_Gdpr_Page {

  public Ih_Gdpr_Db_Codes $codes;

  public Ih_Gdpr_Db $types;

  public function __construct($codes, $types) {
    $this->codes = $codes;

    $this->types = $types;
  }

  public function config() {
  }

  public function include_template($path, array $args = []) {
    extract($args);
    include_once trailingslashit(IH_GDPR_PLUGIN_PATH) . $path;
  }

  public function add() {
  }

  public function edit() {
  }

  public function remove() {
  }

  public function list() {
  }

  public function render_page(string|null $action) {

    ob_start();

    switch ($action) {
      case 'add':
        $this->add();
        break;
      case 'edit':
        $this->edit();
        break;
      case 'trash':
        $this->remove();
        break;
      default:
        $this->list();
        break;
    }

    $template = ob_get_clean();

    echo $template;
  }
}
