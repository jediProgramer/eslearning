		<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('education');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
			  <li class="breadcrumb-item"><a href="<?php echo base_url()?>users/instructors"><?php echo lang('instructors');?></a></li> 
			  <li class="breadcrumb-item active"><?php echo lang('education');?></li>
            </ol>
          </div>
        </div>
		
		
		<?php if($this->session->flashdata('msg_error')){?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> <?php echo lang('error_message_title');?></h5>
				<?php echo $this->session->flashdata('msg_error');?>.
			</div>
		 <?php }?>
		
	    <?php if($this->session->flashdata('msg_success')){?>
		<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h5><i class="icon fas fa-check"></i> <?php echo lang('success_message_title');?></h5>
		  <?php echo $this->session->flashdata('msg_success');?>.
		</div>
		<?php }?>
		
      </div><!-- /.container-fluid -->
    </section>
<!-- /.content-header -->
				
<!-- Main content -->
    <!-- Main content -->
    <section class="content">
		<div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
			<!-- /.card-header -->
			<div class="card-header">
              <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>users/tambaheducation/<?php echo $iduser_web;?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add');?></a>
            </div>
			
            <div class="card-body">
			
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr >
					<th><?php echo lang('no');?></th>
					<th><?php echo lang('level');?></th>
					<th><?php echo lang('field_of_study');?></th>
					<th><?php echo lang('college');?></th>
					<th><?php echo lang('city');?></th>
					<th><?php echo lang('country');?></th>
					<th><?php echo lang('graduation_year');?></th>
					<th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($datapendidikan as $d)
					{ 
					$i++;
				?>	
                <tr>
					<td class="a-center">
					<?php echo $i;?>
					</td>
					<td class="a-center"><?php echo $d["level"];?></td>
					<td class="a-center"><?php echo $d["field_of_study"];?></td>
					<td class="a-center"><?php echo $d["college"];?></i></td>
					<td class="a-center"><?php echo $d["city"];?></td>
					<td class="a-center"><?php echo $d["country"];?></td>
					<td class="a-center"><?php echo $d["graduation_year"];?></td>
                  <td><a class="btn btn-info btn-sm" href="<?php echo base_url()?>users/editeducation/<?php echo $iduser_web;?>/<?php echo $d["ideducation"];?>"><i class="fas fa-pencil-alt">&nbsp;</i><?php echo lang('edit');?></a>&nbsp; | &nbsp;<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-pendidikan-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i><?php echo lang('delete');?></a></td>
                </tr>
					
				  <div class="modal fade" id="modal-pendidikan-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title"><?php echo lang('delete_title');?></h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p><?php echo lang('delete_message');?> <?php echo $d["level"];?> - <?php echo $d["college"];?>&hellip;</p>
							<form action="<?php echo base_url()?>users/deleteeducation" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="ideducation" name="ideducation" value="<?php echo $d["ideducation"];?>">
							  <input type="hidden" id="iduser" name="iduser" value="<?php echo $iduser_web;?>">
							</div>
							<div class="modal-footer justify-content-between">
							  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
							  <button type="submit" class="btn btn-primary"><?php echo lang('delete');?></button>
							</div>
							</form>  
						  </div>
						  <!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
				  </div>
				  <!-- /.modal -->
				<?php
					}
				?>
              </table>
			  
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
	  <!-- /.row -->  
	  </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->