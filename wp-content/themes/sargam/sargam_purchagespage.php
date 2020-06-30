<?php
/**
 * Template Name: Sargam Make Purchage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sargam
 */

get_header();
?>

<main>
		<!-- slider Area Start-->
		<div class="slider-area ">
				<!-- Mobile Menu -->
				<div class="single-slider slider-height2  hero-overly d-flex align-items-center" data-background="<?php echo get_theme_file_uri( '/assets/img/hero/purchage_hero.jpg');?>">
						<div class="container">
								<div class="row">
										<div class="col-xl-12">
												<div class="hero-cap text-center">
														<h2>Make a Purchase</h2>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- slider Area End-->

		<!-- Our Story Start -->
		<div class="purchage-area Our-story-area story-padding">
				<div class="container">
		<div class="purchage-wrapper">
							<div class="row">
				<!-- section tittle -->
				<div class="col-lg-12">
					<div class="purchase-tittle text-center">
						<img src="<?php echo get_theme_file_uri( '/assets/img/memories/section_tittle_flowre.png');?>" alt="">
						<h2>Online Store</h2>
						<p class="text-center"><span class="text-bold">Sargam</span> products can be purchased through online retailers from their websites. Currently Sargam partners with <a href="https://deligram.com"  target="_blank">Deligram </a>and <a href="https://www.ghorebazar.com"  target="_blank">Ghore Bazar</a> to ensure our products get to you right at your doorstep. Visit their platforms to order Sargam products today!

						</p>
						<hr>
					</div>
						<div class="col-lg-6 f-left text-right mb-100">
							<a href="https://deligram.com"  target="_blank">
								<img src="<?php echo get_theme_file_uri( '/assets/img/service/deligram.jpg');?>">
							</a>
						</div>
						<div class="col-lg-6 f-right mb-100">
							<a href="https://www.ghorebazar.com"  target="_blank">
								<img src="<?php echo get_theme_file_uri( '/assets/img/service/gblogo.jpg');?>">
							</a>
						</div>

				</div>

				</div>
						</div>

				</div>
				<!-- shape -->
				<div class="shape-flower d-none d-xl-block">
						<img src="<?php echo get_theme_file_uri( '/assets/img/our_story/shape_left.png');?>" class="flower1" alt="">
						<img src="<?php echo get_theme_file_uri( '/assets/img/our_story/shape_right.png');?>" class="flower2 " alt="">
				</div>
		</div>
<div class="retail_wrapper Our-story-area story-padding">
	<div class="container">
		<div class="row">
				<!-- section tittle -->
				<div class="col-lg-12">
					<div class="purchase-tittle text-center">
						<img src="<?php echo get_theme_file_uri( '/assets/img/memories/section_tittle_flowre.png');?>" alt="">
						<h2>Our retail shops</h2>
					</div>
				</div>

				<div class="col-lg-12">
					<p class="text-center"><span class="text-bold">Sargam</span> products can be found in convenience stores and retail chains in Dhaka, Chottogram, and Sylhet. Find a retail store close to your location using the dropdown list below, so that you can find our products at your convenience.<br><br>

					We currently partner with Shwapno and Meena Bazar, providing them our products centrally, so that they can get them to you all across Bangladesh. Can’t find Sargam Paan Massalas and Mouth Fresheners at your local Shwapno and Meena Bazar store? Feel free to inform the store manager of your interest in our product so they can ensure their shelves are stocked with enough Sargam for your satisfaction.

					</p>
					<hr>
				</div>

				<div class="col-lg-12">
					<div class="retail-location">
						<p class="text-bold">Select your desire store location from the dropdown options:</p>
						<?php
						global $post;

						$args = array(  'order' => 'ASC','post_type' => 'store-location');
						$the_query = new WP_Query( $args );

						?>
						<select class="location_drop location">
						<?php if ( $the_query->have_posts() ) { ?>
						<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

								<!-- <option>Choose Your Location</option> -->
								<option value="<?php the_title(); ?>"><?php the_title(); ?></option>

						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php }else{?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php } ?>
						</select>
					</div>
				</div>


				<?php if ( $the_query->have_posts() ) { ?>
				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<div class="col-lg-12 <?php the_title(); ?> box location">
							<?php the_content();?>
						</div>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php }else{?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
				<?php } ?>

			</div>
	</div>
</div>
		<!-- Our Story Ende -->

<div class="brand-area section-padding2">
				<div class="container">
						 <!-- section tittle -->
						 <div class="row ">
								<div class="col-lg-12">
										<div class="purchase-tittle text-center">
												<img src="<?php echo get_theme_file_uri( '/assets/img/memories/section_tittle_flowre.png');?>" alt="">
												<h2>Our Partners</h2>
													<p>At Sargam we value our partners who have been crucial to helping us supply our unique Paan Massalas and Mouth Fresheners across Bangladesh to our cherished customers. They share in our success and make us stronger together. Check them below and find Sargam products through them!</p>
											<hr>
										</div>
								</div>
						</div>
	<div class="slider slider-nav">
			<div class="single-brand">
				<a href="https://www.shwapno.com/" target="_blank">
						<img src="<?php echo get_theme_file_uri( '/assets/img/service/shopno.jpg');?>" alt="">
				</a>
			</div>
			<div class="single-brand">
				<a href="https://www.lazzpharma.com/" target="_blank">
					<img src="<?php echo get_theme_file_uri( '/assets/img/service/lpz.jpg');?>" alt="">
				</a>
			</div>
			<div class="single-brand">
				<a href="https://agorasuperstores.com/" target="_blank">
					<img src="<?php echo get_theme_file_uri( '/assets/img/service/agora.jpg');?>" alt="">
				</a>
			</div>
			<div class="single-brand">
				<a href="https://deligram.com"  target="_blank">
					<img src="<?php echo get_theme_file_uri( '/assets/img/service/deligram.jpg');?>">
				</a>
			</div>
			<div class="single-brand">
				<a href="https://www.ghorebazar.com"  target="_blank">
					<img src="<?php echo get_theme_file_uri( '/assets/img/service/gblogo.jpg');?>">
				</a>
			</div>
			<div class="single-brand">
				<a href="https://meenaclick.com" target="_blank">
					<img src="<?php echo get_theme_file_uri( '/assets/img/service/menabazar.jpg');?>" alt="">
				</a>
			</div>
	</div>
		<div class="row">
			<div class="col-lg-12">
				<p class="text-center">If you’re a retailer or store owner who wants to partner with Sargam to sell our mouthwatering products, <a href="www.ttmcbd.com/contact-us/" target="_blank">get in touch with us</a>, we welcome all new opportunities!<br>

				We also provide special prices and packages for corporate clients purchasing products in bulk, and clients purchasing gift packages. Contact us to find out more!
				</p>
			</div>
		</div>

				</div>
		</div>

</main>

<?php
//get_sidebar();
get_footer();
