<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_banner_home');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>banner/halamanberandaweb"><?php echo lang('banner_home');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_banner_home');?></li>
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
					foreach($databannerberandaweb as $dbbw)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>banner/updatebannerberandaweb" method="post" enctype="multipart/form-data" id="webbannerberandaFormEdit">
                <div class="card-body">
				   
				<div class="form-group row">
                <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('language');?></label>
                <div class="col-sm-10">
                <select class="form-control" id="idlanguage" name="idlanguage">
                <?php
                  foreach($datalanguage as $dlg)
                  {
                    if($dlg["idlanguage"]==$dbbw["idlanguage"])
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
                      <textarea class="textarea" placeholder="<?php echo lang('add_text_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="text" name="text"><?php echo $dbbw["text"];?></textarea>
                    </div>
                  </div>
				  
				   <?php if($dbbw["image"]!="")
						{  
					
							$file = $dbbw["image"];
							$pieces = explode(".", $file);
							$nameimage=$pieces[0];
							$typeimage=$pieces[1];
							
							$thumb_file=$nameimage."_thumb.".$typeimage;
				  ?>
				  <div class="form-group row">
					<label for="inputImage" class="col-sm-2 col-form-label"><?php echo lang('banner_file');?></label>
					<div class="col-sm-10">
						<img src="<?php echo base_url();?>assets/files/banners/<?php echo $thumb_file;?>" width="250px" height="70px">
						<br/><br/>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="image" name="image">
							<label class="custom-file-label" for="image"><?php echo lang('chose_file');?></label>
						</div>
					</div>	
				  </div>
				  <?php
						}
						else
						{	
				  ?>
					<div class="form-group row">
						<label for="inputImage" class="col-sm-2 col-form-label"><?php echo lang('banner_file');?></label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="image" name="image">
								<label class="custom-file-label" for="image"><?php echo lang('chose_file');?></label>
						    </div>
						</div>
					</div>
				  <?php
						}
				  ?>
				</div>  
				</div>  
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idbanner" name="idbanner" value="<?php echo $dbbw["idbanner"];?>">
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