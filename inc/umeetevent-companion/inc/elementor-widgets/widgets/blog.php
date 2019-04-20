<?php
namespace UmeetEventelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * UmeetEvent elementor few words section widget.
 *
 * @since 1.0
 */

class UmeetEvent_Blog extends Widget_Base {

	public function get_name() {
		return 'umeetevent-blog';
	}

	public function get_title() {
		return __( 'Blog', 'umeetevent' );
	}

	public function get_icon() {
		return 'eicon-post-list';
	}

	public function get_categories() {
		return [ 'umeetevent-elements' ];
	}

	protected function _register_controls() {

        // Start Section Title=====================================
        $this->start_controls_section(
            'blog_heading', [
                'label' => esc_html__( 'Blog Section Heading', 'umeetevent' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => esc_html__( 'Section Title', 'umeetevent' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => esc_html__( 'Section Sub-title', 'umeetevent' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true

            ]
        );
        $this->add_control(
            'section_title_image', [
                'label' => esc_html__( 'Section Title Image', 'umeetevent' ),
                'type'  => Controls_Manager::MEDIA,

            ]
        );
        $this->end_controls_section(); // End Section Title

        // ----------------------------------------  Blog content ------------------------------
        $this->start_controls_section(
            'blog_content',
            [
                'label' => __( 'Blog', 'umeetevent' ),
            ]
        );
        $this->add_control(
            'blog_limit',
            [
                'label'     => esc_html__( 'Post Limit', 'umeetevent' ),
                'type'      => Controls_Manager::TEXT,
                'default'   => 4
            ]
        );
        $this->end_controls_section(); // End few words content

        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'section_title_color', [
                'label' => __( 'Title Color', 'umeetevent' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .section-intro .primary-text' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_title',
                'selector'  => '{{WRAPPER}} .section-intro .primary-text',
            ]
        );
        $this->add_control(
            'section_subtitle_color', [
                'label' => __( 'Sub-title Color', 'umeetevent' ),
                'type'  => Controls_Manager::COLOR,
                'default' => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .section-intro .section-intro__title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sec_subtitle',
                'selector'  => '{{WRAPPER}} .section-intro .section-intro__title',
            ]
        );        
        $this->end_controls_section();


        //------------------------------ Style text ------------------------------
        $this->start_controls_section(
            'style_content', [
                'label' => __( 'Style Content', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_blogtitle', [
                'label'     => __( 'Blog Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .single-blog h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtitlehov', [
                'label'     => __( 'Blog Title Hover Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .single-blog:hover h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_blogtext', [
                'label'     => __( 'Blog Text Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .single-blog p'                    => 'color: {{VALUE}};',
                    '{{WRAPPER}} .single-blog .meta-bottom p'       => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings(); 
    // call load widget script
    $this->load_widget_script();
    ?>

        <section class="section-margin">
            <div class="container">
                <div class="section-intro section-intro-white text-center pb-98px">
                    <?php
                    if( !empty( $settings['sect_subtitle'] ) ){
                        echo '<p class="section-intro__title">'. esc_html( $settings['sect_subtitle'] ) .'</p>';
                    }

                    if( !empty( $settings['sect_title'] ) ){
                        echo '<h2 class="primary-text">'. esc_html( $settings['sect_title'] ) .'</h2>';
                    }

                    if( !empty( $settings['section_title_image']['url'] ) ){
                        echo '<img src="'. esc_url( $settings['section_title_image']['url'] ) .'" alt="">';
                    }
                    ?>
                </div>

                <div class="owl-theme owl-carousel blogCarousel pb-xl-1">
                    <?php
                    // Blog
                    umeetevent_blog_section( $settings['blog_limit'] );
                    ?>                
                </div>
            </div>
        </section>
        <?php

    }

    public function load_widget_script(){
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){

            if ($('.blogCarousel').length) {
                $('.blogCarousel').owlCarousel({
                    loop: false,
                    margin: 30,
                    items: 1,
                    nav: true,
                    autoplay: 2500,
                    smartSpeed: 1500,
                    dots: false,
                    responsiveClass: true,
                    navText : ["<div class='left-arrow'><i class='ti-angle-left'></i></div>","<div class='right-arrow'><i class='ti-angle-right'></i></div>"],
                    responsive:{
                        0:{
                            items:1
                        },
                        1000:{
                            items:2
                        }
                    }
                })
            }


        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
