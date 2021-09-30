<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('user_profile');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('user_profile');?></li>
		</ol>
	  </div><!-- /.col -->
	</div><!-- /.row -->
	
	<?php if($this->session->flashdata('msg_error')){?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> <?php echo lang('error_message_title');?></h5>
				<?php echo $this->session->flashdata('msg_error');?>.
			</div>
		 <?php }?>
		
	    <?php if($this->session->flashdata('msg_success')){?>
		<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h5><i class="icon fas fa-check"></i> <?php echo lang('success_message_title');?></h5>
		  <?php echo $this->session->flashdata('msg_success');?>.
		</div>
		<?php }?>
	
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
               <form class="form-horizontal" action="<?php echo base_url()?>profile/updateusers" method="post" enctype="multipart/form-data" id="webusersProfileForm">
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
                    <label for="inputPasswordOld" class="col-sm-2 col-form-label"><?php echo lang('old_password');?></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="oldpassword" name="oldpassword">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('new_password');?></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('country');?></label>
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
                    <label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('email');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="email" name="email" value="<?php echo $du["email"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('phoneno');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="phoneno" name="phoneno" value="<?php echo $du["phoneno"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('job');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="jobs" name="jobs" value="<?php echo $du["jobs"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('institution');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="institution" name="institution" value="<?php echo $du["institution"];?>">
                    </div>
                  </div>
				  <?php if($du["profilepicture"]!="")
						{  
				  ?>
				  <div class="form-group row">
					<label for="inputProfilepicture" class="col-sm-2 col-form-label"><?php echo lang('profile_picture');?></label>
					<div class="col-sm-10">
						<img src="<?php echo base_url()?>assets/files/users/<?php echo $du["profilepicture"];?>" width="200px" height="200px">
						<br/><br/>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="profilepicture" name="profilepicture">
							<label class="custom-file-label" for="profilepicture"><?php echo lang('chose_file');?></label>
						</div>
					</div>	
				  </div>
				  <?php
						}
						else
						{	
				  ?>
					<div class="form-group row">
						<label for="inputProfilepicture" class="col-sm-2 col-form-label"><?php echo lang('profile_picture');?></label>
						<div class="col-sm-10">
							<img src="<?php echo base_url()?>assets/files/users/default_user.png" width="200px" height="200px">
							<br/><br/>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="profilepicture" name="profilepicture">
								<label class="custom-file-label" for="profilepicture"><?php echo lang('chose_file');?></label>
						    </div>
						</div>
					</div>
				  <?php
						}
				  ?>
				  
                </div>
                <!-- /.card-body -->
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
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->