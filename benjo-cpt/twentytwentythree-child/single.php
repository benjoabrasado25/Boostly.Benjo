<?php
	$id = get_the_ID();
	get_header();

	$gallery_images = explode(",", get_post_meta($id, 'p_gallery', true) );

	?>


	<div class="row gallery_con">
		<div class="featured-containter">
			<img class="featured-img" src="<?php echo get_the_post_thumbnail_url($id);?>">	
		</div>
		<!-- owl carousel -->
		<div class="owl-carousel owl-theme">
			<?php 

				foreach($gallery_images as $img_gal) {

			?>
		    	<div class="item">
		    		<img src="<?php echo $img_gal?>">
		    	</div>
			<?php 

				}
			?>
		</div>	



	</div>

	<div class="main-container">
		<div class="con-70 item-row-con">
			<div class="title-con">
				<h2>Description</h2>
			</div>
			<p><?php echo get_the_content();?></p>
			<hr>
			<div class="title-con">			
				<h3>Property features</h3>
			</div>
			<p>
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at lectus sodales, euismod mauris id, luctus ipsum. Praesent turpis metus, pellentesque in arcu eget, accumsan tempor sapien. Suspendisse tristique metus libero, vel mattis ipsum cursus sit amet. Phasellus scelerisque convallis leo, at elementum libero lobortis at.
			</p>
			<div class="row"><h5>Property Details</h5></div>
			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Size:</span>
						</div>
						<div class="con-30">
							<span>290m</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Furnishing:</span>
						</div>
						<div class="con-30">
							<span>Furnished</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Bedrooms:</span>
						</div>
						<div class="con-30">
							<span><?php echo get_post_meta($id, 'no_of_beds', true)?></span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Ceiling Height:</span>
						</div>
						<div class="con-30">
							<span>3m</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Bathrooms:</span>
						</div>
						<div class="con-30">
							<span><?php echo get_post_meta($id, 'no_of_baths', true)?></span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Construction Height:</span>
						</div>
						<div class="con-30">
							<span>3m</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Floor:</span>
						</div>
						<div class="con-30">
							<span>Ground</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Renovation:</span>
						</div>
						<div class="con-30">
							<span>2017</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Addtional space:</span>
						</div>
						<div class="con-30">
							<span>Attic</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->




			<div class="row"><h5>Property Utility</h5></div>
			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Size:</span>
						</div>
						<div class="con-30">
							<span>290m</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Furnishing:</span>
						</div>
						<div class="con-30">
							<span>Furnished</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Bedrooms:</span>
						</div>
						<div class="con-30">
							<span>4</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Ceiling Height:</span>
						</div>
						<div class="con-30">
							<span>3m</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Bathrooms:</span>
						</div>
						<div class="con-30">
							<span>3</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Construction Height:</span>
						</div>
						<div class="con-30">
							<span>3m</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Floor:</span>
						</div>
						<div class="con-30">
							<span>Ground</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Renovation:</span>
						</div>
						<div class="con-30">
							<span>2017</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Addtional space:</span>
						</div>
						<div class="con-30">
							<span>Attic</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->




			<div class="row title-con">
				<h5>Property features</h5>
			</div>
			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Size:</span>
						</div>
						<div class="con-30">
							<span>290m</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Furnishing:</span>
						</div>
						<div class="con-30">
							<span>Furnished</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Bedrooms:</span>
						</div>
						<div class="con-30">
							<span>4</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Ceiling Height:</span>
						</div>
						<div class="con-30">
							<span>3m</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Bathrooms:</span>
						</div>
						<div class="con-30">
							<span>3</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Construction Height:</span>
						</div>
						<div class="con-30">
							<span>3m</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Floor:</span>
						</div>
						<div class="con-30">
							<span>Ground</span>
						</div>
					</div>
				</div>
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Renovation:</span>
						</div>
						<div class="con-30">
							<span>2017</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->


			<!-- item column -->
			<div class="row">
				<div class="con-50">
					<div class="row item-details-row">
						<div class="con-70">
							<i class="fa-solid fa-bed fa"></i>
							<span>Addtional space:</span>
						</div>
						<div class="con-30">
							<span>Attic</span>
						</div>
					</div>
				</div>
			</div>
			<!-- item column -->




		</div>
		<div class="con-30">
			<div class="row form-container">
				<div class="row">
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at lectus sodales</p>
				</div>
				<form>
					<div class="row">
						<input type="text" class="frm-item" name="" placeholder="Your name*">
					</div>
					<div class="row">
						<input type="text" class="frm-item" name="" placeholder="Your email*">
					</div>
					<div class="row">
						<input type="text" class="frm-item" name="" placeholder="Your phone*">
					</div>
					<div class="row">
						<textarea class="frm-item" placeholder="Message"></textarea>
					</div>
					<div class="row">
						<input type="submit" name="" class="btn-primary" value="Make Inquiry">
					</div>
				</form>
			</div>
		</div>
	</div>




<?php get_footer(); ?>