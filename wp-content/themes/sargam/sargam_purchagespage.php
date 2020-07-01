<?php
/**
 * Template Name: Sargam Make Purchage
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Sargam
 */
global $sargam_theme;
get_header();
?>

<main>
		<!-- slider Area Start-->
		<div class="slider-area ">
				<!-- Mobile Menu -->
				<div class="single-slider slider-height2  hero-overly d-flex align-items-center" data-background="<?php echo $sargam_theme['banner-purchase-page']['url'];//echo get_theme_file_uri( '/assets/img/hero/purchage_hero.jpg');?>">
						<div class="container">
								<div class="row">
										<div class="col-xl-12">
												<div class="hero-cap text-center">
														<h2><?php echo $sargam_theme['banner-title-purchase-page'];?></h2>
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
						<img src="<?php echo $sargam_theme['store-heading-top-image']['url'];?>" alt="">
						<h2><?php echo $sargam_theme['online-store-title'];?></h2>
						<p class="text-center"><span class="text-bold">
							<?php echo $sargam_theme['opt-online-store-desc'];?>
						</p>
						<hr>
					</div>
					<div class="col-lg-12 online-store-logo">
							<?php
							 $storeSlider = $sargam_theme['online-store-slider'];
							 foreach ($storeSlider as $store) {?>
								 <div class="f-left mb-100 single-store">
 									<a href="<?php echo $store['url'];?>"  target="_blank">
 										<img src="<?php echo $store['image'];?>">
 									</a>
 								</div>
							<?php
								}
							 ?>
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
<div id="retail_shop" class="retail_wrapper Our-story-area story-padding">
	<div class="container">
		<div class="row">
				<!-- section tittle -->
				<div class="col-lg-12">
					<div class="purchase-tittle text-center">
						<img src="<?php echo $sargam_theme['retail-heading-top-image']['url'];?>" alt="">
						<h2><?php echo $sargam_theme['retail-shops-title'];?></h2>
					</div>
				</div>

				<div class="col-lg-12">
					<p class="text-center">
						<?php echo $sargam_theme['opt-retail-shops-desc'];?>
					</p>
					<hr>
				</div>

				<div class="col-lg-12">
					<div class="retail-location">
						<p class="text-bold"><?php echo $sargam_theme['retail-locDropdown-lable'];?></p>
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
												<img src="<?php echo $sargam_theme['partners-heading-top-image']['url'];?>" alt="">
												<h2><?php echo $sargam_theme['partners-title'];?></h2>
													<p><?php echo $sargam_theme['opt-partners-before-desc'];?></p>
											<hr>
										</div>
								</div>
						</div>
	<div class="slider slider-nav">
		<?php
		 $partnerSlider = $sargam_theme['partners-slider'];
		 foreach ($partnerSlider as $partner) {?>
			 <div class="single-brand">
 				<a href="<?php echo $partner['url'];?>" target="_blank">
 						<img src="<?php echo $partner['image'];?>" alt="">
 				</a>
 			</div>
		<?php
			}
		 ?>

	</div>
		<div class="row">
			<div class="col-lg-12">
				<p class="text-center">
					<?php echo $sargam_theme['opt-partners-after-desc'];?>
				</p>
			</div>
		</div>

				</div>
		</div>

</main>

<?php
//get_sidebar();
get_footer();
