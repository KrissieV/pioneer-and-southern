<?php
/*
Plugin Name: Honeystreet Custom Post Types
Plugin URI: http://www.honeystreet.com
Description: Custom Post Types Unique to the Pioneer websites
Version: 1.0
Author: Krissie VandeNoord, Honeystreet Design Studio
Author URI: http://www.honeystreet.com/

This plugin is released under the GPLv2 license. The images packaged with this plugin are the property of
their respective owners, and do not, necessarily, inherit the GPLv2 license.
*/

/**
 * Change 'Posts' to 'News' for the purpose of usability
 */
function change_post_menu_label() {
	global $menu;
	global $submenu;
	$menu[5][0] = 'News';
	$submenu['edit.php'][5][0] = 'News';
	$submenu['edit.php'][10][0] = 'Add News Article';
	$submenu['edit.php'][16][0] = 'News Tags';
	echo '';
}
function change_post_object_label() {
	global $wp_post_types;
	$labels = &$wp_post_types['post']->labels;
	$labels->name = 'News';
	$labels->singular_name = 'News Article';
	$labels->add_new = 'Add News Article';
	$labels->add_new_item = 'Add News Article';
	$labels->edit_item = 'Edit News Article';
	$labels->new_item = 'News Article';
	$labels->view_item = 'View News Articles';
	$labels->search_items = 'Search News Articles';
	$labels->not_found = 'No News found';
	$labels->not_found_in_trash = 'No News found in Trash';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

?>