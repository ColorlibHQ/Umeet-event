<?php
namespace UmeetEventelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;  
}


/**
 *
 * UmeetEvent elementor about us section widget.
 *
 * @since 1.0
 */
class UmeetEvent_Banner extends Widget_Base {

	public function get_name() {
		return 'umeetevent-banner';
	}

	public function get_title() {
		return __( 'Banner', 'umeetevent' );
	}

	public function get_icon() {
		return 'eicon-banner';
	}

	public function get_categories() {
		return [ 'umeetevent-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  content ------------------------------
        $this->start_controls_section(
            'banner_content',
            [
                'label' => __( 'Banner Section Content', 'umeetevent' ),
            ]
        );
        $this->add_control(
            'banner_titleone',
            [
                'label'         => esc_html__( 'Title ', 'umeetevent' ),
                'type'          => Controls_Manager::TEXT,
                'default'       => esc_html__( 'UX CONFERENCE 2019', 'umeetevent' ),
                'label_block'   => true
            ]
        );
        $this->add_control(
            'banner_desc',
            [
                'label'         => esc_html__( 'Description', 'umeetevent' ),
                'type'          => Controls_Manager::TEXTAREA,
                'default'       => esc_html__( '20 - 22 January, 2019, Buffelo City', 'umeetevent' ),
            ]
        );
        $this->add_control(
            'banner_btnlabel',
            [
                'label'         => esc_html__( 'Button Label', 'umeetevent' ),
                'type'          => Controls_Manager::TEXT,
                'label_block'   => true,
                'default'       => esc_html__( 'Buy Ticket', 'umeetevent' )
            ]
        );
        $this->add_control(
            'banner_btnurl',
            [
                'label'         => esc_html__( 'Button Url', 'umeetevent' ),
                'type'          => Controls_Manager::URL,
                'show_external' => false
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_textcolor', [
                'label' => __( 'Style Content', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_titleone', [
                'label'     => __( 'Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner h1' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .hero-banner h1',
            ]
        );
        $this->add_control(
            'color_desc', [
                'label'     => __( 'Description Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_desc',
                'selector'  => '{{WRAPPER}} .hero-banner p',
            ]
        );
        $this->end_controls_section();

        //------------------------------ Style button ------------------------------
        $this->start_controls_section(
            'style_btn', [
                'label' => __( 'Style Button', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_btnlabel', [
                'label'     => __( 'Button Label Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .button-header' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhoverlabel', [
                'label'     => __( 'Button Hover Label Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .button-header:hover' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnbg', [
                'label'       => __( 'Button Background Color', 'umeetevent' ),
                'type'        => Controls_Manager::COLOR,
                'default'     => '#ea0763',
                'selectors'   => [
                    '{{WRAPPER}} .hero-banner .button-header' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_btnhovbg', [
                'label'     => __( 'Button Hover Background Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#b8024c',
                'selectors' => [
                    '{{WRAPPER}} .hero-banner .button-header:hover' => 'background-color: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        /**
         * Style Tab
         * ------------------------------ Background Style ------------------------------
         *
         */
        $this->start_controls_section(
            'section_bg', [
                'label' => __( 'Style Background', 'umeetevent' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'bg_overlay',
            [
                'label' => __( 'Overlay', 'umeetevent' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'umeetevent' ),
                'label_off' => __( 'Hide', 'umeetevent' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'sect_ooverlay_bgcolor',
            [
                'label'     => __( 'Overlay Color', 'umeetevent' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionoverlaybg',
                'label' => __( 'Overlay', 'umeetevent' ),
                'types' => [ 'gradient' ],
                'selector' => '{{WRAPPER}} .hero-banner .overlay-bg',
                'condition' => [
                    'bg_overlay' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'section_bgheading',
            [
                'label'     => __( 'Background Settings', 'umeetevent' ),
                'type'      => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'sectionbg',
                'label' => __( 'Background', 'umeetevent' ),
                'types' => [ 'classic', 'gradient', 'video' ],
                'selector' => '{{WRAPPER}} .hero-banner',
            ]
        );

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();
    // call load widget script
    $this->load_widget_script();

    ?>

    <section class="hero-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container text-center">
            <span class="hero-banner-icon"><i class="flaticon-sing"></i></span>

            <?php
            // Description
            if( ! empty( $settings['banner_desc'] ) ) {
                echo '<p> '. wp_kses_post( $settings['banner_desc'] ) .' </p>';
            }

            // Banner Title
            if( ! empty( $settings['banner_titleone'] ) ) {
                echo umeetevent_heading_tag(
                    array(
                        'tag'   => 'h1',
                        'text'  => esc_html( $settings['banner_titleone'] )
                    )
                );
            }

            // Button
            if( ! empty( $settings[ 'banner_btnlabel' ] ) && !empty( $settings['banner_btnurl']['url'] ) ) {
                echo umeetevent_anchor_tag(
                    array(
                        'url'   => esc_url( $settings['banner_btnurl']['url'] ),
                        'text'  => esc_html( $settings['banner_btnlabel'] ),
                        'class' => esc_attr( 'button button-header' )
                    )
                );
            }
            ?>

        </div>
    </section>

    <?php

    }
    
    public function load_widget_script() {
        if( \Elementor\Plugin::$instance->editor->is_edit_mode() === true  ) {
        ?>
        <script>
        ( function( $ ){
            var window_width = $(window).width(),
                window_height = window.innerHeight,
                header_height = $(".default-header").height(),
                header_height_static = $(".site-header.static").outerHeight(),
                fitscreen = window_height - header_height;

            $(".fullscreen").css("height", window_height)
            $(".fitscreen").css("height", fitscreen);
        })(jQuery);
        </script>
        <?php 
        }
    }
	
}
