<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

add_action( 'after_setup_theme', 'sabaaf_initialize_blocks' );
function sabaaf_initialize_blocks() {
    $tnkr_blocks = array(
		'/team-members.php',
		'/test.php',
		'/slider.php',
		'/text-and-title.php',
		'/text-and-image-column.php',
		'/working-hours.php',
	);

    foreach ( $tnkr_blocks as $file ) {
    	require_once get_template_directory() . '/inc/sabaaf/blocks/' . $file;
	}
}