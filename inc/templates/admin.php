<h1>Sunset Theme Settings</h1>
<?php settings_errors(  );?>
<form action="options.php" method="post">
    <?php settings_fields( 'sunset-setting-group' );?>
    <?php do_settings_sections( 'mranidev_sunset' );?>
    <?php submit_button(  );?>
</form>