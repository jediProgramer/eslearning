<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_roles');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>roles"><?php echo lang('roles');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_roles');?></li>
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
					foreach($dataroles as $dr)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>roles/updateroles" method="post" enctype="multipart/form-data" id="webrolesForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputPeran" class="col-sm-2 col-form-label"><?php echo lang('roles');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="roles" name="roles" value="<?php echo $dr["roles"];?>">
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idroles" name="idroles" value="<?php echo $dr["idroles"];?>">
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