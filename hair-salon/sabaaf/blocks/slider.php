<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


Block::make( __( 'Slider-sabaaf' ) )
    ->add_tab( __('Slides'), sabaaf_slides() )
    ->set_preview_mode( true )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {
        get_template_part(
            'sabaaf/blocks/templates/block',
            'slider',
            array(
                'fields'   => $fields,
            )
        );
    } );