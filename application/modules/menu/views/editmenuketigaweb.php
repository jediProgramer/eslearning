<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_third_menu');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>menu/menuketigaweb"><?php echo lang('third_menu');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_third_menu');?></li>
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
					foreach($datamenuketigaweb as $dmkw)
					{
			   ?>
               <form class="form-horizontal" action="<?php echo base_url()?>menu/updatemenuketigaweb" method="post" enctype="multipart/form-data" id="webmenuketigaForm">
                <div class="card-body">
				<div class="form-group row">
				  <label for="inputMenukedua" class="col-sm-2 col-form-label"><?php echo lang('second_menu');?></label>
					<div class="col-sm-10">
					<select class="form-control" id="idmenukedua" name="idmenukedua">
					<?php
						foreach($datamenukeduaweb as $dmuw)
						{
							if($dmkw["idmenukedua"]==$dmuw["idmenukedua"])
							{	
					?>
							<option value="<?php echo $dmuw["idmenukedua"];?>" selected><?php echo $dmuw["menu"];?></option>
					<?php
							}
							else
							{
					?>			
							<option value="<?php echo $dmuw["idmenukedua"];?>"><?php echo $dmuw["menu"];?></option>
					<?php		
							}
						}
					?>  
					</select>
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputMenuketiga" class="col-sm-2 col-form-label"><?php echo lang('third_menu');?></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="menu" name="menu" value="<?php echo $dmkw["menu"];?>">
					</div>
				  </div>
				  <div class="form-group row">
					<label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('link');?></label>
					<div class="col-sm-10">
					  <input type="text" class="form-control" id="link" name="link" value="<?php echo $dmkw["link"];?>">
					</div>
				  </div>
				</div>
				</div>
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idmenuketiga" name="idmenuketiga" value="<?php echo $dmkw["idmenuketiga"];?>">
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