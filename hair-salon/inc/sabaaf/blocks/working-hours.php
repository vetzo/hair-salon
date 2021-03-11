<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


Block::make( __( 'Working hours-sabaaf' ) )
    ->add_tab( __('Title'), sabaaf_section_header() )
    ->add_tab( __('Working hours'), array(

        Field::make( 'complex', 'working_hours', __( 'Working hours' ) )
            ->add_fields( array(
                Field::make( 'text', 'days', __( 'Days of the week' ) )->set_width( 50 ),
                Field::make( 'text', 'time', __( 'Working hours' ) )->set_width( 50 ),
            ) )
        )
    )
    ->set_preview_mode( true )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        get_template_part(
            'inc/sabaaf/blocks/templates/block',
            'working-hours',
            array(
                'fields'   => $fields,
            )
        );
    } );