<?php
/**
 * zarano functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zarano
 */

if ( ! function_exists( 'zarano_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zarano_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on zarano, use a find and replace
		 * to change 'zarano' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'zarano', get_template_directory() . '/languages' );

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
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'zarano' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'zarano_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'zarano_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function zarano_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'zarano_content_width', 640 );
}
add_action( 'after_setup_theme', 'zarano_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zarano_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'zarano' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'zarano' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'zarano_widgets_init' );

/**
 * Deregister WordPress default jQuery
 * Register and Enqueue Google CDN jQuery
 */
function zarano_jquery_enqueue() {
   wp_deregister_script( 'jquery' );
   wp_register_script( 'jquery', "http" . ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . "://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js", false, null );
   wp_enqueue_script( 'jquery' );
}
if ( !is_admin() ) {
    add_action( 'wp_enqueue_scripts', 'zarano_jquery_enqueue', 11 );
}

/**
 * Enqueue scripts and styles.
 */
function zarano_scripts() {

	wp_enqueue_style( 'zarano-normalize', get_template_directory_uri() . '/css/normalize.min.css', array(), '1.1', 'all');

	wp_enqueue_style( 'zarano-styles', get_template_directory_uri() . '/css/main.css', array(), '1.1', 'all');

	wp_enqueue_script( 'zarano-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'zarano-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'zarano-scripts', get_template_directory_uri() . '/js/main.js', array(), '20151215', true );	

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zarano_scripts' );

function custom_posts_per_page( $query ) {
    if (!is_admin() && is_front_page()) {
        set_query_var('posts_per_page', 3);
    }      
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );

/**
 * Rename default post type
 */
function change_label() {
    global $menu, $submenu;

    $menu[5][0] = 'Nowości';
    $submenu['edit.php'][5][0] = 'Nowości';
    $submenu['edit.php'][10][0] = 'Dodaj';
    $submenu['edit.php'][16][0] = 'Tagi';
    echo '';
}
add_action( 'admin_menu', 'change_label' );

function change_object() {
    global $wp_post_types;

    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Nowości';
    $labels->singular_name = 'Nowości';
    $labels->add_new = 'Dodaj';
    $labels->add_new_item = 'Dodaj';
    $labels->edit_item = 'Edytuj';
    $labels->new_item = 'Dodaj';
    $labels->view_item = 'Zobacz';
    $labels->search_items = 'Wyszukaj';
    $labels->not_found = 'Nie znaleziono żadnych Nowości';
    $labels->not_found_in_trash = 'Nie znaleziono żadnych Nowości w koszu';
}
add_action( 'init', 'change_object' );

/**
 * Add References post type
 */
add_action( 'init', 'references_cpt' );
function references_cpt() {
	$labels = array(
		'name'               => _x( 'Referencje', 'post type general name', 'zarano' ),
		'singular_name'      => _x( 'Referencje', 'post type singular name', 'zarano' ),
		'menu_name'          => _x( 'Referencje', 'admin menu', 'zarano' ),
		'name_admin_bar'     => _x( 'Referencje', 'add new on admin bar', 'zarano' ),
		'add_new'            => _x( 'Dodaj', 'book', 'zarano' ),
		'add_new_item'       => __( 'Dodaj', 'zarano' ),
		'new_item'           => __( 'Nowy', 'zarano' ),
		'edit_item'          => __( 'Edytuj', 'zarano' ),
		'view_item'          => __( 'Zobacz', 'zarano' ),
		'all_items'          => __( 'Wszystkie', 'zarano' ),
		'search_items'       => __( 'Szukaj', 'zarano' ),
		'not_found'          => __( 'Nie znaleziono', 'zarano' ),
		'not_found_in_trash' => __( 'Nie znaleziono w koszu', 'zarano' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'referencje' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'editor')
	);

	register_post_type( 'referencje', $args );
}

/**
 * Add Realizations post type
 */
add_action( 'init', 'realizations_cpt' );
function realizations_cpt() {
	$labels = array(
		'name'               => _x( 'Realizacje', 'post type general name', 'zarano' ),
		'singular_name'      => _x( 'Realizacje', 'post type singular name', 'zarano' ),
		'menu_name'          => _x( 'Realizacje', 'admin menu', 'zarano' ),
		'name_admin_bar'     => _x( 'Realizacje', 'add new on admin bar', 'zarano' ),
		'add_new'            => _x( 'Dodaj', 'book', 'zarano' ),
		'add_new_item'       => __( 'Dodaj', 'zarano' ),
		'new_item'           => __( 'Nowy', 'zarano' ),
		'edit_item'          => __( 'Edytuj', 'zarano' ),
		'view_item'          => __( 'Zobacz', 'zarano' ),
		'all_items'          => __( 'Wszystkie', 'zarano' ),
		'search_items'       => __( 'Szukaj', 'zarano' ),
		'not_found'          => __( 'Nie znaleziono', 'zarano' ),
		'not_found_in_trash' => __( 'Nie znaleziono w koszu', 'zarano' )
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'realizacje' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'thumbnail', 'editor')
	);

	register_post_type( 'realizacje', $args );
}

/**
 * Read more link custom text
 */
function custom_excerpt_length( $length ) {
   return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
   global $post;
   return ' <a href="'. get_permalink($post->ID) . '">'. __('Czytaj więcej...', 'zarano') .'</a>';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// Add custom header image size
add_image_size( 'header-size', 2000, 500 );

/**
 * Add options page
 */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Opcje',
		'menu_title'	=> 'Opcje',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Header',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));	

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Footer',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));	
}

function custom_excerpt( $more ) {
       global $post;
	return '...';
}
add_filter('excerpt_more', 'custom_excerpt');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

