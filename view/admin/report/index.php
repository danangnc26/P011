		<?php
			if(isset($_GET['tahun']) || isset($_GET['bulan'])){
				$s1 = $_GET['bulan'];
				$s2 = $_GET['tahun'];
			}else{
				$s1 = date('m');
				$s2 = date('Y');
			}
		?>
		<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data) 
    {
        var mywindow = window.open('', 'Print Report', 'height=600,width=1000');
        mywindow.document.write('<html><head><title>Print Report</title>');
        /*optional stylesheet*/ //mywindow.document.write('<link rel="stylesheet" href="main.css" type="text/css" />');
        mywindow.document.write('<style>body{font-family:sans-serif}h4{font-size:25px;} hr{border:none; border-bottom:1px solid #000;} table{width:100%; border:1px solid #000; border-collapse:collapse} table td{font-size:12px; border:1px solid #000; padding:5px;} table th{border:1px solid #000}</style></head><body >');
        <?php
        if(isset($g['report_type']) && $g['report_type'] == 'meeting'){
        	$x = 'Meeting';
        }elseif(isset($g['report_type']) && $g['report_type'] == 'event'){
        	$x = 'Event';
        }else{
        	$x = '';
        }
        ?>
        mywindow.document.write('<center><h4><?php echo $x ?> Schedule Report</h4><h4><?php echo date("F", mktime(0,0,0,$s1,3,$s2)) ?> <?php echo $s2 ?></h4></center>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.document.close(); // necessary for IE >= 10
        mywindow.focus(); // necessary for IE >= 10

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
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
				  	<!-- <a href="<?php echo app_base.'create_gallery&main=gallery' ?>">
				  		<button class="btn cst1 pull-right" ><i class="fa fa-plus"></i> Package Pricing</button>
				  	</a> -->
				  	<h3>Event & Meeting Schedule Report</h3>
				  </div>
				  <div class="row">
				  	<form method="get" action="<?php echo app_base.'index_report&main=report' ?>">
								<input type="hidden" name="page" value="index_report">
								<input type="hidden" name="main" value="report">
								<div class="col-md-3" style="padding-right:0px; margin-left:15px; margin-bottom:20px;">
									<select name="report_type" class="form-control cst" required>
										<option value=""> -- Choose Report Type --</option>
										<option <?php echo (isset($g['report_type']) && $g['report_type'] == 'meeting') ? 'selected' : '' ?> value="meeting">Meeting Schedule Report</option>
										<option <?php echo (isset($g['report_type']) && $g['report_type'] == 'event') ? 'selected' : '' ?> value="event">Event Schedule Report</option>
									</select>
								</div>
								<div class="col-md-2" style="padding-right:0px; margin-left:15px; margin-bottom:20px;">
									<select name="bulan" class="form-control cst">
										<option <?php echo ($s1 == '01') ? 'selected' : ''; ?> value="01">January</option>
										<option <?php echo ($s1 == '02') ? 'selected' : ''; ?> value="02">February</option>
										<option <?php echo ($s1 == '03') ? 'selected' : ''; ?> value="03">March</option>
										<option <?php echo ($s1 == '04') ? 'selected' : ''; ?> value="04">April</option>
										<option <?php echo ($s1 == '05') ? 'selected' : ''; ?> value="05">May</option>
										<option <?php echo ($s1 == '06') ? 'selected' : ''; ?> value="06">June</option>
										<option <?php echo ($s1 == '07') ? 'selected' : ''; ?> value="07">July</option>
										<option <?php echo ($s1 == '08') ? 'selected' : ''; ?> value="08">August</option>
										<option <?php echo ($s1 == '09') ? 'selected' : ''; ?> value="09">September</option>
										<option <?php echo ($s1 == '10') ? 'selected' : ''; ?> value="10">October</option>
										<option <?php echo ($s1 == '11') ? 'selected' : ''; ?> value="11">November</option>
										<option <?php echo ($s1 == '12') ? 'selected' : ''; ?> value="12">December</option>
									</select>
								</div>
								<div class="col-md-2" style="padding-right:0px;">
									<select name="tahun" class="form-control cst">
										<option <?php echo ($s2 == 2016) ? 'selected' : ''; ?> value="2016">2016</option>
										<option <?php echo ($s2 == 2015) ? 'selected' : ''; ?> value="2015">2015</option>
										<option <?php echo ($s2 == 2014) ? 'selected' : ''; ?> value="2014">2014</option>
										<option <?php echo ($s2 == 2013) ? 'selected' : ''; ?> value="2013">2013</option>
										<option <?php echo ($s2 == 2012) ? 'selected' : ''; ?> value="2012">2012</option>
										<option <?php echo ($s2 == 2011) ? 'selected' : ''; ?> value="2011">2011</option>
										<option <?php echo ($s2 == 2010) ? 'selected' : ''; ?> value="2010">2010</option>
									</select>
								</div>
								<div class="col-md-2" style="padding-right:0px;">
									<button style="margin:0px;" class="btn cst1"><i class="fa fa-eye"></i> Show</button>
								</div>
								<div class="col-md-2" style="padding-right:0px;">
									<button type="button" onclick="PrintElem('#print_laporan')"  style="margin:0px;" class="btn cst1"><i class="fa fa-print"></i> Print</button>
								</div>
								</form>
				  </div>
				  <div class="col-md-12">
				  <div id="print_laporan">
				  <?php
				  if($data == null){
				  	// echo "<script>alert('Data not found')</script>";
				  }else{
				  	if($g['report_type'] == 'meeting'){
				  ?>
				  	<table class="dt">
						<thead>
							<tr>
								<th>No.</th>
								<th>Client Name</th>
								<th>Meeting Date</th>
								<th>Meeting Time</th>
								<th>Event Type</th>
								<th>Package</th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($data as $key => $value) {
						?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo Lib::userName($value['id_user']) ?></td>
								<td><?php echo Lib::dateInd($value['meeting_date'], true) ?></td>
								<td><?php echo substr($value['meeting_time'], 0,5) ?></td>
								<td><?php echo Lib::EventName($value['id_event_type']) ?></td>
								<td><?php echo Lib::packageName($value['id_sub_event_type']) ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<?php
						}elseif($g['report_type'] == 'event'){
					?>
					<table class="dt">
						<thead>
							<tr>
								<th>No.</th>
								<th>Client Name</th>
								<th>Event Date</th>
								<th>Event Time</th>
								<th>Event Type</th>
								<th>Package</th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach ($data as $key => $value) {
						?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo Lib::userName($value['id_user']) ?></td>
								<td><?php echo Lib::dateInd($value['event_date'], true) ?></td>
								<td><?php echo substr($value['event_time'], 0,5) ?></td>
								<td><?php echo Lib::EventName($value['id_event_type']) ?></td>
								<td><?php echo Lib::packageName($value['id_sub_event_type']) ?></td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
					<?php
						}else{

						}
					}
					?>
					</div>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
