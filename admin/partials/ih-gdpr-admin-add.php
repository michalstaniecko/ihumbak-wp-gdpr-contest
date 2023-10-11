<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://ihumbak.website
 * @since      1.0.0
 *
 * @package    Ih_Gdpr
 * @subpackage Ih_Gdpr/admin/partials
 *
 * @var $action_url
 * @var $types
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
  <div>
    <h1 class="wp-heading-inline"><?php _e('GDPR Settings Add', 'ih-gdpr') ?></h1>
    <a href="<?= $action_url ?>" class="page-title-action"><?php _e('Go back','ih-gdpr') ?></a>
  </div>
  <?php include_once plugin_dir_path(__FILE__) . 'script-form.php' ?>
</div>
