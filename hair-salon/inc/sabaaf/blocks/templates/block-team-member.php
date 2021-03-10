<?php extract($args['fields']); ?>
<div class="b-team-members block">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1><?php echo $title; ?></h1>
			</div>
		</div>
		<div class="row justify-content-center">
			<?php foreach( $team_members as $team_member ) : ?>
				<div class="col-12 col-md-6 col-lg text-center">
					<?php echo get_the_post_thumbnail( $team_member['id'], 'full', array( 'class' => 'border-circle' ) ); ?>
					<p><?php echo get_the_title($team_member['id']); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>