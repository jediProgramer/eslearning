<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_sub_navigation');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>navigasi/subnavigasi"><?php echo lang('sub_navigation');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_sub_navigation');?></li>
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
					foreach($datasubnavigation as $dsn)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>navigasi/updatesubnavigasi" method="post" enctype="multipart/form-data" id="websubnavigasiForm">
                <div class="card-body">
				<div class="form-group row">
				  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('navigation');?></label>
					<div class="col-sm-10">
					<select class="form-control" id="idnavigation" name="idnavigation">
					<?php
						foreach($datanavigation as $dn)
						{
							if($dn["idnavigation"]==$dsn["idnavigation"])
							{	
					?>
							<option value="<?php echo $dn["idnavigation"];?>" selected><?php echo $dn["name"];?></option>
					<?php
							}
							else
							{
					?>			
							<option value="<?php echo $dn["idnavigation"];?>"><?php echo $dn["name"];?></option>
					<?php		
							}
						}
					?>  
					</select>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputName" class="col-sm-2 col-form-label"><?php echo lang('sub_navigation');?></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="name" name="name" value="<?php echo $dsn["name"];?>">
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('link');?></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="link" name="link" value="<?php echo $dsn["link"];?>">
					</div>
				  </div>
				</div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idsubnavigation" name="idsubnavigation" value="<?php echo $dsn["idsubnavigation"];?>">
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