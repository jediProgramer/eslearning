<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('web_info');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('web_info');?></li>
		</ol>
	  </div><!-- /.col -->
	</div><!-- /.row -->
	
		<?php if($this->session->flashdata('msg_error')){?>
		<div class="alert alert-danger alert-dismissible">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-ban"></i> <?php echo lang('error_message_title');?></h5>
            <?php echo $this->session->flashdata('msg_error');?>.
        </div>
		<?php }?>
		
	    <?php if($this->session->flashdata('msg_success')){?>
		<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h5><i class="icon fas fa-check"></i> <?php echo lang('success_message_title');?></h5>
		  <?php echo $this->session->flashdata('msg_success');?>.
		</div>
		<?php }?>
		
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
				
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-profil-tab" data-toggle="pill" href="#custom-content-below-profil" role="tab" aria-controls="custom-content-below-profil" aria-selected="true"><?php echo lang('web_profle');?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-kontak-tab" data-toggle="pill" href="#custom-content-below-kontak" role="tab" aria-controls="custom-content-below-kontak" aria-selected="false"><?php echo lang('web_contact');?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-sosmed-tab" data-toggle="pill" href="#custom-content-below-sosmed" role="tab" aria-controls="custom-content-below-sosmed" aria-selected="false"><?php echo lang('web_sm');?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-logo-tab" data-toggle="pill" href="#custom-content-below-logo" role="tab" aria-controls="custom-content-below-logo" aria-selected="false"><?php echo lang('web_logo');?></a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-profil" role="tabpanel" aria-labelledby="custom-content-below-profil-tab">
			  
				
         <?php 
         if($idlanguage!="")
         {
          $query_b = $this->db->query("SELECT * FROM ".$this->db->dbprefix('webinfo')." WHERE idlanguage='$idlanguage'");
         }
         else
         {
           $query_b = $this->db->query("SELECT * FROM ".$this->db->dbprefix('webinfo')." WHERE idlanguage=(SELECT MIN(idlanguage) FROM ".$this->db->dbprefix('language').")");
         }
				if ($query_b->num_rows() >= 1)
				{
					foreach($datawebinfo as $dwi)
					{
				?>		
               <form class="form-horizontal" action="<?php echo base_url()?>infowebsite/savewebinfo" method="post" enctype="multipart/form-data" id="webinfoForm">
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('language');?></label>
                        <div class="col-sm-10">
                    <select class="form-control" id="idlanguage" name="idlanguage" onChange="changeFuncBahasa()">
                    <?php
                      foreach($datalanguage as $dl)
                      {
                    ?>
                                  <option value="<?php echo $dl["idlanguage"];?>" <?php if($this->uri->segment(3)==$dl["idlanguage"]){echo "selected";}?>><?php echo $dl["language"];?></option>
                    <?php
                      }
                    ?>  
                                </select>
                    </div>
               </div>
                  <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('web_name');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $dwi["websitename"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputKatakunci" class="col-sm-2 col-form-label"><?php echo lang('web_keyword');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="katakunci" name="katakunci" value="<?php echo $dwi["keyword"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPembuatwebsite" class="col-sm-2 col-form-label"><?php echo lang('web_createdby');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pembuatwebsite" name="pembuatwebsite" value="<?php echo $dwi["author"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPembuatwebsite" class="col-sm-2 col-form-label"><?php echo lang('web_year');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tahunwebsite" name="tahunwebsite" value="<?php echo $dwi["year"];?>">
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputDeskripsi"  class="col-sm-2 col-form-label"><?php echo lang('web_description');?></label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" name="deskripsi"><?php echo $dwi["description"];?></textarea>
					</div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idwebinfo" name="idwebinfo" value="<?php echo $dwi["idwebinfo"];?>">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form> 
			  <?php
					}
				}
				else
				{					
			  ?>
				<form class="form-horizontal" action="<?php echo base_url()?>infowebsite/savewebinfo" method="post" enctype="multipart/form-data" id="webinfoForm">
                <div class="card-body">
                <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('language');?></label>
                        <div class="col-sm-10">
                    <select class="form-control" id="idlanguage" name="idlanguage" onChange="changeFuncBahasa()">
                    <?php
                      foreach($datalanguage as $dl)
                      {
                    ?>
                                  <option value="<?php echo $dl["idlanguage"];?>" <?php if($this->uri->segment(3)==$dl["idlanguage"]){echo "selected";}?>><?php echo $dl["language"];?></option>
                    <?php
                      }
                    ?>  
                                </select>
                    </div>
               </div>

                  <div class="form-group row">
                    <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('web_name');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="nama" name="nama" >
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputKatakunci" class="col-sm-2 col-form-label"><?php echo lang('web_keyword');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="katakunci" name="katakunci" >
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPembuatwebsite" class="col-sm-2 col-form-label"><?php echo lang('web_createdby');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="pembuatwebsite" name="pembuatwebsite" >
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPembuatwebsite" class="col-sm-2 col-form-label"><?php echo lang('web_year');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="tahunwebsite" name="tahunwebsite" >
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputDeskripsi"  class="col-sm-2 col-form-label"><?php echo lang('web_description');?></label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" name="deskripsi"></textarea>
					</div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form> 
			  <?php
				}
			  ?>
			  </div>
              <div class="tab-pane fade" id="custom-content-below-kontak" role="tabpanel" aria-labelledby="custom-content-below-kontak-tab">
			  
				<?php 
				$query_b = $this->db->query("SELECT * FROM ".$this->db->dbprefix('webcontact'));
				if ($query_b->num_rows() >= 1)
				{
					foreach($datawebcontact as $dwc)
					{
				?>	
                <form class="form-horizontal" action="<?php echo base_url()?>infowebsite/savewebcontact" method="post" enctype="multipart/form-data" id="webkontakForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('web_email');?></label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" value="<?php echo $dwc["email"];?>" >
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputTlpn" class="col-sm-2 col-form-label"><?php echo lang('web_phone');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $dwc["phonenumber"];?>" >
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputAlamat"  class="col-sm-2 col-form-label"><?php echo lang('web_address');?></label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" name="alamat"><?php echo $dwc["address"];?></textarea>
					</div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id=" idwebcontact" name="idwebcontact" value="<?php echo $dwc["idwebcontact"];?>">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form>  
			  <?php
					}
				}	
				else
				{		
			  ?>
			  <form class="form-horizontal" action="<?php echo base_url()?>infowebsite/savewebcontact" method="post" enctype="multipart/form-data" id="webkontakForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('web_email');?></label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="email" name="email" >
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputTlpn" class="col-sm-2 col-form-label"><?php echo lang('web_phone');?></label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="telepon" name="telepon" >
                    </div>
                  </div>
				   <div class="form-group row">
                    <label for="inputAlamat"  class="col-sm-2 col-form-label"><?php echo lang('web_address');?></label>
					<div class="col-sm-10">
						<textarea class="form-control" rows="3" name="alamat"></textarea>
					</div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form>  
			  <?php 
				}
			  ?>
			  </div>
              <div class="tab-pane fade" id="custom-content-below-sosmed" role="tabpanel" aria-labelledby="custom-content-below-sosmed-tab">
			  <?php 
				$query_c = $this->db->query("SELECT * FROM ".$this->db->dbprefix('websocialmedia'));
				if ($query_c->num_rows() >= 1)
				{
					foreach($datawebsocialmedia as $dwsm)
					{
			   ?>	
                <form class="form-horizontal" action="<?php echo base_url()?>infowebsite/savewebsocialmedia" method="post" enctype="multipart/form-data" id="websosmedForm">
                <div class="card-body">
                  
				  <div class="form-group row">
                    <label for="inputFB" class="col-sm-2 col-form-label"><?php echo lang('web_fb');?></label>
                    <div class="col-sm-10">
                      <input type="facebook" class="form-control" id="facebook" name="facebook" value="<?php echo $dwsm["facebook"];?>">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputTwitter" class="col-sm-2 col-form-label"><?php echo lang('web_twtr');?></label>
                    <div class="col-sm-10">
                      <input type="twitter" class="form-control" id="twitter" name="twitter" value="<?php echo $dwsm["twitter"];?>">
                    </div>
                  </div>
				<div class="form-group row">
                    <label for="inputYoutube" class="col-sm-2 col-form-label"><?php echo lang('web_ytb');?></label>
                    <div class="col-sm-10">
                      <input type="youtube" class="form-control" id="youtube" name="youtube" value="<?php echo $dwsm["youtube"];?>">
                    </div>
                  </div>
				<div class="form-group row">
                    <label for="inputIG" class="col-sm-2 col-form-label"><?php echo lang('web_inst');?></label>
                    <div class="col-sm-10">
                      <input type="instagram" class="form-control" id="instagram" name="instagram" value="<?php echo $dwsm["instagram"];?>">
                    </div>
                  </div>
				</div>  
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id=" idwebsocialmedia" name="idwebsocialmedia" value="<?php echo $dwsm["idwebsocialmedia"];?>">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form>  
			  <?php
					}
				}	
				else
				{		
			  ?>
			  <form class="form-horizontal" action="<?php echo base_url()?>infowebsite/savewebsocialmedia" method="post" enctype="multipart/form-data" id="websosmedForm">
                <div class="card-body">
                  
				  <div class="form-group row">
                    <label for="inputFB" class="col-sm-2 col-form-label"><?php echo lang('web_fb');?></label>
                    <div class="col-sm-10">
                      <input type="facebook" class="form-control" id="facebook" name="facebook" >
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputTwitter" class="col-sm-2 col-form-label"><?php echo lang('web_twtr');?></label>
                    <div class="col-sm-10">
                      <input type="twitter" class="form-control" id="twitter" name="twitter" >
                    </div>
                  </div>
				<div class="form-group row">
                    <label for="inputYoutube" class="col-sm-2 col-form-label"><?php echo lang('web_ytb');?></label>
                    <div class="col-sm-10">
                      <input type="youtube" class="form-control" id="youtube" name="youtube" >
                    </div>
                  </div>
				<div class="form-group row">
                    <label for="inputIG" class="col-sm-2 col-form-label"><?php echo lang('web_inst');?></label>
                    <div class="col-sm-10">
                      <input type="instagram" class="form-control" id="instagram" name="instagram" >
                    </div>
                  </div>
				</div>  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form>
			  <?php 
				}
			  ?>
              </div>
              <div class="tab-pane fade" id="custom-content-below-logo" role="tabpanel" aria-labelledby="custom-content-below-logo-tab">
				<?php 
				$query_d = $this->db->query("SELECT * FROM ".$this->db->dbprefix('weblogo'));
				if ($query_d->num_rows() >= 1)
				{
					foreach($dataweblogo as $dwl)
					{
			   ?>
				<form role="form" action="<?php echo base_url()?>infowebsite/saveweblogo" method="post" enctype="multipart/form-data">
                <div class="card-body">
				  <div class="form-group row">
					<img src="<?php echo base_url()?>/assets/files/images/<?php echo $dwl["logo"];?>" width="212px" height="50px">
				  </div>
				  <div class="form-group row">
                    <label for="InputFileLogo"><?php echo lang('web_flogo');?></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="filelogo" name="filelogo">
                        <label class="custom-file-label" for="filelogo"><?php echo lang('chose_file');?></label>
                      </div>
                  </div>
				  <div class="form-group row">
					<img src="<?php echo base_url()?>/assets/files/images/<?php echo $dwl["favicon"];?>" width="57px" height="57px">
				  </div>
				  <div class="form-group row">
                    <label for="InputFileFavicon"><?php echo lang('web_ffavicon');?></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="filefavicon" name="filefavicon">
                        <label class="custom-file-label" for="filefavicon"><?php echo lang('chose_file');?></label>
                      </div>
                  </div>
				</div>  
                <!-- /.card-body -->
                <div class="card-footer">
				  <input type="hidden" class="form-control" id="idweblogo" name="idweblogo" value="<?php echo $dwl["idweblogo"];?>">	
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form>  
			 <?php
					}
				}	
				else
				{		
			?>	
			<form role="form" action="<?php echo base_url()?>infowebsite/saveweblogo" method="post" enctype="multipart/form-data" id="weblogoForm">
                <div class="card-body">
				  <div class="form-group row">
                    <label for="InputFileLogo"><?php echo lang('web_flogo');?></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="filelogo" name="filelogo">
                        <label class="custom-file-label" for="filelogo"><?php echo lang('chose_file');?></label>
                      </div>
                  </div>
				  <div class="form-group row">
                    <label for="InputFileFavicon"><?php echo lang('web_ffavicon');?></label>
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="filefavicon" name="filefavicon">
                        <label class="custom-file-label" for="filefavicon"><?php echo lang('chose_file');?></label>
                      </div>
                  </div>
				</div>  
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
                </div>
                <!-- /.card-footer -->
              </form>  
			<?php 
				}
			?>
              </div>
			  
            </div>
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->