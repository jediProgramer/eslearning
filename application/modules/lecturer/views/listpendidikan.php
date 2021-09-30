		<div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
			<!-- /.card-header -->
			<div class="card-header">
              <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>lecturer/tambaheducation/<?php echo $idlecturer;?>"><i class="fas fa-plus">&nbsp;</i>Tambah</a>
            </div>
			
            <div class="card-body">
			
				<table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr >
					<th>No</th>
					<th>Jenjang </th>
					<th>Bidang Studi </th>
					<th>Perguruan Tinggi </th>
					<th>Kota </th>
					<th>Negara </th>
					<th>Tahun Lulus </th>
					<th>Aksi</th>
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
					<td class="a-center"><?php echo $d["jenjang"];?></td>
					<td class="a-center"><?php echo $d["bidang_studi"];?></td>
					<td class="a-center"><?php echo $d["perguruan_tinggi"];?></i></td>
					<td class="a-center"><?php echo $d["kota"];?></td>
					<td class="a-center"><?php echo $d["negara"];?></td>
					<td class="a-center"><?php echo $d["tahun_lulus"];?></td>
                  <td><a class="btn btn-info btn-xs" href="<?php echo base_url()?>lecturer/editeducation/<?php echo $idlecturer;?>/<?php echo $d["ideducation"];?>"><i class="fas fa-pencil-alt">&nbsp;</i>Edit</a>&nbsp; | &nbsp;<a class="btn btn-danger btn-xs" href="#" data-toggle="modal" data-target="#modal-pendidikan-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i>Delete</a></td>
                </tr>
					
				  <div class="modal fade" id="modal-pendidikan-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title">Pesan Hapus Data</h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p>Yakin akan menghapus data <?php echo $d["jenjang"];?> - <?php echo $d["perguruan_tinggi"];?>&hellip;</p>
							<form action="<?php echo base_url()?>lecturer/deleteeducation" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="ideducation" name="ideducation" value="<?php echo $d["ideducation"];?>">
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