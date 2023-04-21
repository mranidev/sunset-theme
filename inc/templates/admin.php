<h1>Sunset Theme Settings</h1>
<?php settings_errors(  );?>

<?php

$fullname    = get_option( 'first_name' ) . ' ' . get_option( 'last_name' );
$description = get_option( 'user_description '); 

?>

<div class="sunset-sidebar-preview">
    <div class="sunset-sidebar">
        <h1 class="sunset-username"><?php echo $fullname; ?></h1>
        <h2 class="sunset-description"><?php echo $description; ?></h2>
        <div class="icons-wrapper">

        </div>
    </div>
</div>

<form class="sunset-general-form" action="options.php" method="post">
    <?php settings_fields( 'sunset-setting-group' );?>
    <?php do_settings_sections( 'mranidev_sunset' );?>
    <?php submit_button(  );?>
</form>