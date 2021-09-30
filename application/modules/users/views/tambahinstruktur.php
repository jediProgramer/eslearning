<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('add_instructors');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>users/instructors"><?php echo lang('instructors');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('add_instructors');?></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>users/saveinstructors" method="post" enctype="multipart/form-data" id="webusersForm">
                <div class="card-body">
				  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label"><?php echo lang('name');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="fullname" name="fullname">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputUserName" class="col-sm-2 col-form-label"><?php echo lang('username');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="username" name="username">
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
						?>
                          <option value="<?php echo $dc->country_name;?>"><?php echo $dc->country_name;?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('email');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="email" name="email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNoTlpn" class="col-sm-2 col-form-label"><?php echo lang('phoneno');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="phoneno" name="phoneno">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPekerjaan" class="col-sm-2 col-form-label"><?php echo lang('job');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="jobs" name="jobs">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputInstitusi" class="col-sm-2 col-form-label"><?php echo lang('institution');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="institution" name="institution">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('profile');?></label>
                    <div class="col-sm-10">
                      <textarea class="textarea" placeholder="<?php echo lang('add_text_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="profile" name="profile"></textarea>
						<script>
						 CKEDITOR.replace('profile');
						</script>	
					</div>
                  </div>
					<div class="form-group row">
                    <label for="inputStatus" class="col-sm-2 col-form-label"><?php echo lang('active');?></label>
                    <div class="col-sm-10">
						<div class="form-check">
                          <input class="form-check-input" type="radio" id="active" name="active" value="1" checked="true">
                          <label class="form-check-label"><?php echo lang('active');?></label>
                        </div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" id="active" name="active" value="0">
						  <label class="form-check-label"><?php echo lang('not');?></label>
						</div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
				</form>  
            
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->