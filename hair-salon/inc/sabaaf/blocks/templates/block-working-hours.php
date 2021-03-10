<?php extract($args['fields']); ?>
<div class="b-working-hours block">
	<div class="bg-dark text-white  py-5">
		<div class="container">
			<div class="row">
				<div class="col-md-6 align-self-center">
					<?php sabaaf_show_section_header($section_header); ?>
				</div>
				<div class="col-md-6 align-self-center">
					 <div id="Wednesday" class="dateTime clearfix py-2">
				        <div class="day">Monday - Friday</div>
				        <div class="time">4pm - 12am</div>
				      </div>
				 
				      <div id="Thursday" class="dateTime clearfix py-2">
				        <div class="day">Saturday</div>
				        <div class="time">4pm - 12am</div>
				      </div>
				 
				      <div id="Friday" class="dateTime clearfix py-2">
				        <div class="day">Sunday and holiday</div>
				        <div class="time">Closed</div>
				      </div>
				</div>
			</div>
		</div>
	</div>
</div>