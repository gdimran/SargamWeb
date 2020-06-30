<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Sargam
 */
 global $sargam_theme;
get_header();
?>

<main>
		<!-- Slider Area Start-->
		<div class="slider-area ">
				<div class="slider-active">
					<?php
								$slider=$sargam_theme['home-slider'];
								foreach ($slider as $sliders) {
						?>
						<div class="single-slider slider-height hero-overly d-flex align-items-center" data-background="<?php  echo $sliders['image']; /*echo get_theme_file_uri( '/assets/img/hero/hereo-3.jpg' );*/?>">
								<div class="container">
										<div class="row d-flex align-items-center">
												<div class="col-lg-7 col-md-9 ">
														<div class="hero__caption text-center d-flex align-items-center caption-bg" data-background="<?php  echo $sliders['url']; /*echo get_theme_file_uri( '/assets/img/hero/hereo-3.jpg' );*/?>">
															 <div class="circle-caption">
																		<h1  data-animation="fadeInUp" data-delay=".5s"><?php echo $sliders['title']; ?></h1>
																		<p  data-animation="fadeInUp" data-delay=".9s"><?php echo $sliders['subtitle']; ?></p>
															 </div>
														</div>
												</div>
										</div>
								</div>
						</div>
							<?php
						}

							 ?>
				</div>
		</div>
		<!-- Slider Area End-->
		<?php

		//
		// if (isset($sargam_theme['opt-slides']) && !empty($sargam_theme['home-slider'])) {
		//     echo 'Slide 1 Title: '         . $sargam_theme['home-slider'][0]['title'];
		//     echo 'Slide 1 Description: '   . $sargam_theme['home-slider'][0]['description'];
		//     echo 'Slide 1 URL: '           . $sargam_theme['home-slider'][0]['url'];
		//     echo 'Slide 1 Attachment ID: ' . $sargam_theme['home-slider'][0]['attachment_id'];
		//     echo 'Slide 1 Thumb: '         . $sargam_theme['home-slider'][0]['thumb'];
		//     echo 'Slide 1 Image: '         . $sargam_theme['home-slider'][0]['image'];
		//     echo 'Slide 1 Width: '         . $sargam_theme['home-slider'][0]['width'];
		//     echo 'Slide 1 Height: '        .$sargam_theme['home-slider'][0]['height'];
		// }

		 ?>
<!-- Our Story Start -->
		<div id="about_sargam" class="Our-story-area story-padding">
				<div class="container">
						<div class="row">

			<div class="col-lg-12">
				<div class="story-caption text-center">
												<img src="<?php echo get_theme_file_uri( '/assets/img/our_story/flower_right.png' );?>" alt="">
												<h3><?php echo$sargam_theme['about-title-text']; ?></h3>
												<p class="story1"> <?php echo$sargam_theme['opt-about-text']; ?> </p>

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
		<!-- Our Story Ende -->



</main>

<?php
//get_sidebar();
get_footer();
