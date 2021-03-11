<?php 
	extract($args['fields']);
	$unique_id = 'slider-'.hrtime('int');
	$n = count($slides);
?>
<div class="b-slider block">
	<div class="h-100 row">
		<div class="h-100 col-12">
			<div id="<?php echo $unique_id; ?>" class="h-100 carousel slide carousel-fade" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php for($i=0;$i<$n;$i++) : ?>
						<li data-target="#<?php echo $unique_id; ?>" data-slide-to="<?php echo $i; ?>" <?php echo ($i == 0) ? 'class="active"' : ''; ?> ></li>
					<?php endfor; ?>
				</ol>
				<div class="carousel-inner h-100">
						<?php foreach( $slides as $key => $slide ) : 
							$section_header = carbon_get_post_meta( $slide['id'], 'section_header' ); 
							$buttons = carbon_get_post_meta( $slide['id'], 'buttons' ); 
						?>
						<div class="carousel-item <?php echo ($key == 0) ? 'active' : ''; ?>">
							<div class="c-background">
								<?php echo get_the_post_thumbnail( $slide['id'], 'full', array( 'class' => '' ) ); ?>
							</div>
							<div class="container">
								<div class="row justify-content-center">
									<div class="col-10">
										<?php sabaaf_show_section_header($section_header); ?>
										<?php sabaaf_show_buttons($buttons); ?>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<a class="carousel-control-prev" href="#<?php echo $unique_id; ?>" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="carousel-control-next" href="#<?php echo $unique_id; ?>" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
	</div>
</div>





