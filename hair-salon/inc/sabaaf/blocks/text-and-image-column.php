<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


Block::make( __( 'Text and image column-sabaaf' ) )
    ->add_tab( __('Title'), sabaaf_section_header() )
    ->add_tab( __('Text'), sabaaf_text() )
    ->add_tab( __('Image'), sabaaf_image() )
    ->set_preview_mode( true )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        get_template_part(
            'inc/sabaaf/blocks/templates/block',
            'text-and-image-column',
            array(
                'fields'   => $fields,
            )
        );
    } );