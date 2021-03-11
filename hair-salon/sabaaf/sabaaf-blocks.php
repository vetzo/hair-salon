<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'sabaaf_initialize_blocks' );
function sabaaf_initialize_blocks() {
	$dir    = get_template_directory() . '/sabaaf/blocks/';
	$files = scandir($dir);
    foreach ( $files as $file ) {
    	if ( strpos($file, '.php') !== false )
    	require_once $dir . $file;
	}
}