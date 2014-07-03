<?
/*
Theme functions
*/
include("includes/extends.php");
/**
 * Enqueue scripts and styles for front-end.
 */
function likegag_scripts_styles() {
	global $wp_styles;

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '20140630' );
	wp_enqueue_script( 'utils-script', get_template_directory_uri() . '/assets/js/utils.js', array( 'jquery' ), '20140702' );

	// Loads our main stylesheet.
	wp_enqueue_style( 'likegag-bootstrap-style', get_template_directory_uri()."/assets/css/bootstrap.min.css" );
	wp_enqueue_style( 'likegag-style', get_stylesheet_uri(),array('likegag-bootstrap-style') );

	// Loads the Fonts
	wp_enqueue_style( 'open-sans', '', array( 'twentytwelve-style' ), '20140630' );
	
	$wp_styles->add_data( 'twentytwelve-ie', 'conditional', 'lt IE 9' );
}

add_action( 'wp_enqueue_scripts', 'likegag_scripts_styles' );


/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function likegag_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'likegag_wp_title', 10, 2 );


/**
 * Setup the Navs a Theme Support.
 *
 */
function likegag_setup() {

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'leftmenu', __( 'Left Menu', 'likegag' ) );
	register_nav_menu( 'rightmenu', __( 'Right Menu', 'likegag' ) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
	add_image_size('likegag-post-width', 524, 9999 );
	
	//Add labels for media library
	add_filter( 'image_size_names_choose', 'likegag_custom_sizes' );
	
	//Register sidebar widgets
	$args = array(
	'name'          => __('Right Sidebar'),
        'id'            => 'right-sidebar',          
	'description'   => '',
	'class'         => '',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => '' );
	register_sidebars(1, $args);
}
add_action( 'after_setup_theme', 'likegag_setup' );

/**
 *Function to register Theme Widgets
 *
 */
function likegag_theme_widgets(){
	register_widget( 'LikeGag_Archives' );
}

add_action( 'widgets_init', 'likegag_theme_widgets' );
/**
 * This function labal the custom sizes, for media library
 */
function likegag_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'likegag-post-width' => __('Full Container Width'),
    ) );
}

if ( ! function_exists( 'twentythirteen_paging_nav' ) ) :
/**
 * Display navigation to next/previous set of posts when applicable.
 *
 */
function likegag_paging_nav() {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 )
		return;
	?>
	<ul class="pager">

			<?php if ( get_next_posts_link() ) : ?>
			<li><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Anterior', 'likegag' ) ); ?></li>
			<?php endif; ?>

			<?php if ( get_previous_posts_link() ) : ?>
			<li><?php previous_posts_link( __( 'Siguiente <span class="meta-nav">&rarr;</span>', 'likegag' ) ); ?></li>
			<?php endif; ?>

	</ul>
	<?php
}
endif;

/**
 * This function allow to add custom class to dropdowns
 * Deprecated i found a better way using walkers
 */
/* function menu_set_dropdown( $sorted_menu_items, $args ) {
	print_r($sorted_menu_items);
    $last_top = 0;
    foreach ( $sorted_menu_items as $key => $obj ) {
        // it is a top lv item?
        if ( 0 == $obj->menu_item_parent ) {
            // set the key of the parent
            $last_top = $key;
			$sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown2';
        } else {
            $sorted_menu_items[$last_top]->classes['dropdown'] = 'dropdown';
        }
    }
    return $sorted_menu_items;
}
add_filter( 'wp_nav_menu_objects', 'menu_set_dropdown', 10, 2 ); */


?>