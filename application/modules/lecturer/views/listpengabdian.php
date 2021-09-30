		<div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
			<!-- /.card-header -->
			<div class="card-header">
              <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>lecturer/tambahdedication/<?php echo $idlecturer;?>"><i class="fas fa-plus">&nbsp;</i>Tambah</a>
            </div>
			
            <div class="card-body">
			
				<table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr >
					<th>No</th>
					<th>Skema </th>
					<th>Judul </th>
					<th>Kota </th>
					<th>Jabatan </th>
					<th>Tahun </th>
					<th>Aksi</th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($datapengabdian as $d)
					{ 
					$i++;
				?>	
                <tr>
					<td class="a-center">
					<?php echo $i;?>
					</td>
					<td class="a-center"><?php echo $d["skema"];?></td>
					<td class="a-center"><?php echo $d["judul"];?></td>
					<td class="a-center"><?php echo $d["kota"];?></i></td>
					<td class="a-center"><?php echo $d["jabatan"];?></td>
					<td class="a-center"><?php echo $d["tahun"];?></td>
                  <td><a class="btn btn-info btn-xs" href="<?php echo base_url()?>lecturer/editdedication/<?php echo $idlecturer;?>/<?php echo $d["iddedication"];?>"><i class="fas fa-pencil-alt">&nbsp;</i>Edit</a>&nbsp; | &nbsp;<a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#modal-pengabdian-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i>Delete</a></td>
                </tr>
					
				  <div class="modal fade" id="modal-pengabdian-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title">Pesan Hapus Data</h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p>Yakin akan menghapus data <?php echo $d["judul"];?>&hellip;</p>
							<form action="<?php echo base_url()?>lecturer/deletededication" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="iddedication" name="iddedication" value="<?php echo $d["iddedication"];?>">
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