<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', 'sabaaf_attach_theme_options' );
function sabaaf_attach_theme_options() {
	$basic_options_container = Container::make( 'theme_options', __( 'SABAAF Options' ) )
	->add_fields( array(
		Field::make( 'html', 'sabaaf_information_text' )->set_html( sabaaf_main_options_info_html() ),
	) );

	Container::make( 'theme_options', __( 'Team members options' ) )
	    ->set_page_parent( $basic_options_container ) // reference to a top level container
	    ->add_fields( array(
	    	Field::make( 'checkbox', 'sabaaf_enable_team_members_single', __( 'Enable team members single page' ) )
	    	->set_option_value( 'Yes' )
	    	->set_help_text( __('Set this to yes if you want to have team member single page') ),
	    	Field::make( 'text', 'sabaaf_rewrite_url_team_members', __( 'Prefix slug' ) )
	    	->set_default_value( 'team' )
	    	->set_attribute( 'placeholder', 'Something like \'team\'' )
	    	->set_help_text( __('This will be prefixed before single slug, after change dont forget to update permalinks.') )
	    	->set_conditional_logic( 
	    		array(
	    			array(
	    				'field' => 'sabaaf_enable_team_members_single',
	    				'value' => true,
	    			)
	    		)
	    	),
	    ) );
}


add_action( 'carbon_fields_register_fields', 'sabaaf_slides_cpt_cf' );
function sabaaf_slides_cpt_cf() {

	Container::make( 'post_meta', 'Slide Data' )
	    ->where( 'post_type', '=', 'sabaaf-slides' )
	    ->add_tab( __('Section header'), sabaaf_section_header() )
	    ->add_tab( __('Buttons'), sabaaf_buttons() );
}