<?php 
	$parse_uri = explode( 'wp-content', $_SERVER['SCRIPT_FILENAME'] );
	require_once( $parse_uri[0] . 'wp-load.php' );
	
	if ( ! function_exists( 'post_exists' ) ) {
	    require_once( ABSPATH . 'wp-admin/includes/post.php' );
	}

?>

<?php
$args = array(
    'post_type' => 'listing',
    'posts_per_page' => 10
);

$the_query = new WP_Query( $args ); ?>


<?php if ( $the_query->have_posts() ) : ?>

    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 

    	$city_count = 0;
    	$amenities_count = 0;
    	$guest_count = 0;
    	$no_of_rooms_count = 0;

    	?>
	        <?php 
				$city_terms = get_the_terms( $post, 'city_categories' );

				foreach($city_terms as $term){

		    		if($_POST['city'] AND str_contains(strtolower($term->name), strtolower($_POST['city']))){
		    			$city_count+=1;
		    		}

		    		if(!$_POST['city']){
		    			$city_count+=1;
		    		}
				}
	        ?>

	        <?php 

	    		if(!$_POST['guests']){
	    			$guest_count+=1;
	    		}
	    		if($_POST['guests']){
	    			$guests =$_POST['guests'];
	    			$guests = (int) $guests;
	    			if($guests <= get_post_meta(get_the_ID(), 'guests', true)){
	    				$guest_count+=1;
	    			}
	    		}

	    		if(!$_POST['num_of_rooms']){
	    			$no_of_rooms_count+=1;
	    		}	    

	    		if($_POST['num_of_rooms']){
	    			$num_of_rooms = $_POST['num_of_rooms'];
	    			$num_of_rooms = (int) $num_of_rooms;
	    			if($num_of_rooms >= get_post_meta(get_the_ID(), 'no_of_rooms', true)){
	    				$no_of_rooms_count+=1;
	    			}
	    		}


	        ?>

	        <?php 
	        	if($_POST['amenities']){
	        		if(is_object_in_term(get_the_ID(), 'amenities_categories', $_POST['amenities'])){
	        			$amenities_count+=1;
	        		}
	        	}
	        	if(!$_POST['amenities']){
	        		$amenities_count+=1;
	        	}

	        ?>

	    <?php if($city_count > 0 AND $amenities_count > 0 AND $no_of_rooms_count > 0 AND $guest_count > 0){ ?>
	        <div class="search-single-item">
	        	<img class="featured-img search-result-img" src="<?php echo get_the_post_thumbnail_url($id);?>">
		        <h4 style="font-size: 20px; clear: both; display: inline-block;overflow: hidden;white-space: nowrap;"><?php the_title(); ?></h4>
		        <div class="row">
		        	<i class="fa-solid fa-bed fa"></i>
		        	<span style="text-indent: 5px;"><?php echo get_post_meta(get_the_ID(), 'no_of_rooms', true)?></span>
		        </div>
		        <div class="row">
		        	<i class="fa-solid fa-bed fa"></i> <span style="text-indent: 5px;"><?php echo get_post_meta(get_the_ID(), 'guests', true)?></span>
		        </div>
		        <div class="row">
		        	<span><?php echo get_post_meta(get_the_ID(), 'currency', true)?></span>
		        	<span><?php echo get_post_meta(get_the_ID(), 'price', true)?></span>
		        	<span>/Per Night</span>
		        </div>
	        </div>
        <?php }?>
    <?php endwhile; ?>


<?php endif; ?>