<div id="header">
	<div class="color-line"></div>
	<div id="logo" class="light-version">
		<img src="<?php echo get_template_directory_uri() . '/images/gplat-logo.png'; ?>" style="width:120px;height:auto;" title="GPLAT" alt="GPLAT" />
	</div>
	<nav role="navigation">
		<div class="header-link hide-menu"><i class="fa fa-bars"></i></div>
		<div class="small-logo">
			<span class="text-primary"><img src="<?php echo gplat_dir_url . '/'; ?>" title="GPLAT" alt="GPLAT" /></span>
		</div>
		<form role="search" class="navbar-form-custom" method="get" action="<?php home_url(); ?>">
			<div class="form-group">
				<input type="text" name="s" id="search" placeholder="<?php _e('Cerca...', 'gplat'); ?>" value="<?php the_search_query(); ?>" class="form-control">
			</div>
		</form>
		<div class="mobile-menu">
			<button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
				<i class="fa fa-chevron-down"></i>
			</button>
			<div class="collapse mobile-navbar" id="mobile-collapse">
				<ul class="nav navbar-nav">
					<li>
						<a class="" href="login.html">Login</a>
					</li>
					<li>
						<a class="" href="login.html">Logout</a>
					</li>
					<li>
						<a class="" href="profile.html">Profile</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<aside id="menu">
	<div id="navigation">
		<div class="profile-picture">
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo get_avatar_url(wp_get_current_user()->ID) ; ?>" class="img-circle m-b" alt="logo">
			</a>

			<div class="stats-label text-color">
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" data-toggle="dropdown">
						<?php echo wp_get_current_user()->display_name ;?><br/><b class="caret"></b>
					</a>
					<ul class="dropdown-menu animated m-t-xs">
						<li><a href="contacts.html">Contacts</a></li>
						<li><a href="profile.html">Profile</a></li>
						<li class="divider"></li>
					<?php if(current_user_can('administrator')) :?>
						<li><a href="<?php echo admin_url(); ?>"><?php _e('Amministrazione', 'gplat'); ?></a></li>
					<?php endif; ?>
						<li><a href="<?php echo home_url() . '/notify-bug'; ?>"><?php _e('Segnala un bug', 'gplat'); ?></a></li>
						<li class="divider"></li>
						<li><a href="<?php echo wp_logout_url(); ?>"><?php _e('Esci', 'gplat'); ?></a></li>
					</ul>
				</div>

			</div>
		</div>
		<?php get_sidebar('Main Menu'); ?>
	</div>
</aside>

<div id="wrapper">