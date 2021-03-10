<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

/**
 * Generates CPT Labels array.
 *
 * @param  string $single Singular Name.
 * @param  string $plural Plural Name.
 * @return array
 */
function sabaaf_get_cpt_labels( $single, $plural ) {
	return [
		'name'               => $plural,
		'singular_name'      => $single,
		'menu_name'          => $plural,
		'add_new'            => 'Add ' . $single,
		'add_new_item'       => 'Add New ' . $single,
		'edit'               => 'Edit',
		'edit_item'          => 'Edit ' . $single,
		'new_item'           => 'New ' . $single,
		'view'               => 'View ' . $plural,
		'view_item'          => 'View ' . $single,
		'search_items'       => 'Search ' . $plural,
		'not_found'          => 'No ' . $plural . ' Found',
		'not_found_in_trash' => 'No ' . $plural . ' Found in Trash',
		'parent'             => 'Parent ' . $single,
	];
}

function sabaaf_custom_post_type() {
	register_post_type(
		'sabaaf-testimonial',
		array(
			'labels'              => sabaaf_get_cpt_labels('Testimonial', 'Testimonials'),
			'public'              => false,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			'has_archive'         => false,
			'rewrite'             => false,
			'menu_icon'           => 'dashicons-format-status',
		)
	);

	register_post_type(
		'sabaaf-slides',
		array(
			'labels'              => sabaaf_get_cpt_labels('Slide', 'Slides'),
			'public'              => false,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'supports'            => array( 'title', 'thumbnail', 'revisions' ),
			'has_archive'         => false,
			'rewrite'             => false,
			'menu_icon'           => 'dashicons-images-alt',
		)
	);


	if( carbon_get_theme_option( 'sabaaf_enable_team_members_single' ) ) {
		$rewrite = array(
			'slug'                  => carbon_get_theme_option( 'sabaaf_rewrite_url_team_members' ),
			'with_front'            => false,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$public = true;
	}
	else {
		$rewrite = false;
		$public = false;
	}

	register_post_type(
		'sabaaf-team-member',
		array(
			'labels'              => sabaaf_get_cpt_labels('Team members', 'Team member'),
			'public'              => $public,
			'exclude_from_search' => true,
			'show_ui'             => true,
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions' ),
			'has_archive'         => false,
			'rewrite'             => $rewrite,
			'menu_icon'           => 'dashicons-groups',
		)
	);
}
add_action( 'carbon_fields_fields_registered', 'sabaaf_custom_post_type' );

