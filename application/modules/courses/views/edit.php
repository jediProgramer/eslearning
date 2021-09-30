<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_courses');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses"><?php echo lang('courses');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_courses');?></li>
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
				    function rupiah($nilai, $pecahan = 0) 
					{
						return number_format($nilai, $pecahan, ',', '.');
					}
				    
					foreach($data as $d)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>courses/updates" method="post" enctype="multipart/form-data" id="coursesFormEdit">
                <div class="card-body">
				   <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('title');?></label>
						<div class="col-sm-10">
						  <input type="text" class="form-control" id="title" name="title" value="<?php echo $d["title"];?>">
						</div>
					</div>

					<div class="form-group row">
					<label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('language');?></label>
					<div class="col-sm-10">
					<select class="form-control" id="idlanguage" name="idlanguage">
					<?php
						foreach($datalanguage as $dlg)
						{
						if($dlg["idlanguage"]==$d["idlanguage"])
						{	
					?>
						<option value="<?php echo $dlg["idlanguage"];?>" selected><?php echo $dlg["language"];?></option>
					<?php
						}
						else
						{
					?>			
						<option value="<?php echo $dlg["idlanguage"];?>"><?php echo $dlg["language"];?></option>
					<?php		
						}
						}
					?>  
					</select>
					</div>
					</div>

					<div class="form-group row">
					<label for="inputCoursesType" class="col-sm-2 col-form-label"><?php echo lang('coursestype');?></label>
					<div class="col-sm-10">
					<select class="form-control" id="idcoursetype" name="idcoursetype">
					<?php
						foreach($datacoursetype as $dct)
						{
						if($dc["idcoursetype"]==$d["idcoursetype"])
						{	
					?>
						<option value="<?php echo $dct["idcoursetype"];?>" selected><?php echo $dct["name"];?></option>
					<?php
						}
						else
						{
					?>			
						<option value="<?php echo $dct["idcoursetype"];?>"><?php echo $dct["name"];?></option>
					<?php		
						}
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
						if($dc["idcategory"]==$d["idcategory"])
						{	
					?>
						<option value="<?php echo $dc["idcategory"];?>" selected><?php echo $dc["title"];?></option>
					<?php
						}
						else
						{
					?>			
						<option value="<?php echo $dc["idcategory"];?>"><?php echo $dc["title"];?></option>
					<?php		
						}
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
						if($dsc["idsubcategory"]==$d["idsubcategory"])
						{	
					?>
						<option value="<?php echo $dsc["idsubcategory"];?>" selected><?php echo $dsc["title"];?></option>
					<?php
						}
						else
						{
					?>			
						<option value="<?php echo $dsc["idsubcategory"];?>"><?php echo $dsc["title"];?></option>
					<?php		
						}
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
						if($dl["idlevel"]==$d["idlevel"])
						{	
					?>
						<option value="<?php echo $dl["idlevel"];?>" selected><?php echo $dl["level"];?></option>
					<?php
						}
						else
						{
					?>			
						<option value="<?php echo $dl["idlevel"];?>"><?php echo $dl["level"];?></option>
					<?php		
						}
						}
					?>  
					</select>
					</div>
					</div>

				   <div class="form-group row">
                    <label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('description');?></label>
                    <div class="col-sm-10">
                      <textarea class="textarea" placeholder="Masukan Teks Disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="description" name="description"><?php echo $d["description"];?></textarea>
					 </div>
				  </div>

				  <div class="form-group row">
                    <label for="inputQuota" class="col-sm-2 col-form-label"><?php echo lang('quota');?></label>
                    <div class="col-sm-10">
                      <input type="number" class="form-control" id="quota" name="quota" value="<?php echo $d["quota"];?>">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputSD" class="col-sm-2 col-form-label"><?php echo lang('start_date');?></label>
                    <div class="col-sm-10">
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                        </div>
                        <input type="text" id="start_date" name="start_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask value="<?php echo $d["start_date"];?>" /> 
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
                        <input type="text" id="end_date" name="end_date" class="form-control" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy-mm-dd" data-mask value="<?php echo $d["end_date"];?>" /> 
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
						if($dc["idcurrency"]==$d["idcurrency"])
						{	
					?>
						<option value="<?php echo $dc["idcurrency"];?>" selected><?php echo $dc["currency"];?></option>
					<?php
						}
						else
						{
					?>			
						<option value="<?php echo $dc["idcurrency"];?>"><?php echo $dc["currency"];?></option>
					<?php		
						}
						}
					?>    
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('price');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="price" name="price" value="<?php echo rupiah($d["price"]);?>">
                    </div>
                  </div>
				  
				   <?php
						if($d["image"]!="")
						{
							$file = $d["image"];
							$pieces = explode(".", $file);
							$nameimage=$pieces[0];
							$typeimage=$pieces[1];
							$thumb_file=$nameimage."_thumb.".$typeimage;
						}
				    ?>
				  <div class="form-group row">
					<label for="inputImage" class="col-sm-2 col-form-label"><?php echo lang('image_file');?></label>
					<div class="col-sm-10">
					    <?php if($d["image"]!=""){?>
						<img src="<?php echo base_url();?>assets/files/courses/<?php echo $thumb_file;?>" width="250px" height="150px">
						<br/><br/>
						<?php }?>
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
				  <input type="hidden" class="form-control" id="idcourses" name="idcourses" value="<?php echo $d["idcourses"];?>">
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