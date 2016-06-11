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
				  	<h3>Appointment List</h3>
				  </div>
				  <div class="col-md-12">
				  	<table class="dt">
						<thead>
							<tr>
								<th>Client Name</th>
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
								echo Lib::tblNotFound(7);
							}else{
							foreach ($data as $key => $value) {
							?>
							<tr>
								<td><?php echo Lib::userName($value['id_user']) ?></td>
								<td>
									<?php echo Lib::dateInd($value['meeting_date'], true).' '.substr($value['meeting_time'], 0,5) ?>
								</td>
								<td><?php echo Lib::dateInd($value['event_date'], true) ?></td>
								<td><?php echo Lib::EventName($value['id_event_type']) ?></td>
								<td><?php echo Lib::packageName($value['id_sub_event_type']) ?></td>
								<td><?php echo Lib::status($value['status']) ?></td>
								<td width="100" align="center">
									<a title="Detail" href="<?php echo app_base.'detail_appointment&main=appointment&id_event='.$value['id_event'] ?>">
										<i style="font-size:1.8em; margin-right:20px;" class="fa fa-mail-forward"></i>
									</a>
									<a title="Delete" onclick="return confirm('Are you sure want to delete this data?')" href="<?php echo app_base.'delete_appointment&main=appointment&id_event='.$value['id_event'] ?>">
										<i style="font-size:1.8em" class="fa fa-close"></i>
									</a>
								</td>
							</tr>
							<?php
							}}
							?>
						</tbody>
					</table>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>