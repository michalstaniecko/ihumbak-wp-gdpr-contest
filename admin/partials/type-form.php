<?php

?>
<form action="<?= admin_url('admin-post.php') ?>" method="post">
  <input type="hidden" name="action" value="set_tracking_code_type"/>
  <?php if (isset($_GET['id'])): ?>
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
  <?php endif; ?>
  <input
    type="text"
    name="name"
    placeholder="<?php _e('Name', 'ih-gdpr') ?>"
    value="<?php echo isset($script->name) ? $script->name : '' ?>"
  />
  <textarea name="description"
            placeholder="<?php _e('Description',
                                  'ih-gdpr') ?>"><?php echo isset($script->description) ? $script->description : '' ?></textarea>
  <input type="checkbox" name="enable" value="1" <?php echo checked(isset($script->enable) && $script->enable) ?>/>
  <button type="submit">Save</button>
</form>
