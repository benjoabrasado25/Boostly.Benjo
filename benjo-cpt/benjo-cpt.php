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

define('BENJO_CPT_URL', plugin_dir_url(__FILE__));
define('BMA_BENJOCPT_VERSION', '1.0.0');

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



function metabox_other(){
 	?>
 		<input type="text" name="price" id="price" placeholder="Price">
         <input type="text" name="currency" id="currency" placeholder="Currency">
         <input type="text" name="address" id="address" placeholder="Address">
         <input type="text" name="latitude" id="latitude" placeholder="Latitude">
         <input type="text" name="longitude" id="longitude" placeholder="Longitude"> 
 	<?
}


function benjo_cpt_metabox_mutiple_fields(){
 
    add_meta_box(
            'benjo_cpt-metabox-multiple-fields',
            'Other details',
            'benjo_cpt_add_multiple_fields',
            'listing'
        );
}
 
add_action('add_meta_boxes', 'benjo_cpt_metabox_mutiple_fields');
 
function benjo_cpt_add_multiple_fields(){
 
    global $post;
 
    // Get Value of Fields From Database
    $price = get_post_meta( $post->ID, 'price', true);
    $currency = get_post_meta( $post->ID, 'currency', true);
    $address = get_post_meta( $post->ID, 'address', true);
    $latitude = get_post_meta( $post->ID, 'latitude', true);
    $longitude = get_post_meta( $post->ID, 'longitude', true);


    $guests = get_post_meta( $post->ID, 'guests', true);
    $no_of_rooms = get_post_meta( $post->ID, 'no_of_rooms', true);
    $no_of_beds = get_post_meta( $post->ID, 'no_of_beds', true);
    $no_of_baths = get_post_meta( $post->ID, 'no_of_baths', true);
    ?>

    <input type="text" name="price" id="price" placeholder="Price" value="<?php echo $price?>">
    <input type="text" name="currency" id="currency" placeholder="Currency" value="<?php echo $currency?>">
    <input type="text" name="address" id="address" placeholder="Address" value="<?php echo $address?>">
    <input type="text" name="latitude" id="latitude" placeholder="Latitude" value="<?php echo $latitude?>">
    <input type="text" name="longitude" id="longitude" placeholder="Longitude" value="<?php echo $longitude?>"> 

    <input type="text" name="guests" id="guests" placeholder="Guests" value="<?php echo $guests?>"> 
    <input type="text" name="no_of_rooms" id="no_of_rooms" placeholder="Number of Rooms" value="<?php echo $no_of_rooms?>"> 
    <input type="text" name="no_of_beds" id="no_of_beds" placeholder="Number of Beds" value="<?php echo $no_of_beds?>"> 
    <input type="text" name="no_of_baths" id="no_of_baths" placeholder="Number of baths" value="<?php echo $no_of_baths?>"> 
    <?php
     
}

function benjo_cpt_save_multiple_fields_metabox(){
 
    global $post;
 
 
    if(isset($_POST["price"])) :
    update_post_meta($post->ID, 'price', $_POST["price"]);
    endif;
    if(isset($_POST["currency"])) :
    update_post_meta($post->ID, 'currency', $_POST["currency"]);
    endif;
    if(isset($_POST["address"])) :
    update_post_meta($post->ID, 'address', $_POST["address"]);
    endif;
    if(isset($_POST["latitude"])) :
    update_post_meta($post->ID, 'latitude', $_POST["latitude"]);
    endif;
    if(isset($_POST["longitude"])) :
    update_post_meta($post->ID, 'longitude', $_POST["longitude"]);
    endif;
 
}
 
add_action('save_post', 'benjo_cpt_save_multiple_fields_metabox');



// add_action('add_meta_boxes', 'benjo_cpt_multiple_metaboxes');

function register_scripts(){

	wp_register_script('benjo-cpt-upload', BENJO_CPT_URL.'js/benjo-cpt-upload.js', array('jquery'), BMA_BENJOCPT_VERSION, true);
	wp_enqueue_script('benjo-cpt-upload');
	wp_localize_script('benjo-cpt-upload', 'BENJOCPT_OPTIONS', array(
		'controlNav'=> BENJO_CPT_URL
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


function delete_listing_option() {
    add_submenu_page(
        'options-general.php',
        'Delete Listings',
        'Delete Listings',
        'manage_options',
        'custom-listing-delte-settings',
        'delete_listing_view'
    );
}

function delete_listing_view(){
    ?>
    <h1>Delete Listings</h1>
        <button id="delete_post" type="button">Delete all listings</button>
     </form>     
    <?php
}

function listing_view() {
    ?>
    <h1>Import CSV</h1>
    <form action="upload.php" method="post" id="upload_csv_form" onsubmit="return false">
        <div class="form-group">
          <label for="exampleFormControlFile1">Please Select File</label>
          <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
        </div>
        <div class="form-group">
         <input type="submit" name="submit" value="Save" class="btn btn-primary">
       </div>
     </form>


<!--     <h1>Import CSV</h1>
    <form action="delete_post.php" method="post" id="delete_post_form">
        <div class="form-group">
         <input type="submit" name="submit" value="Delete" class="btn btn-primary">
       </div>
     </form>      -->

    <?php

}

add_action('admin_menu', 'listing_option');

add_action('admin_menu', 'delete_listing_option');

