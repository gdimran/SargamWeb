<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Sargam
 */
 global $sargam_theme;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Preloader Start -->
<div id="preloader-active">
		<div class="preloader d-flex align-items-center justify-content-center">
				<div class="preloader-inner position-relative">
						<div class="preloader-circle"></div>
						<div class="preloader-img pere-text">
								<img src="<?php echo get_theme_file_uri( '/assets/img/logo/sargam_logo.png' );?>" alt="Sargam">
						</div>
				</div>
		</div>
</div>
<!-- Preloader Start -->

    <header>
        <!-- Header Start -->
       <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-2 col-md-2">
                            <div class="logo">
																<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
																		<img src="<?php echo $sargam_theme['header-logo']['url'];?>" alt="<?php bloginfo( 'name' ); ?>">
																</a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-left d-none d-lg-block">
															<?php
																			wp_nav_menu(
																					array(
																							'theme_location' => 'menu-1',
																							'menu_id'        => 'navigation',
																					)
																				);
																?>
                            </div>
												<div class="f-right ttmc_logo">
													<a href="<?php echo $sargam_theme['header-logo-url'];?>"><img src="<?php echo $sargam_theme['header-logo-right']['url'];?>"></a>
												</div>
                        </div>
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
       </div>
        <!-- Header End -->
    </header>
