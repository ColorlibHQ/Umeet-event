<?php 
/**
 * @Packge     : UmeetEvent Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( ! defined( 'WPINC' ) ) {
    die;
}

// Add Image Size
add_image_size( 'umeetevent_535x270', 260, 180, true );
add_image_size( 'events_265x220', 265, 220, true );
add_image_size( 'popularCourse_thum', 265, 200, true );
add_image_size( 'event_single_750x300', 750, 300, true );
add_image_size( 'course_single_img', 750, 350, true );


// Instagram object Instance
function umeetevent_instagram_instance() {
    
    $api = Wpzoom_Instagram_Widget_API::getInstance();

    return $api;
}

// Blog Section
function umeetevent_blog_section( $postnumber ) {
     
    $date_format = get_option( 'date_format' );

    $args = array(
        'post_type'      => 'post',
        'posts_per_page' => esc_html( $postnumber ),
    );
    
    $query = new WP_Query( $args );
    
    if( $query->have_posts() ):
        while( $query->have_posts() ):
            $query->the_post();
            ?>
            <div class="card-blog">
                <?php
                if( has_post_thumbnail() ) {
                    echo '<div class="thumb">';
                        the_post_thumbnail( 'umeetevent_535x270', array( 'class' => 'card-img' ) );
                    echo '</div>';
                }
                ?>
                <div class="blog-body">
                    <a href="<?php the_permalink(); ?>">
                        <h3><?php the_title(); ?></h3>
                    </a>
                    <ul class="blog-info">
                    <li><a href="<?php echo umeetevent_blog_date_permalink(); ?>"><i class="ti-time"></i><?php echo get_the_date( get_option('date_formate') ) ?></a></li>
                    <li><i class="ti-comments-smiley"></i><?php echo umeetevent_posted_comments() ?></li>
                    </ul>
                </div>
            </div>
            <?php
        endwhile;
        wp_reset_postdata();
    endif;
}

// 
function umeetevent_section_heading( $title = '', $subtitle = '' ) {
    if( $title || $subtitle ):
    ?>
        <div class="row d-flex justify-content-center">
            <div class="menu-content pb-70 col-lg-8">
                <div class="title text-center">
                <?php 
                    // Title
                    if( $title ){
                        echo umeetevent_heading_tag(
                            array(
                                'tag'    => 'h1',
                                'class'  => 'mb-10',
                                'text'   => esc_html( $title ),
                            )
                        );
                    }
                    // Sub Title
                    if( $subtitle ){
                        echo umeetevent_paragraph_tag(
                            array(
                                'text'  => esc_html( $subtitle ),
                            )
                        );
                    }
                    ?>
                </div>
            </div>
        </div>
    <?php
    endif;
}

// Set contact form 7 default form template
function umeetevent_contact7_form_content( $template, $prop ) {
    
    if ( 'form' == $prop ) {

        $template =
            '<div class="row"><div class="col-12"><div class="form-group">[textarea* your-message id:message class:form-control class:w-100 rows:9 cols:30 placeholder "Message"]</div></div><div class="col-sm-6"><div class="form-group">[text* your-name id:name class:form-control placeholder "Enter your  name"]</div></div><div class="col-sm-6"><div class="form-group">[email* your-email id:email class:form-control placeholder "Enter your email"]</div></div><div class="col-12"><div class="form-group">[text your-subject id:subject class:form-control placeholder "Subject"]</div></div></div><div class="form-group mt-3">[submit class:button class:button-contactForm "Send Message"]</div>';

        return $template;

    } else {
    return $template;
    } 
}
add_filter( 'wpcf7_default_template', 'umeetevent_contact7_form_content', 10, 2 );





// Post View set
function umeetevent_set_post_views($postID) {
	$count_key = 'umeetevent_post_views_count';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}


// Elementor Custom Icon
function jet_modify_controls( $controls_registry ) {
	// Get existing icons
	$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );
	// Append new icons
	$new_icons = array_merge(
		array(
			'flaticon-prize' => 'Prize',
			'flaticon-earth-globe' => 'Globe',
			'flaticon-sing' => 'Sing',
		),
		$icons
	);
	// Then we set a new list of icons as the options of the icon control
	$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
}
add_action( 'elementor/controls/controls_registered', 'jet_modify_controls', 10, 1 );

// Schedule Tab data
function return_tab_data( $getTags, $schedules ) {


	$y = [];
	foreach ( $getTags as $val ) {

		$t = [];

		foreach( $schedules as $data ) {
			if( $data['label'] == $val ) {
				$t[] = $data;
			}
		}

		$y[$val] = $t;

	}

	return $y;
}