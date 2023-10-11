<?php

?>

<form action="<?= admin_url('admin-post.php') ?>" method="post">
  <input type="hidden" name="action" value="set_tracking_code"/>
  <?php if (isset($_GET['id'])): ?>
    <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"/>
  <?php endif; ?>
  <input type="text" name="name" placeholder="name" value="<?php echo isset($script->name) ? $script->name : '' ?>"/>
  <input type="text" name="expires" placeholder="expires"
         value="<?php echo isset($script->expires) ? $script->expires : '' ?>"/>
  <textarea name="script"
            placeholder="script"><?php echo isset($script->script) ? esc_html(stripslashes($script->script)) : '' ?></textarea>
  <select name="type_id">
    <option value=""><?php _e('Select type', 'ih-gdpr'); ?></option>
    <?php foreach ($types as $type): ?>
      <option <?php echo selected(isset($_GET['id']) && $type->id === $_GET['id']) ?>
        value="<?php echo $type->id ?>"><?php echo $type->name ?></option>
    <?php endforeach; ?>
  </select>
  <button type="submit">Save</button>
</form>
