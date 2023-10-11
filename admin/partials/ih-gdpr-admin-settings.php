<?php

// check user capabilities
if (!current_user_can('manage_options')) {
  return;
}

// add error/update messages

// check if the user have submitted the settings
// WordPress will add the "settings-updated" $_GET parameter to the url
if (isset($_GET['settings-updated'])) {
  // add settings saved message with the class of "updated"
  //add_settings_error( 'wporg_messages', 'wporg_message', __( 'Settings Saved', 'wporg' ), 'updated' );
}

// show error/update messages
//settings_errors( 'wporg_messages' );
?>
  <div class="wrap">
    <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
    <form action="options.php" method="post">
      <?php
      // output security fields for the registered setting
      settings_fields('ih_gdpr');
      // output setting sections and their fields
      do_settings_sections('ih_gdpr');
      // output save settings button
      submit_button('Save Settings');
      ?>
    </form>
  </div>
<?php

