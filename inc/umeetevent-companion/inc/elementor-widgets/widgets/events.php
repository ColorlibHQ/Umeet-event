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
class UmeetEvent_Events extends Widget_Base {

	public function get_name() {
		return 'umeetevent-events';
	}

	public function get_title() {
		return __( 'Events', 'umeetevent' );
	}

	public function get_icon() {
		return 'eicon-info-box';
	}

	public function get_categories() {
		return [ 'umeetevent-elements' ];
	}

	protected function _register_controls() {

        $repeater = new \Elementor\Repeater();
        
        // Event Section Heading
        $this->start_controls_section(
            'event_heading',
            [
                'label' => esc_html__( 'Event', 'umeetevent' ),
            ]
        );
        $this->add_control(
            'event_title', [
                'label' => esc_html__( 'Event Title', 'umeetevent' ),
                'description' => esc_html__( 'Use <br> for line brack', 'umeetevent' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,
                'default'   => esc_html__( 'Innovative With Experience UX Design 2019', 'umeetevent' )

            ]
        );
        $this->add_control(
            'event_subtitle', [
                'label' => esc_html__( 'Event Sub-title', 'umeetevent' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html( 'Where The business World Meets', 'umeetevent' )

            ]
        );
        $this->add_control(
            'event_desc', [
                'label' => esc_html__( 'Event Description', 'umeetevent' ),
                'type'  => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'default'   => esc_html( 'Morning steas great earth for divide our good sixth called abunda itseld appear fisrd seaton upon above may bearing all moveth morning make subdue stars they are a goreat eart divide our good sixth one of that', 'umeetevent' )

            ]
        );
        $this->add_control(
            'event_date', [
                'label' => esc_html__( 'Event Date', 'umeetevent' ),
                'type'  => Controls_Manager::DATE_TIME,
                'picker_options'   => [
                    'dateFormat'  => 'F j Y',
                ],
                'label_block' => true,
            ]
        );
        $this->add_control(
            'event_address', [
                'label' => esc_html__( 'Event Address', 'umeetevent' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,

            ]
        );
        $this->add_control(
            'event_ticket_btn', [
                'label' => esc_html__( 'Button Label', 'umeetevent' ),
                'type'  => Controls_Manager::TEXT,
                'label_block' => true,

            ]
        );
        $this->add_control(
            'event_ticket_btn_url', [
                'label' => esc_html__( 'Button URL', 'umeetevent' ),
                'type'  => Controls_Manager::URL,
                'label_block' => true,

            ]
        );
        $this->end_controls_section(); //End Event Section Heading



        //------------------------------ Style Section ------------------------------
        $this->start_controls_section(
            'style_section', [
                'label' => esc_html__( 'Style Event', 'umeetevent' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_event_title', [
                'label'     => esc_html__( 'Event Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .innovative-wrapper h3' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_event_title',
                'selector'  => '{{WRAPPER}} .innovative-wrapper h3',
            ]
        );

        $this->add_control(
            'color_event_subtitle', [
                'label'     => esc_html__( 'Event Sub Title Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ea0763',
                'selectors' => [
                    '{{WRAPPER}} .innovative-wrapper p.primary-text2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_sub_title',
                'selector'  => '{{WRAPPER}} .innovative-wrapper p.primary-text2',
            ]
        );
        $this->add_control(
            'color_event_desc', [
                'label'     => esc_html__( 'Event Description Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#797979',
                'selectors' => [
                    '{{WRAPPER}} .innovative-wrapper p' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_event_desc',
                'selector'  => '{{WRAPPER}} .innovative-wrapper p',
            ]
        );
        $this->add_control(
            'color_event_date', [
                'label'     => esc_html__( 'Event Date Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#ea0763',
                'selectors' => [
                    '{{WRAPPER}} .innovative-wrapper p.primary-text2' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_date',
                'selector'  => '{{WRAPPER}} .innovative-wrapper p.primary-text2',
            ]
        );

        $this->add_control(
            'color_event_btn', [
                'label'     => esc_html__( 'Button Label Color', 'umeetevent' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '#3b1d82',
                'selectors' => [
                    '{{WRAPPER}} .button-link' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(), [
                'name'      => 'typography_event_btn',
                'selector'  => '{{WRAPPER}} .button-link',
            ]
        );
        $this->end_controls_section(); // End Section Heading


	}

	protected function render() {
        $this->load_widget_script();
        $settings = $this->get_settings();
        
    ?>


        <section class="section-padding--small bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                        <div class="innovative-wrapper">
                            <?php 
                            //Title
                            if( ! empty( $settings['event_title'] ) ){
                                echo '<h3 class="primary-text">'. wp_kses_post( $settings['event_title'] ) .'</h3>';
                            }
                            //Sub-title
                            if( ! empty( $settings['event_subtitle'] ) ){
                                echo '<p class="h4 primary-text2 mb-3">'. esc_html( $settings['event_subtitle'] ) .'</p>';
                            }

                            // Description
                            if( ! empty( $settings['event_desc'] ) ){
                                echo '<p>'. esc_html( $settings['event_desc'] ) .'</p>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-6 pl-xl-5">

                        <ul class="clockdiv text-center" id="clockdiv">
                            <li class="clockdiv-single clockdiv-day">
                            <h1 class="days">00</h1>
                            <span class="smalltext"><?php echo esc_html__( 'Days', 'umeetevent' )?></span>
                            </li>
                            <li class="clockdiv-single clockdiv-hour">
                            <h1 class="hours">00</h1>
                            <span class="smalltext"><?php echo esc_html__( 'Hours', 'umeetevent' )?></span>
                            </li>
                            <li class="clockdiv-single clockdiv-minute">
                            <h1 class="minutes">00</h1>
                            <span class="smalltext"><?php echo esc_html__( 'Mins', 'umeetevent' )?></span>
                            </li>
                        </ul>
                        
                        <div class="clockdiv-content text-center">
                            <p class="h4 primary-text2 mb-2 "><span class="datetime"><?php echo $settings['event_date']; ?></span><?php echo  esc_html__(' in ', 'umeetevent') . $settings['event_address']; ?></p>
                            <?php
                                if( !empty( $settings['event_ticket_btn'] ) ){
                                    echo '<a class="button button-link" href="'. esc_url( $settings['event_ticket_btn_url']['url'] ) .'">'. esc_html( $settings['event_ticket_btn'] ) .'</a>';
                                }
                            ?>
                        </div>
                    </div>
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
            function getTimeRemaining(endtime){
            var t = Date.parse(endtime) - Date.parse(new Date());
            var seconds = Math.floor( (t/1000) % 60 );
            var minutes = Math.floor( (t/1000/60) % 60 );
            var hours = Math.floor( (t/(1000*60*60)) % 24 );
            var days = Math.floor( t/(1000*60*60*24) );
            return {
                'total': t,
                'days': days,
                'hours': hours,
                'minutes': minutes,
                'seconds': seconds
            };
            }

            function initializeClock(id, endtime){
            var clock = document.getElementById(id);
            var daysSpan = clock.querySelector('.days');
            var hoursSpan = clock.querySelector('.hours');
            var minutesSpan = clock.querySelector('.minutes');
            var secondsSpan = clock.querySelector('.seconds');

            function updateClock(){
                var t = getTimeRemaining(endtime);

                daysSpan.innerHTML = t.days;
                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
                secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

                if(t.total<=0){
                clearInterval(timeinterval);
                }
            }

            updateClock();
            var timeinterval = setInterval(updateClock,1000);
            }

            var deadline = $('.clockdiv-content .datetime').text();

            initializeClock('clockdiv', deadline);

        })(jQuery);
        </script>
        <?php 
        }
    }


	
}
