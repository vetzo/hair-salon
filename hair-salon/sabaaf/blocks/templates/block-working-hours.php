<?php extract($args['fields']); ?>
<div class="b-working-hours block">
	<div class="bg-dark text-white  py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 align-self-center">
					<?php sabaaf_show_section_header($section_header); ?>
				</div>
				<div class="col-md-6 align-self-center">
					<?php foreach ($working_hours as $day) :?>
					 <div class="dateTime clearfix py-2">
				        <div class="day"><?php echo $day['days']; ?></div>
				        <div class="time"><?php echo $day['time']; ?></div>
				      </div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</div>