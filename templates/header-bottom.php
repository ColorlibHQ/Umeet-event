<?php 
$id     = get_the_ID();
$bgopt  = get_post_meta( absint( $id ), '_umeetevent_builderpage_headerimg', true );

$glob_class = ' global-banner';
$setbgurl   = '';

if ( $bgopt == 'featured' ) {
	$setbgurl  = get_the_post_thumbnail_url( absint( $id ) );
	$glob_class = '';
}
?>
<section class="relative hero-banner hero-banner-sm <?php echo esc_attr( $glob_class  ); ?>" <?php echo umeetevent_inline_bg_img( $setbgurl ); ?>>
	<?php 
	if( umeetevent_opt( 'umeetevent-headeroverlay-toggle-settings', true ) ) {
		echo '<div class="overlay overlay-bg"></div>';
	}
	?>
	
	<div class="container text-center">
		<div class="row d-flex align-items-center justify-content-center">
			<div class="about-content col-lg-12">
				<?php 
				if ( is_archive() ) {
					the_archive_title('<h2>', '</h2>');
				} elseif ( is_home() ) {
					echo '<h2>'.esc_html__( 'Blog', 'umeetevent' ).'</h2>';
				} elseif ( is_search() ) {
					echo '<h2>'.esc_html__( 'Search Result', 'umeetevent' ).'</h2>';
				} else {
					the_title( '<h2>', '</h2>' );
				} 
				
				// breadcrumbs
				echo umeetevent_breadcrumbs();
				?>
				
			</div>											
		</div>
	</div>
</section>
