<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('instructors');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('instructors');?></li>
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
			<div class="card-header">
              <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>users/tambahinstructors"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add');?></a>
            </div>
			
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th><?php echo lang('no');?></th>
					<th><?php echo lang('name');?> </th>
					<th><?php echo lang('username');?> </th>
					<th><?php echo lang('job');?> </th>
					<th><?php echo lang('institution');?> </th>
					<th><?php echo lang('active');?> </th>
					<th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($daftaruser as $dfu)
					{ 
					$i++;
				?>	
                <tr>
					<td class="a-center">
					<?php echo $i;?>
					</td>
					<td class="a-center"><?php echo $dfu["fullname"];?></td>
					<td class="a-center"><?php echo $dfu["username"];?></td>
					<td class="a-center"><?php echo $dfu["jobs"];?></i></td>
					<td class="a-center"><?php echo $dfu["institution"];?></td>
					<td class="a-center"><?php if($dfu["active"]=="1"){ echo lang('active'); }else{ echo lang('no'); }?></td>
                  <td><a class="btn btn-success btn-sm" href="<?php echo base_url()?>users/educationinstructors/<?php echo $dfu["iduser"];?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add_education');?></a>&nbsp; | &nbsp;<a class="btn btn-info btn-sm" href="<?php echo base_url()?>users/editinstructors/<?php echo $dfu["iduser"];?>"><i class="fas fa-pencil-alt">&nbsp;</i><?php echo lang('edit');?></a>&nbsp; | &nbsp;<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-default-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i><?php echo lang('delete');?></a></td>
                </tr>
					
				  <div class="modal fade" id="modal-default-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title"><?php echo lang('delete_title');?></h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p><?php echo lang('delete_message');?> <?php echo $dfu["fullname"];?>&hellip;</p>
							<form action="<?php echo base_url()?>users/deleteusers" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="iduser" name="iduser" value="<?php echo $dfu["iduser"];?>">
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