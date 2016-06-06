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
				  	<h3>Edit Page</h3>
				  </div>
				  <div class="col-md-12">
				  	<?php 
				  	if($data == null){

				  	}else{
				  	foreach ($data as $key => $value) {
				  	?>
				  	<form method="post" action="<?php echo app_base.'update_config' ?>" enctype="multipart/form-data" onsubmit="return postForm()">
				  		<input type="hidden" name="id_config" value="<?php echo $value['id_config'] ?>">
					  	<div class="row">
					  		<div class="col-md-6">
					  			<div class="form-group">
					  				<label class="b">Page Type</label>
							  		<input type="text" class="form-control cst" readonly value="<?php echo ucfirst($value['type']) ?>">
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-md-12">
					  			<div class="form-group">
					  				<textarea id="summernote" name="text"><?php echo htmlspecialchars_decode($value['text']) ?></textarea>
							  	</div>
					  		</div>
					  	</div>
					  	<div class="row">					  	
					  		<div class="col-md-6">
					  			<div class="form-group">
							  		<button class="btn cst1" ><i class="fa fa-check"></i> Save</button>
							  		<a href="<?php echo app_base.'index_gallery&main=gallery' ?>">
							  			<button type="button" class="btn cst1" ><i class="fa fa-arrow-left"></i> Back</button>
							  		</a>
							  	</div>
					  		</div>
					  	</div>
					</form>
					<?php }} ?>
				  </div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
	  $('#summernote').summernote({
	  	  toolbar: [
		     ['style', ['style']],
		    ['font', ['bold', 'italic', 'underline', 'clear']],
		    ['fontname', ['fontname']],
		    ['fontsize', ['fontsize']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['height', ['height']],
		    ['table', ['table']],
		    ['insert', ['link', 'picture', 'hr']],
		    ['view', ['fullscreen', 'codeview']],
		    ['help', ['help']],
		  ],
		  height: 500,                 // set editor height
		  minHeight: null,             // set minimum height of editor
		  maxHeight: null,             // set maximum height of editor
		  focus: true                  // set focus to editable area after 
	  });
	});
	var postForm = function() {
		var content = $('textarea[name="text"]').html($('#summernote').code());
	}
</script>