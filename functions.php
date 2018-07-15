<?php
/**
 * Twenty Fifteen functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Twenty Fifteen 1.0
 */
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}


/**
 * Redirect to login page if not authenticated
 *
 * @since gplat 1.0
 */
add_action( 'template_redirect', function() {
    if(!is_page('login') && !is_user_logged_in()) {
        wp_redirect( site_url( '/login' ) );
        exit();
    }
});

add_action('admin_init', function() {
	if(!current_user_can('administrator')) {
		wp_redirect( home_url() );
	} 
});

/**
 * Twenty Fifteen only works in WordPress 4.1 or later.
 */
if ( version_compare( $GLOBALS['wp_version'], '4.1-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

add_filter('body_class', function($classes) {
    return array_merge($classes, array(
		//'fixed-navbar', 
		//'fixed-sidebar', 
		//'fixed-footer', 
		//'fixed-small-header', 
		//'sidebar-scroll'
	));
});

show_admin_bar( false );


/**
 * Redirect user after successful login.
 *
 * @param string $redirect_to URL to redirect to.
 * @param string $request URL the user is coming from.
 * @param object $user Logged user's data.
 * @return string
 */
function my_login_redirect( $redirect_to, $request, $user ) {
	$redirect_to = home_url();
    if (isset($user->roles) && is_array($user->roles) && in_array('administrator', $user->roles)) {
		$redirect_to = admin_url();
    }
    return $redirect_to;
}
add_filter( 'login_redirect', 'my_login_redirect', 10, 3 );

if ( ! function_exists( 'twentyfifteen_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/twentyfifteen
	 * If you're building a theme based on twentyfifteen, use a find and replace
	 * to change 'twentyfifteen' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'gplat' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 825, 510, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'twentyfifteen' ),
		'social'  => __( 'Social Links Menu', 'twentyfifteen' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
	) );

	/*
	 * Enable support for custom logo.
	 *
	 * @since Twenty Fifteen 1.5
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 248,
		'width'       => 248,
		'flex-height' => true,
	) );

	$color_scheme  = twentyfifteen_get_color_scheme();
	$default_color = trim( $color_scheme[0], '#' );

	// Setup the WordPress core custom background feature.

	/**
	 * Filter Twenty Fifteen custom-header support arguments.
	 *
	 * @since Twenty Fifteen 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-color     		Default color of the header.
	 *     @type string $default-attachment     Default attachment of the header.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'twentyfifteen_custom_background_args', array(
		'default-color'      => $default_color,
		'default-attachment' => 'fixed',
	) ) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', 'genericons/genericons.css', twentyfifteen_fonts_url() ) );

	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // twentyfifteen_setup
add_action( 'after_setup_theme', 'twentyfifteen_setup' );

/**
 * Register widget area.
 *
 * @since Twenty Fifteen 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function twentyfifteen_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Widget Area', 'twentyfifteen' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'twentyfifteen' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'twentyfifteen_widgets_init' );

if ( ! function_exists( 'twentyfifteen_fonts_url' ) ) :
/**
 * Register Google fonts for Twenty Fifteen.
 *
 * @since Twenty Fifteen 1.0
 *
 * @return string Google fonts URL for the theme.
 */
function twentyfifteen_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Sans font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Sans:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Noto Serif, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Noto Serif font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Noto Serif:400italic,700italic,400,700';
	}

	/*
	 * Translators: If there are characters in your language that are not supported
	 * by Inconsolata, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'twentyfifteen' ) ) {
		$fonts[] = 'Inconsolata:400,700';
	}

	/*
	 * Translators: To add an additional character subset specific to your language,
	 * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
	 */
	$subset = _x( 'no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'twentyfifteen' );

	if ( 'cyrillic' == $subset ) {
		$subsets .= ',cyrillic,cyrillic-ext';
	} elseif ( 'greek' == $subset ) {
		$subsets .= ',greek,greek-ext';
	} elseif ( 'devanagari' == $subset ) {
		$subsets .= ',devanagari';
	} elseif ( 'vietnamese' == $subset ) {
		$subsets .= ',vietnamese';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;

/**
 * JavaScript Detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since Twenty Fifteen 1.1
 */
function twentyfifteen_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}
add_action( 'wp_head', 'twentyfifteen_javascript_detection', 0 );

/**
 * Enqueue scripts and styles.
 *
 * @since Twenty Fifteen 1.0
 */
function twentyfifteen_scripts() {
	wp_enqueue_script('gplat-jquery-script', get_template_directory_uri() . '/vendor/jquery/dist/jquery.min.js', array(), '1.0', true);
	wp_enqueue_script('gplat-jquery-ui', get_template_directory_uri() . '/vendor/jquery-ui/jquery-ui.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-slimscroll', get_template_directory_uri() . '/vendor/slimScroll/jquery.slimscroll.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-bootstrap', get_template_directory_uri() . '/vendor/bootstrap/dist/js/bootstrap.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-flot', get_template_directory_uri() . '/vendor/jquery-flot/jquery.flot.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-flot-resize', get_template_directory_uri() . '/vendor/jquery-flot/jquery.flot.resize.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-flot-pie', get_template_directory_uri() . '/vendor/jquery-flot/jquery.flot.pie.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-curvedLines', get_template_directory_uri() . '/vendor/flot.curvedlines/curvedLines.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-flot-spline', get_template_directory_uri() . '/vendor/jquery.flot.spline/index.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-metisMenu', get_template_directory_uri() . '/vendor/metisMenu/dist/metisMenu.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-icheck', get_template_directory_uri() . '/vendor/iCheck/icheck.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-peity', get_template_directory_uri() . '/vendor/peity/jquery.peity.min.js', array(), '1.0', true);
	wp_enqueue_script('gplat-sparkline', get_template_directory_uri() . '/vendor/sparkline/index.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-moment', get_template_directory_uri() . '/vendor/moment/min/moment.min.js', array(), '1.0', true);
	wp_enqueue_script('gplat-fullcalendar', get_template_directory_uri() . '/vendor/fullcalendar/dist/fullcalendar.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-dataTables', get_template_directory_uri() . '/vendor/datatables/media/js/jquery.dataTables.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-dataTables-bootstrap', get_template_directory_uri() . '/vendor/datatables.net-bs/js/dataTables.bootstrap.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-pdfmake', get_template_directory_uri() . '/vendor/pdfmake/build/pdfmake.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-vfs_fonts', get_template_directory_uri() . '/vendor/pdfmake/build/vfs_fonts.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-buttons-html5', get_template_directory_uri() . '/vendor/datatables.net-buttons/js/buttons.html5.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-buttons-print', get_template_directory_uri() . '/vendor/datatables.net-buttons/js/buttons.print.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-datatable-buttons', get_template_directory_uri() . '/vendor/datatables.net-buttons/js/dataTables.buttons.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-buttons-bootstrap', get_template_directory_uri() . '/vendor/datatables.net-buttons-bs/js/buttons.bootstrap.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-datatables-numeral', '//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-bootstrap-editable', get_template_directory_uri() . '/vendor/xeditable/bootstrap3-editable/js/bootstrap-editable.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-select2', get_template_directory_uri() . '/vendor/select2-3.5.2/select2.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-jquery-bootstrap-touchspin', get_template_directory_uri() . '/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-bootstrap-datepicker', get_template_directory_uri() . '/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-bootstrap-clockpicker', get_template_directory_uri() . '/vendor/clockpicker/dist/bootstrap-clockpicker.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-bootstrap-datetimepicker', get_template_directory_uri() . '/vendor/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js', array('gplat-jquery-script'), '1.0', true);
	wp_enqueue_script('gplat-summernote', get_template_directory_uri() . '/vendor/summernote/dist/summernote.min.js', array('gplat-jquery-script'), '1.0', true);

	wp_enqueue_script('gplat-homer', get_template_directory_uri() . '/scripts/homer.js', array('gplat-jquery-script'), '1.0', true);
	
	

	wp_enqueue_style('gplat-font-awesome', get_template_directory_uri() . '/vendor/fontawesome/css/font-awesome.css');
	wp_enqueue_style('gplat-metisMenu', get_template_directory_uri() . '/vendor/metisMenu/dist/metisMenu.css');
	wp_enqueue_style('gplat-animate', get_template_directory_uri() . '/vendor/animate.css/animate.css');
	wp_enqueue_style('gplat-bootstrap', get_template_directory_uri() . '/vendor/bootstrap/dist/css/bootstrap.css');
    wp_enqueue_style('gplat-summernote', get_template_directory_uri() . '/vendor/summernote/dist/summernote.css');
    wp_enqueue_style('gplat-summernote-bs3', get_template_directory_uri() . '/vendor/summernote/dist/summernote-bs3.css');
    wp_enqueue_style('gplat-bootstrap-editable', get_template_directory_uri() . '/vendor/xeditable/bootstrap3-editable/css/bootstrap-editable.css');
    wp_enqueue_style('gplat-select2', get_template_directory_uri() . '/vendor/select2-3.5.2/select2.css');
    wp_enqueue_style('gplat-select2-bootstrap', get_template_directory_uri() . '/vendor/select2-bootstrap/select2-bootstrap.css');
    wp_enqueue_style('gplat-jquery-bootstrap-touchspin', get_template_directory_uri() . '/vendor/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css');
    wp_enqueue_style('gplat-bootstrap-datepicker3', get_template_directory_uri() . '/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css');
    wp_enqueue_style('gplat-awesome-bootstrap-checkbox', get_template_directory_uri() . '/vendor/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css');
    wp_enqueue_style('gplat-bootstrap-clockpicker', get_template_directory_uri() . '/vendor/clockpicker/dist/bootstrap-clockpicker.min.css');
    wp_enqueue_style('gplat-bootstrap-datetimepicker', get_template_directory_uri() . '/vendor/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css');
	wp_enqueue_style('gplat-pe-icon-7-stroke', get_template_directory_uri() . '/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css');
	wp_enqueue_style('gplat-pe-icon-7-stroke-helper', get_template_directory_uri() . '/fonts/pe-icon-7-stroke/css/helper.css');
	wp_enqueue_style('gplat-fullcalendar-print', get_template_directory_uri() . '/vendor/fullcalendar/dist/fullcalendar.print.css', array(), false, 'print');
	wp_enqueue_style('gplat-fullcalendar', get_template_directory_uri() . '/vendor/fullcalendar/dist/fullcalendar.min.css');
	wp_enqueue_style('gplat-datatable-bootstrap', get_template_directory_uri() . '/vendor/datatables.net-bs/css/dataTables.bootstrap.min.css');
	wp_enqueue_style('gplat-style', get_template_directory_uri() . '/styles/style.css');

	wp_localize_script( 'twentyfifteen-script', 'screenReaderText', array(
		'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'twentyfifteen' ) . '</span>',
		'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'twentyfifteen' ) . '</span>',
	) );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_scripts' );

/**
 * Add preconnect for Google Fonts.
 *
 * @since Twenty Fifteen 1.7
 *
 * @param array   $urls          URLs to print for resource hints.
 * @param string  $relation_type The relation type the URLs are printed.
 * @return array URLs to print for resource hints.
 */
function twentyfifteen_resource_hints( $urls, $relation_type ) {
	if ( wp_style_is( 'twentyfifteen-fonts', 'queue' ) && 'preconnect' === $relation_type ) {
		if ( version_compare( $GLOBALS['wp_version'], '4.7-alpha', '>=' ) ) {
			$urls[] = array(
				'href' => 'https://fonts.gstatic.com',
				'crossorigin',
			);
		} else {
			$urls[] = 'https://fonts.gstatic.com';
		}
	}

	return $urls;
}
add_filter( 'wp_resource_hints', 'twentyfifteen_resource_hints', 10, 2 );

/**
 * Add featured image as background image to post navigation elements.
 *
 * @since Twenty Fifteen 1.0
 *
 * @see wp_add_inline_style()
 */
function twentyfifteen_post_nav_background() {
	if ( ! is_single() ) {
		return;
	}

	$previous = ( is_attachment() ) ? get_post( get_post()->post_parent ) : get_adjacent_post( false, '', true );
	$next     = get_adjacent_post( false, '', false );
	$css      = '';

	if ( is_attachment() && 'attachment' == $previous->post_type ) {
		return;
	}

	if ( $previous &&  has_post_thumbnail( $previous->ID ) ) {
		$prevthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $previous->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-previous { background-image: url(' . esc_url( $prevthumb[0] ) . '); }
			.post-navigation .nav-previous .post-title, .post-navigation .nav-previous a:hover .post-title, .post-navigation .nav-previous .meta-nav { color: #fff; }
			.post-navigation .nav-previous a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	if ( $next && has_post_thumbnail( $next->ID ) ) {
		$nextthumb = wp_get_attachment_image_src( get_post_thumbnail_id( $next->ID ), 'post-thumbnail' );
		$css .= '
			.post-navigation .nav-next { background-image: url(' . esc_url( $nextthumb[0] ) . '); border-top: 0; }
			.post-navigation .nav-next .post-title, .post-navigation .nav-next a:hover .post-title, .post-navigation .nav-next .meta-nav { color: #fff; }
			.post-navigation .nav-next a:before { background-color: rgba(0, 0, 0, 0.4); }
		';
	}

	wp_add_inline_style( 'twentyfifteen-style', $css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_post_nav_background' );

/**
 * Display descriptions in main navigation.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string  $item_output The menu item output.
 * @param WP_Post $item        Menu item object.
 * @param int     $depth       Depth of the menu.
 * @param array   $args        wp_nav_menu() arguments.
 * @return string Menu item with possible description.
 */
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	if ( 'primary' == $args->theme_location && $item->description ) {
		$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	}

	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );

/**
 * Add a `screen-reader-text` class to the search form's submit button.
 *
 * @since Twenty Fifteen 1.0
 *
 * @param string $html Search form HTML.
 * @return string Modified search form HTML.
 */
function twentyfifteen_search_form_modify( $html ) {
	return str_replace( 'class="search-submit"', 'class="search-submit screen-reader-text"', $html );
}
add_filter( 'get_search_form', 'twentyfifteen_search_form_modify' );

/**
 * Modifies tag cloud widget arguments to display all tags in the same font size
 * and use list format for better accessibility.
 *
 * @since Twenty Fifteen 1.9
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array The filtered arguments for tag cloud widget.
 */
function twentyfifteen_widget_tag_cloud_args( $args ) {
	$args['largest']  = 22;
	$args['smallest'] = 8;
	$args['unit']     = 'pt';
	$args['format']   = 'list';

	return $args;
}
add_filter( 'widget_tag_cloud_args', 'twentyfifteen_widget_tag_cloud_args' );


/**
 * Implement the Custom Header feature.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 *
 * @since Twenty Fifteen 1.0
 */
require get_template_directory() . '/inc/customizer.php';



/**
 * Custom navigation_walker for menu
 */
class gplat_nav_walker extends Walker_Nav_Menu {
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= '<ul class="nav nav-second-level">';
	}
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n</ul></li>";
	}
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp;
		$cu = join('', explode('/', home_url( $wp->request )));
		$u =  join('', explode('/', $item->url));

		$my_wp_query = new WP_Query();
		$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));
		$page_children = get_page_children( $item->ID, $all_wp_pages );

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        		? ' href="'   . esc_attr( $item->url 		        ) .'"' : '';
		$output .= '<li id="' . $item->ID . '" ' . ($cu == $u ? 'class="active"' : '') . '><a'. $attributes .'><span>' . apply_filters( 'the_title', $item->title, $item->ID ) . '</span></a>';
	}
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "\n";
	}
}

function gplat_get_realestate_category_type_by_parent($parent_id) {
	$curl = curl_init();
	$url = gplat_dir_url . 'services/domains-service.php?service=gplat_get_realestate_category_type_by_parent&parent_id=' . $parent_id;
	curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);
	return $result;
}