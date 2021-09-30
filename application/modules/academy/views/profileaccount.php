<?php
	foreach($datauser as $du)
	{
?>
<form class="form-horizontal" id="webprofileaccountForm">
<div class="card-body">
	<br/>
		<div class="form-group row">
		<label for="inputName" class="col-sm-2 col-form-label"><?php echo lang('name');?></label>
		<div class="col-sm-10">
		  <input type="type" class="form-control" id="fullname" name="fullname" value="<?php echo $du["fullname"];?>">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="inputUserName" class="col-sm-2 col-form-label"><?php echo lang('username');?></label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="username" name="username" value="<?php echo $du["username"];?>">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="inputNegara" class="col-sm-2 col-form-label"><?php echo lang('country');?></label>
			<div class="col-sm-10">
			<select class="form-control select2" id="country" name="country">
			<?php 
			foreach($datacountries as $dc)
			{ 
				if($dc->country_name==$du["country"])
				{
			?>
					<option value="<?php echo $dc->country_name; ?>" selected ><?php echo $dc->country_name;?></option>
			<?php
				}
				else
				{
			?>
					<option value="<?php echo $dc->country_name; ?>" ><?php echo $dc->country_name;?></option>
			<?php
				}
			}
			?>
			</select>
			</div>
		</div>
		
		<div class="form-group row">
		<label for="inputNoTlpn" class="col-sm-2 col-form-label"><?php echo lang('phoneno');?></label>
		<div class="col-sm-10">
		  <input type="type" class="form-control" id="phoneno" name="phoneno" value="<?php echo $du["phoneno"];?>">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="inputPekerjaan" class="col-sm-2 col-form-label"><?php echo lang('job');?></label>
		<div class="col-sm-10">
		  <input type="type" class="form-control" id="jobs" name="jobs" value="<?php echo $du["jobs"];?>">
		</div>
	  </div>
	  <div class="form-group row">
		<label for="inputInstitusi" class="col-sm-2 col-form-label"><?php echo lang('institution');?></label>
		<div class="col-sm-10">
		  <input type="type" class="form-control" id="institution" name="institution" value="<?php echo $du["institution"];?>">
		</div>
	  </div>
	  <div class="form-group row" >
		<label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('profilebio');?></label>
		<div class="col-sm-10">
		  <textarea class="textarea" class="textarea" placeholder="<?php echo lang('add_text_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="profile" name="profile"><?php echo $du["profile"];?></textarea>
		</div>
	  </div>
		
		
		<div class="form-group row">
			<div class="offset-sm-2 col-sm-10">
			  <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('saves');?></button>
		</div>
	</div>
</div>
</form>
<?php
	}
?>