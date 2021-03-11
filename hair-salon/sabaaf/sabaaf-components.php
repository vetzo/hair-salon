<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'sabaaf_initialize_components' );
function sabaaf_initialize_components() {
    $dir    = get_template_directory() . '/sabaaf/components/';
    $files = scandir($dir);
    foreach ( $files as $file ) {
        if ( strpos($file, '.php') !== false )
        require_once $dir . $file;
    }
}