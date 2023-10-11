<?php

class Ih_Gdpr_Page_Settings extends Ih_Gdpr_Page {

  public Ih_Gdpr_Db_Codes $codes;

  public Ih_Gdpr_Db $types;

  public function __construct($codes, $types) {
    $this->codes = $codes;

    $this->types = $types;
  }

  public function config() {

  }

  public function section_callback($args) {
  }

  public function settings_field_callback($args) {
    switch ($args['type']) {
      case 'inputtext':
      {
        $this->inputtext($args);
        break;
      }
      case 'textarea':
      {
        $this->textarea($args);
        break;
      }
      case 'select':
      {
        $this->select($args);
        break;
      }
      default:
      {
        $this->default();
        break;
      }
    }
  }

  public function default() {
    echo 'default';
  }

  public function inputtext($args) {
    ?>
    <input type="text" name="<?php echo $args['name'] ?>" value="<?php echo $args['value'] ?>"
           style="width: 100%; max-width: 600px;"/>
    <?php
  }

  public function textarea($args) {
    ?>
    <textarea name="<?php echo $args['name'] ?>"
              style="width: 100%; max-width: 600px; height: 100px"><?php echo $args['value'] ?></textarea>
    <?php
  }

  public function select($args) {
    $options = $args['config']['options'];
    $placeholder = $args['config']['placeholder'];
    ?>
    <select name="<?php echo $args['name'] ?>">
      <option><?php echo $placeholder ?></option>
      <?php foreach ($options as $option): ?>
        <option value="<?php echo $option->key ?>" <?php selected($option->key, $args['value']) ?>><?php echo $option->value ?></option>
      <?php endforeach; ?>
    </select>
    <?php
  }

  public function edit() {
    $this->include_template('admin/partials/ih-gdpr-admin-settings.php', array());
  }

}
