<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


function sabaaf_title( $field_name = 'title', $label = 'Title') {
    return array(
        Field::make( 'text', $field_name , $label ),
    ); 
}

