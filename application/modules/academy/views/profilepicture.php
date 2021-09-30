<form class="form-horizontal" enctype="multipart/form-data"  id="webprofilepictureForm">
<div class="card-body">
	<br/>
	<div class="alert alert-info">
	  <h6><i class="icon fas fa-info"></i> &nbsp;<?php echo lang('info');?></h6>
	  <p align="justify"><?php echo lang('profilepicture_info');?></p>
	</div>
	<br/>
		<div class="form-group row">
		<label for="inputImage" class="col-sm-2 col-form-label"><?php echo lang('image_file');?></label>
			<div class="col-sm-10">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="image" name="image">
					<label class="custom-file-label" for="image"><?php echo lang('chose_file');?></label>
				</div>
			</div>
		</div>
		<div class="form-group row">
			<div class="offset-sm-2 col-sm-10">
			  <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('saves');?></button>
		</div>
	</div>
</div>
</form>