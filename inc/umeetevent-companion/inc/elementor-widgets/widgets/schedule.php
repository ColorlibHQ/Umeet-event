<?php
namespace Umeeteventelementor\Widgets;

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
 * elementor food-menu-tab section widget.
 *
 * @since 1.0
 */
class Umeetevent_schedule extends Widget_Base {

	public function get_name() {
		return 'umeet-event-schedule';
	}

	public function get_title() {
		return __( 'Event Schedule', 'umeetevent' );
	}

	public function get_icon() {
		return 'eicon-gallery-grid';
	}

	public function get_categories() {
		return [ 'umeetevent-elements' ];
	}

	protected function _register_controls() {

		$repeater = new \Elementor\Repeater();

        // ----------------------------------------  Food Menu Content ------------------------------

        $this->start_controls_section(
            'menu_tab_sec',
            [
                'label' => __( 'Food Menu', 'umeetevent' ),
            ]
        );

        $this->add_control(
            'menu_tabs', [
                'label'         => __( 'Create Menu Tab Item', 'umeetevent' ),
                'type'          => Controls_Manager::REPEATER,
                'title_field'   => '{{{ label }}}',
                'fields' => [
                    [
                        'name'        => 'label',
                        'label'       => __( 'Tag', 'umeetevent' ),
                        'type'        => Controls_Manager::TEXT,
                        'default'     => 'test'
                        
                    ],
                    [
                        'name'        => 'title',
                        'label'       => __( 'Title', 'umeetevent' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Pizza Americano', 'umeetevent' )
                    ],
                    [
                        'name'        => 'description',
                        'label'       => __( 'Description', 'umeetevent' ),
                        'type'        => Controls_Manager::TEXT,
                        'label_block' => true,
                        'default'     => esc_html__( 'Usage of the Internet is becoming more common due to rapid advance. Usage of the Internet is becoming more common due to rapid advance.', 'umeetevent' )
                    ]

                ],
            ]
        );

        $this->end_controls_section(); // End food-menu-tab content

        //------------------------------ Style title ------------------------------
        $this->start_controls_section(
            'style_title', [
                'label' => __( 'Style Category', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_title', [
                'label'     => __( 'Category Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#222',
                'selectors' => [
                    '{{WRAPPER}} .menu-list-area .menu-cat .nav-pills .nav-item a' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'cat_title_bg_color', [
                'label'     => __( 'Category Title Background Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .nav-pills .nav-item .nav-link' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'active_cat_title_bg', [
                'label'     => __( 'Active Category Title Background Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#d1ab7f',
                'selectors' => [
                    '{{WRAPPER}} .nav-pills .nav-item .active' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'active_cat_title_color', [
                'label'     => __( 'Active Category Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#fff',
                'selectors' => [
                    '{{WRAPPER}} .nav-pills .nav-item .active' => 'color: {{VALUE}};',
                ],
            ]
        );
        
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_title',
                'selector'  => '{{WRAPPER}} .nav-pills .nav-item .nav-link',
            ]
        );

        $this->end_controls_section();



        //------------------------------ Style Tab  ------------------------------
        $this->start_controls_section(
            'style_tab', [
                'label' => __( 'Style Menu Item', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_menu_item_color', [
                'label'     => __( 'Menu Item Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-menu-list'  => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_menu_item', [
                'label'     => __( 'Menu Item Background Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-menu-list' => 'background-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'color_menu_item_hover', [
                'label'     => __( 'Menu Item Hover Background Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-menu-list:hover'  => 'background-color: {{VALUE}};',
                ],
            ]
        );
        

        $this->end_controls_section();

	}

	protected function render() {

    $settings = $this->get_settings();


    $title = '';
    if( !empty( $settings['title'] ) ){
        $title = $settings['title'];
    }

    $menu_tabs = $settings['menu_tabs'];

    $tags = array_column( $menu_tabs, 'label' );
    $getTags = array_unique( $tags );
    // Total items count
    $totalItems = count( $menu_tabs );

    $tab_data = return_tab_data( $getTags , $menu_tabs );

    ?>
    <section class="menu-list-area section-gap">
        <div class="container">
            <div class="row">
                <div class="menu-cat mx-auto">
                    <ul class="nav nav-pills" id="pills-tab" role="tablist">
                        <?php
                            if( is_array( $menu_tabs ) && $totalItems > 0 ){

	                            $tags = array_column( $menu_tabs, 'label' );
	                            $getTags = array_unique( $tags );
	                            $tabs = '';
	                            $i = 0;
	                            foreach( $getTags as $tag ) {
		                            $tagforfilter = sanitize_title_with_dashes( $tag );
	                                $i++;
	                                $active = $i==1 ? 'active' : '';
		                            $tabs .= '<li class="nav-item"><a class="nav-link '.$active.' " id="tab-'.esc_attr( $tagforfilter ).'" data-toggle="pill" href="#'.esc_attr( $tagforfilter ).'" role="tab" aria-controls="'.esc_attr( $tagforfilter ).'" aria-selected="true">'.esc_html( $tag ).'</a></li>';
	                            }
	                            echo $tabs;
                            } ?>
                    </ul>
                </div>

            </div>
            <div id="pills-tabContent" class="tab-content absolute">
                <?php
                if( !empty( $tab_data ) ) {
                    $i= 0;
	                foreach ( $tab_data as $key => $val ) {

		                $tagforfilter = sanitize_title_with_dashes( $key );
		                $i++;
		                $active = $i==1 ? 'active' : '';
		                ?>
                        <div class="tab-pane fade show <?php echo esc_attr($active) ?>" id="<?php echo esc_attr( $tagforfilter ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $tagforfilter ); ?>-tab">

                            <?php
                            foreach( $val as $data ){
                            ?>
                            <div class="single-menu-list row justify-content-between align-items-center">
                                    <div class="col-lg-9">
                                        <a href="#"><h4><?php echo esc_html( $data['title'] ); ?></h4></a>
                                        <p><?php echo esc_html( $data['description'] ); ?></p>
                                    </div>
                                    <div class="col-lg-3 flex-row d-flex price-size">
                                        <div class="s-price col">
                                            <h4><?php echo esc_html($data['weight_1']); ?>”</h4>
                                            <span><?php echo esc_html($data['price_1']); ?></span>
                                        </div>
                                        <div class="s-price col">
                                            <h4><?php echo esc_html($data['weight_2']); ?>”</h4>
                                            <span><?php echo esc_html($data['price_2']); ?></span>
                                        </div>
                                        <div class="s-price col">
                                            <h4><?php echo esc_html($data['weight_3']); ?>”</h4>
                                            <span><?php echo esc_html($data['price_3']); ?></span>
                                        </div>

                                    </div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
		                <?php
	                }
                }
                ?>
            </div>
        </div>
    </section>

    <?php

    }
	
}
