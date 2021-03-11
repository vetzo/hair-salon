<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;

function sabaaf_slides( $field_name = 'slides', $label = 'Slides') {
    return array(
        Field::make( 'association', $field_name , $label )
        ->set_types( array(
            array(
                'type'      => 'post',
                'post_type' => 'sabaaf-slides',
            )
        ) )
    ); 
}

