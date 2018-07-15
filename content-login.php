<?php
/**
 * The template used for displaying page content
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>

<div class="text-center m-b-md">
	<?php the_title( '<h3>', '</h3>' ); ?>
	<small>This is the best app ever!</small>
</div>
<div class="hpanel">
	<div class="panel-body">
		<?php the_content('<p>', '</p>'); ?>
		<form action="#" id="loginForm">
			<?php twentyfifteen_post_thumbnail(); ?>
			<?php wp_login_form( array('redirect' => home_url()) ); ?>
			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentyfifteen' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentyfifteen' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
			<?php edit_post_link( __( 'Edit', 'twentyfifteen' ), '', '' ); ?>
		</form>
	</div>
</div>