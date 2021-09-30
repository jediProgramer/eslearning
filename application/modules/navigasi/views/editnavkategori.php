<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_navigation_category');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>navigasi/kategori"><?php echo lang('navigation_category');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_navigation_category');?></li>
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
					foreach($datanavcategory as $dnc)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>navigasi/updatenavkategori" method="post" enctype="multipart/form-data" id="webkategoriForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('navigation_category');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="name" name="name" value="<?php echo $dnc["name"];?>">
                    </div>
                  </div>
                </div> 
				</div>
				<!-- /.card -->
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idnavcategory" name="idnavcategory" value="<?php echo $dnc["idnavcategory"];?>">
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