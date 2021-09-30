<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark">Tambah Dosen</h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>lecturer">Dosen</a></li>
		  <li class="breadcrumb-item active">Tambah Dosen</li>
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
            	
               <form class="form-horizontal" action="<?php echo base_url()?>lecturer/savelecturer" method="post" enctype="multipart/form-data" id="weblecturerForm">
                <div class="card-body">
				  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Nama Lengkap dan Gelar</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="fullname" name="fullname">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputNIP" class="col-sm-2 col-form-label">NIP</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nip" name="nip">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNIDN" class="col-sm-2 col-form-label">NIDN</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nidn" name="nidn">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputGolongan" class="col-sm-2 col-form-label">Golongan</label>
                        <div class="col-sm-10">
						<select class="form-control" id="golongan" name="golongan">
						<?php
							foreach($datagolongan as $dg)
							{
						?>
                          <option value="<?php echo $dg->golongan;?>"><?php echo $dg->golongan;?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					<div class="form-group row">
                    <label for="inputGolongan" class="col-sm-2 col-form-label">Pangkat</label>
                        <div class="col-sm-10">
						<select class="form-control" id="pangkat" name="pangkat">
						<?php
							foreach($datapangkat as $dp)
							{
						?>
                          <option value="<?php echo $dp->pangkat;?>"><?php echo $dp->pangkat;?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					<div class="form-group row">
                    <label for="inputJafung" class="col-sm-2 col-form-label">Jabatan Fungsional</label>
                        <div class="col-sm-10">
						<select class="form-control" id="jafung" name="jafung">
						<?php
							foreach($datajafung as $djf)
							{
						?>
                          <option value="<?php echo $djf->jafung;?>"><?php echo $djf->jafung;?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					<div class="form-group row">
                    <label for="inputJabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
						<select class="form-control" id="jabatan" name="jabatan">
						<option value="Tidak Menjabat">Tidak Menjabat</option>
						<?php
							foreach($datajabatan as $dj)
							{
						?>
                          <option value="<?php echo $dj->jabatan;?>"><?php echo $dj->jabatan;?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					<div class="form-group row">
                    <label for="inputProdi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
						<select class="form-control" id="programmes" name="programmes">
						<?php
							foreach($dataprodi as $dp)
							{
						?>
                          <option value="<?php echo $dp->prodi;?>"><?php echo $dp->prodi;?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
					<div class="form-group row">
                    <label for="inputKBK" class="col-sm-2 col-form-label">KBK</label>
                        <div class="col-sm-10">
						<select class="form-control" id="kbk" name="kbk">
						<?php
							foreach($datakbk as $dkbk)
							{
						?>
                          <option value="<?php echo $dkbk->title;?>"><?php echo $dkbk->title;?></option>
						<?php
							}
						?>  
                        </select>
						</div>
                    </div>
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="email" name="email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputNoTlpn" class="col-sm-2 col-form-label">Nomor Telepon</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="phoneno" name="phoneno">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputWebsite" class="col-sm-2 col-form-label">website</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="website" name="website">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputSintaID" class="col-sm-2 col-form-label">Sinta ID</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="sinta_id" name="sinta_id">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputScopusID" class="col-sm-2 col-form-label">Scopus ID</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="scopus_id" name="scopus_id">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputGoogleScholarID" class="col-sm-2 col-form-label">Google Scholar ID</label>
                    <div class="col-sm-10">
                      <input type="type" class="form-control" id="google_scholar_id" name="google_scholar_id">
                    </div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat Kantor</label>
                    <div class="col-sm-10">
                      <textarea class="textarea1" placeholder="Masukan Teks Disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="address" name="address"></textarea>
					</div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputProfil" class="col-sm-2 col-form-label">Profil</label>
                    <div class="col-sm-10">
                      <textarea class="textarea2" placeholder="Masukan Teks Disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="profile" name="profile"></textarea>
					</div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputAreaPenelitian" class="col-sm-2 col-form-label">Area Penelitian</label>
                    <div class="col-sm-10">
                      <textarea class="textarea3" placeholder="Masukan Teks Disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="research_areas" name="research_areas"></textarea>
					</div>
                  </div>
				  
				  <div class="form-group row">
                    <label for="inputMinatPenelitian" class="col-sm-2 col-form-label">Minat Penelitian</label>
                    <div class="col-sm-10">
                      <textarea class="textarea4" placeholder="Masukan Teks Disini" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="research_interests" name="research_interests"></textarea>
					</div>
                  </div>
				  
				  <div class="form-group row">
						<label for="inputPicture" class="col-sm-2 col-form-label">File Gambar Dosen</label>
						<div class="col-sm-10">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="picture" name="picture">
								<label class="custom-file-label" for="picture">Pilih File Gambar Dosen</label>
						    </div>
						</div>
					</div>
				  
                </div>
                <!-- /.card-body -->
				</div>
				<!-- /.card -->
                <div class="card-footer">
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