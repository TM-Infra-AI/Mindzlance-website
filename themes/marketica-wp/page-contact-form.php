<?php
/**
 * Template Name:Contact
 */

get_header(); ?>

<?php if ( of_get_option( 'tokopress_page_header_style' ) == 'outer' ) get_template_part( 'block-page-header-outer' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<section class="content-area" id="content">
		<div id="container">

		<?php if ( of_get_option( 'tokopress_page_header_style' ) != 'outer' ) get_template_part( 'block-page-header-inner' ); ?>

	    <div class="page-content contact-form">

			<?php if ( have_posts() ) : ?>

				<?php if( !of_get_option( 'tokopress_disable_contact_map' ) ) : ?>
				<div class="map-section map-block">
					<?php
						$latitude = of_get_option( 'tokopress_contact_lat' );
						$longitude = of_get_option( 'tokopress_contact_long' );

						$get_marker_title = of_get_option( 'tokopress_contact_marker_title' );
						$get_marker_content = of_get_option( 'tokopress_contact_marker_desc' );
						$get_zoom = 15;
					 ?>
						<script type="text/javascript">
							var map;
							jQuery(document).ready(function(){
							  map = new GMaps({
								el: '#map',
								lat: <?php $map_latitude = ( ! empty( $latitude ) ) ? $latitude : -6.903932 ; echo esc_attr( $map_latitude ); ?>,
								lng: <?php $map_longitude = ( ! empty( $longitude ) ) ? $longitude : 107.610344 ; echo esc_attr( $map_longitude ); ?>,
								zoom :<?php echo esc_attr( $get_zoom ); ?>,
								scrollwheel: false
							  });

							 <?php 	$marker_title = ( ! empty( $get_marker_title ) ) ? $get_marker_title : 'Marker Title' ;
									$clear_marker_title = str_replace( "\r\n", "<br/>", $marker_title );
											?>

							 <?php 	$marker_content = ( ! empty( $get_marker_content ) ) ? $get_marker_content : 'Marker Content' ;
									$clear_marker_content = str_replace( "\r\n", "<br/>", $marker_content );
									?>

							 var markerTitle = "<?php printf( '<h1>%s</h1>', $clear_marker_title ); ?>";
							 var markerContent = "<?php printf( '<p>%s</p>', $clear_marker_content ); ?>";

							 map.addMarker({
								lat: <?php echo esc_attr( $map_latitude ); ?>,
								lng: <?php echo esc_attr( $map_longitude ); ?>,
								title: 'Marker with InfoWindow',
								infoWindow: {
								  content: markerTitle + markerContent,

								}
							  });

							});
						</script>

				<!--	<div id="map" style="height:500px;"></div>-->
					<iframe width="100%" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15091.085752718956!2d-122.05516429550397!3d37.330433503891385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb44b6c2842cf%3A0xadfe6886bba98f44!2s20930%20Fargo%20Dr%2C%20Cupertino%2C%20CA%2095014%2C%20USA!5e0!3m2!1sen!2s!4v1571399523835!5m2!1sen!2s" 
					 height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>

				</div>
				<?php endif; ?>

				<?php while ( have_posts() ) : the_post(); ?>
					<?php if( "" != get_the_content() ): ?>

						<div id="page-<?php echo get_the_ID(); ?>" class="page-area">

							<?php the_content(); ?>

						</div><!-- Content Block -->

					<?php endif; ?>
				<?php endwhile; ?>

				<?php
			$current_page_id = $wp_query->get_queried_object_id();

				$args = array();

				$email = tokopress_get_post_meta( '_toko_contact_email', $current_page_id );
				if ( $email ) $args['email'] = $email;

				$subject = tokopress_get_post_meta( '_toko_contact_subject', $current_page_id );
				if ( $subject ) $args['subject'] = $subject;

				$sendcopy = tokopress_get_post_meta( '_toko_contact_sendcopy', $current_page_id );
				if ( $sendcopy ) $args['sendcopy'] = $sendcopy;

				$button_text = tokopress_get_post_meta( '_toko_contact_button', $current_page_id );
				if ( $button_text ) $args['button_text'] = $button_text;

				echo tokopress_get_contact_form( $args );
				?>
				<!-- Contact Form -->

			<?php else : ?>

				<?php get_template_part( 'content', '404' ); ?>

			<?php endif; ?>

	    </div>
		</div>
	</section>

<?php do_action( 'tokopress_after_inner_content' ); ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php get_footer(); ?>
