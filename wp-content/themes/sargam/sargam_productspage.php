<?php
/**
 * Template Name: Sargam Products
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
				<div class="single-slider slider-height2  hero-overly d-flex align-items-center" data-background="<?php echo $sargam_theme['banner-product-page']['url']; /*echo get_theme_file_uri( '/assets/img/hero/product_hero.jpg');*/?>">
						<div class="container">
								<div class="row">
										<div class="col-xl-12">
												<div class="hero-cap text-center">
														<h2><?php echo $sargam_theme['banner-title-product-page']; ?></h2>
												</div>
										</div>
								</div>
						</div>
				</div>
		</div>
		<!-- slider Area End-->

		<!-- Our Story Start -->
		<div class="Our-story-area story-padding">
				<div class="container">
						<div class="row">
							<?php
							$prefix = '_sargam_conditionals_product_';
							global $post;

							$args = array(  'order' => 'ASC','post_type' => 'sargam_product_items');
							$the_query = new WP_Query( $args );

							?>

							<?php if ( $the_query->have_posts() ) { ?>
							<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<?php $prductImg = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );?>
								<div class="col-lg-6 single-product <?php if ( get_post_meta( get_the_ID(), 'for_border_checkbox', 1 ) ){echo 'border_right';} ?> ">
									<?php $select_value = get_post_meta( get_the_ID(), 'wiki_test_select', true );

											// If (Option 2 True)
											if ( 'f-left' === $select_value ) { ?>
												<div class="product-img f-left">
													 <img src="	<?php echo $prductImg[0]; ?>" class="story-imges" alt="">
												</div>
												<div class="product-desc f-right">
													<div class="product-caption">
														<img src="<?php echo get_post_meta( get_the_ID(),'product_title_image', true );?>" alt="">
														<h4><?php the_title(); ?></h4>
														<p class="story1"><?php the_content();?> </p>
													</div>
												</div>

												 <?php
											} else { ?>
												<div class="product-desc f-right">
													<div class="product-caption">
														<img src="<?php echo get_post_meta( get_the_ID(), 'product_title_image', true );?>" alt="">
														<h4><?php the_title(); ?></h4>
														<p class="story1"><?php the_content();?> </p>
													</div>
												</div>
												<div class="product-img f-left">
													 <img src="	<?php echo $prductImg[0]; ?>" class="story-imges" alt="">
												</div>
										<?php	} ?>
								</div>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						<?php }else{?>
							<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
							<?php } ?>




			<div class="col-lg-12">
				<div class="col-lg-6 f-left">
					<div class="product-img">
						<img src="<?php echo $sargam_theme['extra-product-image1']['url'] ;?>">
					</div>
				</div>
				<div class="col-lg-6 f-right">
					<div class="product-img">
						<img src="<?php echo $sargam_theme['extra-product-image2']['url']; ?>">
					</div>

				</div>
			</div>

						</div>
				</div>
				<!-- shape -->
				<div class="shape-flower d-none d-xl-block">
					<img src="<?php echo get_theme_file_uri( '/assets/img/our_story/shape_left.png' );?>" class="flower1" alt="">
					<img src="<?php echo get_theme_file_uri( '/assets/img/our_story/shape_right.png' );?>" class="flower2 " alt="">
				</div>
		</div>
</main>

<?php
//get_sidebar();
get_footer();
