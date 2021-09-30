<form class="form-horizontal" id="webprofilepasswordForm">
<div class="card-body">
	<br/>
	<div class="alert alert-danger">
	  <h6><i class="icon fas fa-info"></i> &nbsp;<?php echo lang('info');?></h6>
	  <p align="justify"><?php echo lang('profilepassword_info');?></p>
	</div>
	<br/>
	<div class="form-group row">
	<label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('old_password');?></label>
	<div class="col-sm-10">
	  <input type="password" class="form-control" id="old_password" name="old_password">
	</div>
	</div>
	<div class="form-group row">
	<label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('password');?></label>
	<div class="col-sm-10">
	  <input type="password" class="form-control" id="new_password" name="new_password">
	</div>
	</div>
	<div class="form-group row">
	<label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('confirm_password');?></label>
	<div class="col-sm-10">
	  <input type="password" class="form-control" id="confirm_password" name="confirm_password">
	</div>
	</div>
	<div class="form-group row">
		<div class="offset-sm-2 col-sm-10">
		  <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('saves');?></button>
	</div>
	</div>
</div>
</form>