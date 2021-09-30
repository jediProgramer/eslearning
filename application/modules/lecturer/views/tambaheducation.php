<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark">Tambah Pendidikan Dosen</h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>lecturer/viewlecturer/<?php echo $idlecturer;?>">View Dosen</a></li>
		  <li class="breadcrumb-item active">Tambah Pendidikan Dosen</li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>lecturer/saveeducation" method="post" enctype="multipart/form-data" id="webeducationForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJenjang" class="col-sm-2 col-form-label">Jenjang</label>
                        <div class="col-sm-10">
						<select class="form-control" id="jenjang" name="jenjang">
						<?php
							foreach($datajenjang as $dj)
							{
						?>
							<option value="<?php echo $dj["jenjang"];?>"><?php echo $dj["jenjang"];?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                 </div>
					
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Bidang Studi</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="bidang_studi" name="bidang_studi">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNoTlpn" class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="tahun_lulus" name="tahun_lulus">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="kota" name="kota">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputJenjang" class="col-sm-2 col-form-label">Negara</label>
                        <div class="col-sm-10">
						<select class="form-control select2" style="width: 100%;" id="negara" name="negara">
						<?php
							foreach($datanegara as $dn)
							{
						?>
							<option value="<?php echo $dn["country_name"];?>"><?php echo $dn["country_name"];?></option>
						<?php
							}
						?>  
                        </select>
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