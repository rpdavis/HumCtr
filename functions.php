<?php
/*
Author: Ole Fredrik Lie
URL: http://olefredrik.com
 */

//add_editor_style('/css/app.css');

// Various clean up functions
require_once ('library/cleanup.php');

// Required for Foundation to work properly
require_once ('library/foundation.php');

// Register all navigation menus
require_once ('library/navigation.php');

// Add menu walker
require_once ('library/menu-walker.php');

// Create widget areas in sidebar and footer
require_once ('library/widget-areas.php');

// Return entry meta information for posts
require_once ('library/entry-meta.php');

// Enqueue scripts
require_once ('library/enqueue-scripts.php');

// Add theme support
require_once ('library/theme-support.php');

// Add custom post functions for events, news, and grants
require_once ('custom-post/post-function.php');

// Display custom post content
//require_once('library/display-custom-post.php');

// function my_theme_add_editor_styles() {
// 	add_editor_style('custom-editor-style.css');
// }
// add_action('init', 'my_theme_add_editor_styles');

add_action('init', 'create_post_type');
function create_post_type() {
	register_post_type('post_news',
		array(
			'labels' => array(
				'name'          => __('News'),
				'singular_name' => __('News')
			),
			'public'      => true,
			'has_archive' => true,
		)
	);
}

function namespace_add_custom_types($query) {
	if (is_category() || is_tag() && empty($query->query_vars['suppress_filters'])) {
		$query->set('post_type', array(
			'post', 'post_events',
		));
		return $query;
	}
}

add_action("gform_field_css_class", "custom_class", 10, 3);
function custom_class($classes, $field, $form) {
	if ($field["type"] == "text") {
		$classes .= " custom_textfield_class";
	}
	return $classes;
}

// gravity forms: remove post creation of specific form (number after creation selects id number of form)
// add_filter("gform_disable_post_creation_4", "disable_post_creation", 10, 3);
// function disable_post_creation($is_disabled, $form, $entry) {

// 	return true;
// }

// gravity forms send seleted (by "id") form to "events" custom post type
add_filter("gform_post_data", "change_post_type", 10, 3);
function change_post_type($post_data, $form, $entry) {
	//only change post type on form id 5
	if ($form["id"] != 4) {
		return $post_data;
	}

	$post_data["post_type"] = "post_events";
	return $post_data;
}
/**
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since NARGA v1.3.3
 * @from Twenty Twelve
 */
if (!isset($content_width)) {
	$content_width = 640;
}

function narga_content_width() {
	if (is_page_template('templates/full-width.php') || is_attachment()) {
		global $content_width;
		$content_width = 975;
	}
}
add_action('template_redirect', 'narga_content_width');

?>
