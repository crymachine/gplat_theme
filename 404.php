<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <link rel="shortcut icon" type="image/ico" href="favicon.ico" />
	<?php wp_head(); ?>
</head>

<body class="blank">
	<div class="splash">
		<div class="color-line"></div>
		<div class="splash-title">
			<h1><?php _e('Caricamento in corso...', 'gplat'); ?></h1>
			<p><?php _e('Attendere qualche istante, il sistema sta caricando la pagina.', 'gplat'); ?></p>
			<div class="spinner"><div class="rect1"></div> <div class="rect2"></div> <div class="rect3"></div> <div class="rect4"></div> <div class="rect5"></div></div>
		</div>
	</div>
	<!--[if lt IE 7]>
	<p class="alert alert-danger">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

	<div class="color-line"></div>
	<div class="login-container">
		<div class="row">

			<div class="col-md-12">
				<div class="text-center m-b-md">
					<img src="<?php echo get_template_directory_uri() . '/images/gplat-logo.png';?>" title="" alt="" />

					<h3><?php _e( 'Oops! That page can&rsquo;t be found.', 'twentyfifteen' ); ?></h3>
					<small><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'twentyfifteen' ); ?></small>
					
				</div>

				<div class="hpanel">
					<div class="panel-body">
						<?php get_search_form(); ?>
					</div>
				</div>

			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">
				<strong>GPLAT</strong> a <a href="https://www.wikiadv.com">wikiadv.com</a> web app
			</div>
		</div>
	</div>

<?php get_footer(); ?>