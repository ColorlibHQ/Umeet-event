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
?>
 
    <!-- Post Item Start -->
    <div id="<?php the_ID(); ?>" <?php post_class( esc_attr( 'single-post' ) ); ?>>
        <?php 
        if( has_post_thumbnail() ){ ?>
            <div class="feature-img">
		        <?php
		        /**
		         * Blog Post thumbnail
		         * @Hook  umeetevent_blog_posts_thumb
		         *
		         * @Hooked umeetevent_blog_posts_thumb_cb
		         *
		         *
		         */
		        do_action( 'umeetevent_blog_posts_thumb' );
		        ?>
            </div>

        <?php
        } ?>

        <div class="blog_details">
            <?php     	

            /**
             * Blog post title
             * @Hook  umeetevent_blog_posts_content
             *
             * @Hooked umeetevent_blog_posts_title_cb
             *
             *
             */
            do_action( 'umeetevent_blog_posts_title' );

            /**
             * Blog Excerpt With read more button
             * @Hook  umeetevent_blog_posts_bottom_meta
             *
             * @Hooked umeetevent_blog_posts_bottom_meta_cb
             *
             *
             */
            do_action( 'umeetevent_blog_posts_bottom_meta' );

            /**
             * Blog single page content 
             * Post social share
             * @Hook  umeetevent_blog_posts_content
             *
             * @Hooked umeetevent_blog_posts_content_cb
             * 
             *
             */
            do_action( 'umeetevent_blog_posts_content' );

            ?>
        </div>
    </div>

    <?php 
         /**
         * Blog Post Meta
         * @Hook  umeetevent_blog_posts_meta
         *
         * @Hooked umeetevent_blog_posts_meta_cb
         *
         *
         */
        do_action( 'umeetevent_blog_posts_meta' );
    ?>

    <div class="navigation-top single_meta">
        <div class="d-sm-flex justify-content-between text-center">
            <?php

            /**
             * Blog single post meta category, tag, next - previous link, comments form
             * and biography
             * @Hook  umeetevent_blog_single_meta
             *
             * @Hooked umeetevent_blog_single_meta_cb
             *
             *
             */
            do_action( 'umeetevent_blog_single_meta' );

            echo '</div>';

            /**
             * Blog single page content 
             * @Hook  umeetevent_blog_single_footer_nav
             *
             * @Hooked umeetevent_blog_single_footer_nav_cb
             * 
             *
             */
            do_action( 'umeetevent_blog_single_footer_nav' );

    echo '</div>';

// comment template.
if ( comments_open() || get_comments_number() ) {
	comments_template();
}
	
?>           