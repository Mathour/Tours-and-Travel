<?php

//loading scripts
function hd_scripts()
{
	wp_register_style('style', get_template_directory_uri() . '/dist/dist/app.css', [], '1.0', 'all');
	wp_enqueue_style('style');

	wp_enqueue_script('jquery');

	wp_register_script('app', get_template_directory_uri() . '/dist/app.js', array('jquery'), '1.0', true);
	wp_enqueue_script('app');
}
add_action('wp_enqueue_scripts', 'hd_scripts');

function my_acf_init()
{
	acf_update_setting('google_api_key', 'AIzaSyBR3ou6f5A3xNlD_n0No12wi5XLtbHxNFQ');
}

add_action('acf/init', 'my_acf_init');

//Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support('widgets');
add_theme_support('search');

//Menu
register_nav_menus(
	array(
		'primary-menu' => 'Nav Bar Menu',
	)
);

// Register Custom Navigation Walker
function register_navwalker()
{
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');

add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
/**
 * Use namespaced data attribute for Bootstrap's dropdown toggles.
 *
 * @param array    $atts HTML attributes applied to the item's `<a>` element.
 * @param WP_Post  $item The current menu item.
 * @param stdClass $args An object of wp_nav_menu() arguments.
 * @return array
 */
function prefix_bs5_dropdown_data_attribute($atts, $item, $args)
{
	if (is_a($args->walker, 'WP_Bootstrap_Navwalker')) {
		if (array_key_exists('data-toggle', $atts)) {
			unset($atts['data-toggle']);
			$atts['data-bs-toggle'] = 'dropdown';
		}
	}
	return $atts;
}


//Register Sidebars
function hd_theme_sidebars()
{
	register_sidebar(
		array(
			'name' => 'Navbar Social Icons',
			'id' => 'navbar-social-icon',
		)
	);

	register_sidebar(
		array(
			'name' => 'Blog Sidebar',
			'id' => 'blog-sidebar',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);

	register_sidebar(
		array(
			'name' => 'Tour Sidebar',
			'id' => 'tour-sidebar',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);

	register_sidebar(
		array(
			'name' => 'Footer Widgets1',
			'id' => 'footer-wedgit-1',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
	register_sidebar(
		array(
			'name' => 'Footer Widgets2',
			'id' => 'footer-wedgit-2',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
	register_sidebar(
		array(
			'name' => 'Footer Widgets3',
			'id' => 'footer-wedgit-3',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
	register_sidebar(
		array(
			'name' => 'Footer Widgets4',
			'id' => 'footer-wedgit-4',
			'before_title' => '<h4 class="widget-title">',
			'after_title' => '</h4>'
		)
	);
}
add_action('widgets_init', 'hd_theme_sidebars');

//Add custom post type
function hd_custom_posts()
{
	$args = array(
		'labels' => array(
			'name' => 'Tours',
			'singular_name' => 'Tour',
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-admin-site',
		'supports' => array('title', 'thumbnail', 'custom-fields'),
		'rewrite' => array('slug' => 'our-tours'),
	);
	register_post_type('tours', $args);

	$args1 = array(
		'labels' => array(
			'name' => 'Guides',
			'singular_name' => 'Guide',
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-businessman',
		'supports' => array('title', 'thumbnail', 'custom-fields'),
		'rewrite' => array('slug' => 'our-guides'),
	);
	register_post_type('guides', $args1);

	$args2 = array(
		'labels' => array(
			'name' => 'Testmonials',
			'singular_name' => 'Testmonial',
		),
		'public' => true,
		'has_archive' => true,
		'menu_icon' => 'dashicons-testimonial',
		'supports' => array('title', 'thumbnail', 'custom-fields'),
		'rewrite' => array('slug' => 'testimonials'),
	);
	register_post_type('testimonial', $args2);
}
add_action('init', 'hd_custom_posts');

//Add custom taxonomy
function hd_tours_taxonomy()
{
	$args = array(
		'labels' => array(
			'name' => 'Tour Categories',
			'singular_name' => 'Tour Category',
		),
		'public' => true,
		'hierarchical' => true,
	);
	register_taxonomy('tour-categories', array('tours'), $args);

	$args1 = array(
		'labels' => array(
			'name' => 'Destinations',
			'singular_name' => 'Destination',
		),
		'public' => true,
		'hierarchical' => true,
	);
	register_taxonomy('destinations', array('tours'), $args1);

	$args2 = array(
		'labels' => array(
			'name' => 'Activities',
			'singular_name' => 'Activity',
		),
		'public' => true,
		'hierarchical' => true,
	);
	register_taxonomy('activites', array('tours'), $args2);

	$args3 = array(
		'labels' => array(
			'name' => 'Challenging Levels',
			'singular_name' => 'Challenging Level',
		),
		'public' => true,
		'hierarchical' => true,
	);
	register_taxonomy('challenging-levels', array('tours'), $args3);
}
add_action('init', 'hd_tours_taxonomy');

//Custom functions
function get_itinary_count($field_name)
{
	$count = 0;
	$days = get_field($field_name);
	if (is_array($days)) {
		$count = count($days);
	}
	return $count;
}

function get_tab_names($id)
{
	$fields = get_fields($id);
	$tab_names = "";
	if ($fields) :
		for ($last = 0; $last < sizeof($fields); $last++) {
			$type = $fields[$last]['type'];
			if ($type == 'tab') {
				$start = $last;
				$tab_names = $fields[$last]['label'];
			}
			if (($fields[$last + 1]['type'] == 'tab') || ($last == sizeof($fields) - 1)) {
				$end = $last;
				while ($start <= $end) {
					// Here you can do with the fields whatever you want
					$start++;
				}
			}
		}
		return $tab_names;
	endif;
}

//Shortcodes
function hd_banner_title_shortcode()
{
	ob_start();
	get_template_part('includes/section', 'banner');
	$output = ob_get_clean(); 
	return $output;
}
add_shortcode('banner_title', 'hd_banner_title_shortcode');

function hd_tour_search_shortcode()
{
	get_template_part('includes/tours', 'search');
}
add_shortcode('tour_search', 'hd_tour_search_shortcode');

function hd_featured_tours_shortcode()
{
	ob_start();
	get_template_part('includes/featured', 'tours');
	return ob_get_clean();
}
add_shortcode('featured_tours', 'hd_featured_tours_shortcode');

function hd_featured_posts_shortcode()
{
	ob_start();
	get_template_part('includes/featured', 'posts');
	return ob_get_clean();
}
add_shortcode('featured_posts', 'hd_featured_posts_shortcode');

add_action('wp_ajax_inquiry', 'inquiry_form');
add_action('wp_ajax_nopriv_inquiry', 'inquiry_form');
function inquiry_form()
{
	$formdata = [];
	wp_parse_str($_POST['inquiry'], $formdata);

	//admin email
	$admin_email = get_option('admin_email');
	
	//Headers
	$header[] = 'Content-Type: text/html; charset=UTF-8';
	$header[] = 'From:<hdtours@wordpress.com>';
	$header[] = 'Reply-to:' .$formdata['email'];

	//Reciver's email
	$send_to = $admin_email;

	//Subject
	$tour_title = $formdata['title'];
	$subject = 'Enquiry for ' .$tour_title;

	//Message
	$message = $formdata['fname'] . ' ' . $formdata['lname'] .'<br>';
	$message .= $formdata['message'];

	try {
		if (wp_mail($send_to, $subject, $message, $header)) {
			wp_send_json_success('Email Sent');
		} 
		else {
			wp_send_json_error('Email Error');
		}
	} catch (Exception $e) {
		wp_send_json_error($e->getMessage());
	}

}

//Query function for custom search
function tour_seacrh_query()
{
	$args = [
		'post_type' => 'tours',
		'post_per_page' => 0,
		'tax_query' => [],
		'meta_query' => [
			'relation' => 'AND',

		],
	];

	if (isset($_GET['keyword'])) {
		if (!empty($_GET['keyword'])) {
			$args['s'] = sanitize_text_field($_GET['keyword']);
		}
	}

	if (isset($_GET['category'])) {
		if (!empty($_GET['category'])) {
			$args['tax_query'][] = [
				'taxonomy' => 'tour-categories',
				'field' => 'slug',
				'terms' => array($_GET['category'])
			];
		}
	}

	if (isset($_GET['destination'])) {
		if (!empty($_GET['destination'])) {
			$args['tax_query'][] = [
				'taxonomy' => 'destinations',
				'field' => 'slug',
				'terms' => array($_GET['destination']),
			];
		}
	}

	return new WP_Query($args);
}

function tour_category_query($category)
{
	$args = [
		'post_type' => 'tours',
		'post_per_page' => 0,
		'tax_query' => [

		],
        'meta_query' => [
			'relation' => 'AND',

		],
	];
	if (!empty($category)) {
		$args['tax_query'][] = [
			'taxonomy' => 'tour-categories',
			'field' => 'slug',
			'terms' => array($category)
		]; 
	}
	return new WP_Query($args);
}

function tour_destination_query($dest)
{
	$args = [
		'post_type' => 'tours',
		'post_per_page' => 0,
		'tax_query' => [

		],
        'meta_query' => [
			'relation' => 'AND',

		],
	];
	if (!empty($dest)) {
		$args['tax_query'][] = [
			'taxonomy' => 'destinations',
			'field' => 'slug',
			'terms' => array($dest)
		]; 
	}
	return new WP_Query($args);
}

/* Extend WordPress search to include custom fields */

/* Join posts and postmeta tables */
function cf_search_join($join)
{
	global $wpdb;

	if (is_search()) {
		$join .= ' LEFT JOIN ' . $wpdb->postmeta . ' ON ' . $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
	}

	return $join;
}
add_filter('posts_join', 'cf_search_join');

/* Modify the search query with posts_where */
function cf_search_where($where)
{
	global $pagenow, $wpdb;

	if (is_search()) {
		$where = preg_replace(
			"/\(\s*" . $wpdb->posts . ".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
			"(" . $wpdb->posts . ".post_title LIKE $1) OR (" . $wpdb->postmeta . ".meta_value LIKE $1)",
			$where
		);
	}

	return $where;
}
add_filter('posts_where', 'cf_search_where');

/* Prevent duplicates */
function cf_search_distinct($where)
{
	global $wpdb;

	if (is_search()) {
		return "DISTINCT";
	}

	return $where;
}
add_filter('posts_distinct', 'cf_search_distinct');
