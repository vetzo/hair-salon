<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


Block::make( __( 'Text and title-sabaaf' ) )
    ->add_tab( __('Title'), sabaaf_title() )
    ->add_tab( __('Text'), sabaaf_text() )
    ->set_preview_mode( true )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        get_template_part(
            'inc/sabaaf/blocks/templates/block',
            'text-and-title',
            array(
                'fields'   => $fields,
            )
        );
    } );