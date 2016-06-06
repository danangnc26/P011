<div class="row">
	<div class="col-md-12">
		<h2>My Appointment Detail</h2>
		<hr class="cs">
		<?php
		if($data == null){

		}else{
		foreach ($data as $key => $value) {
		?>
						<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Client Name</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo Lib::userName($value['id_user']) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-8">
					  			<h5 style=" font-size:1.3em; color:#990033">Meeting Request</h5>
					  			<hr style="margin-top:0px;">
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Meeting Dates</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo Lib::dateInd($value['meeting_date'], true) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Meeting Time</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo substr($value['meeting_time'], 0,5) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-8">
					  			<h5 style=" font-size:1.3em; color:#990033">Event Detail</h5>
					  			<hr style="margin-top:0px;">
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Event Name</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo $value['event_name'] ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Event Start Time</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo substr($value['event_time'], 0,5) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Event Dates</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo Lib::dateInd($value['event_date'], true) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Event Location</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo $value['event_location'] ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Event Type</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo Lib::EventName($value['id_event_type']) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Package</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo Lib::packageName($value['id_sub_event_type']) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-8">
					  			<h5 style=" font-size:1.3em; color:#990033">Appointment Status</h5>
					  			<hr style="margin-top:0px;">
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Status</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo Lib::status($value['status']) ?>
					  		</div>
					  	</div>
					  	<div class="row" style="margin-bottom:10px;">
					  		<div class="col-md-2">
					  			<label class="b">Note</label>
					  		</div>
					  		<div class="col-md-6">
					  			<?php echo $value['note'] ?>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-12">
					  				<a href="<?php echo app_base.'my_appointment' ?>">
				                    	<button style="margin-top:20px;" type="button" class="btn cst1 btn-full" ><i class="fa fa-arrow-left"></i> Back</button>
				                    </a>
					  		</div>
					  	</div>
		<?php }} ?>
	</div>
</div>