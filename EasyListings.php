<?php
/** 
 * @package EasyListings
 */

/**
 * Plugin Name:       EasyListings
 * Plugin URI:        https://github.com/JyvaDigital/EasyListings.git
 * Description:       Simple WP Directory Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ville Siren
 * Author URI:        https://jyva.io/
 * License:           All rights reserved
 * Text Domain:       easylistings
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
      
// Register the Custom Music Review Post Type

class EasyListingsPlugin{

    function __construct($arg){
        //echo $arg;
    } 

    function activate(){
        echo "activated";

        
        
        if(class_exists('EasyListingsPlugin')){
            $EasyListingsPlugin = new EasyListingsPlugin('Easy Listing initialized');
        }
    }

    function deactivate(){

        // Clear the permalinks to remove our post type's rules from the database.
        flush_rewrite_rules();

    }

    function uninstall(){

    }

}



register_activation_hook(__FILE__,array($EasyListingsPlugin, 'activate') );
register_deactivation_hook(__FILE__,array($EasyListingsPlugin, 'deactivate') );

function el_admin_menu_option(){
    add_menu_page('Easy Listing', 'E-Listing', 'manage_options', 'el-admin-menu','el-admin-page','',200);

}

add_action( 'admin_menu', 'el_admin_menu_option' );

function el-admin-page(){
    ?>
    <h1>This is the title</h1>
    <?
}


function wporg_options_page_html() {
    ?>
    <div class="wrap">
      <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'wporg_options' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'wporg' );
        // output save settings button
        submit_button( __( 'Save Settings', 'textdomain' ) );
        ?>
      </form>
    </div>
    <?php
}

add_action( 'admin_menu', 'wporg_options_page' );
function wporg_options_page() {
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html',
        plugin_dir_url(__FILE__) . 'images/icon_wporg.png',
        20
    );
}
/* 
function register_cpt_wpdirectory() {
 
    $labels = array(
        'name' => _x( 'Listings', 'wpdirectory' ),
        'singular_name' => _x( 'Listing', 'wpdirectory' ),
        'add_new' => _x( 'Add New', 'wpdirectory' ),
        'add_new_item' => _x( 'Add New Listing', 'wpdirectory' ),
        'edit_item' => _x( 'Edit Directory Item', 'wpdirectory' ),
        'new_item' => _x( 'New Directory Item', 'wpdirectory' ),
        'view_item' => _x( 'View Directory Item', 'wpdirectory' ),
        'search_items' => _x( 'Search Directory Item', 'wpdirectory' ),
        'not_found' => _x( 'No directory items found', 'wpdirectory' ),
        'not_found_in_trash' => _x( 'No directory items found in Trash', 'wpdirectory' ),
        'parent_item_colon' => _x( 'Parent Directory Item', 'wpdirectory' ),
        'menu_name' => _x( 'WP Directory', 'wpdirectory' ),
    );
 
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Directory items filter',
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes' ),
        'taxonomies' => array( 'categories' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-format-audio',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
 
    register_post_type( 'wpdirectory', $args );
}
 
add_action( 'init', 'register_cpt_wpdirectory' );

function categories_taxonomy() {
    register_taxonomy(
        'categories',
        'wpdirectory',
        array(
            'hierarchical' => true,
            'label' => 'Categories',
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'category',
                'with_front' => false
            )
        )
    );
}
add_action( 'init', 'categories_taxonomy');

function create_wpdirectory_pages()
  {
   //post status and options
    $post = array(
          'comment_status' => 'closed',
          'ping_status' =>  'closed' ,
          'post_date' => date('Y-m-d H:i:s'),
          'post_name' => 'wpdirectory',
          'post_status' => 'publish' ,
          'post_title' => 'Yritykset',
          'post_type' => 'page',
    );
    //insert page and save the id
    $newvalue = wp_insert_post( $post, false );
    //save the id in the database
    update_option( 'wpdpage', $newvalue );
  }

  // // Activates function if plugin is activated
register_activation_hook( __FILE__, 'create_wpdirectory_pages');*/