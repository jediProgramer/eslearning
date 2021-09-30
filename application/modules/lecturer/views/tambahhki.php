<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark">Tambah HKI Dosen</h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>lecturer/viewlecturer/<?php echo $idlecturer;?>">View Dosen</a></li>
		  <li class="breadcrumb-item active">Tambah HKI Dosen</li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>lecturer/savehki" method="post" enctype="multipart/form-data" id="webhkiForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJenis" class="col-sm-2 col-form-label">Jenis</label>
                        <div class="col-sm-10">
						<select class="form-control" id="jenis" name="jenis">
						<?php
							foreach($datajenishki as $dh)
							{
						?>
							<option value="<?php echo $dh["jenishki"];?>"><?php echo $dh["jenishki"];?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					
				  <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label">Judul</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="judul" name="judul">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputNomor" class="col-sm-2 col-form-label">Nomor</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="nomor" name="nomor">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputLembaga" class="col-sm-2 col-form-label">Lembaga</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="lembaga" name="lembaga">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputTahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="tahun" name="tahun">
                    </div>
                  </div>
				  
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idlecturer" name="idlecturer" value="<?php echo $idlecturer;?>">
                  <button type="submit" class="btn btn-danger float-right">Simpan</button>
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