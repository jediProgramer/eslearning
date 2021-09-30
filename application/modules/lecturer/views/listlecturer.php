<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
              <li class="breadcrumb-item active">Dosen</li>
            </ol>
          </div>
        </div>
		
		
		 <?php if($this->session->flashdata('msg_error')){?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> Alert!</h5>
				<?php echo $this->session->flashdata('msg_error');?>.
			</div>
		 <?php }?>
		
	    <?php if($this->session->flashdata('msg_success')){?>
		<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h5><i class="icon fas fa-check"></i> Pesan Berhasil!</h5>
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
              <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>lecturer/tambahlecturer"><i class="fas fa-plus">&nbsp;</i>Tambah</a>
            </div>
			
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>No</th>
					<th>Nama </th>
					<th>NIP </th>
					<th>NIDN </th>
					<th>Jabatan Fungsional </th>
					<th>Program Studi </th>
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($daftarlecturer as $dl)
					{ 
					$i++;
				?>	
                <tr>
					<td class="a-center">
					<?php echo $i;?>
					</td>
					<td class="a-center"><?php echo $dl["fullname"];?></td>
					<td class="a-center"><?php echo $dl["nip"];?></td>
					<td class="a-center"><?php echo $dl["nidn"];?></i></td>
					<td class="a-center"><?php echo $dl["jafung"];?></td>
					<td class="a-center"><?php echo $dl["programmes"];?></td>
                  <td><a class="btn btn-info btn-sm" href="<?php echo base_url()?>lecturer/editlecturer/<?php echo $dl["idlecturer"];?>"><i class="fas fa-pencil-alt">&nbsp;</i>Edit</a>&nbsp; | &nbsp;<a class="btn btn-success btn-sm" href="<?php echo base_url()?>lecturer/viewlecturer/<?php echo $dl["idlecturer"];?>"><i class="fas fa-eye">&nbsp;</i>View</a>&nbsp; | &nbsp;<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-default-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i>Delete</a></td>
                </tr>
					
				  <div class="modal fade" id="modal-default-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title">Pesan Hapus Data</h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p>Yakin akan menghapus data <?php echo $dl["fullname"];?>&hellip;</p>
							<form action="<?php echo base_url()?>lecturer/deletelecturer" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="idlecturer" name="idlecturer" value="<?php echo $dl["idlecturer"];?>">
							</div>
							<div class="modal-footer justify-content-between">
							  <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
							  <button type="submit" class="btn btn-primary">Hapus</button>
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