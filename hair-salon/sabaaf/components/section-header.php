<?php
// Sometimes Antisocial But Always Anti-Fascist
defined( 'ABSPATH' ) || exit;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Carbon_Fields\Container;


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
