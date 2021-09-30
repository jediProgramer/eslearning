<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_syllabus');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses"><?php echo lang('courses');?></a></li>
      <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses/addsyllabus/<?php echo $idcourses; ?>"><?php echo lang('syllabus');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_syllabus');?></li>
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
                foreach($data as $d)
                {
              ?>
               <form class="form-horizontal" action="<?php echo base_url()?>courses/updatesyllabus" method="post" enctype="multipart/form-data" id="syllabusForm">
                <div class="card-body">
				        <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('syllabus');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="syllabus" name="syllabus" value="<?php echo $d["syllabus"];?>">
                    </div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" class="form-control" id="idcourses" name="idcourses" value="<?php echo $d["idcourses"];?>">
                  <input type="hidden" class="form-control" id="idsyllabus" name="idsyllabus" value="<?php echo $d["idsyllabus"];?>">
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