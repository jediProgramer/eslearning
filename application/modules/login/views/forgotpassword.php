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
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('forgot_password');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


<!-- Registration -->
  <div class="container-fluid codedume-content-item">
  
	<div class="row">
	<div class="container">
          <div class="card-body">
            	
               <form class="form-horizontal" id="webforgotPwdForm">
                <div class="card-body col-sm-9 offset-sm-2">
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('email');?></label>
                    <div class="col-sm-10">
                      <input type="type" placeholder="<?php echo lang('your_email');?>" class="form-control" id="email" name="email">
                    </div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
						<?php echo $captcha // tampilkan recaptcha ?>
					</div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('send');?></button>
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