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

function umeetevent_widgets_init() {
    // sidebar widgets register
    register_sidebar(
        array(
            'name'          => esc_html__( 'Sidebar', 'umeetevent' ),
            'id'            => 'umeetevent-post-sidebar',
            'before_widget' => '<aside id="%1$s" class="single_sidebar_widget %2$s">',
            'after_widget'  => '</aside>',
            'before_title'  => '<h4 class="widget_title">',
            'after_title'   => '</h4>',
        )
    );
    
    // footer widgets register
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer One', 'umeetevent' ),
            'id'            => 'footer-1',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6>',
            'after_title'   => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Two', 'umeetevent' ),
            'id'            => 'footer-2',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6>',
            'after_title'   => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Three', 'umeetevent' ),
            'id'            => 'footer-3',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6>',
            'after_title'   => '</h6>',
        )
    );
    register_sidebar(
        array(
            'name'          => esc_html__( 'Footer Four', 'umeetevent' ),
            'id'            => 'footer-4',
            'before_widget' => '<div id="%1$s" class="single-footer-widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h6>',
            'after_title'   => '</h6>',
        )
    );


}
add_action( 'widgets_init', 'umeetevent_widgets_init' );
