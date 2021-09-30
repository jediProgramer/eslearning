<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('manage_pages');?> <?php echo $namamenu; ?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>pages/halamanweb"><?php echo lang('pages');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('manage_pages');?> <?php echo $namamenu; ?></li>
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
					$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('pagesweb')." WHERE idmenuutama=".$idmenu."");
				}
				else if($menu=="menukedua")
				{
					$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('pagesweb')." WHERE idmenukedua=".$idmenu."");
				}
				else if($menu=="menuketiga")
				{
					$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('pagesweb')." WHERE idmenuketiga =".$idmenu."");
				}		
				
				if ($query->num_rows() >= 1)
				{
					foreach($data as $d)
					{
						
				?>	
               <form class="form-horizontal" action="<?php echo base_url()?>pages/updatepageshalamanweb" method="post" enctype="multipart/form-data" id="webpagespageForm">
                <div class="card-body">
				  
				  <div class="form-group row">
                    <label for="inputIsi" class="col-sm-2 col-form-label"><?php echo lang('content_pages');?></label>
                    <div class="col-sm-10">
                      <textarea class="textarea" placeholder="<?php echo lang('add_text_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="pages" name="pages"><?php echo $d["pages"];?></textarea>
						<script>
						 CKEDITOR.replace('pages');
						</script>	
					</div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputTipe" class="col-sm-2 col-form-label"><?php echo lang('type');?></label>
                    <div class="col-sm-10">
						<div class="form-check">
                          <input class="form-check-input" type="radio" id="type" name="type" value="single" <?php if($d["type"]=="single"){?>checked="true"<?php }else {?><?php }?>>
                          <label class="form-check-label"><?php echo lang('single');?></label>
                        </div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" id="type" name="type" value="sidebar_right" <?php if($d["type"]=="sidebar_right"){?>checked="true"<?php }else {?><?php }?>>
						  <label class="form-check-label"><?php echo lang('sidebar_right_page');?></label>
						</div>
                    </div>
					</div>
				  
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idpagesweb" name="idpagesweb" value="<?php echo $d["idpagesweb"];?>">
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
				<form class="form-horizontal" action="<?php echo base_url()?>pages/savepageshalamanweb" method="post" enctype="multipart/form-data" id="webpagespageForm">
                <div class="card-body">
				  
				  <div class="form-group row">
                    <label for="inputIsi" class="col-sm-2 col-form-label"><?php echo lang('content_pages');?></label>
                    <div class="col-sm-10">
                      <textarea class="textarea" placeholder="<?php echo lang('add_text_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="pages" name="pages"></textarea>
						<script>
						 CKEDITOR.replace('pages');
						</script>	
					</div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputTipe" class="col-sm-2 col-form-label"><?php echo lang('type');?></label>
                    <div class="col-sm-10">
						<div class="form-check">
                          <input class="form-check-input" type="radio" id="type" name="type" value="single" checked="true">
                          <label class="form-check-label"><?php echo lang('single');?></label>
                        </div>
						<div class="form-check">
                          <input class="form-check-input" type="radio" id="type" name="type" value="sidebar_right">
                          <label class="form-check-label"><?php echo lang('sidebar_right_page');?></label>
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