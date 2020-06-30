<?php
/**
 * Sargam functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Sargam
 */

 //redux framework
require_once get_template_directory().'/lib/ReduxCore/framework.php';
require_once get_template_directory().'/lib/sample/config.php';
require_once get_template_directory().'/lib/ReduxCore/inc/extensions/redux-vendor-support-master/redux-vendor-support.php';

if ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/CMB2/init.php';
}
require_once get_template_directory().'/CMB2/cmb2-conditionals/cmb2-conditionals.php';
require_once get_template_directory().'/CMB2/cmb2-conditionals/sargamConditional-functions.php';

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'sargam_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function sargam_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Sargam, use a find and replace
		 * to change 'sargam' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'sargam', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'sargam' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'sargam_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'sargam_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function sargam_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'sargam_content_width', 640 );
}
add_action( 'after_setup_theme', 'sargam_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function sargam_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'sargam' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'sargam' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'sargam_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function sargam_scripts() {
	wp_enqueue_style( 'sargam-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'sargam-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.1.3', 'all');
	wp_enqueue_style( 'owl.carousel.min', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.2.1', 'all');
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), 'all');
	wp_enqueue_style( 'slicknav', get_template_directory_uri() . '/assets/css/slicknav.css', array(),'1.0.10', 'all');
	wp_enqueue_style( 'animate.min', get_template_directory_uri() . '/assets/css/animate.min.css', array(),'3.6.0', 'all');
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), 'all');
	wp_enqueue_style( 'fontawesome-all.min', get_template_directory_uri() . '/assets/css/fontawesome-all.min.css', array(),'5.0.6', 'all');
	wp_enqueue_style( 'themify-icons', get_template_directory_uri() . '/assets/css/themify-icons.css', array(), 'all');
	wp_enqueue_style( 'nice-select', get_template_directory_uri() . '/assets/css/nice-select.css', array(), 'all');
	wp_enqueue_style( 'slick', get_template_directory_uri() . '/assets/css/slick.css', array(), 'all');
	wp_enqueue_style( 'custom', get_template_directory_uri() . '/assets/css/custom.css', 'all');
	wp_enqueue_style( 'responsive', get_template_directory_uri() . '/assets/css/responsive.css', 'all');
	wp_enqueue_style( 'reset', 'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css');
	wp_enqueue_style( 'slick.min', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css');
	wp_enqueue_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css');
	wp_enqueue_style( 'google-font', 'https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap');



	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/vendor/modernizr-3.5.0.min.js', array(), 3.5, true);
	wp_enqueue_script( 'jquery-1', get_template_directory_uri() . '/assets/js/vendor/jquery-1.12.4.min.js', array(), 1.12, true);
	wp_enqueue_script( 'jquery-3', 'https://code.jquery.com/jquery-3.5.1.min.js', array(), 3.5, true);
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(),  4.0, true);
	wp_enqueue_script( 'popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'slicknav', get_template_directory_uri() . '/assets/js/jquery.slicknav.min.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js',array(),1.5, true);
	wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array(),  _S_VERSION, true);
	//wp_enqueue_script( 'slick', get_template_directory_uri() . '/assets/js/slick.min.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'gijgo', get_template_directory_uri() . '/assets/js/gijgo.min.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'animated.headline', get_template_directory_uri() . '/assets/js/animated.headline.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/jquery.magnific-popup.js', array('jquery'),  _S_VERSION, true);
	wp_enqueue_script( 'jquery.scrollUp', get_template_directory_uri() . '/assets/js/jquery.scrollUp.min.js', array('jquery'),  _S_VERSION, true);
	wp_enqueue_script( 'jquery.nice-select', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'),  _S_VERSION, true);
	wp_enqueue_script( 'jquery.sticky', get_template_directory_uri() . '/assets/js/jquery.nice-select.min.js', array('jquery'),  _S_VERSION, true);
	wp_enqueue_script( 'contact', get_template_directory_uri() . '/assets/js/contact.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'jquery.form', get_template_directory_uri() . '/assets/js/jquery.form.js', array('jquery'),  _S_VERSION, true);
	wp_enqueue_script( 'jquery.validate.min', get_template_directory_uri() . '/assets/js/jquery.validate.min.js', array('jquery'),  _S_VERSION, true);
	wp_enqueue_script( 'jmail-script', get_template_directory_uri() . '/assets/js/mail-script.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'jquery.ajaxchimp.min', get_template_directory_uri() . '/assets/js/jquery.ajaxchimp.min.js', array('jquery'),  _S_VERSION, true);
	wp_enqueue_script( 'plugins', get_template_directory_uri() . '/assets/js/plugins.js', array(),  _S_VERSION, true);
	wp_enqueue_script( 'main.js', get_template_directory_uri() . '/assets/js/main.js', array(),  _S_VERSION, true);




	wp_enqueue_script( 'sargam-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'cmb2-conditionals', get_template_directory_uri() . '/js/cmb2-conditionals.js', array(), _S_VERSION, true );


	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'sargam_scripts' );



/**
* =============Custom post type=================
*/
//sargam products
add_action('init','sargam_products');
function sargam_products(){
	register_post_type('sargam_product_items',array(
		'labels'						=>array(
		'name'							=>__('Sargam Products'),
		'singular_name'			=>__('Sargam Product'),
		'menu_name'					=>__('Sargam Product Gallery'),
		'name_admin_bar'		=>__('Add Sargam Product'),
		'all_items'					=>__('All Sargam Products'),
		'add_new'						=>__('Add Sargam Product'),
		'add_new_item'			=>__('Add Sargam Product'),
		'edit_item'					=>__('Edit Product'),
		'new_item'					=>__('New Product'),
		'view_item'					=>__('View Product'),
		'search_items'			=>__('search Product')

	),
	'public'						=>true,
	'has_archive'				=>true,
	'rewrite'						=> array('slug'=>'single-product-item'),
	'menu_position'			=>8,
	'menu_icon'					=> 'dashicons-products',
	'supports'					=> array('title','thumbnail','editor')
)
);
}

//sargam store location

// function sargam_store_locations(){
// 	register_post_type('sargam_store_location',array(
// 		'labels'						=>array(
// 		'name'							=>__('Sargam Store Location'),
// 		'singular_name'			=>__('Sargam Location'),
// 		'menu_name'					=>__('Sargam Store Location'),
// 		'name_admin_bar'		=>__('Add Sargam Store Location'),
// 		'all_items'					=>__('All Sargam Store Locations'),
// 		'add_new'						=>__('Add Sargam Store Location'),
// 		'add_new_item'			=>__('Add Sargam Store Location'),
// 		'edit_item'					=>__('Edit Store Location'),
// 		'new_item'					=>__('New Store Location'),
// 		'view_item'					=>__('View Store Location'),
// 		'search_items'			=>__('search Store Location')
//
// 	),
// 	'public'						=>true,
// 	'has_archive'				=>true,
// 	'rewrite'						=> array('slug'=>'single-store-locations'),
// 	'menu_position'			=>7,
// 	'menu_icon'					=> 'dashicons dashicons-location',
// 	'supports'					=> array('title','editor')
// )
// );
// }
// add_action('init','sargam_store_locations');

// Our custom post type function
function sargam_store_locations() {

    register_post_type( 'store-location',
        array(
            'labels' => array(
                'name' => __( 'Sargam Store Location' ),
                'singular_name' => __( 'Sargam Store Location' ),
								'menu_name'					=>__('Sargam Store Location'),
								'name_admin_bar'		=>__('Add Sargam Store Location'),
								'all_items'					=>__('All Sargam Store Locations'),
								'add_new'						=>__('Add Sargam Store Location'),
								'add_new_item'			=>__('Add Sargam Store Location'),
								'edit_item'					=>__('Edit Store Location'),
								'new_item'					=>__('New Store Location'),
								'view_item'					=>__('View Store Location'),
								'search_items'			=>__('search Store Location')
            ),
						'public'						=>true,
						'has_archive'				=>true,
						'rewrite'						=> array('slug'=>'single-store-locations'),
						'menu_position'			=>7,
						'menu_icon'					=> 'dashicons-location',
						'supports'					=> array('title','editor')

        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'sargam_store_locations' );
/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
