<?php
/** 
 * @package EasyListing
 */

/**
 * Plugin Name:       EasyListing
 * Plugin URI:        https://github.com/JyvaDigital/EasyListings.git
 * Description:       Simple WP Directory Plugin
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Ville Siren
 * Author URI:        https://jyva.io/
 * License:           All rights reserved
 * Text Domain:       wpdirectory
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
      
// Register the Custom Music Review Post Type

class WPListingPlugin{

    function __construct($arg){
        //echo $arg;
    } 

    function activate(){
        echo "activated";
    }

    function deactivate(){

    }

    function uninstall(){

    }

}
if(class_exists('WPListingPlugin')){
    $wplistingPlugin = new WPListingPlugin('WP Listing initialized');
}

register_activation_hook(__FILE__,array($wplistingPlugin, 'activate') );
register_deactivation_hook(__FILE__,array($wplistingPlugin, 'deactivate') );

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