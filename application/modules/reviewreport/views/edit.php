<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('edit_accountbank');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>accountbank"><?php echo lang('accountbank');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('edit_accountbank');?></li>
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
               <form class="form-horizontal" action="<?php echo base_url()?>accountbank/updates" method="post" enctype="multipart/form-data" id="accountbankForm">
                <div class="card-body">

					<div class="form-group row">
					<label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('bank');?></label>
					<div class="col-sm-10">
					<select class="form-control select2" id="bank" name="bank">
					<?php
						foreach($databank as $db)
						{
							if($db["code"]." - ".$db["name"]==$d["bank"])
							{	
					?>
						<option value="<?php echo $db["code"];?> - <?php echo $db["name"];?>" selected><?php echo $db["code"];?> - <?php echo $db["name"];?></option>
					<?php
							}
							else
							{
					?>			
						<option value="<?php echo $db["code"];?> - <?php echo $db["name"];?>"><?php echo $db["code"];?> - <?php echo $db["name"];?></option>
					<?php		
							}
						}
					?>  
					</select>
					</div>
					</div>

					<div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('account_name');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="accountname" name="accountname" value="<?php echo $d["accountname"];?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('account_number');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="accountnumber" name="accountnumber" value="<?php echo $d["accountnumber"];?>">
                    </div>
				</div>
				
				</div> 
				</div>	
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idaccountbank" name="idaccountbank" value="<?php echo $d["idaccountbank"];?>">
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