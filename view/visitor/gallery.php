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
		  <a onclick="gtThumbnail(<?php echo $value['id_image'] ?>)" href="#" data-toggle="modal" data-target=".myModal">
		  	<div class="col-xs-6 col-md-3">
		    <img id="thm_<?php echo $value['id_image'] ?>" width="100%" height="300" class="cst-image" src="<?php echo base_url.'public/images/'.$value['image'] ?>"   style="margin-bottom:10px;">
		  </div>
		  </a>
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
  <!-- Modal -->
  <div class="modal fade myModal" id="" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <img id="thmodal" style="width:100%">
        </div>
      </div>
      
    </div>
  </div>
<script type="text/javascript">
	function gtThumbnail(id){
		var im = $('#thm_'+id).attr("src");
		$('#thmodal').attr("src", im);
	}
</script>