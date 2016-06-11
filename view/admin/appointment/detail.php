<div class="row">
	<div class="col-md-12">
		<?php include "view/component/oth.php" ?>
		<h2>Admin Panel</h2>
		<hr class="cs">
		<div class="row">
			<div class="col-md-3">
				<?php include "view/component/admin-menu.php" ?>
			</div>
			<div class="col-md-9">
				<div class="row">
				  <div class="col-md-12" style="margin-bottom:20px;">
				  	<h3>Appointment Detail</h3>
				  </div>
				  <div class="col-md-12">
				  <?php
				  if($data == null){

				  }else{
				  foreach ($data as $key => $value) {
				  ?>
				  	<form method="post" action="<?php echo app_base.'save_appointment' ?>" enctype="multipart/form-data">
				  		<input type="hidden" name="id_event" value="<?php echo $value['id_event'] ?>">
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Client Name</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" name="" value="<?php echo Lib::userName($value['id_user']) ?>" readonly>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Phone</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" name="" value="<?php echo Lib::userPhone($value['id_user']) ?>" readonly>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Email</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<input type="text" class="form-control cst" name="" value="<?php echo Lib::userEmail($value['id_user']) ?>" readonly>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-8">
					  			<h5 style=" font-size:1.3em; color:#990033">Meeting Request</h5>
					  			<hr style="margin-top:0px;">
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Meeting Dates</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
				                    <input type="text" readonly name="meeting_date" value="<?php echo Lib::dateInd($value['meeting_date'], true) ?>" class="form-control cst">
				                </div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Meeting Time</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
									<input type="text" readonly name="meeting_time" value="<?php echo substr($value['meeting_time'], 0,5) ?>" class="form-control cst">
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-8">
					  			<h5 style=" font-size:1.3em; color:#990033">Event Detail</h5>
					  			<hr style="margin-top:0px;">
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Event Name</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
									<input <?php echo ($value['status'] != '2') ? 'readonly' : '' ?> type="text" name="event_name"  value="<?php echo $value['event_name'] ?>" class="form-control cst">
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Event Start Time</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
									<!-- <input  type="text" name="event_time" value="" class="form-control cst"> -->
									<input type="text" <?php echo ($value['status'] != '2') ? 'readonly' : '' ?> name="event_time" class="form-control cst timepicker timepicker-24" value="<?php echo substr($value['event_time'], 0,5) ?>" required>
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Event Dates</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
									<input type="text" readonly value="<?php echo Lib::dateInd($value['event_date'], true) ?>" class="form-control cst" required>
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Event Location</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
									<input type="text" readonly name="event_location" value="<?php echo $value['event_location'] ?>" class="form-control cst">
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Event Type</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
									<input type="text" readonly value="<?php echo Lib::EventName($value['id_event_type']) ?>" class="form-control cst" required>
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Package</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
									<input type="text" readonly value="<?php echo Lib::packageName($value['id_sub_event_type']) ?>" class="form-control cst" required>
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-8">
					  			<h5 style=" font-size:1.3em; color:#990033">Appointment Status</h5>
					  			<hr style="margin-top:0px;">
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Status</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
				                    <select class="form-control cst" name="status">
				                    	<option <?php echo ($value['status'] == '') ? 'selected' : '' ?> value="">-- Choose Status --</option>
				                    	<option <?php echo ($value['status'] == '0') ? 'selected' : '' ?> value="0">Pending Request</option>
				                    	<option <?php echo ($value['status'] == '1') ? 'selected' : '' ?> value="1">Meeting Request Approved</option>
				                    	<option <?php echo ($value['status'] == '2') ? 'selected' : '' ?> value="2">Event Plan Approved</option>
				                    	<option <?php echo ($value['status'] == '-') ? 'selected' : '' ?> value="-">Request Rejected</option>
				                    </select>
				                </div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			<label class="b">Note</label>
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
				                    <textarea class="form-control cst" rows="4" style="resize:none" name="note"></textarea>
				                </div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-2">
					  			
					  		</div>
					  		<div class="col-md-6">
					  			<div class="form-group">
					  				<button class="btn cst1" ><i class="fa fa-save"></i> Save</button>
				                    <a href="<?php echo app_base.'index_appointment&main=appointment' ?>">
				                    	<button type="button" class="btn cst1" ><i class="fa fa-arrow-left"></i> Back</button>
				                    </a>
				                </div>
					  		</div>
					  	</div>
					</form>
				 	<?php
				 }}
				 	?>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('select[name="status"]').change(function(){
		if($('select[name="status"]').val() == '2'){
			$('input[name="event_name"]').attr('readonly', false);
			$('input[name="event_time"]').attr('readonly', false);
			$('.timepicker-24').timepicker({
                autoclose: true,
                minuteStep: 10,
                showSeconds: false,
                showMeridian: false
            });
		}else{
			$('input[name="event_name"]').attr('readonly', true);
			$('input[name="event_time"]').attr('readonly', true);
			$('input[name="event_time"]').val('');
		}
	});
	<?php if($value['status'] == '2'){
	?>
	$('.timepicker-24').timepicker({
                autoclose: true,
                minuteStep: 10,
                showSeconds: false,
                showMeridian: false
            });
	<?php
	}
	?>
</script>