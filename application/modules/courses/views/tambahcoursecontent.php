<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
    <?php
				$query = $this->db->query("SELECT syllabus FROM `".$this->db->dbprefix('syllabus')."` WHERE idcourses='".$idcourses."' AND idsyllabus='".$idsyllabus."'");
				$row = $query->row();
			?>	  
		<h1 class="m-0 text-dark"><?php echo lang('add_courses_content');?> <?php echo $row->syllabus;?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses/addcoursecontent/<?php echo $idcourses;?>"><?php echo lang('add_courses_content');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('add_courses_content');?> <?php echo $row->syllabus;?></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>courses/savescontentcourses" method="post" enctype="multipart/form-data" id="coursescontentForm">
                <div class="card-body">
				          <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('type');?></label>
                    <div class="col-sm-10">
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="type" name="type" value="1" checked="true" onclick="myContent('video')"><label class="form-check-label"><?php echo lang('video');?></label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="type" name="type" value="2" onclick="myContent('files')" ><label class="form-check-label"><?php echo lang('files');?></label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" id="type" name="type" value="3" onclick="myContent('link')" ><label class="form-check-label"><?php echo lang('link');?></label>
                      </div>
                    </div>
                  </div>

                  <div class="form-group row" >
                        <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('title');?></label>
                        <div class="col-sm-10">
                          <input type="text"  class="form-control" id="title" name="title">
                        </div>
                  </div>

                  <div class="form-group row" id="des">
                    <label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('description');?></label>
                    <div class="col-sm-10">
                      <textarea class="textarea" class="textarea" placeholder="<?php echo lang('add_text_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="description" name="description"></textarea>
                    </div>
                  </div>

                  <div style="display:block;" id="vid">
                    <div class="form-group row" >
                        <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('video_link');?></label>
                        <div class="col-sm-10">
                          <input type="text" placeholder="<?php echo lang('example');?> : https://www.youtube.com/watch?v=-oHe7sCCSNs" class="form-control" id="video" name="video">
                        </div>
                    </div>
                    <div class="form-group row" >
                        <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('duration');?></label>
                        <div class="col-sm-3">
                          <input type="text" placeholder="<?php echo lang('example');?> : 15:00" class="form-control" id="duration" name="duration">
                        </div>
                        <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('minute');?></label>
                    </div>       
                  </div>  

                  <div style="display:none;" id="file">
                    <div class="form-group row" >
                      <label for="inputFiles" class="col-sm-2 col-form-label"><?php echo lang('files');?></label>
                      <div class="col-sm-10">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="files" name="files">
                          <label class="custom-file-label" for="files"><?php echo lang('chose_pdf_file');?></label>
                          </div>
                      </div>
                    </div>
                  </div>

                  <div style="display:none;" id="link">
                    <div class="form-group row" >
                        <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('link');?></label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="link" name="link">
                        </div>
                    </div>      
                  </div> 

                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="hidden" class="form-control" id="idcourses" name="idcourses" value="<?php echo $idcourses;?>">
                  <input type="hidden" class="form-control" id="idsyllabus" name="idsyllabus" value="<?php echo $idsyllabus;?>">
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