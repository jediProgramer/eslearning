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
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses"><?php echo lang('courses');?></a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses/addinstructors/<?php echo $idcourses; ?>"><?php echo lang('instructors');?></a></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>courses/savesinstructors" method="post" enctype="multipart/form-data" id="instructorsForm">
                <div class="card-body">
				        <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('instructors');?></label>
                  <div class="col-sm-10">
                  <select class="form-control select2" id="iduser" name="iduser">
                  <?php
                    foreach($datainstructors as $di)
                    {
                  ?>
                                <option value="<?php echo $di["iduser"];?>"><?php echo $di["fullname"];?></option>
                  <?php
                    }
                  ?>  
                    </select>
                  </div>
                </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                <input type="hidden" class="form-control" id="idcourses" name="idcourses" value="<?php echo $idcourses;?>">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
				</form>  
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->