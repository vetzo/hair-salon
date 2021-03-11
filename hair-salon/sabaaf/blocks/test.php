<?php
use Carbon_Fields\Block;
use Carbon_Fields\Field;


Block::make( __( 'My Shiny Gutenberg Block' ) )
    ->add_fields( array(
        Field::make( 'text', 'heading', __( 'Block Heading' ) ),
        Field::make( 'image', 'image', __( 'Block Image' ) ),
        Field::make( 'rich_text', 'content', __( 'Block Content' ) ),
    ) )
    ->set_preview_mode( true )
    ->set_render_callback( function ( $fields, $attributes, $inner_blocks ) {

        get_template_part(
            'sabaaf/blocks/templates/block',
            'test',
            array(
                'fields'   => $fields,
            )
        );

    } );
