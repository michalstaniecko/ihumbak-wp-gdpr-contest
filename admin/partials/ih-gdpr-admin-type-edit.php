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
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
  <div>
    <h1 class="wp-heading-inline">Tracking Code Type Edit </h1> <a href="<?= $action_url ?>" class="page-title-action">Go
      back</a>
  </div>
  <?php include_once plugin_dir_path(__FILE__) . 'type-form.php' ?>
</div>
