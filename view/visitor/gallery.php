<div class="row">
	<div class="col-md-12">
		<h2>Gallery</h2>
		<hr class="cs">
		<div class="row">
		<?php
		if(Lib::getImages('gallery') == null){

		}else{
		foreach (Lib::getImages('gallery') as $key => $value) {
		?>
		  <div class="col-xs-6 col-md-3">
		    <img width="100%" height="300" class="cst-image" src="<?php echo base_url.'public/images/'.$value['image'] ?>"   style="margin-bottom:10px;">
		  </div>
		<?php
		}}
		?>
		</div>
		<!-- <div class="row">
			<div class="col-md-3">
				<div class="grd-hold">
					<img class="cst-image" src="<?php echo base_url.'assets/img/fdw.jpg' ?>" style="margin-bottom:10px;">
					<h4>Title</h4>
					<p>Lorem Ipsum Sit Dolor Amet Lorem Ipsum Sit Dolor Amet Lorem Ipsum Sit Dolor Amet </p>
				</div>
			</div>
		</div> -->
	</div>
</div>