<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_category');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>category"><?php echo lang('category');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_category');?></li>
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
               <form class="form-horizontal" action="<?php echo base_url()?>category/updates" method="post" enctype="multipart/form-data" id="categoryFormEdit">
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
                    <label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('description');?></label>
                    <div class="col-sm-10">
                      <textarea class="textarea" placeholder="Masukan Teks Disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="description" name="description"><?php echo $d["description"];?></textarea>
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
						<img src="<?php echo base_url();?>assets/files/category/<?php echo $thumb_file;?>" width="250px" height="150px">
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
				  <input type="hidden" class="form-control" id="idcategory" name="idcategory" value="<?php echo $d["idcategory"];?>">
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