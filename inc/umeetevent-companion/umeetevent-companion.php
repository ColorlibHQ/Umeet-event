<?php
/**
 * @Packge     : UmeetEvent Companion
 * @Version    : 1.0
 * @Author     : Colorlib
 * @Author URI : http://colorlib.com/wp/
 *
 */

if( !defined( 'WPINC' ) ){
    die;
}

/*************************
    Define Constant
*************************/

// Define version constant
if( ! defined( 'UMEET_EVENT_COMPANION_VERSION' ) ) {
    define( 'UMEET_EVENT_COMPANION_VERSION', '1.0' );
}

// Define dir path constant
if( ! defined( 'UMEET_EVENT_COMPANION_DIR_PATH' ) ) {
    define( 'UMEET_EVENT_COMPANION_DIR_PATH', get_parent_theme_file_path().'/inc/umeetevent-companion/' );
}

// Define inc dir path constant
if( ! defined( 'UMEET_EVENT_COMPANION_INC_DIR_PATH' ) ) {
    define( 'UMEET_EVENT_COMPANION_INC_DIR_PATH', UMEET_EVENT_COMPANION_DIR_PATH . 'inc/' );
}

// Define sidebar widgets dir path constant
if( ! defined( 'UMEET_EVENT_COMPANION_SW_DIR_PATH' ) ) {
    define( 'UMEET_EVENT_COMPANION_SW_DIR_PATH', UMEET_EVENT_COMPANION_INC_DIR_PATH . 'sidebar-widgets/' );
}

// Define elementor widgets dir path constant
if( ! defined( 'UMEET_EVENT_COMPANION_EW_DIR_PATH' ) ) {
    define( 'UMEET_EVENT_COMPANION_EW_DIR_PATH', UMEET_EVENT_COMPANION_INC_DIR_PATH . 'elementor-widgets/' );
}

// Define CMB2 dir path constant
if( ! defined( 'UMEET_EVENT_COMPANION_CMB2_DIR_PATH' ) ) {
    define( 'UMEET_EVENT_COMPANION_CMB2_DIR_PATH', UMEET_EVENT_COMPANION_INC_DIR_PATH . 'CMB2/' );
}

// Define demo data dir path constant
if( ! defined( 'UMEET_EVENT_COMPANION_DEMO_DIR_PATH' ) ) {
    define( 'UMEET_EVENT_COMPANION_DEMO_DIR_PATH', UMEET_EVENT_COMPANION_INC_DIR_PATH . 'demo-data/' );
}

// Define plugin dir url constant
if( ! defined( 'UMEET_EVENT_THEME_DIR_URL' ) ) {
    define( 'UMEET_EVENT_THEME_DIR_URL', get_template_directory_uri() );
}

// Define inc dir url constant
if( ! defined( 'UMEET_EVENT_COMPANION_DIR_URL' ) ) {
    define( 'UMEET_EVENT_COMPANION_DIR_URL', UMEET_EVENT_THEME_DIR_URL . '/inc/umeetevent-companion/' );
}

// Define inc dir url constant
if( ! defined( 'UMEET_EVENT_COMPANION_INC_DIR_URL' ) ) {
    define( 'UMEET_EVENT_COMPANION_INC_DIR_URL', UMEET_EVENT_COMPANION_DIR_URL . 'inc/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'UMEET_EVENT_COMPANION_META_DIR_URL' ) ) {
    define( 'UMEET_EVENT_COMPANION_META_DIR_URL', UMEET_EVENT_COMPANION_INC_DIR_URL . 'umeetevent-meta/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'UMEET_EVENT_COMPANION_EW_DIR_URL' ) ) {
    define( 'UMEET_EVENT_COMPANION_EW_DIR_URL', UMEET_EVENT_COMPANION_INC_DIR_URL . 'elementor-widgets/' );
}

// Define elementor-widgets dir url constant
if( ! defined( 'UMEET_EVENT_COMPANION_DEMO_DIR_URL' ) ) {
    define( 'UMEET_EVENT_COMPANION_DEMO_DIR_URL', UMEET_EVENT_COMPANION_INC_DIR_URL . 'demo-data/' );
}



$current_theme = wp_get_theme();

$is_parent = $current_theme->parent();

if( ( 'UmeetEvent' ==  $current_theme->get( 'Name' ) ) || ( $is_parent && 'UmeetEvent' == $is_parent->get( 'Name' ) ) ) {
    require_once UMEET_EVENT_COMPANION_DIR_PATH . 'umeetevent-init.php';
} else {

    add_action( 'admin_notices', 'umeetevent_companion_admin_notice', 99 );
    function umeetevent_companion_admin_notice() {
        $url = 'https://wordpress.org/themes/umeetevent/';
    ?>
        <div class="notice-warning notice">
            <p><?php printf( __( 'In order to use the <strong>Umeet Event Companion</strong> plugin you have to also install the %1$sUmeetEvent Theme%2$s', 'umeetevent' ), '<a href="' . esc_url( $url ) . '" target="_blank">', '</a>' ); ?></p>
        </div>
        <?php
    }
}
