<?php extract($args['fields']); ?>
<div class="b-text-and-image block">
	<div class="container">
		<div class="row ">
			<div class="col-md-6 align-self-center">
				<?php sabaaf_show_section_header($section_header); ?>
				<?php echo $text; ?>
			</div>
			<div class="col-md-6 show-background align-self-center">
				<?php echo wp_get_attachment_image( $image, 'full', "", array( "class" => "img-responsive" ) );  ?>
			</div>
		</div>
	</div>
</div>