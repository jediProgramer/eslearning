<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('add_courses');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses"><?php echo lang('courses');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('add_courses');?></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>courses/saves" method="post" enctype="multipart/form-data" id="coursesForm">
                <div class="card-body">
				         <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('title');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" name="title" >
                    </div>
                  </div>

                  <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('language');?></label>
                  <div class="col-sm-10">
                  <select class="form-control" id="idlanguage" name="idlanguage">
                  <?php
                    foreach($datalanguage as $dl)
                    {
                  ?>
                                <option value="<?php echo $dl["idlanguage"];?>"><?php echo $dl["language"];?></option>
                  <?php
                    }
                  ?>  
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('coursestype');?></label>
                  <div class="col-sm-10">
                  <select class="form-control" id="idcoursetype" name="idcoursetype">
                  <?php
                    foreach($datacoursetype as $dct)
                    {
                  ?>
                                <option value="<?php echo $dct["idcoursetype"];?>"><?php echo $dct["name"];?></option>
                  <?php
                    }
                  ?>  
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('category');?></label>
                  <div class="col-sm-10">
                  <select class="form-control select2" id="idcategory" name="idcategory">
                  <?php
                    foreach($datacategory as $dc)
                    {
                  ?>
                                <option value="<?php echo $dc["idcategory"];?>"><?php echo $dc["title"];?></option>
                  <?php
                    }
                  ?>  
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('subcategory');?></label>
                  <div class="col-sm-10">
                  <select class="form-control select2" id="idsubcategory" name="idsubcategory">
                  <?php
                    foreach($datasubcategory as $dsc)
                    {
                  ?>
                                <option value="<?php echo $dsc["idsubcategory"];?>"><?php echo $dsc["title"];?></option>
                  <?php
                    }
                  ?>  
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('level');?></label>
                  <div class="col-sm-10">
                  <select class="form-control select2" id="idlevel" name="idlevel">
                  <?php
                    foreach($datalevel as $dl)
                    {
                  ?>
                                <option value="<?php echo $dl["idlevel"];?>"><?php echo $dl["level"];?></option>
                  <?php
                    }
                  ?>  
                    </select>
                  </div>
                </div>

                  <div class="form-group row">
                    <label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('description');?></label>
                    <div class="col-sm-10">
                      <textarea class="textarea" placeholder="<?php echo lang('add_text_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="description" name="description"></textarea>
					        </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputQuota" class="col-sm-2 col-form-label"><?php echo lang('quota');?></label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="quota" name="quota" >
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputSD" class="col-sm-2 col-form-label"><?php echo lang('start_date');?></label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" id="start_date" name="start_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask/> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputSD" class="col-sm-2 col-form-label"><?php echo lang('end_date');?></label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" id="end_date" name="end_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask/> 
                      </div>
                    </div>
                  </div>

                  <div class="form-group row">
                  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('currency');?></label>
                  <div class="col-sm-10">
                  <select class="form-control" id="idcurrency" name="idcurrency">
                  <?php
                    foreach($datacurrency as $dc)
                    {
                  ?>
                                <option value="<?php echo $dc["idcurrency"];?>"><?php echo $dc["currency"];?></option>
                  <?php
                    }
                  ?>  
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('price');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="price" name="price" >
                    </div>
                  </div>

				  <div class="form-group row">
						<label for="inputImage" class="col-sm-2 col-form-label"><?php echo lang('image_file');?></label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="image" name="image">
								<label class="custom-file-label" for="image"><?php echo lang('chose_file');?></label>
						    </div>
						</div>
					</div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
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