<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<div class="text-center m-b-md">
	<img src="<?php echo get_template_directory_uri() . '/images/gplat-logo.png';?>" title="" alt="" />
	<h3><?php _e( 'Risultati della ricerca: ', 'gplat' ) ?><strong><?php echo get_search_query(); ?></strong></h3>
</div>
<?php twentyfifteen_post_thumbnail(); ?>
<div class="list-group ">
<?php
	while ( have_posts() ) : the_post();
?>
	<a class="list-group-item" href="<?php echo esc_url( get_permalink() ); ?>" style="background:#fff;">
		<h5 class="list-group-item-heading"><strong><?php the_title(); ?></strong></h5>
		<p class="list-group-item-text"><?php the_excerpt(); ?></p>
	</a>
<?php
	endwhile;
	the_posts_pagination( array(
		'prev_text'          => __( 'Previous page', 'twentyfifteen' ),
		'next_text'          => __( 'Next page', 'twentyfifteen' ),
		'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>',
	) );
?>
</div>
<div class="hpanel">
	<div class="panel-body">
		<?php get_search_form(); ?>
	</div>
</div>