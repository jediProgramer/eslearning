<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('add');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>level"><?php echo lang('level');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('add');?></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>level/save" method="post" enctype="multipart/form-data" id="webLevelForm">
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
                    <label for="inputName" class="col-sm-2 col-form-label"><?php echo lang('name_level');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="level" name="level">
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
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->