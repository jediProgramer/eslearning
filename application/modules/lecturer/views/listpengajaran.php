		<div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
			<!-- /.card-header -->
			<div class="card-header">
              <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>lecturer/tambahteach/<?php echo $idlecturer;?>"><i class="fas fa-plus">&nbsp;</i>Tambah</a>
            </div>
			
            <div class="card-body">
			
				<table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr >
					<th>No</th>
					<th>Semester </th>
					<th>Tahun </th>
					<th>Kode Matakuliah </th>
					<th>Nama Matakuliah </th>
					<th>Kode Kelas </th>
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($datapengajaran as $d)
					{ 
					$i++;
				?>	
                <tr>
					<td class="a-center">
					<?php echo $i;?>
					</td>
					<td class="a-center"><?php echo $d["semester"];?></td>
					<td class="a-center"><?php echo $d["tahun"];?></td>
					<td class="a-center"><?php echo $d["kode_mk"];?></i></td>
					<td class="a-center"><?php echo $d["nama_mk"];?></td>
					<td class="a-center"><?php echo $d["kode_kelas"];?></td>
                  <td><a class="btn btn-info btn-xs" href="<?php echo base_url()?>lecturer/editteach/<?php echo $idlecturer;?>/<?php echo $d["idteach"];?>"><i class="fas fa-pencil-alt">&nbsp;</i>Edit</a>&nbsp; | &nbsp;<a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#modal-pengajaran-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i>Delete</a></td>
                </tr>
					
				  <div class="modal fade" id="modal-pengajaran-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title">Pesan Hapus Data</h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p>Yakin akan menghapus data <?php echo $d["kode_mk"];?> - <?php echo $d["nama_mk"];?>&hellip;</p>
							<form action="<?php echo base_url()?>lecturer/deleteteach" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="idteach" name="idteach" value="<?php echo $d["idteach"];?>">
							  <input type="hidden" id="idlecturer" name="idlecturer" value="<?php echo $idlecturer;?>">
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