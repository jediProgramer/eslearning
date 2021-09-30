<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('add_education');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>users/educationinstructors/<?php echo $iduser_web;?>"><?php echo lang('education');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('add_education');?></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>users/saveeducation" method="post" enctype="multipart/form-data" id="webeducationForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJenjang" class="col-sm-2 col-form-label"><?php echo lang('level');?></label>
                        <div class="col-sm-10">
						<select class="form-control" id="level" name="level">
						<?php
							foreach($dataeducationlevel as $dj)
							{
						?>
							<option value="<?php echo $dj["educationlevel"];?>"><?php echo $dj["educationlevel"];?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                 </div>
					
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('field_of_study');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="field_of_study" name="field_of_study">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNoTlpn" class="col-sm-2 col-form-label"><?php echo lang('college');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="college" name="college">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label"><?php echo lang('graduation_year');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="graduation_year" name="graduation_year">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label"><?php echo lang('city');?></label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="city" name="city">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputJenjang" class="col-sm-2 col-form-label"><?php echo lang('country');?></label>
                        <div class="col-sm-10">
						<select class="form-control select2" style="width: 100%;" id="country" name="country">
						<?php
							foreach($datanegara as $dn)
							{
						?>
							<option value="<?php echo $dn["country_name"];?>"><?php echo $dn["country_name"];?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
				  
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				          <input type="hidden" class="form-control" id="iduser" name="iduser" value="<?php echo $iduser_web;?>">
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