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

define('BMA_SLIDER_URL', plugin_dir_url(__FILE__));
define('BMA_SLIDER_VERSION', '1.0.0');

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
        'supports' => array ('title', 'editor', 'thumbnail','custom-fields')
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

    register_taxonomy(
        'amenities_categories',
        'listing',
        array(
            'labels' => array(
                'name' => 'Amenities',
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
        'listint_types_categories',
        'listing',
        array(
            'labels' => array(
                'name' => 'Listing Types',
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

function register_scripts(){

	wp_register_script('benjo-cpt-upload', BMA_SLIDER_URL.'js/benjo-cpt-upload.js', array('jquery'), BMA_SLIDER_VERSION, true);
	wp_enqueue_script('benjo-cpt-upload');
	wp_localize_script('benjo-cpt-upload', 'SLIDER_OPTIONS', array(
		'controlNav'=> BMA_SLIDER_URL
	));	
}
add_action('admin_enqueue_scripts', 'register_scripts', 999);






function listing_option() {
    add_submenu_page(
        'options-general.php',
        'Import Listings',
        'Import Listings',
        'manage_options',
        'custom-listing-plugin-settings',
        'listing_view'
    );
}


function listing_view() {
    ?>
    <h1>Import CSV</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data" id="upload_csv_form">
        <div class="form-group">
          <label for="exampleFormControlFile1">Please Select File</label>
          <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
         <input type="submit" name="submit" value="submit" class="btn btn-primary">
       </div>
  </form>
    <?php

}

add_action('admin_menu', 'listing_option');


