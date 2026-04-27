<?php
get_header(); ?>

<?php get_template_part( 'block-site-title' ); ?>

<?php do_action( 'tokopress_before_inner_content' ); ?>

	<section class="content-area" id="content">
		<div id="container">
	    <div class="blogs">

			<?php get_template_part( 'content', '404' ); ?>

	    </div>
	    </div>
	</section>

<?php do_action( 'tokopress_after_inner_content' ); ?>

<?php get_footer(); ?>
