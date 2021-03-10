<?php

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


$picostrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/clean-head.php',							// Eliminates useless meta tags, emojis, etc            
	'/enqueues.php', 							// Enqueue scripts and styles.     
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	//'/hooks.php',                           // Custom hooks.
	//'/extras.php',                          // Custom functions that act independently of the theme templates.
	//'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	//'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions. 
	'/customizer-assets/customizer.php',	//Defines Customizer options
	'/customizer-assets/scss-compiler.php', //To interface the Customizer with the SCSS php compiler	 
	'/customizer-assets/livereload.php', //To automatically trigger SCSS compiling when source sass changes	 
	'/options-page.php',                  // Load theme options page. 

);

foreach ( $picostrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}

$sabaaf_includes = array(
	'constants.php',
	'carbon-fields.php',
	'theme-options.php',
	'custom-post-types.php',
	'components.php',
	'blocks.php'
);
foreach ( $sabaaf_includes as $file ) {
	require_once get_template_directory() . '/inc/sabaaf/sabaaf-' . $file;
}

//PURELY OPT-IN FEATURES
//OPTIONAL: DISABLE WORDPRESS COMMENTS
if (get_theme_mod("singlepost_disable_comments") ) require_once locate_template('/inc/disable-comments.php'); 

//OPTIONAL: BACK TO TOP
if (get_theme_mod("enable_back_to_top") ) require_once locate_template('/inc/back-to-top.php');

//OPTIONAL: LIGHTBOX  
if (get_theme_mod("enable_lightbox") ) require_once locate_template('/inc/lightbox.php');
	

