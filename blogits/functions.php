<?php

function theme_setting() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-header' );
	load_theme_textdomain( 'bts_blogits' );
	add_theme_support(
		'post-formats',
		[
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		]
	);
	add_theme_support( 'post-thumbnails' );
	//Logo
	$defaults = [
		'height' => 60,
		'width'  => 120,
	];
	add_theme_support( 'custom-logo', $defaults );
}

add_action( 'after_setup_theme', 'theme_setting' );

//Add Menu

function Register_menu() {

	register_nav_menus( [
		'primary'    => __( 'Primary Menu', 'bts_blogits' ),
		'footer'     => __( 'Footer Menu', 'bts_blogits' ),
		'header-top' => __( 'Header Top Menu', 'bts_blogits' ),
	] );
}
add_action( 'init', 'Register_menu' );
// Register Sidebars
function custom_sidebars() {

	$args = [
		'name'          => __( 'sidebar', 'text_domain' ),
		'before_widget' => '<div class="widget">',
		'before_title'  => '<h4>',
		'after_title'   => '</h4><ul class="nav nav-list primary push-bottom">',
		'after_widget'  => '</ul></div><hr />',
	];
	register_sidebar( $args );

}
add_action( 'widgets_init', 'custom_sidebars' );

function footer_sidebars() {

	$def = [
		'name'          => __( 'footer-widget', 'bts_blogits' ),
		'before_widget' => '<div class="col-md-3"><div class="widget">',
		'before_title'  => '<h4>',
		'after_title'   => '</h4><ul class="nav nav-list primary push-bottom">',
		'after_widget'  => '</ul></div></div>',
	];
	register_sidebar( $def );

}
add_action( 'widgets_init', 'footer_sidebars' );
//Post Viwes
function gt_get_post_view() {
	$count = get_post_meta( get_the_ID(), 'post_views_count', true );
	return "$count ";
}
function gt_set_post_view() {
	$key     = 'post_views_count';
	$post_id = get_the_ID();
	$count   = (int) get_post_meta( $post_id, $key, true );
	$count++;
	update_post_meta( $post_id, $key, $count );
}
function gt_posts_column_views( $columns ) {
	$columns['post_views'] = 'Views';
	return $columns;
}
function gt_posts_custom_column_views( $column ) {
	if ( $column === 'post_views' ) {
		echo gt_get_post_view();
	}
}
add_filter( 'manage_posts_columns', 'gt_posts_column_views' );
add_action( 'manage_posts_custom_column', 'gt_posts_custom_column_views' );

//Post Approval
function wpse_306836_wc_custom_permission( $args, $post_type ) {

	if ( 'product' === $post_type ) {
		$args['capability_type'] = 'post';
	}

	return $args;
}

add_filter( 'register_post_type_args', 'wpse_306836_wc_custom_permission', 10, 2 );

//Required Files

function theme_css_js() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.css', [], 'All' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/vendor/fontawesome/css/font-awesome.css', [], 'All' );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/vendor/magnific-popup/magnific-popup.css', [], 'All' );
	wp_enqueue_style( 'them', get_template_directory_uri() . '/css/theme.css', [], 'All' );
	wp_enqueue_style( 'swiper-carousel', get_template_directory_uri() . '/css/swiper.min.css', [], 'All' );
	wp_enqueue_style( 'theme-element', get_template_directory_uri() . '/css/theme-elements.css', [], 'All' );
	wp_enqueue_style( 'theme-blog', get_template_directory_uri() . '/css/theme-blog.css', [], 'All' );
	wp_enqueue_style( 'theme-shop', get_template_directory_uri() . '/css/theme-shop.css', [], 'All' );
	wp_enqueue_style( 'theme-animate', get_template_directory_uri() . '/css/theme-animate.css', [], 'All' );
	wp_enqueue_style( 'theme-skins', get_template_directory_uri() . '/css/skins/default.css', [], 'All' );
	wp_enqueue_style( 'theme-custom', get_template_directory_uri() . '/css/custom.css', [], 'All' );
	wp_enqueue_style( 'theme-css', get_template_directory_uri() . '/style.css', [], 'All' );
	//WP JS
	wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/vendor/bootstrap/bootstrap.js', ['jquery'], true );
	wp_enqueue_script( 'swiper-carousel', get_template_directory_uri() . '/js/swiper.min.js', [], true );
	wp_enqueue_script( 'custom', get_template_directory_uri() . '/js/custom.js', [], true );

	//G Fonts
	wp_enqueue_style( 'g-fonts', 'http: //fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light' );
}
add_action( 'wp_enqueue_scripts', 'theme_css_js' );

//Required Files
require_once 'inc/class-wp-bootstrap-navwalker.php';