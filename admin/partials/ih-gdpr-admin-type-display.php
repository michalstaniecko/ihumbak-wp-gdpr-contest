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
 *
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
  <h1 class="wp-heading-inline">GDPR Tracking Codes Types</h1> <a href="<?= $action_url; ?>" class="page-title-action">Add
    new</a>
  <table class="wp-list-table widefat striped">
    <thead>
      <tr>
        <td>
          <?php _e('Name', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
        <td>
          <?php _e('Description', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
        <td>
          <?php _e('Always active', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
        <td>
          <?php _e('Actions', IH_GDPR_PLUGIN_DOMAIN); ?>
        </td>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($types as $type): ?>
        <?php $edit_url = add_query_arg(array(
                                          'action' => 'edit',
                                          'id'     => $type->id
                                        )); ?>
        <?php $trash_url = add_query_arg(array(
                                           'action' => 'trash',
                                           'id'     => $type->id
                                         )); ?>
        <tr>
          <td>
            <a href="<?php echo $edit_url ?>"><?php echo isset($type->name) ? $type->name : '' ?></a>
          </td>
          <td>
            <?php echo isset($type->description) ? $type->description : '' ?>
          </td>
          <td>
            <?php echo $type->enable ? __('Yes', IH_GDPR_PLUGIN_DOMAIN) : __('No', IH_GDPR_PLUGIN_DOMAIN) ?>
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
