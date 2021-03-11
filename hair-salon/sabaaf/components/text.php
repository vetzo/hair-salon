<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


function sabaaf_text( $field_name = 'text', $label = 'Text') {
    return array(
        Field::make( 'rich_text', $field_name , $label ),
    ); 
}


function sabaaf_simple_text( $field_name = 'text', $label = 'Text') {
    return array(
        Field::make( 'text', $field_name , $label ),
    ); 
}
