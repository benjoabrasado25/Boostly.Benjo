<?php
// $path = preg_replace( '/wp-content(?!.*wp-content).*/', '', __DIR__ );
// require_once( $path . 'wp-load.php' );
// global $user_ID, $wpdb;


$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
require_once( $parse_uri[0] . 'wp-load.php' );


if ( ! function_exists( 'post_exists' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/post.php' );
}

// $parse_url_post = explode( 'wp-admin', $_SERVER['SCRIPT_FILENAME'] );
// echo $parse_url_post[0];

if(!empty($_FILES["file"]["name"]))
{
 
    // Allowed mime types
    $fileMimes = array(
        'text/csv',
    );

    function set_featured_image_from_external_url($url, $post_id){
        
        if ( ! filter_var($url, FILTER_VALIDATE_URL) ||  empty($post_id) ) {
            return;
        }
        
        // Add Featured Image to Post
        $image_url        = preg_replace('/\?.*/', '', $url); // removing query string from url & Define the image URL here
        $image_name       = basename($image_url);
        $upload_dir       = wp_upload_dir(); // Set upload folder
        $image_data       = file_get_contents($url); // Get image data
        $unique_file_name = wp_unique_filename( $upload_dir['path'], $image_name ); // Generate unique name
        $filename         = basename( $unique_file_name ); // Create image file name

        // Check folder permission and define file location
        if( wp_mkdir_p( $upload_dir['path'] ) ) {
            $file = $upload_dir['path'] . '/' . $filename;
        } else {
            $file = $upload_dir['basedir'] . '/' . $filename;
        }

        // Create the image  file on the server
        file_put_contents( $file, $image_data );

        // Check image file type
        $wp_filetype = wp_check_filetype( $filename, null );

        // Set attachment data
        $attachment = array(
            'post_mime_type' => $wp_filetype['type'],
            'post_title'     => sanitize_file_name( $filename ),
            'post_content'   => '',
            'post_status'    => 'inherit'
        );

        // Create the attachment
        $attach_id = wp_insert_attachment( $attachment, $file, $post_id );

        // Include image.php
        require_once(ABSPATH . 'wp-admin/includes/image.php');

        // Define attachment metadata
        $attach_data = wp_generate_attachment_metadata( $attach_id, $file );

        // Assign metadata to attachment
        wp_update_attachment_metadata( $attach_id, $attach_data );

        // And finally assign featured image to post
        set_post_thumbnail( $post_id, $attach_id );
    }    
 
    // Validate whether selected file is a CSV file
    if (!empty($_FILES['file']['name']) && in_array($_FILES['file']['type'], $fileMimes))
    {
 
            // // Open uploaded CSV file with read-only mode
            $csvFile = fopen($_FILES['file']['tmp_name'], 'r');
 
            // Skip the first line
            fgetcsv($csvFile);
 
            // Parse data from CSV file line by line
            while (($getData = fgetcsv($csvFile)) !== FALSE)
            {
            	//array of the CSV is here
                    // $query = $wpdb->prepare('SELECT * FROM wp_posts WHERE post_title = '.$getData[1].'');
                    // $wpdb->query( $query );        
                // if($wpdb->num_rows){
                //     echo "213";
                // }

                // echo post_exist($getData[1]);

                if($getData[1]){

                    // if(!post_exists($getData[1])){


                        $post_id = wp_insert_post(array (
                           'post_type' => 'listing',
                           'post_title' => $getData[1],
                           'post_content' => $getData[3],
                           'post_status' => 'publish'
                        ));   
                        if ($post_id) {
                            add_post_meta($post_id, 'price', $getData[12]); 
                            add_post_meta($post_id, 'currency', $getData[13]); 
                            add_post_meta($post_id, 'address', $getData[8]); 
                            add_post_meta($post_id, 'latitude', $getData[16]); 
                            add_post_meta($post_id, 'longitude', $getData[17]); 


                            add_post_meta($post_id, 'no_of_rooms', $getData[5]); 
                            add_post_meta($post_id, 'no_of_beds', $getData[6]); 
                            add_post_meta($post_id, 'no_of_baths', $getData[7]); 
                            add_post_meta($post_id, 'guests', $getData[4]); 
                            add_post_meta($post_id, 'p_gallery', $getData[15]); 



                            set_featured_image_from_external_url( $getData[14], $post_id );



                            wp_set_object_terms( $post_id, $getData[9], 'city_categories' );
                            wp_set_object_terms( $post_id, $getData[10], 'country_categories' );
                            wp_set_object_terms( $post_id, $getData[10], 'states_categories' );


                            $amenities = $getData[11];
                            // wp_set_object_terms( $post_id, $getData[11], 'amenities_categories' );

                            $amenities_arr = explode(',', $amenities);

                            foreach ($amenities_arr as $amenity) {
                                $amenity = trim($amenity); 
                                if(str_starts_with($amenity, "and"))  $amenity = substr_replace($amenity, '',  0, 3);

                                if (!empty($amenity)) {
                                    $term = term_exists($amenity, 'amenities_categories');

                                    if (!$term) {
                                        $term = wp_insert_term($amenity, 'amenities_categories');
                                    }

                                    if (!is_wp_error($term) && isset($term['term_id'])) {
                                        wp_set_object_terms($post_id, (int) $term['term_id'], 'amenities_categories', true);
                                    }
                                }
                            }                            



                            wp_set_object_terms( $post_id, $getData[2], 'listint_types_categories' );

                        }
                    }


                // }            

            }
 
            // Close opened CSV file
            fclose($csvFile);
 
            echo "Success";
         
    }
    else
    {
        echo "Error1";
    }
}else{
  echo "Error2";  
}
