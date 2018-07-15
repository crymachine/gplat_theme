<?php
/**
 * The template part for displaying a message that posts cannot be found
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

	<h3><?php _e( 'La ricerca non ha prodotto risultati', 'gplat' ); ?></h3>

<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>
	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentyfifteen' ), esc_url( admin_url( 'post-new.php' ) ) ); ?></p>
<?php elseif ( is_search() ) : ?>
	<small><?php _e( 'Spiacente, ma la ricerca non ha prodotto risultati. Prova ancora cercando utilizzando un\'altra parola.' , 'gplat' ); ?></small>
	<div class="hpanel">
		<div class="panel-body">
			<?php get_search_form(); ?>
		</div>
	</div>
<?php else : ?>
	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'twentyfifteen' ); ?></p>
	<?php get_search_form(); ?>
<?php endif; ?>
</div>