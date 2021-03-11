<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;

function sabaaf_buttons( $field_name = 'buttons', $label = 'Buttons') {

    $styles = array( 'btn-primary' => 'Primary', 'btn-secondary' => 'Secondary', 'btn-primary-outline' => 'Primary outline', 'btn-secondary-outline' => 'Secondary outline' );
    $new_tab = array( 'false' => 'No', 'true' => 'Yes' );

    return array(
        Field::make( 'complex', $field_name , $label )
        ->add_fields( array(
            Field::make( 'select', 'style', __( 'Button style' ))->set_options( $styles )->set_width( 20 ),
            Field::make( 'select', 'new_tab', __( 'Open in new tab' ))->set_options( $new_tab )->set_width( 15 ),
            Field::make( 'text', 'url', __( 'Button link' ) )->set_width( 35 ),
            Field::make( 'text', 'label', __( 'Button label' ) )->set_width( 30 ),
        ) )
    ); 
}

function sabaaf_show_buttons($buttons) {
    if(!empty($buttons) && is_array($buttons)) :
        foreach ($buttons as $button) :
            extract($button);
            $new_tab = ($new_tab == 'true') ? 'target="_blank"' : ''; 
            echo "<a href='$url' class='btn mx-2 my-2 $style' $new_tab>$label</a>";
        endforeach;
    endif;
}

