<div class="row">
	<div class="col-md-12">
		<h2>My Appointment</h2>
		<hr class="cs">
		<table class="dt resp" >
			<thead>
				<tr>
					<th>Meeting Request</th>
					<th>Event Date</th>
					<th>Event Type</th>
					<th>Package</th>
					<th>Status</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if($data == null){
					echo Lib::tblNotFound(6);
				}else{
					foreach ($data as $key => $value) {
				?>
				<tr>
					<td data-label="Meeting Request">
						<?php echo Lib::dateInd($value['meeting_date'], true).' '.substr($value['meeting_time'], 0,5) ?>
					</td>
					<td data-label="Event Date">
						<?php echo Lib::dateInd($value['event_date'], true) ?>
					</td>
					<td data-label="Event Type">
						<?php echo Lib::EventName($value['id_event_type']) ?>
					</td>
					<td data-label="Package">
						<?php echo Lib::packageName($value['id_sub_event_type']) ?>
					</td>
					<td data-label="Status">
						<?php echo Lib::status($value['status']) ?>
					</td>
					<td data-label="Action" align="center" class="td-cst">
						<a href="<?php echo app_base.'detail_appointment_client&id_event='.$value['id_event'] ?>">
							<button style="margin-bottom:5px" type="button" class="btn cst1 btn-full" ><i class="fa fa-eye"></i> Detail</button>
						</a>
						<a onclick="return confirm('Cancel appointment?')" href="<?php echo app_base.'cancel_appointment&id_event='.$value['id_event'] ?>">
							<button type="button" class="btn cst1 btn-full" ><i class="fa fa-close"></i> Cancel</button>
						</a>
					</td>
				</tr>
				<?php }} ?>
			</tbody>
		</table>
	</div>
</div>