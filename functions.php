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
 * Define constant
 *
 */
 
// Base URI
if( ! defined( 'UMEET_EVENT_DIR_URI' ) ) {
	define( 'UMEET_EVENT_DIR_URI', get_template_directory_uri().'/' );
}

// assets URI
if( ! defined( 'UMEET_EVENT_DIR_ASSETS_URI' ) ) {
	define( 'UMEET_EVENT_DIR_ASSETS_URI', UMEET_EVENT_DIR_URI.'assets/' );
}

// Css File URI
if( ! defined( 'UMEET_EVENT_DIR_CSS_URI' ) ) {
	define( 'UMEET_EVENT_DIR_CSS_URI', UMEET_EVENT_DIR_ASSETS_URI .'css/' );
}

// Js File URI
if( ! defined( 'UMEET_EVENT_DIR_JS_URI' ) ) {
	define( 'UMEET_EVENT_DIR_JS_URI', UMEET_EVENT_DIR_ASSETS_URI .'js/' );
}

// Base Directory
if( ! defined( 'UMEET_EVENT_DIR_PATH' ) ) {
	define( 'UMEET_EVENT_DIR_PATH', get_parent_theme_file_path().'/' );
}

//Inc Folder Directory
if( ! defined( 'UMEET_EVENT_DIR_PATH_INC' ) ) {
	define( 'UMEET_EVENT_DIR_PATH_INC', UMEET_EVENT_DIR_PATH.'inc/' );
}

//UmeetEvent libraries Folder Directory
if( ! defined( 'UMEET_EVENT_DIR_PATH_LIBS' ) ) {
	define( 'UMEET_EVENT_DIR_PATH_LIBS', UMEET_EVENT_DIR_PATH_INC.'libraries/' );
}

//Classes Folder Directory
if( ! defined( 'UMEET_EVENT_DIR_PATH_CLASSES' ) ) {
	define( 'UMEET_EVENT_DIR_PATH_CLASSES', UMEET_EVENT_DIR_PATH_INC.'classes/' );
}

//Hooks Folder Directory
if( ! defined( 'UMEET_EVENT_DIR_PATH_HOOKS' ) ) {
	define( 'UMEET_EVENT_DIR_PATH_HOOKS', UMEET_EVENT_DIR_PATH_INC.'hooks/' );
}

//Widgets Folder Directory
if( ! defined( 'UMEET_EVENT_DIR_PATH_WIDGET' ) ) {
	define( 'UMEET_EVENT_DIR_PATH_WIDGET', UMEET_EVENT_DIR_PATH_INC.'widgets/' );
}




/**
 * Include File
 *
 */


require_once( UMEET_EVENT_DIR_PATH_INC . 'umeetevent-companion/umeetevent-companion.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'breadcrumbs.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'category-meta.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'widgets-reg.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'wp_bootstrap_navwalker.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'umeetevent-functions.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'commoncss.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'support-functions.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'wp-html-helper.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'customizer/customizer.php' );
require_once( UMEET_EVENT_DIR_PATH_CLASSES . 'Class-Enqueue.php' );
require_once( UMEET_EVENT_DIR_PATH_CLASSES . 'Class-Config.php' );
require_once( UMEET_EVENT_DIR_PATH_HOOKS . 'hooks.php' );
require_once( UMEET_EVENT_DIR_PATH_HOOKS . 'hooks-functions.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'class-epsilon-dashboard-autoloader.php' );
require_once( UMEET_EVENT_DIR_PATH_INC . 'class-epsilon-init-dashboard.php' );


/**
 * Instantiate UmeetEvent object
 *
 * Inside this object:
 * Enqueue scripts, Google font, Theme support features, Epsilon Dashboard .
 *
 */
//

$obj = new UmeetEvent();






// User profile settings
add_action( 'wp_ajax_course_star_review', 'umeetevent_course_star_review' );
add_action( 'wp_ajax_nopriv_course_star_review', 'umeetevent_course_star_review' );
function umeetevent_course_star_review() {

	if( isset( $_POST['userdata'] ) ){
		if( is_user_logged_in() ){

			parse_str( $_POST['userdata'], $getData );

			$userdata = get_user_by( 'id',  $getData['userid'] );
			$time = current_time('mysql');
		
			$data = array(
				'comment_post_ID' => absint( $getData['postid'] ),
				'comment_author' => $userdata->data->user_login,
				'comment_author_email' => $userdata->data->user_email,
				'comment_content' => wp_kses_post( $getData['feedback'] ),
				'user_id' => $userdata->data->ID,
				'comment_date' => $time,
				'comment_approved' => 1,
			);

			$commentsId = wp_insert_comment($data);


			$args = array(
				'post_id' => absint( $getData['postid'] ),   // Use post_id, not post_ID
			);
			$reviews = get_comments( $args );
			 $reviewCount = count( $reviews );

			$avgreview = get_post_meta( absint( $getData['postid'] ), 'umeetevent_course_avgreview', true );

			$avgreview =  $avgreview +  $getData['ratingvalue'];

			update_post_meta( absint( $getData['postid'] ), 'umeetevent_course_avgreview', $avgreview );

			update_comment_meta( absint( $commentsId ), 'umeetevent_course_review', $getData['ratingvalue'] );

			echo 'success';
		}else{
			echo 'Error';
		}


	}


	die();
}