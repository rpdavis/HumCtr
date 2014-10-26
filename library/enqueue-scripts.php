<?php
//theme main stylesheets, icons and fonts
function main_styles() {
// stylesheets
	wp_register_style('main_stylesheet', get_template_directory_uri() . '/css/app.css', false, false);

	//icons

	wp_register_style('foundation-icons', get_template_directory_uri() . '/assets/img/foundation-icons/foundation-icons.css', false, false);
//fonts

	
	wp_enqueue_style('main_stylesheet');
	wp_enqueue_style('foundation-icons');
	wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'main_styles');

if (!function_exists('FoundationPress_scripts')):
	function FoundationPress_scripts() {

		// deregister the jquery version bundled with wordpress
		wp_deregister_script('jquery');

		// register scripts

		wp_register_script('modernizr', get_template_directory_uri() . '/js/modernizr/modernizr.min.js', array(), '1.0.0', false);
		wp_register_script('jquery', get_template_directory_uri() . '/js/jquery/dist/jquery.min.js', array(), '1.0.0', false);
		wp_register_script('foundation', get_template_directory_uri() . '/js/app.js', array('jquery'), '1.0.0', true);
		wp_register_script('tooltips', get_template_directory_uri() . '/js/foundation/js/foundation/foundation.tooltip.js', array(), '1.0.0', false);
		// fix foundation press: sticky footer and mobile button issues
		wp_register_script('rd_fix_foundationpress', get_template_directory_uri() . '/js/rd_fix_foundationpress.js', array(), '1.0.0', false);

		// enqueue scripts
		wp_enqueue_script('modernizr');
		wp_enqueue_script('jquery');
		wp_enqueue_script('foundation');
		wp_enqueue_script('rd_fix_foundationpress');
	}

	add_action('wp_enqueue_scripts', 'FoundationPress_scripts');
endif;

//------"DataTables"  for ajax table used for "find a grant"
//global $page;

function datatable_scripts() {
// styles
if (is_page('find-a-grant')){
	//datatable
	wp_register_style('datatable_foundation', get_template_directory_uri() . '/DataTables/resources/foundation/dataTables.foundation.css', false, false);
	wp_register_style('ColumnFilterWidgets', get_template_directory_uri() . '/DataTables/plug-ins/ColumnFilterWidgets/media/css/ColumnFilterWidgets.css', false, false);

	wp_enqueue_style('datatable_foundation');
	wp_enqueue_style('ColumnFilterWidgets');

// scripts

	//datatable
	wp_register_script('datatable', get_template_directory_uri() . '/DataTables/media/js/jquery.dataTables.min.js', array(), '1.0.0', false);
	wp_register_script('datatable_foundation', get_template_directory_uri() . '/DataTables/resources/foundation/dataTables.foundation.js', array(), '1.0.0', true);
	wp_register_script('ColumnFilterWidgets', get_template_directory_uri() . '/DataTables/plug-ins/ColumnFilterWidgets/media/js/ColumnFilterWidgets.js', array(), '1.0.0', true);
	wp_register_script('grants_DataTable', get_template_directory_uri() . '/js/grants_DataTable.js', array('datatable_foundation', 'ColumnFilterWidgets'), '1.0.0', true);

	wp_enqueue_script('datatable');
	wp_enqueue_script('ColumnFilterWidgets');
	wp_enqueue_script('datatable_foundation');
	wp_enqueue_script('grants_DataTable');
}

}

// Hook into the 'wp_enqueue_scripts' action
add_action('wp_enqueue_scripts', 'datatable_scripts');

// function admin_css() {
// 	wp_register_style('custom_admin', get_template_directory_uri() . '/css/custom_admin.css', false, false);

// 	wp_enqueue_style('custom_admin');

// }
// add_action('admin_enqueue_scripts', 'admin_css');

?>
