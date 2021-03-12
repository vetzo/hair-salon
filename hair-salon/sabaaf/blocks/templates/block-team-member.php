<?php extract($args['fields']); ?>
<div class="b-team-members block">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center mb-5">
				<?php sabaaf_show_section_header($section_header); ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php foreach( $team_members as $team_member ) : ?>
				<div class="col-12 col-md-6 col-lg text-center team-member">
					<div class="image">
						<?php echo get_the_post_thumbnail( $team_member['id'], 'full', array( 'class' => 'mb-3' ) ); ?>
					</div>
					<h2 class="name"><?php echo get_the_title($team_member['id']); ?></h4>
					<h4 class="position"><?php echo carbon_get_post_meta( $team_member['id'], 'position' ); ; ?></h4>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>