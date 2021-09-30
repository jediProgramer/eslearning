<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('add_main_menu');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>menu/menuutamaweb"><?php echo lang('main_menu');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('add_main_menu');?></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>menu/savemenutuamaweb" method="post" enctype="multipart/form-data" id="webmenuutamaForm">
                <div class="card-body">
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
                    <label for="inputMenu" class="col-sm-2 col-form-label"><?php echo lang('main_menu');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="menu" name="menu">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputLink" class="col-sm-2 col-form-label"><?php echo lang('link');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="link" name="link">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputTipe" class="col-sm-2 col-form-label"><?php echo lang('show_in_main_menu');?></label>
                    <div class="col-sm-10">
						<div class="form-check">
                          <input class="form-check-input" type="radio" id="main_menu" name="main_menu" value="1" checked="true">
                          <label class="form-check-label"><?php echo lang('yes');?></label>
                        </div>
						<div class="form-check">
                          <input class="form-check-input" type="radio" id="main_menu" name="main_menu" value="0">
                          <label class="form-check-label"><?php echo lang('not');?></label>
                        </div>
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
                          <input class="form-check-input" type="radio" id="type" name="type" value="megamenu">
                          <label class="form-check-label"><?php echo lang('megamenu');?></label>
                        </div>
						<div class="form-check">
						  <input class="form-check-input" type="radio" id="type" name="type" value="dropdown">
						  <label class="form-check-label"><?php echo lang('dropdown');?></label>
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