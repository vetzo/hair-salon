<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


Block::make( __( 'Team members-sabaaf' ) )
    ->add_tab( __('Title'), sabaaf_section_header() )
    ->add_tab( __('Team members'), sabaaf_team_members() )
    ->set_preview_mode( true )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        get_template_part(
            'inc/sabaaf/blocks/templates/block',
            'team-member',
            array(
                'fields'   => $fields,
            )
        );
    } );