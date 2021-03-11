<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;

function sabaaf_image( $field_name = 'image', $label = 'Image') {
    return array(
        Field::make( 'image', $field_name , $label ),
    ); 
}
