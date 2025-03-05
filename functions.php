<?php
/**
 * Theme functions and definitions.
 *
 * For additional information on potential customization options,
 * read the developers' documentation:
 *
 * https://archicon.qodeinteractive.com
 *
 * @package Archicon
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'AR_VERSION', '1.0.0' );

// add_filter('show_admin_bar', '__return_false');

/**
 * Load child theme scripts & styles.
 *
 * @return void
 */
function arch_child_scripts_styles() {
	wp_enqueue_style('ar-child-css', get_stylesheet_directory_uri() . '/assets/css/custom-css.css', array(''), time(), 'all');

	// JS
	wp_enqueue_script('ar-scripts', get_stylesheet_directory_uri() . '/assets/js/custom-js.js', array('jquery'), time(), true);

}
add_action( 'wp_enqueue_scripts', 'arch_child_scripts_styles', 999 );



// // Update permalinks for posts to include '/blog/'
// add_filter('post_link', function($post_link, $post) {
//     return ('post' === $post->post_type) ? home_url('/blog/' . $post->post_name . '/') : $post_link;
// }, 10, 2);

// // Add rewrite rules for '/blog/'
// add_action('init', function() {
//     add_rewrite_rule('^blog/([^/]+)/?$', 'index.php?name=$matches[1]&post_type=post', 'top');
// });

// // Flush rewrite rules on activation
// register_activation_hook(__FILE__, function() {
//     flush_rewrite_rules();
// });

// // Add rewrite rules and permalinks for portfolio items
// add_action('init', function() {
//     add_rewrite_rule('^projects/([^/]+)/([^/]+)/?$', 'index.php?portfolio-item=$matches[2]&portfolio-category=$matches[1]', 'top');
// });

// add_filter('post_type_link', function($post_link, $post) {
//     if ('portfolio-item' === $post->post_type) {
//         $terms = wp_get_post_terms($post->ID, 'portfolio-category');
//         $category = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->slug : '';
//         return home_url('projects/' . $category . '/' . $post->post_name . '/');
//     }
//     return $post_link;
// }, 10, 2);

// // Flush rewrite rules on theme switch
// add_action('after_switch_theme', 'flush_rewrite_rules');



// // Update permalinks for posts to include '/blog/'
// add_filter('post_link', function($post_link, $post) {
//     return ('post' === $post->post_type) ? home_url('/blog/' . $post->post_name . '/') : $post_link;
// }, 10, 2);

// // Add rewrite rules for '/blog/'
// add_action('init', function() {
//     add_rewrite_rule('^blog/([^/]+)/?$', 'index.php?name=$matches[1]&post_type=post', 'top');
// });

// // Flush rewrite rules on activation
// register_activation_hook(__FILE__, function() {
//     flush_rewrite_rules();
// });

// // Modify taxonomy permalinks for 'portfolio-category' to use 'projects/term-slug/'
// add_filter('term_link', function($url, $term, $taxonomy) {
//     if ('portfolio-category' === $taxonomy) {
//         return home_url('projects/' . $term->slug . '/');
//     }
//     return $url;
// }, 10, 3);

// // Add rewrite rules for 'portfolio-category' terms
// add_action('init', function() {
//     add_rewrite_rule('^projects/([^/]+)/?$', 'index.php?portfolio-category=$matches[1]', 'top');
// });

// // Add rewrite rules for portfolio items
// add_action('init', function() {
//     add_rewrite_rule('^projects/([^/]+)/([^/]+)/?$', 'index.php?portfolio-item=$matches[2]&portfolio-category=$matches[1]', 'top');
// });

// // Update portfolio-item permalinks to include 'projects/category-slug/post-slug/'
// add_filter('post_type_link', function($post_link, $post) {
//     if ('portfolio-item' === $post->post_type) {
//         $terms = wp_get_post_terms($post->ID, 'portfolio-category');
//         $category = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->slug : '';
//         return home_url('projects/' . $category . '/' . $post->post_name . '/');
//     }
//     return $post_link;
// }, 10, 2);

// // Enable subpages under 'projects/'
// add_action('init', function() {
//     add_rewrite_rule('^projects/(.+)/?$', 'index.php?pagename=projects/$matches[1]', 'top');
// });

// // Flush rewrite rules on theme switch
// add_action('after_switch_theme', 'flush_rewrite_rules');


// Now the output 
///projects/term-slug/	Displays portfolio category term.
//projects/category-slug/post-slug/	Displays a specific portfolio item.
///projects/subpage/	Displays a page named subpage.
//projects/subpage/child-subpage/	Displays a child page of subpage.

// Update permalinks for posts to include '/blog/'
add_filter('post_link', function($post_link, $post) {
    return ('post' === $post->post_type) ? home_url('/blog/' . $post->post_name . '/') : $post_link;
}, 10, 2);

// Add rewrite rules for '/blog/'
add_action('init', function() {
    add_rewrite_rule('^blog/([^/]+)/?$', 'index.php?name=$matches[1]&post_type=post', 'top');
});

// Flush rewrite rules on activation
register_activation_hook(__FILE__, function() {
    flush_rewrite_rules();
});

// Modify taxonomy permalinks for 'portfolio-category' to use 'projects/term-slug/'
add_filter('term_link', function($url, $term, $taxonomy) {
    if ('portfolio-category' === $taxonomy) {
        return home_url('projects/' . $term->slug . '/');
    }
    return $url;
}, 10, 3);

// Add rewrite rules for 'portfolio-category' terms
add_action('init', function() {
    add_rewrite_rule('^projects/([^/]+)/?$', 'index.php?portfolio-category=$matches[1]', 'top');
});

// Add rewrite rules for portfolio items
add_action('init', function() {
    add_rewrite_rule('^projects/([^/]+)/([^/]+)/?$', 'index.php?portfolio-item=$matches[2]&portfolio-category=$matches[1]', 'top');
});

// Update portfolio-item permalinks to include 'projects/category-slug/post-slug/'
add_filter('post_type_link', function($post_link, $post) {
    if ('portfolio-item' === $post->post_type) {
        $terms = wp_get_post_terms($post->ID, 'portfolio-category');
        $category = (!empty($terms) && !is_wp_error($terms)) ? $terms[0]->slug : '';
        return home_url('projects/' . $category . '/' . $post->post_name . '/');
    }
    return $post_link;
}, 10, 2);

// Enable dynamic subpages under 'projects/'
add_action('init', function() {
    // Rule for handling all subpages under 'projects/'
    add_rewrite_rule('^projects/([^/]+)/([^/]+)/?$', 'index.php?post_type=portfolio-item&name=$matches[2]', 'top');
    // add_rewrite_rule('^projects/([^/]+)/([^/]+)/?$', 'index.php?pagename=projects/$matches[1]/$matches[2]', 'top');
    add_rewrite_rule('^projects/([^/]+)/?$', 'index.php?pagename=projects/$matches[1]', 'top');
});

// Flush rewrite rules on theme switch
add_action('after_switch_theme', 'flush_rewrite_rules');

