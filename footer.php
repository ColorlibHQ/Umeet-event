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

/**
 * Footer Area
 *
 * @Footer
 * @Back To Top Button
 *
 * @Hook umeetevent_footer
 *
 * @Hooked  umeetevent_footer_area 10
 * @Hooked  umeetevent_back_to_top 20
 *
 */

do_action( 'umeetevent_footer' );

wp_footer(); 
?>
</body>
</html>