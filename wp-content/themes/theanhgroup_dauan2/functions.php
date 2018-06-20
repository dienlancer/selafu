<?php
/**
@ Khai bao hang gia tri
	@ THEME_URL = lay duong dan thu muc theme
	@ CORE = lay duong dan cua thu muc /core
**/
define( 'THEME_URL', get_stylesheet_directory() );
define ( 'CORE', THEME_URL . "/core" );
/**
@ Nhung file /core/init.php
**/
require_once( CORE . "/init.php" );

/**
@ Khai bao chuc nang cua theme 
**/
if ( !function_exists('theanhgroup_theme_setup') ) {
	function theanhgroup_theme_setup() {

		/* Thiet lap textdomain */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'theanhgroup', $language_folder );
		/* Tu dong them link RSS len <head> **/
		add_theme_support( 'automatic-feed-links' );

		/* Them post thumbnail */
		add_theme_support( 'post-thumbnails' );
		
		/* Them title-tag */
		add_theme_support( 'title-tag' );

		/* Them menu */
		register_nav_menu( 'primary-menu', __('Primary Menu', 'theanhgroup') );

		/* Tao sidebar */
		$sidebar = array(
			'name' => __('Main Sidebar', 'theanhgroup'),
			'id' => 'main-sidebar',
			'description' => __('Default sidebar'),
			'class' => 'main-sidebar',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		);
		register_sidebar( $sidebar );

	}
	add_action( 'init', 'theanhgroup_theme_setup' );
}

/*--------
TEMPLATE FUNCTIONS */
if (!function_exists('theanhgroup_header')) {
	function theanhgroup_header() { ?>
		<div class="site-name">
			<?php
				global $tp_options;

				if( $tp_options['logo-on'] == 0 ) :
			?>
				<?php
					if ( is_home() ) {
						printf( '<h1><a href="%1$s" title="%2$s">%3$s</a></h1>',
						get_bloginfo('url'),
						get_bloginfo('description'),
						get_bloginfo('sitename') );
					} else {
						printf( '<p><a href="%1$s" title="%2$s">%3$s</a></p>',
						get_bloginfo('url'),
						get_bloginfo('description'),
						get_bloginfo('sitename') );			
					}
				?>

			<?php
				else : 
			?>
				<img src="<?php echo $tp_options['logo-image']['url']; ?>" />
		<?php endif; ?>
		</div>
		<div class="site-description"><?php bloginfo('description'); ?></div><?php 
	}
}

/**
Thiet lap menu
**/
if ( !function_exists('theanhgroup_menu') ) {
	function theanhgroup_menu($menu) {
		$menu = array(
			'theme_location' => $menu,
			'container' => '',
			'container_class' => '',
			'items_wrap' => '<ul>%3$s</ul>'
		);
		wp_nav_menu( $menu );
	}
}

/**
Ham tao phan trang don gian
**/
if ( !function_exists('theanhgroup_pagination') ) {
	function theanhgroup_pagination() {
		if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
			return '';
		} ?>
		<nav class="pagination" role="navigation">
			<?php if ( get_next_posts_link() ) : ?>
				<div class="prev"><?php next_posts_link( __('Older Posts', 'theanhgroup') ); ?></div>
			<?php endif; ?>
			<?php if ( get_previous_posts_link() ) : ?>
				<div class="next"><?php previous_posts_link( __('Newest Posts', 'theanhgroup') ); ?></div>
			<?php endif; ?>
		</nav>
	<?php }
}

/**
Ham hien thi thumbnail 
**/
if ( !function_exists('theanhgroup_thumbnail') ) {
	function theanhgroup_thumbnail($size) {
		if( !is_single() && has_post_thumbnail() && !post_password_required()) : ?>
		<figure class="post-thumbnail pull-left"><?php the_post_thumbnail( $size ); ?></figure>
	<?php elseif(is_single() && has_post_thumbnail()):?>
		<img src="<?php the_post_thumbnail_url( $size ); ?>"></img>
	<?php
	endif; ?>
	<?php }
}

/**
theanhgroup_entry_header = hien thi tieu de post
**/
if ( !function_exists('theanhgroup_entry_header') ) {
	function theanhgroup_entry_header() { ?>
		<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
			<h3 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
		<?php endif; ?>
	<?php }
}

/**
theanhgroup_entry_meta = lay du lieu post
**/
if ( !function_exists('theanhgroup_entry_meta') ) {
	function theanhgroup_entry_meta() { ?>
		<?php if ( !is_page() && !is_category()) : ?>
			<div class="entry-meta">
			<?php
				printf( __('<span class="author">By %1$s', 'theanhgroup'),
				get_the_author() );
				
				printf( __('<span class="date-published"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> %1$s', 'theanhgroup'),
				get_the_date() );
			?>
			</div>
		<?php elseif ( is_category() ) : 
			printf( __('<span class="date-published"> <span class="glyphicon glyphicon-time" aria-hidden="true"></span> %1$s', 'theanhgroup'),
			get_the_date() );
		endif; ?>
	<?php }
}

/**
theanhgroup_entry_content = ham hien thi noi dung cua post/page
**/
if ( !function_exists('theanhgroup_entry_content') ) {
	function theanhgroup_entry_content() {
		if( !is_single() && !is_page() ) {
			the_excerpt();
		} else {
			the_content();

			/* Phan trang trong single */
			$link_pages = array(
				'before' => __('<p>Page: ', 'theanhgroup'),
				'after' => '</p>',
				'nextpagelink' => __('Next Page', 'theanhgroup'),
				'previouspagelink' => __('Previous Page', 'theanhgroup')
			);
			wp_link_pages( $link_pages );
		}
	}
}

function theanhgroup_readmore() {
	return '';
}
add_filter('excerpt_more', 'theanhgroup_readmore');

/**
theanhgroup_entry_tag = hien thi tag 
**/
if ( !function_exists('theanhgroup_entry_tag') ) {
	function theanhgroup_entry_tag() {
		if ( has_tag() ) :
			echo '<div class="entry-tag">';
			printf( __('Tagged in %1$s', 'theanhgroup'), get_the_tag_list( '', ',' ) );
			echo '</div>';
		endif;
	}
}

/*=====Nhúng file style.css=====*/
if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 1);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "//code.jquery.com/jquery-1.12.4.min.js", false, null);
   wp_enqueue_script('jquery');
}

function theanhgroup_style() {
	wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' );
	wp_enqueue_style('bootstrap');
	wp_register_style( 'styles', get_template_directory_uri() . "/css/styles.css", 'all' );
	wp_enqueue_style('styles');
	wp_register_style( 'main-style', get_template_directory_uri() . "/style.css", 'all' );
	wp_enqueue_style('main-style');
	wp_register_style( 'reponsive', get_template_directory_uri() . "/css/reponsive.css", 'all' );
	wp_enqueue_style('reponsive');
	/*wp_register_style( 'mmenu', get_template_directory_uri() . "/css/jquery.mmenu.all.css", 'all' );
	wp_enqueue_style('mmenu');	*/
	
	wp_register_script( 'bootstrap-script', "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js");
	wp_enqueue_script('bootstrap-script');
	/*wp_register_script( 'mmenu-script',  get_template_directory_uri() . "/js/jquery.mmenu.all.min.js");
	wp_enqueue_script('mmenu-script');*/
	wp_register_script( 'mmenu-script',  get_template_directory_uri() . "/custom.js");
	wp_enqueue_script('mmenu-script');
	//load css script theo dieu kien
	if(is_home() || is_post_type_archive( 'san_pham' ) || is_tax()){
		//css
		wp_register_style( 'carousel', get_template_directory_uri() . "/css/owl.carousel.css", 'all' );
		wp_enqueue_style('carousel');
		//js
		wp_register_script( 'carousel-script',  get_template_directory_uri() . "/js/owl.carousel.min.js");
		wp_enqueue_script('carousel-script');
		wp_register_script( 'jssor-script',  get_template_directory_uri() . "/js/jssor.js");
		wp_enqueue_script('jssor-script');
	}
}
add_action('wp_enqueue_scripts', 'theanhgroup_style');

define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
/*
function add_defer_attribute($tag, $handle) {
   // add script handles to the array below
   $scripts_to_defer = array('carousel-script','mmenu-script');
   
   foreach($scripts_to_defer as $defer_script) {
      if ($defer_script === $handle) {
         return str_replace(' src', ' defer="defer" src', $tag);
      }
   }
   return $tag;
}
add_filter('script_loader_tag', 'add_defer_attribute', 10, 2);*/
/*
Remove Contact Form 7 scripts + styles unless we're on the contact page
*/
add_action( 'wp_enqueue_scripts', 'ac_remove_cf7_scripts' );

function ac_remove_cf7_scripts() {
	if ( !is_page( array('Liên hệ','联系我们','Contact Us') ) ) {
		wp_deregister_style( 'contact-form-7' );
		wp_deregister_script( 'contact-form-7' );
	}
}
// remove wp version param from any enqueued scripts
function vc_remove_wp_ver_css_js( $src ) {
    if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'vc_remove_wp_ver_css_js', 9999 );
add_filter( 'script_loader_src', 'vc_remove_wp_ver_css_js', 9999 );

/*=====Clean Header=====*/
// REMOVE WP EMOJI
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
function remove_json_api () {
    // Remove the REST API lines from the HTML Header
    remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
    // Remove the REST API endpoint.
    remove_action( 'rest_api_init', 'wp_oembed_register_route' );

    // Turn off oEmbed auto discovery.
    add_filter( 'embed_oembed_discover', '__return_false' );
    // Don't filter oEmbed results.
    remove_filter( 'oembed_dataparse', 'wp_filter_oembed_result', 10 );
    //Remove oEmbed discovery links.
    remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
    // Remove oEmbed-specific JavaScript from the front-end and back-end.
    remove_action( 'wp_head', 'wp_oembed_add_host_js' );
   // Remove all embeds rewrite rules.
   //add_filter( 'rewrite_rules_array', 'disable_embeds_rewrites' );
}
add_action( 'after_setup_theme', 'remove_json_api' );

function disable_json_api () {
  // Filters for WP-API version 1.x
  add_filter('json_enabled', '__return_false');
  add_filter('json_jsonp_enabled', '__return_false');
  // Filters for WP-API version 2.x
  add_filter('rest_enabled', '__return_false');
  add_filter('rest_jsonp_enabled', '__return_false');
}
add_action( 'after_setup_theme', 'disable_json_api' );

	
remove_action ('wp_head', 'rsd_link');
remove_action( 'wp_head', 'wlwmanifest_link');
remove_action( 'wp_head', 'wp_shortlink_wp_head');
//remove version wp
remove_action('wp_head', 'wp_generator');
/*=====End css js=====*/
/*An admin bar*/
add_filter('show_admin_bar', '__return_false');

/*Show languge*/
function language_selector_flags(){
    $languages = icl_get_languages('skip_missing=0&orderby=custom');
    if(!empty($languages)){
        foreach($languages as $l){
            echo '<a href="'.$l['url'].'">';
				if($l['native_name'] == 'Tiếng Việt') _e('Vi','theanhgroup');
				else if($l['native_name'] == 'English') _e('En','theanhgroup');
				else if($l['native_name'] == '繁體中文') _e('Cn','theanhgroup');
			echo '</a>';
        }
    }
}