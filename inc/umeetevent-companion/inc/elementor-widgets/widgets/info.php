<?php
namespace UmeetEventelementor\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Scheme_Color;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Group_Control_Text_Shadow;
use Elementor\Group_Control_Background;
use Elementor\Group_Control_Border;



// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


/**
 *
 * UmeetEvent elementor counter section widget.
 *
 * @since 1.0
 */
class UmeetEvent_Info extends Widget_Base {

	public function get_name() {
		return 'umeetevent-skill';
	}

	public function get_title() {
		return __( 'Info', 'umeetevent' );
	}

	public function get_icon() {
		return 'eicon-skill-bar';
	}

	public function get_categories() {
		return [ 'umeetevent-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();


        // ----------------------------------------  Features content ------------------------------
        $this->start_controls_section(
            'info_section',
            [
                'label' => __( 'Info', 'umeetevent' ),
            ]
        );
        $this->add_control(
            'info_image', [
                'label' => __( 'Feature Image', 'umeetevent' ),
                'type'  => Controls_Manager::MEDIA,
                
            ]
        );
        $this->add_control(
            'info_content', [
                'label' => __( 'Content', 'umeetevent' ),
                'type'  => Controls_Manager::WYSIWYG,
                
            ]
        );

        $this->end_controls_section(); // End content

        //------------------------------ Style counter ------------------------------
        $this->start_controls_section(
            'style_counter', [
                'label' => __( 'Style Counter', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_countertitle', [
                'label' => __( 'Title Color', 'umeetevent' ),
                'type'  => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-counter p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_number', [
                'label'     => __( 'Number Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .single-counter h5' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_bg', [
                'label'     => __( 'Background Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3898f8',
                'selectors' => [
                    '{{WRAPPER}} .inner' => 'background-color: {{VALUE}};',
                    '{{WRAPPER}} .circle' => 'border-color: {{VALUE}};',
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
                'selector' => '{{WRAPPER}} .counter-area .overlay-bg',
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
                'selector' => '{{WRAPPER}} .counter-area',
            ]
        );

        $this->end_controls_section();
	}

	protected function render() {
    $settings = $this->get_settings();
 
    ?>
    <section class="info-area pb-120">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-lg-6 no-padding info-area-left">
                    <?php
                        if( ! empty( $settings['info_image']['url'] ) ){
                            echo '<img class="img-fluid" src="'. $settings['info_image']['url'] .'" alt="'. __('Info Image', 'umeetevent') .'">';
                        }
                    ?>
                    
                </div>
                <div class="col-lg-6 info-area-right">
                    <?php
                        if( ! empty( $settings['info_content'] ) ){
                            echo wp_kses_post( $settings['info_content'] );
                        }
                    ?>
                </div>
            </div>
        </div>	
    </section>
 
    <?php

    }

}
