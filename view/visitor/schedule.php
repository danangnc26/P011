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
					<div style="text-align:center">
						<h4>Sisa Kuota Minggu Ini</h4>
						<h1 style="font-size:10em">10</h1>
						<h4><i class="fa fa-check"></i> Anda Masih Bisa Pesan</h4>
						<button class="btn cst1" ><i class="fa fa-bookmark"></i> Buat Janji</button>
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
						<button class="btn cst1" ><i class="fa fa-bookmark"></i> Buat Appointment</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				xmlUrl: '<?php echo base_url."assets/plugin/monthly/" ?>events.xml'
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
	</script>