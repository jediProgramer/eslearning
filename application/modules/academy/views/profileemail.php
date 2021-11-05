<form class="form-horizontal" enctype="multipart/form-data"  id="webprofileemailForm">
<div class="card-body">
	<br/>
	<div class="alert alert-warning">
	  <h6><i class="fa fa-info"></i> &nbsp;<?php echo lang('info');?></h6>
	  <p align="justify"><?php echo lang('profileemail_info');?></p>
	</div>
	<br/>
		<div class="form-group row">
			<label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('email');?></label>
			<div class="col-sm-10">
			  <input type="type" placeholder="<?php echo lang('your_email');?>" class="form-control" id="email_new" name="email_new">
			</div>
		</div>
		<div class="form-group row">
			<div class="offset-sm-2 col-sm-10">
			  <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('saves');?></button>
		</div>
	</div>
</div>
</form>