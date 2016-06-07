<?php 
if(empty($_SESSION)){
	echo Lib::redirectjs(app_base.'login', 'You must login first.');
}else{
	// if($_SESSION['level_user'] == 'admin'){
	// 	header(string)
	// }
}
// Lib::uCheck() 
?>
<style type="text/css">
	.bootstrap-timepicker-widget table{
		border:none;
	}
</style>
<div class="row">
	<div class="col-md-12">
		<h2>Check Our Schedule</h2>
		<hr class="cs">
		<div class="row">
			<div class="col-md-8">
				<div style="width:100%; display:inline-block; box-shadow:0px 1px 1px #888888">
					<div class="monthly" id="mycalendar"></div>
				</div>
			</div>
			<div class="col-md-4" >
				<div class="show-kuota" style="border:1px solid #990033; border-radius:2px; padding: 1em; ">
					<div class="form-group">
						<label>Look Up Event Dates : </label>
						<div class='input-group date datepicker' style="padding:0px;">
		                    <input type='text' readonly name="event_date" value="<?php echo date('d-m-Y') ?>" class="form-control cst"/>
		                    <span class="input-group-addon">
		                        <i class="fa fa-calendar"></i>
		                    </span>
		                </div>
					</div>
					<div class="form-group">
						<button type="button" id="check_quota" class="btn cst1" style="width:100%"><i class="fa fa-search"></i> Check Quota</button>
					</div>
					<div style="text-align:center; display:none" id="show_quota">
						<hr class="cs">
						<div class="loader" style="display:none">
							<img src="<?php echo base_url.'assets/img/load.gif' ?>" style="margin-bottom:10px;">
							<h4><small>Checking Quota</small></h4>
							<h4><small>Please Wait</small></h4>
						</div>
						<div id="dis_quota" style="display:none">
							<h4>Rest of Quota</h4>
							<div class="row" style="margin-bottom:20px;">
								<div class="col-xs-6 col-md-6" style="border-right:1px solid #990033">
									<h1 id="quota_day" style="font-size:8em"></h1>
									for selected day
								</div>
								<div class="col-xs-6 col-md-6" style="">
									<h1 id="quota_week" style="font-size:8em"></h1>
									for selected week
								</div>
							</div>
							<h4 id="kuota_avability"></h4>
							<button type="button" id="btn_make_appointment" class="btn cst1" style="width:100%"><i class="fa fa-bookmark"></i> Make Appointment</button>
						</div>
					</div>
					<div id="dis_appointment" style="display:none">
					<hr class="cs">
					<form method="post" action="<?php echo app_base.'send_appointment' ?>">
							<div class="form-group">
								<label>Meeting Dates : </label>
								<div class='input-group date datepicker-meeting' style="padding:0px;">
				                    <!-- <input type='text' readonly name="event_date" value="<?php echo date('d-m-Y') ?>" class="form-control cst"/> -->
				                    <input type="text" readonly name="meeting_date" value="<?php echo date('d-m-Y') ?>" class="form-control cst" data-date-end-date="" required>
				                    <span class="input-group-addon">
				                        <i class="fa fa-calendar"></i>
				                    </span>
				                </div>
							</div>
							<div class="form-group">
								<label>Meeting Time : </label>
								<div class="input-group">
									<input type="text" readonly name="meeting_time" class="form-control cst timepicker timepicker-24" required>
									<span class="input-group-btn">
										<button style="border:1px solid #990033; background: #990033; color:#fff" class="btn default" type="button"><i class="fa fa-clock-o"></i></button>
									</span>
								</div>

								<!-- <input type="text" class="form-control cst"> -->
							</div>
							<div class="form-group">
								<label>Event Location : </label>
								<input type="text" name="event_location" class="form-control cst" requiired>
							</div>
							<div class="form-group">
								<label>Date Book Events : </label>
								<input name="event_date_book" type="text" class="form-control cst" readonly requiired>
							</div>
							<div class="form-group">
								<label>Event Type : </label>
								<select class="form-control cst" name="id_event_type" required>
									<?php echo Lib::dropdownEventType() ?>
								</select>
							</div>
							<div class="form-group">
								<label>Package : </label>
								<select class="form-control cst" name="id_sub_event_type" required>
									<option value="">-- Choose Package --</option>
									<?php //echo Lib::dropdownSubEventType() ?>
								</select>
							</div>
							<div class="form-group">
								<button style="width:100%" class="btn cst1" ><i class="fa fa-bookmark"></i> Send Appointment</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
	<script type="text/javascript">
		$('select[name="id_event_type"]').change(function(){
			$.get("<?php echo base_url.'function/func.php?func=dropdown_sub_event_type&id_event_type=' ?>"+$('select[name="id_event_type"]').val(), function(data){
				$('select[name="id_sub_event_type"]').empty();
				$('select[name="id_sub_event_type"]').append(data);
				console.log(data);
			});
		});
		$('.datepicker').datepicker({
				format : 'dd-mm-yyyy',
				startDate: 'today',
				endDate: '+1095d'
		});

		$('.datepicker-meeting').datepicker({
				format : 'dd-mm-yyyy',
				daysOfWeekDisabled: [0,6],
				startDate: 'today',
				endDate: '+1095d'
    			// endDate: $('input[name=event_date]').val()
		});
		// $('input[name=meeting_date]').attr("data-date-end-date","23-06-2016");


		$('.timepicker-24').timepicker({
				defaultTime: '15:00',
                autoclose: true,
                minuteStep: 10,
                showSeconds: false,
                showMeridian: false,
                minHours: 15,
                maxHours: 19,
            });
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				xmlUrl: '<?php echo base_url."function/func.php?func=generate_event_xml" ?>'
			});


		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
		// // // // // // // // // // // 


		$('input[name=event_date]').change(function(){
			$('.datepicker-dropdown').hide();
			// alert('asdf');
		});

		$('#check_quota').click(function(){
			$('#dis_quota').hide();
			$('#show_quota').show();
			$('.loader').show();
			
			
			chkQuota($('input[name=event_date]').val())
			// intv = setInterval(function(){ 
				
			// }, 3000);
		});

		$('#btn_make_appointment').click(function(){
			$('#dis_appointment').show();
			$('input[name=event_date_book]').val($('input[name=event_date]').val());
		});

		function chkQuota(date)
		{
			
			$.get("<?php echo base_url.'function/func.php' ?>?func=check_quota&date="+date, function(data){
				$('.loader').hide();
				$('#dis_quota').show();
				$('#dis_appointment').hide();

				var json = $.parseJSON(data);
				// console.log(data);
				var kuota_hari = 3 - json.one_day.jml;
				var kuota_minggu = 6 - json.one_week.jml;
				if(kuota_hari >= kuota_minggu){
					$('#quota_day').text(kuota_minggu);	
				}else{
					$('#quota_day').text(kuota_hari);
				}
				
				$('#quota_week').text(kuota_minggu);

				if(kuota_hari == 0){
					if(kuota_minggu == 0){
						$('#kuota_avability').html('<i class="fa fa-close"></i> Sorry, No More Quota for The Selected Week');	
						$('#btn_make_appointment').attr('disabled', true);
					}else{
						$('#kuota_avability').html('<i class="fa fa-close"></i> You Cannot Be Booked for The Selected Day, But You Can Still Book for Other Day');
						$('#btn_make_appointment').attr('disabled', true);
					}
					
				}else{
					if(kuota_minggu == 0){
						$('#kuota_avability').html('<i class="fa fa-close"></i> Sorry, No More Quota for The Selected Week');	
						$('#btn_make_appointment').attr('disabled', true);
					}else{
						$('#kuota_avability').html('<i class="fa fa-check"></i> You Can Still Book');
						$('#btn_make_appointment').attr('disabled', false);
					}
				}
			});

		}

	</script>
					<!-- <hr class="cs">
					<div style="text-align:center">
						<h4>Sisa Kuota Minggu Ini</h4>
						<h1 style="font-size:10em">10</h1>
						<h4><i class="fa fa-check"></i> Anda Masih Bisa Pesan</h4>
						<button type="button" class="btn cst1" ><i class="fa fa-bookmark"></i> Buat Janji</button>
					</div>
					<hr class="cs">
					<div class="form-group">
						<label>Tanggal : </label>
						<input type="text" class="form-control cst">
					</div>
					<div class="form-group">
						<label>Tanggal Pesan Acara : </label>
						<input type="text" class="form-control cst">
					</div>
					<div class="form-group">
						<label>Jenis Acara : </label>
						<select class="form-control cst">
							<option>-- Pilih Jenis Acara --</option>
						</select>
					</div>
					<div class="form-group">
						<label>Paket : </label>
						<select class="form-control cst">
							<option>-- Pilih Paket --</option>
						</select>
					</div>
					<div class="form-group">
						<button type="button" class="btn cst1" ><i class="fa fa-bookmark"></i> Buat Appointment</button>
					</div> -->