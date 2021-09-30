<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark">Edit Pengajaran Dosen</h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>lecturer/viewlecturer/<?php echo $idlecturer;?>">View Dosen</a></li>
		  <li class="breadcrumb-item active">Edit Pengajaran Dosen</li>
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
               <form class="form-horizontal" action="<?php echo base_url()?>lecturer/updateteach" method="post" enctype="multipart/form-data" id="webteachForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJenjang" class="col-sm-2 col-form-label">Semester</label>
                        <div class="col-sm-10">
						<select class="form-control" id="semester" name="semester">
						<?php
							foreach($datasemester as $ds)
							{
						?>
							<option value="<?php echo $ds["semester"];?>" <?php if($ds["semester"]==$d["semester"]){ echo "selected";} ?> ><?php echo $ds["semester"];?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="tahun" name="tahun" value="<?php echo $d["tahun"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNoTlpn" class="col-sm-2 col-form-label">Kode Matakuliah</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="kode_mk" name="kode_mk" value="<?php echo $d["kode_mk"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label">Nama Matakuliah</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="nama_mk" name="nama_mk" value="<?php echo $d["nama_mk"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label">Kode Kelas</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="kode_kelas" name="kode_kelas" value="<?php echo $d["kode_kelas"];?>">
                    </div>
                  </div>
				  
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idlecturer" name="idlecturer" value="<?php echo $idlecturer;?>">
				  <input type="hidden" class="form-control" id="idteach" name="idteach" value="<?php echo $d["idteach"];?>">
                  <button type="submit" class="btn btn-danger float-right">Simpan</button>
                </div>
                <!-- /.card-footer -->
				</form>  
				<?php
					}
				?>
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->