<?php

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    $opt_name = "themeplace_opt";
    $theme = wp_get_theme();

    $args = array(
        'opt_name'             => $opt_name,
        'display_name'         => $theme->get( 'Name' ),
        'display_version'      => $theme->get( 'Version' ),
        'menu_type'            => 'menu',
        'allow_sub_menu'       => true,
        'menu_title'           => esc_html__( 'Theme Settings', 'themeplace' ),
        'page_title'           => esc_html__( 'Digital Market Settings', 'themeplace' ),
        'google_api_key'       => '',
        'google_update_weekly' => false,
        'async_typography'     => true,
        'admin_bar'            => true,
        'admin_bar_icon'       => 'dashicons-portfolio',
        'admin_bar_priority'   => 50,
        'global_variable'      => '',
        'dev_mode'             => false,
        'update_notice'        => true,
        'customizer'           => true,
        'page_priority'        => null,
        'page_parent'          => 'themes.php',
        'page_permissions'     => 'manage_options',
        'menu_icon'            => '',
        'last_tab'             => '',
        'page_icon'            => 'icon-themes',
        'page_slug'            => '_options',
        'save_defaults'        => true,
        'default_show'         => false,
        'default_mark'         => '',
        'show_import_export'   => true,
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        'output_tag'           => true,
        'database'             => '',
        'use_cdn'              => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
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

    Redux::setArgs( $opt_name, $args );


    // General
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'General', 'themeplace' ),
        'id'     => 'general',
        'desc'   => esc_html__( 'General theme options.', 'themeplace' ),
        'icon'   => 'el el-home',
        'fields' => array(
            array(
                'id'       => 'site_preloader',
                'type'     => 'switch',
                'title'    => esc_html__( 'Preloader', 'themeplace' ),
                'default'  => false,
            ),

        )
    ));

    // Style
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Style', 'themeplace' ),
        'id'     => 'style',
        'desc'   => esc_html__( 'Header menu options.', 'themeplace' ),
        'icon'   => 'el el-edit',
        'fields' => array(
            array(
                'id'       => 'primary_color',
                'type'     => 'color',
                'title'    => esc_html__('Primary Color', 'themeplace'), 
                'subtitle' => esc_html__('Pick a color for the theme (default: #1e73be).', 'themeplace'),
                'default'  => '#0674ec',
                'validate' => 'color',
            ),  
        )
    ));

    // Header
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Header', 'themeplace' ),
        'id'     => 'header',
        'desc'   => esc_html__( 'Header menu options.', 'themeplace' ),
        'icon'   => 'el el-heart-empty',
        'fields' => array(
            array(
                'id'       => 'themeplace_header_full_width',
                'type'     => 'switch',
                'title'    => esc_html__( 'Full Width Header', 'themeplace' ),
                'subtitle' => esc_html__( 'Controls the width of the header area. ', 'themeplace' ),
                'default'  => false,
            ),
            array(
                'id'       => 'themeplace_sticky_header',
                'type'     => 'switch',
                'title'    => esc_html__( 'Sticky Header', 'themeplace' ),
                'subtitle' => esc_html__( 'Fixed Top Header Area. ', 'themeplace' ),
                'default'  => false,
            ),
            array(
                'id'       => 'themeplace_navbar_login_signup',
                'type'     => 'switch',
                'title'    => esc_html__( 'Navbar Login/Signup', 'themeplace' ),
                'subtitle' => esc_html__( 'Switch On/Off button. ', 'themeplace' ),
                'default'  => false,
            ),
            array(
                'id'       => 'themeplace_navbar_login_redirect',
                'type'     => 'text',
                'title'    => esc_html__( 'Navbar Login Redirection', 'themeplace' ),
                'subtitle' => esc_html__( 'Set After Login Redirection URL. ', 'themeplace' ),
                'default'  => esc_url( home_url( '/' ) ),
                'validate' => 'url',
                'required' => array( 'themeplace_navbar_login_signup','equals', true ),
            ),
            array(
                'id'       => 'themeplace_navbar_cart',
                'type'     => 'switch',
                'title'    => esc_html__( 'Navbar Cart Button', 'themeplace' ),
                'subtitle' => esc_html__( 'Switch On/Off header cart button. ', 'themeplace' ),
                'default'  => false,
            ),
            array(
                'id'       => 'navbar_link',
                'type'     => 'color',
                'output'   => '.menu-bar .desktop-menu .navigation>li>a',
                'title'    => __('Navbar Link', 'themeplace'), 
                'subtitle' => __('Pick a color for navbar links.', 'themeplace'),
                'default'  => '#666e82',
                'validate' => 'color',
            ),

        )
    ) );



    // Vendor
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Vendor', 'themeplace' ),
        'id'    => 'vendor',
        'icon'  => 'el el-group',
    ));

    // Vendor Page
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Vendor Page', 'themeplace' ),
        'id'    => 'vendor_page',
        'subsection' => true,
        'fields'     => array(
            array(
                'id'       => 'vendor_earnings',
                'type'     => 'switch',
                'title'    => esc_html__( 'Earnings', 'themeplace' ),
                'subtitle' => esc_html__( 'Switch Show/Hide Vendor Earnings. ', 'themeplace' ),
                'default'  => true,
            ),
        )
    ) );


    // Product
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Product', 'themeplace' ),
        'id'    => 'product',
        'icon'   => 'el el-shopping-cart',
        'fields'     => array(            
            array(
                'id'               => 'themeplace_product_per_page',
                'type'             => 'slider',
                'title'            => esc_html__('Product per page', 'themeplace'),
                "default"          => 9,
                "min"              => 2,
                "step"             => 1,
                "max"              => 100,
                'display_value'    => 'text'
            ),
            array(
                'id'       => 'themeplace_product_hover_button',
                'type'     => 'switch',
                'title'    => esc_html__( 'Product Hover Button', 'themeplace' ),
                'subtitle' => esc_html__( 'Switch Show/Hide Hover Button. ', 'themeplace' ),
                'default'  => true,
            ),
            
        )
    ) );


    // Blog
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog', 'themeplace' ),
        'id'    => 'blog',
        'icon'  => 'el el-wordpress',
    ));

    // Blog Page
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Blog Page', 'themeplace' ),
        'id'    => 'blog_page',
        'subsection' => true,
        'fields'     => array(            
            array(
                'id'       => 'blog_breadcrumb_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Breadcrumb Title', 'themeplace' ),
                'default'  => esc_html__( 'Latest news', 'themeplace' ),
            ),
            array(
                'id'       => 'blog_breadcrumb_title_color',
                'type'     => 'color',
                'title'    => esc_html__('Breadcrumb Title Color', 'themeplace'),
                'output'    => array('.breadcrumb-content h1','.breadcrumb-content a','.breadcrumb-content ul li'),
                'default'  => '#2e3d62',
                'validate' => 'color',
            ),
            array(
                'id'       => 'blog_breadcrumb_background',
                'type'     => 'background',
                'title'    => esc_html__('Breadcrumb Background', 'themeplace'),
                'output'   => array('.breadcrumb-content'),
                'default'  => '#f5f5f5'

            ),
            array(
                'id'               => 'themeplace_excerpt_length',
                'type'             => 'slider',
                'title'            => esc_html__('Excerpt Length', 'themeplace'),
                'subtitle'         => esc_html__('Controls the excerpt length on blog page','themeplace'),
                "default"          => 20,
                "min"              => 10,
                "step"             => 1,
                "max"              => 130,
                'display_value'    => 'text'
            ),
            
        )
    ) );

    // Single Blog
    Redux::setSection( $opt_name, array(
        'title' => esc_html__( 'Single Blog Page', 'themeplace' ),
        'id'    => 'single_blog_page',
        'subsection' => true,
        'fields'     => array(              
            array(
                'id'       => 'social_share',
                'type'     => 'switch',
                'title'    => esc_html__( 'Social Share', 'themeplace' ),
                'default'  => true,
            ),
            array(
                'id'       => 'themeplace_blog_details_post_navigation',
                'type'     => 'switch',
                'title'    => esc_html__( 'Post Navigation (Next/Previous)', 'themeplace' ),
                'default'  => true,
            ),
            array(
                'id'       => 'related_posts',
                'type'     => 'switch',
                'title'    => esc_html__( 'Show Related Post', 'themeplace' ),
                'default'  => true,
            ),
            array(
                'id'       => 'related_post_title',
                'type'     => 'text',
                'title'    => esc_html__( 'Related Post Title', 'themeplace' ),
                'required' => array( 'related_posts','equals', true ),
                'default'  => esc_html__( 'Related Post', 'themeplace' ),
            ),
            array(
                'id'       => 'posts_per_page',
                'type'     => 'slider',
                'title'    => esc_html__( 'Related Posts', 'themeplace' ),
                'subtitle' => esc_html__( 'Related posts per page', 'themeplace' ),
                'desc'     => esc_html__('Number of related posts to display. Min: 1, max: Unlimited, step: 1, default value: 4', 'themeplace'),
                "default"  => 3,
                "min"      => 1,
                "step"     => 1,
                "max"      => 12,
                'required' => array( 'related_posts','equals', true ),
                'display_value' => 'text'
            ),
            array(
                'id'       => 'related_posts_columns',
                'type'     => 'select',
                'title'    => esc_html__( 'Posts Column', 'themeplace' ), 
                'subtitle' => esc_html__( 'Number of column', 'themeplace' ),
                'desc'     => esc_html__( 'Specify the number of related posts column.', 'themeplace' ),
                'required' => array( 'related_posts','equals', true ),
                'options'  => array(
                    '12' => esc_html__( 'One Column','themeplace' ), 
                     '6' => esc_html__( 'Two Columns','themeplace' ), 
                     '4' => esc_html__( 'Three Columns','themeplace' ), 
                     '3' => esc_html__( 'Four Columns','themeplace' ), 
                     '2' => esc_html__( 'Six Columns','themeplace' ),
                ),
                'default'  => '4',
            )
        )
    ) );

    // Footer
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Footer', 'themeplace' ),
        'id'     => 'footer',
        'icon'   => 'el el-arrow-down',
        'fields' => array(
            array(
                'id'          => 'footer_widget_display',
                'type'        => 'switch',
                'title'       => esc_html__( 'Footer widget display', 'themeplace' ),
                'default'  => true,
            ),
            array(
                'id'          => 'footer_copyright_bar',
                'type'        => 'switch',
                'title'       => esc_html__( 'Footer copyright bar', 'themeplace' ),
                'default'  => true,
            ),
            array(
                'id'              => 'themeplace_copyright_info',
                'type'            => 'editor',
                'required'        => array( 'footer_copyright_bar','equals', true ),
                'title'           => esc_html__( 'Copyright text', 'themeplace' ),
                'subtitle'        => esc_html__( 'Enter your company information here. HTML tags allowed: a, br, em, strong', 'themeplace' ),
                'default'         => esc_html__( 'Copyright © 2022 themeplace All Rights Reserved.', 'themeplace' ),
                'args'            => array(
                'wpautop'         => false,
                'teeny'           => true,
                'textarea_rows'   => 5
                )
            )
        )
    ) );

    // 404 
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( '404 Error', 'themeplace' ),
        'id'     => 'error-page',
        'icon'   => 'el el-error-alt',
        'fields' => array(
            array(
                'id'          => 'themeplace_error_title',
                'type'        => 'text',
                'title'       => esc_html__( 'Error title', 'themeplace' ),
                'default'     => esc_html__( 'Oops! That page can’t be found.', 'themeplace' ),
                ),
            array(
                'id'          => 'themeplace_error_text',
                'type'        => 'textarea',
                'title'       => esc_html__('Error message', 'themeplace'),
                'subtitle'    => esc_html__('Enter "not found" error message.', 'themeplace'),
                'default'     => esc_html__('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'themeplace'),
                )
            ),
    ) );
