<?php
$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );

global $wpdb;
global $wp_query;
global $post;     
$args = array(  
    'post_type' => 'listing',
    'post_status' => 'publish',
    'posts_per_page' => -1
 );


$property_items = new WP_Query( $args ); 


function delete_all_terms($taxx){
    $taxonomy_name = $taxx;
    $terms = get_terms( array(
        'taxonomy' => $taxonomy_name,
        'hide_empty' => false
    ) );
    foreach ( $terms as $term ) {
               wp_delete_term($term->term_id, $taxonomy_name); 
        }        
}


$count = $property_items->found_posts;

 while ( $property_items->have_posts() ) : $property_items->the_post();
    // delete_all_terms();
    if( has_post_thumbnail( get_the_id() ) )
    {
        $attachment_id = get_post_thumbnail_id( get_the_id() );
        wp_delete_attachment($attachment_id, true);
    }    


    $registered_taxonomies = ['city_categories', 'country_categories', 'states_categories', 'amenities_categories', 'listint_types_categories'];
    foreach ( $registered_taxonomies as $r_taxx ) {
        delete_all_terms($r_taxx);
    }


    wp_delete_post(get_the_id(), true);
 endwhile;   

 echo "Success";