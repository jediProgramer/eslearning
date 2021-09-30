<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_users');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>users"><?php echo lang('users');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_users');?></li>
		</ol>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
				
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-body">
            	<?php
					foreach($daftaruser as $du)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>users/updateusers" method="post" enctype="multipart/form-data" id="webusersForm">
                <div class="card-body">
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
                    <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('password');?></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNegara" class="col-sm-2 col-form-label"><?php echo lang('country');?></label>
                        <div class="col-sm-10">
						<select class="form-control" id="country" name="country">
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
                    <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('email');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="email" name="email" value="<?php echo $du["email"];?>">
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
				  <div class="form-group row">
                    <label for="inputPeran" class="col-sm-2 col-form-label"><?php echo lang('roles');?></label>
                        <div class="col-sm-10">
						<select class="form-control" id="roles" name="roles">
						<?php 
						foreach($dataroles as $dr)
						{ 
							if($dr->idroles==$du["roles"])
							{
						?>
								<option value="<?php echo $dr->idroles; ?>" selected ><?php echo $dr->roles;?></option>
						<?php
							}
							else
							{
						?>
								<option value="<?php echo $dr->idroles; ?>" ><?php echo $dr->roles;?></option>
						<?php
							}
						}
						?>
                        </select>
						</div>
                    </div>
					<div class="form-group row">
                    <label for="inputStatus" class="col-sm-2 col-form-label"><?php echo lang('active');?></label>
                    <div class="col-sm-10">
						<div class="form-check">
                          <input class="form-check-input" type="radio" id="active" name="active" value="1" <?php if($du["active"]=="1"){?>checked="true"<?php }else {?><?php }?>>
                          <label class="form-check-label"><?php echo lang('active');?></label>
                        </div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" id="active" name="active" value="0" <?php if($du["active"]=="0"){?>checked="true"<?php }else {?><?php }?>>
						  <label class="form-check-label"><?php echo lang('not');?></label>
						</div>
                    </div>
                  </div>
				  
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="iduser" name="iduser" value="<?php echo $du["iduser"];?>">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
				</form>  
				<?php
					}
				?>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->