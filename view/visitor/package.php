<div class="row">
	<div class="col-md-12">
		<h2>Package</h2>
		<hr class="cs">
		<?php
		if($data1 == null){

		}else{
		foreach ($data1 as $key1 => $value1) {
		?>
		<div class="cd-pricing-container cd-has-margins">	
			<div class="col-md-12" style="background :#fff; border-radius: 2px; margin-bottom:10px; text-align:center; padding: 10px; box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);">
				<h3 style="font-family:Oleo Script; font-size:2em; margin:0px;">
					<?php echo $value1['event_type_name'] ?> Package
				</h3>
			</div>
			<ul class="cd-pricing-list cd-bounce-invert">
			<?php 
			if(Lib::SubEventType($value1['id_event_type']) == null){

			}else{
			foreach (Lib::SubEventType($value1['id_event_type']) as $key2 => $value2) {
			?>
				<li>
					<ul class="cd-pricing-wrapper">
						<li data-type="monthly" class="is-visible">
							<header class="cd-pricing-header">
								<h2 class="hf"><?php echo $value2['sub_event_type_name'] ?></h2>

								<div class="cd-price">
									<span class="cd-currency"></span>
									<span class="cd-value"><?php echo Lib::ind($value2['price']) ?>, -</span>
								</div>
							</header> <!-- .cd-pricing-header -->

							<div class="cd-pricing-body">
								<ul class="cd-pricing-features">
									<?php
						  			$x = explode('|', $value2['specification']);
						  			if(sizeof($x) <= 1){					  				
						  			?>
						  				<li><em><?php echo $value2['specification'] ?></em></li>
						  			<?php
						  			}else{
						  				foreach ($x as $k => $v) {
						  			?>
									<li><em><?php echo $v ?></em></li>
									<?php }} ?>
								</ul>
							</div> <!-- .cd-pricing-body -->
						</li>

					</ul> <!-- .cd-pricing-wrapper -->
				</li>
				<?php }} ?>

			</ul> <!-- .cd-pricing-list -->
		</div> <!-- .cd-pricing-container -->	
		<?php }} ?>

	</div>
</div>