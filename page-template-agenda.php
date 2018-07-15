<?php
/**
 * Template Name: agenda
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
get_header();
include 'header-default.php'; ?>

<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>
	    	<h2 class="font-light m-b-xs"><?php _e('Agenda', gplat_textdomain); ?></h2>
            <small></small>
        </div>
    </div>
</div>
<div class="content">
	<div class="row">
		<div class="col-lg-12">
			<?php the_content(); ?>
			<div id="calendar"></div>
		</div>
	</div>
</div>

<?php get_footer(); ?>