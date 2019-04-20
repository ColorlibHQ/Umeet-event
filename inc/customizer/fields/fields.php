<?php 
/**
 * @Packge     : UmeetEvent
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

// Block direct access
if( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

/***********************************
 * General Section Fields
 ***********************************/


// Theme Main Color Picker
Epsilon_Customizer::add_field(
    'umeetevent_themecolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Theme Main Color.', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_general_options_section',
        'default'     => '#3b1d82',
    )
);
// Google map api key field
$url = 'https://developers.google.com/maps/documentation/geocoding/get-api-key';

Epsilon_Customizer::add_field(
    'umeetevent_map_apikey',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Google map api key', 'umeetevent' ),
        'description'       => sprintf( __( 'Set google map api key. To get api key %s click here %s.', 'umeetevent' ), '<a target="_blank" href="'.esc_url( $url  ).'">', '</a>' ),
        'section'           => 'umeetevent_general_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => '',
        
    )
);

// Instagram api key field
$url = 'https://www.instagram.com/developer/authentication/';

Epsilon_Customizer::add_field(
	'umeetevent_igaccess_token',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Instagram Access Token', 'umeetevent' ),
		'description' => sprintf( __( 'Set instagram access token. To get access token %s click here %s.', 'umeetevent' ), '<a target="_blank" href="'.esc_url( $url ).'">', '</a>' ),
		'section' => 'umeetevent_general_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '',

	)
);

/***********************************
 * Header Section Fields
 ***********************************/

 //Call to Action Toggle
 Epsilon_Customizer::add_field(
    'umeetevent_cta_toggle_settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Call To Action Show/Hide', 'umeetevent' ),
        'section'     => 'umeetevent_headertop_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

Epsilon_Customizer::add_field(
	'umeetevent_cta_label',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Call To Action Button Label', 'umeetevent' ),
		'section' => 'umeetevent_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => esc_html__( 'Get Ticket', 'umeetevent' ),

	)
);
Epsilon_Customizer::add_field(
	'umeetevent_cta_url',
	array(
		'type' => 'text',
		'label' => esc_html__( 'Call To Action URL', 'umeetevent' ),
		'section' => 'umeetevent_headertop_options_section',
		'sanitize_callback' => 'sanitize_text_field',
		'default' => '',

	)
);

// Header Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'umeetevent_header_navbar_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Background Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Sticky  Nav Bar Background Color Picker
Epsilon_Customizer::add_field(
    'umeetevent_header_navbarsticky_bgColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Sticky Nav Bar Background Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_headertop_options_section',
        'default'     => '#fff',
    )
);
// Header Nav Bar Menu Color Picker
Epsilon_Customizer::add_field(
    'umeetevent_header_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_headertop_options_section',
        'default'     => '#242424',
    )
);
// Header Nav Bar Menu Hover Color Picker
Epsilon_Customizer::add_field(
    'umeetevent_header_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Nav Bar Menu Hover Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_headertop_options_section',
        'default'     => '#ea0763',
    )
);
// Header sticky nav bar menu color picker
Epsilon_Customizer::add_field(
    'umeetevent_header_sticky_navbar_menuColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_headertop_options_section',
        'default'     => '#242424',
    )
);
// Header sticky nav bar menu hover color picker
Epsilon_Customizer::add_field(
    'umeetevent_header_sticky_navbar_menuHovColor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Sticky Header Nav Bar Menu Hover Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_headertop_options_section',
        'default'     => '#ea0763',
    )
);


// Header overlay switch field
Epsilon_Customizer::add_field(
    'umeetevent-headeroverlay-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Toggle header overlay', 'umeetevent' ),
        'section'     => 'colors',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
// Header overlay color
Epsilon_Customizer::add_field(
    'umeetevent_headeroverlaycolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Overlay Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => 'rgba(59,29,130,0.4)'
    )
);
// Page Header Background Color Picker
Epsilon_Customizer::add_field(
    'umeetevent_headerbgcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Background Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#3b1d82',
    )
);


// Page Header text Color Picker
Epsilon_Customizer::add_field(
    'umeetevent_headertextcolor',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Header Text Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'colors',
        'default'     => '#fff',
    )
);

Epsilon_Customizer::add_field(
    'umeetevent_header_cta_label',
    array(
        'type'              => 'text',
        'label'             => esc_html__( 'Call to Action Button Label', 'umeetevent' ),
        'section'           => 'umeetevent_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => __('Get Ticket', 'umeetevent')
    )
);



/***********************************
 * Blog Section Fields
 ***********************************/

// Post excerpt length field
Epsilon_Customizer::add_field(
    'umeetevent_post_excerpt',
    array(
        'type'        => 'text',
        'label'       => esc_html__( 'Post Excerpt', 'umeetevent' ),
        'description' => esc_html__( 'Set post excerpt length.', 'umeetevent' ),
        'section'     => 'umeetevent_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'     => '30',
    )
);
// Blog sidebar layout field
Epsilon_Customizer::add_field(
    'umeetevent-blog-sidebar-settings',
    array(
        'type'     => 'epsilon-layouts',
        'label'    => esc_html__( 'Blog Layout', 'umeetevent' ),
        'section'  => 'umeetevent_blog_options_section',
        'description' => esc_html__( 'Select the option to set blog page sidebar position.', 'umeetevent' ),
        'layouts'  => array(
            '1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
            '2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg',
            '3' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleleft.jpg',
        ),
        'default'  => array(
            'columnsCount' => 1,
            'columns'      => array(
                1 => array(
                    'index' => 1,
                ),
                2 => array(
                    'index' => 2,
                ),
                3 => array(
                    'index' => 3,
                ),
            ),
        ),
        'min_span' => 4,
        'fixed'    => true
    )
);
if( defined( 'UMEET_EVENT_COMPANION_VERSION' ) ) {
// Header social switch field
Epsilon_Customizer::add_field(
    'umeetevent-blog-social-share-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Social Share Show/Hide', 'umeetevent' ),
        'section'     => 'umeetevent_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

// Header social switch field
Epsilon_Customizer::add_field(
    'umeetevent-blog-like-toggle',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Blog Like Button Show/Hide', 'umeetevent' ),
        'section'     => 'umeetevent_blog_options_section',
        'sanitize_callback' => 'sanitize_text_field'
    )
);
}



/***********************************
 * Page Section Fields
 ***********************************/

// Blog sidebar layout field
Epsilon_Customizer::add_field(
	'umeetevent-page-sidebar-settings',
	array(
		'type'     => 'epsilon-layouts',
		'label'    => esc_html__( 'page Layout', 'umeetevent' ),
		'section'  => 'umeetevent_page_options_section',
		'description' => esc_html__( 'Select the option to set page sidebar position.', 'umeetevent' ),
		'layouts'  => array(
			'1' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/one-column.png',
			'2' => get_template_directory_uri() . '/inc/libraries/epsilon-framework/assets/img/epsilon-section-titleright.jpg'
		),
		'default'  => array(
			'columnsCount' => 1,
			'columns'      => array(
				1 => array(
					'index' => 1,
				),
				2 => array(
					'index' => 2,
				)
			),
		),
		'min_span' => 4,
		'fixed'    => true
	)
);



/***********************************
 * 404 Page Section Fields
 ***********************************/

// 404 text #1 field
Epsilon_Customizer::add_field(
    'umeetevent_fof_text_one',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #1', 'umeetevent' ),
        'section'           => 'umeetevent_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Ooops 404 Error !'
    )
);
// 404 text #2 field
Epsilon_Customizer::add_field(
    'umeetevent_fof_text_two',
    array(
        'type'              => 'text',
        'label'             => esc_html__( '404 Text #2', 'umeetevent' ),
        'section'           => 'umeetevent_fof_options_section',
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => 'Either something went wrong or the page dosen\'t exist anymore.'
    )
);
// 404 text #1 color field
Epsilon_Customizer::add_field(
    'umeetevent_fof_textonecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #1 Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_fof_options_section',
        'default'     => '#404551', 
    )
);
// 404 text #2 color field
Epsilon_Customizer::add_field(
    'umeetevent_fof_texttwocolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Text #2 Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_fof_options_section',
        'default'     => '#abadbe',
    )
);
// 404 background color field
Epsilon_Customizer::add_field(
    'umeetevent_fof_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( '404 Page Background Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_fof_options_section',
        'default'     => '#fff',
    )
);

/***********************************
 * Footer Section Fields
 ***********************************/

// Footer widget toggle field
Epsilon_Customizer::add_field(
    'umeetevent-widget-toggle-settings',
    array(
        'type'        => 'epsilon-toggle',
        'label'       => esc_html__( 'Footer widget show/hide', 'umeetevent' ),
        'description' => esc_html__( 'Toggle to display footer widgets.', 'umeetevent' ),
        'section'     => 'umeetevent_footer_options_section',
        'default'     => false,
    )
);

// Footer copy right text add settings

// Copy right text
$url = 'https://colorlib.com/';
$copyText = sprintf( __( 'Theme by %s colorlib %s Copyright &copy; %s  |  All rights reserved.', 'umeetevent' ), '<a target="_blank" href="' . esc_url( $url ) . '">', '</a>', date( 'Y' ) );

Epsilon_Customizer::add_field(
    'umeetevent-copyright-text-settings',
    array(
        'type'        => 'epsilon-text-editor',
        'label'       => esc_html__( 'Footer copyright text', 'umeetevent' ),
        'section'     => 'umeetevent_footer_options_section',
        'default'     => wp_kses_post( $copyText ),
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'umeetevent_footer_bgimg_settings',
    array(
        'type'        => 'epsilon-image',
        'label'       => esc_html__( 'Footer Widget Background Image', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
    )
);
// Footer widget background color field
Epsilon_Customizer::add_field(
    'umeetevent_footer_widget_bgColor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Background Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#111429',
    )
);
// Footer widget text color field
Epsilon_Customizer::add_field(
    'umeetevent_footer_widget_color_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Text Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#666',
    )
);
// Footer widget title color field
Epsilon_Customizer::add_field(
    'umeetevent_footer_widgettitlecolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widgets Title Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#fff',
    )
);
// Footer widget anchor color field
Epsilon_Customizer::add_field(
    'umeetevent_footer_widget_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#777',
    )
);
// Footer widget anchor hover Color
Epsilon_Customizer::add_field(
    'umeetevent_footer_widget_anchorhovcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Widget Anchor Hover Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#3b1d82',
    )
);

// Footer bottom bg Color
Epsilon_Customizer::add_field(
    'umeetevent_footer_bottom_bgcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Background Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#111429',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'umeetevent_footer_bottom_textcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Text Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#666',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'umeetevent_footer_bottom_anchorcolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#ea0763',
    )
);
// Footer bottom text Color
Epsilon_Customizer::add_field(
    'umeetevent_footer_bottom_anchorhovercolor_settings',
    array(
        'type'        => 'epsilon-color-picker',
        'label'       => esc_html__( 'Footer Bottom Anchor Hover Color', 'umeetevent' ),
        'sanitize_callback' => 'sanitize_text_field',
        'section'     => 'umeetevent_footer_options_section',
        'default'     => '#ea0763',
    )
);
