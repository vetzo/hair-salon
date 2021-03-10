<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


/*
Buttons component
*/
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


/*
Section header
*/

function sabaaf_section_header( $field_name = 'section_header', $label = 'Section header' ) {

    $tags = array( 'h1' => 'h1', 'h2' => 'h2', 'h3' => 'h3', 'h4' => 'h4', 'h5' => 'h5', 'h5' => 'h5', 'h6' => 'h6', 'p' => 'p', 'span' => 'span' );

    return array(
        Field::make( 'complex', $field_name , $label )->set_min( 1 )->set_max( 1 )
        ->add_fields( array(
            Field::make( 'select',  'tagline_tag' , 'Tagline tag' )->set_options( $tags )->set_width( 20 )->set_default_value( 'h5' ),
            Field::make( 'text', 'tagline' , 'Tagline' )->set_width( 80 ),
            Field::make( 'select',  'title_tag' , 'Title tag' )->set_options( $tags )->set_width( 20 )->set_default_value( 'h2' ),
            Field::make( 'text', 'title' , 'Title' )->set_width( 80 ),
            Field::make( 'select',  'subtitle_tag' , 'Subtitle tag' )->set_options( $tags )->set_width( 20 )->set_default_value( 'h3' ),
            Field::make( 'text', 'subtitle' , 'Subtitle' )->set_width( 80 ),
        ) )
    ); 
}

function sabaaf_show_section_header($section_header) {
    if(!empty($section_header) && is_array($section_header)) : ?>
        <div class="c-section-header">
            <?php 
                foreach ($section_header as $header) :
                    extract($header);
                    if($tagline != '')
                        echo "<$tagline_tag class='tagline'>$tagline</$tagline_tag>";
                    if($title != '')
                        echo "<$title_tag class='title'>$title</$title_tag>";
                    if($subtitle != '')
                        echo "<$subtitle_tag class='subtitle'>$subtitle</$subtitle_tag>";
                endforeach;
            ?>
        </div>
    <?php endif;
}


function sabaaf_title( $field_name = 'title', $label = 'Title') {
    return array(
        Field::make( 'text', $field_name , $label ),
    ); 
}


function sabaaf_text( $field_name = 'text', $label = 'Text') {
	return array(
        Field::make( 'rich_text', $field_name , $label ),
    ); 
}



function sabaaf_image( $field_name = 'image', $label = 'Image') {
	return array(
        Field::make( 'image', $field_name , $label ),
    ); 
}

function sabaaf_team_members( $field_name = 'team_members', $label = 'Team members') {
	return array(
        Field::make( 'association', $field_name , $label )
        ->set_types( array(
            array(
                'type'      => 'post',
                'post_type' => 'sabaaf-team-member',
            )
        ) )
    ); 
}

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


