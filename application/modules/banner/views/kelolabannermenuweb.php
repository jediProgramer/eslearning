<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('banner_manage_page');?> <?php echo $namamenu; ?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>banner/halamanweb"><?php echo lang('banner_pages');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('banner_manage_page');?> <?php echo $namamenu; ?></li>
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
				
				if($menu=="menuutama")
				{	
					$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerweb')." WHERE idmenuutama=".$idmenu."");
				}
				else if($menu=="menukedua")
				{
					$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerweb')." WHERE idmenukedua=".$idmenu."");
				}
				else if($menu=="menuketiga")
				{
					$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerweb')." WHERE idmenuketiga =".$idmenu."");
				}		
				
				if ($query->num_rows() >= 1)
				{
					foreach($data as $d)
					{
						$file = $d["image"];
						$pieces = explode(".", $file);
						$nameimage=$pieces[0];
						$typeimage=$pieces[1];
						
						$thumb_file=$nameimage."_thumb.".$typeimage;
				?>	
               <form class="form-horizontal" action="<?php echo base_url()?>banner/updatebannerhalamanweb" method="post" enctype="multipart/form-data" id="webbannerpageFormEdit">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('title');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" name="title" value="<?php echo $d["title"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('description');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="subtitle" name="subtitle" value="<?php echo $d["subtitle"];?>">
                    </div>
                  </div>
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
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idbannerweb" name="idbannerweb" value="<?php echo $d["idbannerweb"];?>">
				  <input type="hidden" class="form-control" id="namamenu" name="namamenu" value="<?php echo $namamenu;?>">
				  <input type="hidden" class="form-control" id="idmenu" name="idmenu" value="<?php echo $idmenu;?>">
				  <input type="hidden" class="form-control" id="menu" name="menu" value="<?php echo $menu;?>">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
				</form>  
				<?php
					}
				}
				else
				{	
				?>
				<form class="form-horizontal" action="<?php echo base_url()?>banner/savebannerhalamanweb" method="post" enctype="multipart/form-data" id="webbannerpageForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('title');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="title" name="title" >
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputDeskripsi" class="col-sm-2 col-form-label"><?php echo lang('description');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="subtitle" name="subtitle" >
                    </div>
                  </div>
				  <div class="form-group row">
						<label for="inputImage" class="col-sm-2 col-form-label"><?php echo lang('banner_file');?></label>
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
				  <input type="hidden" class="form-control" id="namamenu" name="namamenu" value="<?php echo $namamenu;?>">	
				  <input type="hidden" class="form-control" id="idmenu" name="idmenu" value="<?php echo $idmenu;?>">
				  <input type="hidden" class="form-control" id="menu" name="menu" value="<?php echo $menu;?>">
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