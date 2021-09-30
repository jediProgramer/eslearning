<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_navigation');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>navigasi/navigasiadmin"><?php echo lang('navigation');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_navigation');?></li>
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
					foreach($datanavigation as $dn)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>navigasi/updatenavigasi" method="post" enctype="multipart/form-data" id="webnavigasiForm">
                <div class="card-body">
				<div class="form-group row">
				  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('navigation_category');?></label>
					<div class="col-sm-10">
					<select class="form-control" id="idnavcategory" name="idnavcategory">
					<?php
						foreach($datanavcategory as $dnc)
						{
							if($dnc["idnavcategory"]==$dn["idnavcategory"])
							{	
					?>
							<option value="<?php echo $dnc["idnavcategory"];?>" selected><?php echo $dnc["name"];?></option>
					<?php
							}
							else
							{
					?>			
							<option value="<?php echo $dnc["idnavcategory"];?>"><?php echo $dnc["name"];?></option>
					<?php		
							}
						}
					?>  
					</select>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputName" class="col-sm-2 col-form-label"><?php echo lang('navigation');?></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="name" name="name" value="<?php echo $dn["name"];?>">
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputIcon" class="col-sm-2 col-form-label"><?php echo lang('icon');?></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="icon" name="icon" value="<?php echo $dn["icon"];?>">
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('link');?></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="link" name="link" value="<?php echo $dn["link"];?>">
					</div>
				  </div>
				</div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idnavigation" name="idnavigation" value="<?php echo $dn["idnavigation"];?>">
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