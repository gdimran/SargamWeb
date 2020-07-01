<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }


    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_demo";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'redux_demo/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();

    if ( is_dir( $sample_patterns_path ) ) {

        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();

            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {

                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Sargam Options', 'redux-framework-demo' ),
        'page_title'           => __( 'Sargam theme Options', 'redux-framework-demo' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons dashicons-palmtree',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'sargam_theme',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => 3,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => get_template_directory_uri().'/assets/img/logo/opt_sargam_logo.png',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'sargam_admin',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => false,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
    // $args['admin_bar_links'][] = array(
    //     'id'    => 'redux-docs',
    //     'href'  => 'http://docs.reduxframework.com/',
    //     'title' => __( 'Documentation', 'redux-framework-demo' ),
    // );

    // $args['admin_bar_links'][] = array(
    //     //'id'    => 'redux-support',
    //     'href'  => 'https://github.com/ReduxFramework/redux-framework/issues',
    //     'title' => __( 'Support', 'redux-framework-demo' ),
    // );
    //
    // $args['admin_bar_links'][] = array(
    //     'id'    => 'redux-extensions',
    //     'href'  => 'reduxframework.com/extensions',
    //     'title' => __( 'Extensions', 'redux-framework-demo' ),
    // );

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    // $args['share_icons'][] = array(
    //     'url'   => 'https://github.com/ReduxFramework/ReduxFramework',
    //     'title' => 'Visit us on GitHub',
    //     'icon'  => 'el el-github'
    //     //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'https://www.facebook.com/pages/Redux-Framework/243141545850368',
    //     'title' => 'Like us on Facebook',
    //     'icon'  => 'el el-facebook'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://twitter.com/reduxframework',
    //     'title' => 'Follow us on Twitter',
    //     'icon'  => 'el el-twitter'
    // );
    // $args['share_icons'][] = array(
    //     'url'   => 'http://www.linkedin.com/company/redux-framework',
    //     'title' => 'Find us on LinkedIn',
    //     'icon'  => 'el el-linkedin'
    // );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        // $args['intro_text'] = sprintf( __( '<p>Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: <strong>$%1$s</strong></p>', 'redux-framework-demo' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'redux-framework-demo' );
    }

    // Add content after the form.
    $args['footer_text'] = __( '<p>This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.</p>', 'redux-framework-demo' );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'redux-framework-demo' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'redux-framework-demo' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'redux-framework-demo' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    /*
     *
     * ---> START SECTIONS
     *
     */

    /*

        As of Redux 3.5+, there is an extensive API. This API can be used in a mix/match mode allowing for


     */

    // -> START Basic Fields
      //header section start==============
      Redux::setSection($opt_name, array(
            'title'         =>__('Header','sargam-theme-options'),
            'id'            =>  'header',
            'desc'          => __('This is header section area.','sargam-theme-options'),
            'icon'          =>  'el el-list'
       ));
       //head subsection
       Redux::setSection($opt_name,array(
            'title'         =>__('Logo','sargam-theme-options'),
            'id'            =>  'opt-header-logo',
            'subsection'    => true,
            'desc'          => __('This is logo area.','sargam-theme-options'),
            'icon'          =>  'el el-leaf',
            'fields'        => array(
                array(
                'id'        => 'header-logo',
                'type'      => 'media',
                'title'     =>__('Enter your logo here','sargam-theme-options'),
                'subtitle'  =>__('You can upload logo in jpg,png format.'),
                'desc'      => __('File should be jpg or png','sargam-theme-options'),
                'compiler'  => true,
                'default'   => array('url' => get_stylesheet_directory_uri() . '/assets/img/logo/sargam_logo.png')
                ),
            )
       ));
       Redux::setSection($opt_name,array(
            'title'         =>__('Favicon','sargam-theme-options'),
            'id'            =>  'opt-favicon',
            'subsection'    => true,
            'desc'          => __('This is favicon area.','sargam-theme-options'),
            'icon'          =>  'el el-star-alt',
            'fields'        => array(
                array(
                'id'        => 'favicon-logo',
                'type'      => 'media',
                'title'     =>__('Enter your favicon here','sargam-theme-options'),
                'subtitle'  =>__('You can upload logo in jpg,png format.'),
                'desc'      => __('File should be jpg or png and maximum size 72px X 72px','sargam-theme-options'),
                ),
            )
       ));
       Redux::setSection($opt_name,array(
            'title'         =>__('Logo Right','sargam-theme-options'),
            'id'            =>  'opt-header-logo-right',
            'subsection'    => true,
            'desc'          => __('This is Right headr logo area.','sargam-theme-options'),
            'icon'          =>  'el el-leaf',
            'fields'        => array(
                array(
                'id'        => 'header-logo-right',
                'type'      => 'media',
                'title'     =>__('Enter your logo for right section here','sargam-theme-options'),
                'subtitle'  =>__('You can upload logo in jpg,png format.'),
                'desc'      => __('File should be jpg or png','sargam-theme-options'),
                'compiler'  => true,
                'default'   => array('url' => get_stylesheet_directory_uri() . '/assets/img/logo/ttmc_logo.png')
                ),
                array(
                'id'        => 'header-logo-url',
                'type'      => 'text',
                'title'     =>__('Enter your logo Link to redirect.','sargam-theme-options'),
                'subtitle'  =>__('Please insert the website url/links here.'),
                'desc'      => __('www.example.com','sargam-theme-options'),
                'default'   => 'https://www.ttmc.com'
                ),
            )
       ));
//===============Footer section start==================
Redux::setSection($opt_name, array(
      'title'         =>__('Footer','sargam-theme-options'),
      'id'            =>  'footer',
      'desc'          => __('This is footer section area.','sargam-theme-options'),
      'icon'          =>  'el el-minus'
 ));
 Redux::setSection($opt_name,array(
      'title'         =>__('Footer Logo','sargam-theme-options'),
      'id'            =>  'opt-footer-logo',
      'subsection'    => true,
      'desc'          => __('This is logo area.','sargam-theme-options'),
      'icon'          =>  'el el-leaf',
      'fields'        => array(
          array(
          'id'        => 'footer-logo',
          'type'      => 'media',
          'title'     =>__('Enter your logo here','sargam-theme-options'),
          'subtitle'  =>__('You can upload logo in jpg,png format.'),
          'desc'      => __('File should be jpg or png','sargam-theme-options'),
          'compiler'  => true,
          'default'   => array('url' => get_stylesheet_directory_uri() . '/assets/img/logo/sargam_logo.png')
          )
      )
 ));
 Redux::setSection($opt_name,array(
      'title'         =>__('Footer Text','sargam-theme-options'),
      'id'            =>  'opt-footer-text',
      'subsection'    => true,
      'desc'          => __('This is logo area.','sargam-theme-options'),
      'icon'          =>  'el el-font',
      'fields'        => array(
          array(
          'id'        => 'footer-text',
          'type'      => 'text',
          'title'     =>__('Enter your text for footer here','sargam-theme-options'),
          'desc'      => __('Please write the text for footer','sargam-theme-options'),
          ),
          array(
          'id'        => 'footer-contact-text',
          'type'      => 'text',
          'title'     =>__('Enter Page name.','sargam-theme-options'),
          'subtitle'  =>__('Please insert the website page name here.'),
          'desc'      => __('Contact Us','sargam-theme-options')
          ),
          array(
          'id'        => 'footer-contact-url',
          'type'      => 'text',
          'title'     =>__('Enter your page Link to redirect.','sargam-theme-options'),
          'subtitle'  =>__('Please insert the page link for the page you mentioned above.'),
          'desc'      => __('www.example.com','sargam-theme-options')
          )
      )
 ));


//====================home page section start==============================================================

Redux::setSection( $opt_name, array(
    'title'            => __( 'Home page options', 'sargam-theme-options' ),
    'id'               => 'home',
    'desc'             => __( 'These are home page options!', 'sargam-theme-options' ),
    'icon'             => 'el el-home'
) );
Redux::setSection($opt_name,array(
     'title'         =>__('Slider/Banner','sargam-theme-options'),
     'id'            =>  'opt-slider-option',
     'subsection'    => true,
     'desc'          => __('This is home page banner section.','sargam-theme-options'),
     'fields'        => array(
         array(
         'id'        => 'home-slider',
         'type'      => 'slides',
         'title'     =>__('Home Slider content','sargam-theme-options'),
         'desc'      => __('Please insert the content','sargam-theme-options'),
         )
     )
));
Redux::setSection($opt_name,array(
     'title'         =>__('About Us','sargam-theme-options'),
     'id'            =>  'opt-aboutUs-option',
     'subsection'    => true,
     'desc'          => __('This is home page About Us section.','sargam-theme-options'),
     'fields'        => array(
       array(
       'id'        => 'about-title-text',
       'type'      => 'text',
       'title'     =>__('Enter your section title here','sargam-theme-options'),
       ),
      array(
        'id'         => 'opt-about-text',
        'type'       => 'editor',
        'title'      => __( 'About us description text here:', 'sargam-theme-options' ),
        'full_width' => true,
        'args'       => array(
        'wpautop'    => false,
      'media_buttons' => false,
      'textarea_rows' => 5,
      //'tabindex' => 1,
      //'editor_css' => '',
      'teeny'         => false,
      //'tinymce' => array(),
      'quicktags'     => false,
        )
      ),
      array(
          'id'       => 'opt-about-background',
          'type'     => 'background',
          'output'   => array( '#about_sargam' ),
          'title'    => __( 'About us Section Background', 'sargam-theme-options' ),
          'subtitle' => __( 'About us Section Background with image, color, etc.', 'sargam-theme-options' ),
          'default'   => '#ffe600'
      ),
     )
));

//============================Sargam products======================
Redux::setSection( $opt_name, array(
    'title'            => __( 'Sargam products page options', 'sargam-theme-options' ),
    'id'               => 'sargam-products-page',
    'desc'             => __( 'These are Sargam products page options!', 'sargam-theme-options' ),
    'icon'             => 'el el-shopping-cart'
) );
Redux::setSection($opt_name,array(
     'title'         =>__('Product page Banner','sargam-theme-options'),
     'id'            =>  'opt-product-page-banner',
     'subsection'    => true,
     'desc'          => __('This is sargam products page banner section.','sargam-theme-options'),
     'fields'        => array(
       array(
       'id'        => 'banner-title-product-page',
       'type'      => 'text',
       'title'     =>__('Product page banner Title','sargam-theme-options'),
       'desc'      => __('Please insert the title text','sargam-theme-options'),
     ),
         array(
         'id'        => 'banner-product-page',
         'type'      => 'media',
         'title'     =>__('Product page banner image','sargam-theme-options'),
         'desc'      => __('Please upload the banner image','sargam-theme-options'),
         )
     )
));
Redux::setSection($opt_name,array(
     'title'         =>__('Before footer images section','sargam-theme-options'),
     'id'            =>  'opt-product-image-extra',
     'subsection'    => true,
     'desc'          => __('This is sargam products page extra image section. You can left empty if you do not want to see any images.','sargam-theme-options'),
     'fields'        => array(
       array(
       'id'        => 'extra-product-image1',
       'type'      => 'media',
       'title'     =>__('Extra Product image left','sargam-theme-options'),
       'desc'      => __('Please insert the left image','sargam-theme-options'),
     ),
         array(
         'id'        => 'extra-product-image2',
         'type'      => 'media',
         'title'     =>__('Extra Product image right','sargam-theme-options'),
         'desc'      => __('Please insert the right image','sargam-theme-options'),
         )
     )
));

//============================Sargam Make purchage page======================
Redux::setSection( $opt_name, array(
    'title'            => __( 'Sargam make Purchase page options', 'sargam-theme-options' ),
    'id'               => 'sargam-purchase-page',
    'desc'             => __( 'These are Sargam make Purchase page options!', 'sargam-theme-options' ),
    'icon'             => 'el el-credit-card'
) );
Redux::setSection($opt_name,array(
     'title'         =>__('Purchase page Banner','sargam-theme-options'),
     'id'            =>  'opt-purchase-page-banner',
     'subsection'    => true,
     'desc'          => __('This is sargam products page banner section.','sargam-theme-options'),
     'fields'        => array(
       array(
       'id'        => 'banner-title-purchase-page',
       'type'      => 'text',
       'title'     =>__('Product page banner Title','sargam-theme-options'),
       'desc'      => __('Please insert the title text','sargam-theme-options'),
     ),
         array(
         'id'        => 'banner-purchase-page',
         'type'      => 'media',
         'title'     =>__('Purchase page banner image','sargam-theme-options'),
         'desc'      => __('Please upload the banner image','sargam-theme-options'),
         )
     )
));
Redux::setSection($opt_name,array(
     'title'         =>__('Online Store','sargam-theme-options'),
     'id'            =>  'opt-online-store',
     'subsection'    => true,
     'desc'          => __('This is sargam Online store section.','sargam-theme-options'),
     'fields'        => array(
       array(
       'id'        => 'store-heading-top-image',
       'type'      => 'media',
       'title'     =>__('Heading Top image','sargam-theme-options'),
       'desc'      => __('Please upload the image if you want to see','sargam-theme-options'),
     ),
       array(
       'id'        => 'online-store-title',
       'type'      => 'text',
       'title'     =>__('Online store section Title','sargam-theme-options'),
       'desc'      => __('Online store section title text','sargam-theme-options'),
     ),
     array(
       'id'         => 'opt-online-store-desc',
       'type'       => 'editor',
       'title'      => __( 'Online store section description here:', 'sargam-theme-options' ),
       'full_width' => true,
       'args'       => array(
       'wpautop'    => false,
     'media_buttons' => false,
     'textarea_rows' => 5,
     //'tabindex' => 1,
     //'editor_css' => '',
     'teeny'         => false,
     //'tinymce' => array(),
     'quicktags'     => false,
       )
     ),
     array(
     'id'        => 'online-store-slider',
     'type'      => 'slides',
     'title'     =>__('Online stores','sargam-theme-options'),
     'desc'      => __('Please insert online stores logo links keep description and subtitle fields','sargam-theme-options'),
     'show' => array(
                        'title' => true,
                        'subtitle'=>false,
                        'description' => false,
                        'url' => true,              // <<========= that is what was asked at the top.
                    ),
     )
     )
));
Redux::setSection($opt_name,array(
     'title'         =>__('Our retail shops','sargam-theme-options'),
     'id'            =>  'opt-retail-shops',
     'subsection'    => true,
     'desc'          => __('This is Our retail shops.','sargam-theme-options'),
     'fields'        => array(
       array(
       'id'        => 'retail-heading-top-image',
       'type'      => 'media',
       'title'     =>__('Heading Top image','sargam-theme-options'),
       'desc'      => __('Please upload the image if you want to see','sargam-theme-options'),
     ),
       array(
       'id'        => 'retail-shops-title',
       'type'      => 'text',
       'title'     =>__('Our retail shops Title','sargam-theme-options'),
       'desc'      => __('Our retail shops title text','sargam-theme-options'),
     ),
     array(
       'id'         => 'opt-retail-shops-desc',
       'type'       => 'editor',
       'title'      => __( 'Our retail shops section description here:', 'sargam-theme-options' ),
       'full_width' => true,
       'args'       => array(
       'wpautop'    => false,
     'media_buttons' => false,
     'textarea_rows' => 5,
     //'tabindex' => 1,
     //'editor_css' => '',
     'teeny'         => false,
     //'tinymce' => array(),
     'quicktags'     => false,
       )
     ),
     array(
     'id'        => 'retail-locDropdown-lable',
     'type'      => 'text',
     'title'     =>__('Location dropdown lable','sargam-theme-options'),
     'desc'      => __('Location dropdown lable title text','sargam-theme-options'),
   ),
     array(
         'id'       => 'opt-retail-shops-background',
         'type'     => 'background',
         'output'   => array( '#retail_shop' ),
         'title'    => __( 'Our retail shops Section Background', 'sargam-theme-options' ),
         'subtitle' => __( 'Our retail shops Background with image, color, etc.', 'sargam-theme-options' ),
         'default'   => '#ffe600'
     ),
  )
));

Redux::setSection($opt_name,array(
     'title'         =>__('Our Partners','sargam-theme-options'),
     'id'            =>  'opt-partners',
     'subsection'    => true,
     'desc'          => __('This is sargam Partners section.','sargam-theme-options'),
     'fields'        => array(
       array(
       'id'        => 'partners-heading-top-image',
       'type'      => 'media',
       'title'     =>__('Heading Top image','sargam-theme-options'),
       'desc'      => __('Please upload the image if you want to see','sargam-theme-options'),
     ),
       array(
       'id'        => 'partners-title',
       'type'      => 'text',
       'title'     =>__('Our Partners section Title','sargam-theme-options'),
       'desc'      => __('Our Partners section title text','sargam-theme-options'),
     ),
     array(
       'id'         => 'opt-partners-before-desc',
       'type'       => 'editor',
       'title'      => __( 'Our Partners for before partners logo section description here:', 'sargam-theme-options' ),
       'full_width' => true,
       'args'       => array(
       'wpautop'    => false,
     'media_buttons' => false,
     'textarea_rows' => 5,
     //'tabindex' => 1,
     //'editor_css' => '',
     'teeny'         => false,
     //'tinymce' => array(),
     'quicktags'     => false,
       )
     ),
     array(
     'id'        => 'partners-slider',
     'type'      => 'slides',
     'title'     =>__('Our Partners logo & links','sargam-theme-options'),
     'desc'      => __('Please insert partners logo links and keep subtitle fields empty','sargam-theme-options'),
     'show' => array(
                        'title' => true,
                        'subtitle'=>false,
                        'description' => false,
                        'url' => true,              // <<========= that is what was asked at the top.
                    ),
     ),
     array(
       'id'         => 'opt-partners-after-desc',
       'type'       => 'editor',
       'title'      => __( 'Our Partners for after partners logo section description here:', 'sargam-theme-options' ),
       'full_width' => true,
       'args'       => array(
       'wpautop'    => false,
     'media_buttons' => false,
     'textarea_rows' => 5,
     //'tabindex' => 1,
     //'editor_css' => '',
     'teeny'         => false,
     //'tinymce' => array(),
     'quicktags'     => false,
       )
     )
  )
));





    /*
     * <--- END SECTIONS
     */


    /*
     *
     * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR ANY OTHER CONFIG MAY OVERRIDE YOUR CODE.
     *
     */

    /*
    *
    * --> Action hook examples
    *
    */

    // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );

    // Function to test the compiler hook and demo CSS output.
    // Above 10 is a priority, but 2 in necessary to include the dynamically generated CSS to be sent to the function.
    //add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);

    // Change the arguments after they've been declared, but before the panel is created
    //add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );

    // Change the default value of a field after it's been set, but before it's been useds
    //add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );

    // Dynamically add a section. Can be also used to modify sections/fields
    //add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    /**
     * Custom function for the callback validation referenced above
     * */
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'redux-framework-demo' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'redux-framework-demo' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }
