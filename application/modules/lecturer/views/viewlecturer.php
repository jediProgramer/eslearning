<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile Dosen</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin">Home</a></li>
			  <li class="breadcrumb-item"><a href="<?php echo base_url()?>lecturer">Dosen</a></li>
              <li class="breadcrumb-item active">Profil Dosen</li>
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

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
              <div class="nav nav-tabs" id="riwayat-tab" role="tablist">
                <a class="nav-item nav-link active" id="riwayat-profil-tab" data-toggle="tab" href="#riwayat-profil" role="tab" aria-controls="riwayat-profil" aria-selected="true">Profil Dosen</a>
				<a class="nav-item nav-link" id="riwayat-pendidikan-tab" data-toggle="tab" href="#riwayat-pendidikan" role="tab" aria-controls="riwayat-pendidikan" aria-selected="true">Riwayat Pendidikan</a>
                <a class="nav-item nav-link" id="riwayat-pengajaran-tab" data-toggle="tab" href="#riwayat-pengajaran" role="tab" aria-controls="riwayat-pengajaran" aria-selected="false">Riwayat Pengajaran</a>
                <a class="nav-item nav-link" id="riwayat-penelitian-tab" data-toggle="tab" href="#riwayat-penelitian" role="tab" aria-controls="riwayat-penelitian" aria-selected="false">Riwayat Penelitian</a>
				<a class="nav-item nav-link" id="riwayat-pengabdian-tab" data-toggle="tab" href="#riwayat-pengabdian" role="tab" aria-controls="riwayat-pengabdian" aria-selected="false">Riwayat Pengabdian</a>
                <a class="nav-item nav-link" id="riwayat-publikasi-tab" data-toggle="tab" href="#riwayat-publikasi" role="tab" aria-controls="riwayat-publikasi" aria-selected="false">Riwayat Publikasi</a>
				<a class="nav-item nav-link" id="riwayat-penghargaan-tab" data-toggle="tab" href="#riwayat-penghargaan" role="tab" aria-controls="riwayat-penghargaan" aria-selected="false">Riwayat Penghargaan</a>
				<a class="nav-item nav-link" id="riwayat-hki-tab" data-toggle="tab" href="#riwayat-hki" role="tab" aria-controls="riwayat-hki" aria-selected="false">Riwayat HKI</a>
              </div>
            <div class="tab-content" id="riwayat-tab">
              <div class="tab-pane fade show active" id="riwayat-profil" role="tabpanel" aria-labelledby="riwayat-profil-tab">
				<?php $this->load->view($profil); ?>	
			  </div>
			  <div class="tab-pane fade" id="riwayat-pendidikan" role="tabpanel" aria-labelledby="riwayat-pendidikan-tab">
				<?php $this->load->view($pendidikan); ?>	
			  </div>
              <div class="tab-pane fade" id="riwayat-pengajaran" role="tabpanel" aria-labelledby="riwayat-pengajaran-tab">
				<?php $this->load->view($pengajaran); ?>
			  </div>
              <div class="tab-pane fade" id="riwayat-penelitian" role="tabpanel" aria-labelledby="riwayat-penelitian-tab"> 
				<?php $this->load->view($penelitian); ?>
			  </div>
			  <div class="tab-pane fade" id="riwayat-pengabdian" role="tabpanel" aria-labelledby="riwayat-pengabdian-tab"> 
				<?php $this->load->view($pengabdian); ?>
			  </div>
			  <div class="tab-pane fade" id="riwayat-publikasi" role="tabpanel" aria-labelledby="riwayat-publikasi-tab"> 
				<?php $this->load->view($publikasi); ?>
			  </div>
              <div class="tab-pane fade" id="riwayat-penghargaan" role="tabpanel" aria-labelledby="riwayat-penghargaan-tab"> 
				<?php $this->load->view($penghargaan); ?>
			  </div>
			  <div class="tab-pane fade" id="riwayat-hki" role="tabpanel" aria-labelledby="riwayat-hki-tab"> 
				<?php $this->load->view($hki); ?>
			  </div>
            </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->