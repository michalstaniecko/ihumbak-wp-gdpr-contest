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
 * @var $codes
 *
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<div class="wrap">
  <h1 class="wp-heading-inline">GDPR Tracking Codes</h1> <a href="<?= $action_url; ?>" class="page-title-action">Add
    new</a>
  <table class="wp-list-table widefat striped">
    <thead>
      <tr>
        <td>
          <?php _e('Name', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
        <td>
          <?php _e('Expires', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
        <td>
          <?php _e('Script', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
        <td>
          <?php _e('Type', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
        <td>
          <?php _e('Actions', 'ih-gdpr'); ?>
        </td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($codes as $code): ?>
        <?php $edit_url = add_query_arg(array(
                                          'action' => 'edit',
                                          'id'     => $code->id
                                        )); ?>
        <?php $trash_url = add_query_arg(array(
                                          'action' => 'trash',
                                          'id'     => $code->id
                                        )); ?>
        <tr>
          <td>
            <a href="<?php echo $edit_url ?>"><?php echo $code->name ?></a>
          </td>
          <td>
            <?php echo isset($code->expires) ? $code->expires : '' ?>
          </td>
          <td>
            <pre><?php echo isset($code->script) ? esc_html(stripslashes($code->script)) : '' ?></pre>
          </td>
          <td>
            <?php echo isset($code->type_name) ? $code->type_name : '' ?>
          </td>
          <td>
            <a href="<?php echo $edit_url ?>">Edit</a>
            <a href="<?php echo $trash_url ?>">Remove</a>
          </td>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>
</div>
