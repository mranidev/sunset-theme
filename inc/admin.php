<?php

/**
 * @package sunset-theme
*/


function sunset_add_admine_page()
{
    // generate sunset admin page
    add_menu_page('Sunset Theme Options',
                  'sunset', 
                  'manage_options', 
                  'mranidev_sunset', 
                  'sunset_theme_create_page', 
                  get_template_directory_uri() . '/img/sunset-icon.png',
                   100);
    
    // generate susnset admin general sub page
    add_submenu_page( 'mranidev_sunset', 
                      'Sunset Theme Options',
                      'General',
                      'manage_options',
                      'mranidev_sunset', 
                      'sunset_theme_settings_page');

    // generate susnset admin custom css sub page
    add_submenu_page( 'mranidev_sunset', 
                      'Sunset Theme CSS',
                      'Custom CSS',
                      'manage_options',
                      'mranidev_sunset_css', 
                      'sunset_theme_custom_css');

    // activate custom settings
    add_action( 'admin_init', 'sunset_custom_settings' );
}

add_action('admin_menu', 'sunset_add_admine_page');

function sunset_custom_settings()
{
    register_setting( 'sunset-setting-group', 'first_name' ); 
    register_setting( 'sunset-setting-group', 'last_name' );
    register_setting( 'sunset-setting-group', 'twitter_handler' ); 
    register_setting( 'sunset-setting-group', 'user_description' ); 
    register_setting( 'sunset-setting-group', 'facebook_handler' );
    register_setting( 'sunset-setting-group', 'github_handler' ); 

    add_settings_section( 'sunset-sidebar-options', 'Sidebar Options', 'sunset_sidebar_options','mranidev_sunset' );
    add_settings_field( 'sidebar-name', 'Full Name', 'sunset_sidebar_name', 'mranidev_sunset', 'sunset-sidebar-options' );
    add_settings_field( 'sidebar-description', 'User Description', 'sunset_sidebar_description', 'mranidev_sunset', 'sunset-sidebar-options' );
    add_settings_field( 'sidebar-twitter', 'Twitter Handler', 'sunset_sidebar_twitter', 'mranidev_sunset', 'sunset-sidebar-options' );
    add_settings_field( 'sidebar-facebook', 'Facebook Handler', 'sunset_sidebar_facebook', 'mranidev_sunset', 'sunset-sidebar-options' );
    add_settings_field( 'sidebar-github', 'Github Handler', 'sunset_sidebar_github', 'mranidev_sunset', 'sunset-sidebar-options' );
}

function sunset_sidebar_options()
{
    echo "Customize Sunset Sidebar";
}

function sunset_sidebar_name()
{
    $firstName = esc_attr( get_option( 'first_name' ) );
    $lastName = esc_attr( get_option( 'last_name' ) );
    echo '<input name="first_name" type="text" value="'.$firstName.'" placeholder="First Name" />
          <input name="last_name" type="text" value="'.$lastName.'" placeholder="Last Name" />';   
}

function sunset_sidebar_description()
{
    $userDescription = esc_attr( get_option( 'user_description' ) );
    echo '<input name="user_description" type="text" value="'.$userDescription.'" placeholder="User Description" />';
}


function sunset_sidebar_twitter()
{
    $twitterHandler = esc_attr( get_option( 'twitter_handler' ) );
    echo '<input name="twitter_handler" type="text" value="'.$twitterHandler.'" placeholder="Twitter Username" />';
}

function sunset_sidebar_facebook()
{
    $facebookHandler = esc_attr( get_option( 'facebook_handler' ) );
    echo '<input name="facebook_handler" type="text" value="'.$facebookHandler.'" placeholder="Facebook Username" />';
}

function sunset_sidebar_github()
{
    $githubHandler = esc_attr( get_option( 'github_handler' ) );
    echo '<input name="github_handler" type="text" value="'.$githubHandler.'" placeholder="Github Username" />';
}

function sunset_theme_create_page() 
{
    // echo "<h1>General Page</h2>";
}

function sunset_theme_settings_page()
{
    require_once get_template_directory() . "/inc/templates/admin.php";
}

function sunset_theme_custom_css()
{
    echo "<h1>Custom CSS Page</h2>";
}



