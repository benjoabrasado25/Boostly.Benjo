<?php

/**
* Plugin Name: Benjo CPT
* Plugin URI: facebook.com/benjo.abrasado
* Description: My very own slider
* Version: 1.0
* Requires at least: 5.6
* Author: Benjo Abrasado
* Author URI: facebook.com/benjo.abrasado
* License: GPL v2 or later
* License URI: https://www.gnu.org/licenses/gpl-2.0.html
* Text Domain: bma-slider
* Domain Path: /languages
*/

add_action( 'init', 'create_custom_posts' );

function create_custom_posts ()
{      
    register_post_type( 'listing',
        array(
            'labels' => array(
                'name' => __( 'Listings' ),
                'singular_name' => __( 'Listing' )
            ),
        'public' => true,
        'supports' => array ('title', 'editor', 'thumbnail')
        )
    );

    register_taxonomy(
        'city_categories',
        'listing',
        array(
            'labels' => array(
                'name' => 'City',
                'add_new_item' => 'Add New',
                'new_item_name' => "Add New"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'hasArchive' => true
        )
    );

    register_taxonomy(
        'country_categories',
        'listing',
        array(
            'labels' => array(
                'name' => 'Country',
                'add_new_item' => 'Add New',
                'new_item_name' => "Add New"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'hasArchive' => true
        )
    );    

    register_taxonomy(
        'states_categories',
        'listing',
        array(
            'labels' => array(
                'name' => 'States',
                'add_new_item' => 'Add New',
                'new_item_name' => "Add New"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true,
            'hasArchive' => true
        )
    );        
}

