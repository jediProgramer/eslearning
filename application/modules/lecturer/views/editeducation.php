<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark">Edit Pendidikan Dosen</h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>lecturer/viewlecturer/<?php echo $idlecturer;?>">View Dosen</a></li>
		  <li class="breadcrumb-item active">Edit Pendidikan Dosen</li>
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
               <form class="form-horizontal" action="<?php echo base_url()?>lecturer/updateeducation" method="post" enctype="multipart/form-data" id="webeducationForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputJenjang" class="col-sm-2 col-form-label">Jenjang</label>
                        <div class="col-sm-10">
						<select class="form-control" id="jenjang" name="jenjang">
						<?php
							foreach($datajenjang as $dj)
							{
						?>
							<option value="<?php echo $dj["jenjang"];?>" <?php if($dj["jenjang"]==$d["jenjang"]){ echo "selected";} ?> ><?php echo $dj["jenjang"];?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Bidang Studi</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="bidang_studi" name="bidang_studi" value="<?php echo $d["bidang_studi"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNoTlpn" class="col-sm-2 col-form-label">Perguruan Tinggi</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="perguruan_tinggi" name="perguruan_tinggi" value="<?php echo $d["perguruan_tinggi"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label">Tahun Lulus</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="tahun_lulus" name="tahun_lulus" value="<?php echo $d["tahun_lulus"];?>">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label">Kota</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="kota" name="kota" value="<?php echo $d["kota"];?>">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputJenjang" class="col-sm-2 col-form-label">Negara</label>
                        <div class="col-sm-10">
						<select class="form-control select2" id="negara" name="negara">
						<?php
							foreach($datanegara as $dn)
							{
						?>
							<option value="<?php echo $dn["country_name"];?>" <?php if($dn["country_name"]==$d["negara"]){ echo "selected";} ?>><?php echo $dn["country_name"];?></option>
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
				  <input type="hidden" class="form-control" id="ideducation" name="ideducation" value="<?php echo $d["ideducation"];?>">
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