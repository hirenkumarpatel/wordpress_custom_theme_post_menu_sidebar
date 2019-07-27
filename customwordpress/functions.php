<?php

/**
 * Name: Functions.php for custom Wordpress theme
 * @package:customwordpress
 * @author: Hiren Patel
 * @version: 1.0
 */

/**
 * 
======================================
INITIAL SETUP AND ADDING THEME SUPPORT
======================================
 */

if (!function_exists('custom_initial_setup')) {
    /**
     * setting up initial data for custom wordpress theme
     */
    function custom_initial_setup()
    {
        /**add default post and comments rss feed to <head></head> */
        add_theme_support('automatic-feed-links');

        /**enable support for post thumbnails and featured images */
        add_theme_support('post-thumbnails');

        /**enable support for title in browser's tab */
        add_theme_support('title-tag');

        /** enable menu theme support in admin panel*/
        add_theme_support('menus');

        /** enables you to add custom background to page  */
        //add_theme_support('custom-background');

        /** enables HTML5 scripts to specific elements in wordpress */
        add_theme_support('HTML5', array('comment-list', 'comment-form', 'search-form'));
    }
}

add_action('after_setup_theme', 'custom_initial_setup');




/**
 ============================
 LOADING CSS AND JS RESOURCES
 ============================
 *
 *  loading css and js resources*/
if (!function_exists('custom_load_resources')) {

    function custom_load_resources()
    {

        /**loading style.css stylesheet and proving location of stylesheet by wordpress constant*/
        wp_enqueue_style('main_stylesheet', get_stylesheet_uri(), false, 1.0, 'all');

        /** Loading google's Roboto fonts  from CDN*/
        wp_enqueue_style('fonts', '//fonts.googleapis.com/css?family=Open+Sans:400,600,400italic,600italic|Roboto+Slab:400,700');

        /** loading font awesome js */
        wp_enqueue_script('font-awesome_js', 'https://kit.fontawesome.com/2f53a9689d.js', false, 1.0, 'all');

        /**loading footer js and font awesome scripts  */
        wp_enqueue_script('main_js', get_template_directory_uri() . '/assets/js/main.js', false, 1.0, 'all');
    }
}

add_action('wp_enqueue_scripts', 'custom_load_resources');





/**
  ===========================
  NAVIGATION MENU
  ===========================
 * 
 * Registering custom navigation menu in the header
 * use register_nav_menu hook to register new menu
 */

if (!function_exists('custom_register_menubar')) {
    /**create function to register custom navigation menu  */
    function custom_register_menubar()
    {

        register_nav_menu('primary', 'Primary Header Navigation');
    }
}
add_action('after_setup_theme', 'custom_register_menubar');



/**
===================
 CUSTOM POST TYPES
===================
 
 * Register a custom post type called "book".
 *
 * @see get_post_type_labels() for label keys.
 */

function custom_add_book_post_type()
{
    $labels = array(
        'name'                  => _x('Books', 'Post type general name', 'textdomain'),
        'singular_name'         => _x('Book', 'Post type singular name', 'textdomain'),
        'menu_name'             => _x('Books', 'Admin Menu text', 'textdomain'),
        'name_admin_bar'        => _x('Book', 'Add New on Toolbar', 'textdomain'),
        'add_new'               => __('Add New', 'textdomain'),
        'add_new_item'          => __('Add New Book', 'textdomain'),
        'new_item'              => __('New Book', 'textdomain'),
        'edit_item'             => __('Edit Book', 'textdomain'),
        'view_item'             => __('View Book', 'textdomain'),
        'all_items'             => __('All Books', 'textdomain'),
        'search_items'          => __('Search Books', 'textdomain'),
        'parent_item_colon'     => __('Parent Books:', 'textdomain'),
        'not_found'             => __('No books found.', 'textdomain'),
        'not_found_in_trash'    => __('No books found in Trash.', 'textdomain'),
        'featured_image'        => _x('Book Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
        'set_featured_image'    => _x('Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'remove_featured_image' => _x('Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'use_featured_image'    => _x('Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
        'archives'              => _x('Book archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
        'insert_into_item'      => _x('Insert into book', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
        'uploaded_to_this_item' => _x('Uploaded to this book', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
        'filter_items_list'     => _x('Filter books list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
        'items_list_navigation' => _x('Books list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
        'items_list'            => _x('Books list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
    );


    register_post_type('book', array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'book'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_icon'          => 'dashicons-book',
        'menu_position'      => null,
        'supports'           => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments'),
    ));
}

add_action('init', 'custom_add_book_post_type');



/**
 * add custom post type called 'Project' to admin panel
 * 
 *  * */
if (!function_exists('custom_add_project_post_type')) {

    function custom_add_project_post_type()
    {

        /**use register_post_type hook to register new post type to wordpress */

        $labels = array(
            'name'                  => _x('Projects', 'Post type general name', 'textdomain'),
            'singular_name'         => _x('Project', 'Post type singular name', 'textdomain'),
            'menu_name'             => _x('Projects', 'Admin Menu text', 'textdomain'),
            'name_admin_bar'        => _x('Project', 'Add New on Toolbar', 'textdomain'),
            'add_new'               => __('Add New', 'textdomain'),
            'add_new_item'          => __('Add New Project', 'textdomain'),
            'new_item'              => __('New Project', 'textdomain'),
            'edit_item'             => __('Edit Project', 'textdomain'),
            'view_item'             => __('View Project', 'textdomain'),
            'all_items'             => __('All Projects', 'textdomain'),
            'search_items'          => __('Search Projects', 'textdomain'),
            'parent_item_colon'     => __('Parent Projects:', 'textdomain'),
            'not_found'             => __('No Projects found.', 'textdomain'),
            'not_found_in_trash'    => __('No Projects found in Trash.', 'textdomain'),
            'featured_image'        => _x('Project Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain'),
            'set_featured_image'    => _x('Set project image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'remove_featured_image' => _x('Remove project image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'use_featured_image'    => _x('Use as project image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain'),
            'archives'              => _x('Project archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain'),
            'insert_into_item'      => _x('Insert into Project', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain'),
            'uploaded_to_this_item' => _x('Uploaded to this Project', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain'),
            'filter_items_list'     => _x('Filter Projects list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain'),
            'items_list_navigation' => _x('Projects list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain'),
            'items_list'            => _x('Projects list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain'),
        );

        register_post_type('project', array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => 'project'),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => null,
            'menu_icon' => 'dashicons-list-view', // selected icons from developer.wordpress.org icons
            'supports'           => array('title', 'editor', 'thumbnail', 'author', 'excerpt', 'comments'),
        ));
    }
}
add_action('init', 'custom_add_project_post_type');

/**
 * 
   ==================================
   REGISTERING SIDEBAR AND WIDGET AREA
   ===================================
 */

 /**
  * registering sidebar to functions.php
  * 
  *1.Create the sidebar.php template file and display the sidebar using the @dynamic_sidebar function
  *2.Load in your theme using the get_sidebar function
  */
if (!function_exists('register_custom_sidebars')) {
    function register_custom_sidebars()
    {

        /* Register the 'primary' sidebar. */
        register_sidebar(
            array(
                'id'            => 'primary',
                'name'          => __('Primary Sidebar'),
                'description'   => __('A short description of the sidebar.'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">', // must use %1$s and %2$s to use it on plugin
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>',
            )
        );
        /* Repeat register_sidebar() code for additional sidebars. */
    }
}

add_action('widgets_init', 'register_custom_sidebars');


/** 
 * defining custom function to get top most parent id of current page 
 */

 function get_custom_ancestor_id(){

    /** making $post global function so can be used in whole function */
    global $post;

    /** we are checking to see if current post has its parent post will return 1  */
    if($post->post_parent){
     
        /** 
         * we are using wp function get_post_ancestors which will return all id of all parent posts
         * @param $post->id to pass current post to get ancestors
         * @rev to reverse returned arary of parents id to get top one at first index to return
         */
        $ancestors=array_reverse(get_post_ancestors($post->ID));
        return $ancestors[0];
    }
    //or return current post id
    return $post->ID; 

 }