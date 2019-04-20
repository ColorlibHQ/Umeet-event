<?php 
/**
 * @Packge 	   : UmeetEvent
 * @Version    : 1.0
 * @Author 	   : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */
 
// Block direct access
if( ! defined( 'ABSPATH' ) ) {
	exit( 'Direct script access denied.' );
}

/**
 *
 * Before Wrapper
 *
 * @Preloader
 *
 */
add_action( 'umeetevent_preloader', 'umeetevent_site_preloader', 10 );

/**
 * Header
 *
 * @Header Menu
 * @Header Bottom
 * 
 */

add_action( 'umeetevent_header', 'umeetevent_header_cb', 10 );

/**
 * Hook for footer
 *
 */
add_action( 'umeetevent_footer', 'umeetevent_footer_area', 10 );
add_action( 'umeetevent_footer', 'umeetevent_back_to_top', 20 );

/**
 * Hook for Blog, single, page, search, archive pages wrapper.
 */
add_action( 'umeetevent_wrp_start', 'umeetevent_wrp_start_cb', 10 );
add_action( 'umeetevent_wrp_end', 'umeetevent_wrp_end_cb', 10 );

/**
 * Hook for Page wrapper.
 */
add_action( 'umeetevent_page_wrp_start', 'umeetevent_page_wrp_start_cb', 10 );
add_action( 'umeetevent_page_wrp_end', 'umeetevent_page_wrp_end_cb', 10 );

/**
 * Hook for Blog, single, search, archive pages column.
 */
add_action( 'umeetevent_blog_col_start', 'umeetevent_blog_col_start_cb', 10 );
add_action( 'umeetevent_blog_col_end', 'umeetevent_blog_col_end_cb', 10 );

/**
 * Hook for Page column.
 */
add_action( 'umeetevent_page_col_start', 'umeetevent_page_col_start_cb', 10 );
add_action( 'umeetevent_page_col_end', 'umeetevent_page_col_end_cb', 10 );

/**
 * Hook for blog posts thumbnail.
 */
add_action( 'umeetevent_blog_posts_thumb', 'umeetevent_blog_posts_thumb_cb', 10 );
/**
 * Hook for blog posts Date Meta.
 */
add_action( 'umeetevent_blog_post_date', 'umeetevent_blog_post_date_cb', 10 );

/**
 * Hook for blog posts title.
 */
add_action( 'umeetevent_blog_posts_title', 'umeetevent_blog_posts_title_cb', 10 );

/**
 * Hook for blog posts meta.
 */
add_action( 'umeetevent_blog_posts_meta', 'umeetevent_blog_posts_meta_cb', 10 );

/**
 * Hook for blog posts bottom meta.
 */
add_action( 'umeetevent_blog_posts_bottom_meta', 'umeetevent_blog_posts_bottom_meta_cb', 10 );

/**
 * Hook for blog posts excerpt.
 */
add_action( 'umeetevent_blog_posts_excerpt', 'umeetevent_blog_posts_excerpt_cb', 10 );

/**
 * Hook for blog posts content.
 */
add_action( 'umeetevent_blog_posts_content', 'umeetevent_blog_posts_content_cb', 10 );

/**
 * Hook for blog sidebar.
 */
add_action( 'umeetevent_blog_sidebar', 'umeetevent_blog_sidebar_cb', 10 );

/**
 * Hook for page sidebar.
 */
add_action( 'umeetevent_page_sidebar', 'umeetevent_page_sidebar_cb', 10 );

/**
 * Hook for blog single post social share option.
 */
add_action( 'umeetevent_blog_posts_share', 'umeetevent_blog_posts_share_cb', 10 );

/**
 * Hook for blog single post meta category, tag, next - previous link and comments form.
 */
add_action( 'umeetevent_blog_single_meta', 'umeetevent_blog_single_meta_cb', 10 );

/**
 * Hook for blog single footer nav next - previous link and comments form.
 */
add_action( 'umeetevent_blog_single_footer_nav', 'umeetevent_blog_single_footer_nav_cb', 10 );

/**
 * Hook for page content.
 */
add_action( 'umeetevent_page_content', 'umeetevent_page_content_cb', 10 );


/**
 * Hook for 404 page.
 */
add_action( 'umeetevent_fof', 'umeetevent_fof_cb', 10 );
