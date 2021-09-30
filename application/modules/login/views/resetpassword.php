<?php
  $querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
  $rowbanner = $querybanner->row();
?>
      
		
		
<main role="main">
    <div class="jumbotron jumbotron-fluid pages">
	  <div class="container-fluid">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('reset_password');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


<!-- Registration -->
  <div class="container-fluid register-content-item">
	<div class="row ">
	
	<div class="container">
          <div class="card-body">
            	
               <form class="form-horizontal" id="webresetPwdForm">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('password');?></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('confirm_password');?></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                    </div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
						<?php echo $captcha // tampilkan recaptcha ?>
					</div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
					  <input type="hidden" class="form-control" id="iduser" name="iduser" value="<?php echo $iduser;?>">
                      <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('saves');?></button>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
				</div>
				</form>  
      </div><!-- /.container-fluid -->
	  
    </div>
    <!-- /.row -->
  
</div>
<!-- /Registration -->

</main>