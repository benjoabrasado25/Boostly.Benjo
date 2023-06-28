<?php
/**
 * Template Name: Search Results
 */

    get_header();

    // get a list of available taxonomies for a post type
    $taxonomies = get_taxonomies(['object_type' => ['listing']]);

    $taxonomyTerms = [];

    // loop over your taxonomies
    foreach ($taxonomies as $taxonomy)
    {
      // retrieve all available terms, including those not yet used
      $terms    = get_terms(['taxonomy' => $taxonomy, 'hide_empty' => false]);

      // make sure $terms is an array, as it can be an int (count) or a WP_Error
      $hasTerms = is_array($terms) && $terms;

      if($hasTerms)
      {
        $taxonomyTerms[$taxonomy] = $terms;        
      }
    }

    $city_categories = $taxonomyTerms["city_categories"];
    $amenities_categories = $taxonomyTerms["amenities_categories"];

?>


<div class="main-container search-container">
    <div class="row flex gap-10">
        <div>
            <select id="city">
                <option value="">Select an item</option>
                <?php 
                foreach ($city_categories as $taxonomy){
                    ?>
                        <option><?php echo $taxonomy->name; ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div>
            <input type="text" name="" id="guests" placeholder="Guests">
        </div>
        <div>
            <input type="text" name="" id="no_of_rooms" placeholder="No of rooms">
        </div>
        <div>
            <!-- <input type="text" name="" id="amenities" placeholder="Amenities"> -->
        </div>
<!--         <div>
            <button id="filterAmenities">Filter</button>
        </div> -->
        <div>
            <button id="searchListing"> <i class="fa fa-search" style="font-size: 12px;"></i> Search</button>
        </div>
    </div>
</div>
<div class="row flex gap-10" id="amenetyList">
    <?php 
    foreach ($amenities_categories as $taxonomy){
        ?>
            <div>
                <label><?php echo $taxonomy->name; ?></label>
                <input type="checkbox" name="listing_checkbox" value="<?php echo $taxonomy->name; ?>">
            </div>
        <?php
    }
    ?>    
</div>
    <div id="main_container"></div>

<?php get_footer(); ?>