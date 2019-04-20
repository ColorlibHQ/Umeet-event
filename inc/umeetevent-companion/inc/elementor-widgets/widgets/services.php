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
 * UmeetEvent elementor Team Member section widget.
 *
 * @since 1.0
 */
class UmeetEvent_Services extends Widget_Base {

	public function get_name() {
		return 'umeetevent-services';
	}

	public function get_title() {
		return __( 'Services', 'umeetevent' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'umeetevent-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  training Section Heading ------------------------------
        $this->start_controls_section(
            'services_heading',
            [
                'label' => __( 'Services Section Heading', 'umeetevent' ),
            ]
        );
        $this->add_control(
            'sect_title', [
                'label' => __( 'Title', 'umeetevent' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );
        $this->add_control(
            'sect_subtitle', [
                'label' => __( 'Sub Title', 'umeetevent' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true

            ]
        );

        $this->end_controls_section(); // End section top content
        
		// ----------------------------------------   Services content ------------------------------
		$this->start_controls_section(
			'services_block',
			[
				'label' => __( 'Services', 'umeetevent' ),
			]
		);
		$this->add_control(
            'services_content', [
                'label' => __( 'Create Training', 'umeetevent' ),
                'type'  => Controls_Manager::REPEATER,
                'title_field' => '{{{ label }}}',
                'fields' => [
                    [
                        'name'  => 'label',
                        'label' => __( 'Title', 'umeetevent' ),
                        'type'  => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default' => 'Name'
                    ],
                    [
                        'name'  => 'url',
                        'label' => __( 'Title Url', 'umeetevent' ),
                        'type'  => Controls_Manager::URL,
                        'show_external' => false,
                    ],
                    [
                        'name'  => 'desc',
                        'label' => __( 'Descriptions', 'umeetevent' ),
                        'type'  => Controls_Manager::TEXTAREA,
                    ],
                    [
                        'name'  => 'img',
                        'label' => __( 'Photo', 'umeetevent' ),
                        'type'  => Controls_Manager::MEDIA,
                    ]
                ],
            ]
		);

		$this->end_controls_section(); // End Services content


        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => __( 'Style Section Heading', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_secttitle', [
                'label'     => __( 'Section Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#333333',
                'selectors' => [
                    '{{WRAPPER}} .title h1' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_sectsubtitle', [
                'label'     => __( 'Section Sub Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#777',
                'selectors' => [
                    '{{WRAPPER}} .title p' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        //------------------------------ Style services Box ------------------------------
        $this->start_controls_section(
            'style_trainingbox', [
                'label' => __( 'Style Services Content', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_servicestitle', [
                'label' => __( 'Title Color', 'umeetevent' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_serviceshovertitle', [
                'label' => __( 'Title Hover Color', 'umeetevent' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service:hover h4' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_servicesdescription', [
                'label' => __( 'Description Color', 'umeetevent' ),
                'type'  => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-service p' => 'color: {{VALUE}};',
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
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .service-area',
            ]
        );

        $this->end_controls_section();


	}

	protected function render() {

    $settings = $this->get_settings();

    ?>


    <section class="service-area section-gap">
        <div class="container">
            <?php
            // Section Heading
            umeetevent_section_heading( $settings['sect_title'], $settings['sect_subtitle'] );
            ?>

            <div class="row">
                <?php 
                if( ! empty( $settings['services_content'] ) ):
                    foreach( $settings['services_content'] as $val ):

                    // Member Picture
                    $bgUrl = '';
                    if( ! empty( $val['img']['url'] ) ) {
                        $bgUrl = $val['img']['url'];
                    }

                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service">
                        <div class="thumb">
                            <?php
                            // Image
                            echo umeetevent_img_tag(
	                            array(
		                            'url'   => esc_url( $bgUrl ),
		                            'class'   => 'img-fluid'
	                            )
                            );
                            ?>
                        </div>
                        <?php 

                        // Title
	                    if( ! empty( $val['label'] ) ) {
		                    echo umeetevent_heading_tag(
			                    array(
				                    'tag'  => 'h4',
				                    'text' => esc_html( $val['label'] )
			                    )
		                    );
	                    }
                        // Description
                        if( ! empty( $val['desc'] ) ) {
                            echo umeetevent_paragraph_tag(
                                array(
                                    'text'  => esc_html( $val['desc'] ),
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <?php 
                    endforeach;
                endif;
                ?>
            </div>
        </div>  
    </section>

    <?php

    }

}
