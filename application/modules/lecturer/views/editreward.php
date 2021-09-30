<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark">Edit Penghargaan Dosen</h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>lecturer/viewlecturer/<?php echo $idlecturer;?>">View Dosen</a></li>
		  <li class="breadcrumb-item active">Edit Penghargaan Dosen</li>
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
               <form class="form-horizontal" action="<?php echo base_url()?>lecturer/updatereward" method="post" enctype="multipart/form-data" id="webrewardForm">
                <div class="card-body">
				  
				   <div class="form-group row">
                    <label for="inputPenghargaan" class="col-sm-2 col-form-label">Penghargaan</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="penghargaan" name="penghargaan" value="<?php echo $d["penghargaan"];?>">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputKategori" class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="kategori" name="kategori" value="<?php echo $d["kategori"];?>">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputLembaga" class="col-sm-2 col-form-label">Lembaga</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="lembaga" name="lembaga" value="<?php echo $d["lembaga"];?>">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputTahun" class="col-sm-2 col-form-label">Tahun</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="tahun" name="tahun" value="<?php echo $d["tahun"];?>">
                    </div>
                  </div>
				  
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idlecturer" name="idlecturer" value="<?php echo $idlecturer;?>">
				  <input type="hidden" class="form-control" id="idreward" name="idreward" value="<?php echo $d["idreward"];?>">
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