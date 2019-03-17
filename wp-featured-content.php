<?php
/*
Plugin Name: WP Freatured Content
Plugin URI: http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This plugins fetch posts from an API and output them via a shortcode
Version: 1.0
Author: Mashrur Chowdhury
Author URI: http://URI_Of_The_Plugin_Author
License: A "Slug" license name e.g. GPL2
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// WPFC CONSTANTS
define( 'PLUGIN_NAME', 'WP Featured Content' );
define( 'PLUGIN_SLUG', 'wp-featured-content' );
define( 'PLUGIN_NAME_VERSION', '1.0.0' );
define( 'PLUGIN_DIR', __DIR__);
define( 'PLUGIN_BASE', __FILE__);

//include files
require_once( PLUGIN_DIR . '/includes/wpfc_settings.php' );
require_once( PLUGIN_DIR . '/includes/wpfc_image_uploader.php' );

/* */



// Register the menu.
add_action( "admin_menu", "wpfc_add_to_admin_menu" );


add_action('admin_init', 'wpfc_settings_section');
add_action('admin_init', 'wpfc_register_settings');
add_action( 'admin_enqueue_scripts', 'wpfc_load_scripts_admin' );


function wpfc_add_to_admin_menu() {
   add_menu_page(
                  "WP Featured Content",            // Page title
                  "WP Featured Content",            // Menu title
                  "manage_options",                 // Minimum capability
                  PLUGIN_SLUG,            // Menu slug
                  "wpfc_settings_page_html",      // Callback that prints the markup
                  "dashicons-images-alt",
                  20
               );

}


// Print the markup for the page
function wpfc_settings_page_html() {
   if ( !current_user_can( "manage_options" ) )  {
      wp_die( __( "You do not have sufficient permissions to access this page." ) );
   }
   ?>

    <div class="wrap">
        <form action="options.php" method="post">
            <?php settings_fields( 'wpfc_seetings' ); ?>
            <?php  do_settings_sections( 'wp-featured-content' ); ?>
            <label for="">Title</label>
            <input type="text" name="wpcf_box_one_title" value="<?php echo get_option('wpcf_box_one_title') ?>">
            <br>
            <label for="">Description</label>
            <input type="text" name="wpcf_box_one_description" value="<?php echo get_option('wpcf_box_one_description') ?>">
            <?php  wpfc_image_upload('wpcf_box_one_content', 500, 300) ?>
            <?php submit_button(); ?>
        </form>
    </div>

<?

}

/**
 * Load scripts and style sheet for settings page
 */
function wpfc_load_scripts_admin() {

    // WordPress library
    //wp_die(PLUGIN_DIR . '/js/wpf_upload_image.js');
    wp_enqueue_media();
    wp_enqueue_script('WPFC Upload Image', plugins_url('/js/wpf_upload_image.js',__FILE__ ), array(), '1.0.0', true);



}



