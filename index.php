<?php
	get_header();
?>

<?php include 'header-default.php'; ?>

	<div class="content animate-panel">
		<div class="row">
            <div class="col-lg-12 text-center m-t-md">

<?php if ( have_posts() ) : ?>
<?php 	if ( is_home() && ! is_front_page() ) : ?>
				<h2><?php single_post_title(); ?></h2>
<?php 	endif; ?>
<?php 	while ( have_posts() ) : the_post(); ?>
<?php 		get_template_part( 'content', get_post_format() ); ?>
<?php	endwhile; ?>
<?php	the_posts_pagination( array(
			'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
			'next_text'          => __( 'Next page', 'twentyfifteen' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
		) );
	else :
		get_template_part( 'content', 'none' );
	endif; ?>

</div>
        </div>	
	</div>

<?php get_footer(); ?>