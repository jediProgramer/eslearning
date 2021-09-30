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
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>currency"><?php echo lang('currency');?></a></li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>currency/saves" method="post" enctype="multipart/form-data" id="webCurrencyForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputNama" class="col-sm-2 col-form-label"><?php echo lang('name_currency');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="currency" name="currency">
                    </div>
                  </div>
				  
                  <div class="form-group row">
                    <label for="inputNama" class="col-sm-2 col-form-label"><?php echo lang('symbol_currency');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="symbol " name="symbol">
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