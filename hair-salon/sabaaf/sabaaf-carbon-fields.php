<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

function sabaaf_initialize_carbon_fields() {
    require_once( get_template_directory().'/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}
add_action( 'after_setup_theme', 'sabaaf_initialize_carbon_fields' );

