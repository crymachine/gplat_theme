<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) || is_active_sidebar( 'sidebar-1' )  ) : ?>

	<?php if ( has_nav_menu( 'primary' ) ) : ?>
		<?php
			wp_nav_menu(array(
				'items_wrap'		=> '<ul id="side-menu" class="nav">%3$s</ul>', 
				'walker'			=> new gplat_nav_walker(),
				
			));
		?>
	<?php endif; ?>

	<?php if ( has_nav_menu( 'social' ) ) : ?>
		<nav id="social-navigation" class="social-navigation" role="navigation">
			<?php
				// Social links navigation menu.
				wp_nav_menu( array(
					'theme_location' => 'social',
					'depth'          => 1,
					'link_before'    => '<span class="screen-reader-text">',
					'link_after'     => '</span>',
				) );
			?>
		</nav><!-- .social-navigation -->
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="widget-area" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</div><!-- .widget-area -->
	<?php endif; ?>

<?php endif; ?>