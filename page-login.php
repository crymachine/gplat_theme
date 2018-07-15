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
					<h3>AUTENTICAZIONE UTENTE</h3>
					<small>Autenticazione alla piattaforma GPLAT</small>
				</div>
				<div class="hpanel">
					<div class="panel-body">
						<form action="<?php echo esc_url( site_url( 'wp-login.php', 'login_post' ) ); ?>" name="loginform" id="loginForm" method="post">
							<div class="form-group">
								<label class="control-label" for="username">Username</label>
								<input type="text" placeholder="example@gmail.com" title="Please enter you username" required="" value="" name="log" id="user_login" class="form-control">
								<span class="help-block small">Your unique username to app</span>
							</div>
							<div class="form-group">
								<label class="control-label" for="password">Password</label>
								<input type="password" title="Please enter your password" placeholder="******" required="" value="" name="pwd" id="user_pass" class="form-control">
								<span class="help-block small">Yur strong password</span>
							</div>
							<div class="checkbox">
								<input type="checkbox" class="i-checks" checked name="rememberme" id="rememberme"> Remember login
								<p class="help-block small">(if this is a private computer)</p>
							</div>
							<button type="sumbit" name="wp-submit" id="wp-submit" class="btn btn-success btn-block">Login</button>
							<!-- <a class="btn btn-default btn-block" href="#">Register</a> -->
						</form>
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
