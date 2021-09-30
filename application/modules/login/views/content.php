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
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('login');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


<!-- Registration -->
  <div class="container-fluid codedume-content-item">
  
	<div class="row">
	<div class="container">
          <div class="card-body">
            	
               <form class="form-horizontal" id="webloginForm">
                <div class="card-body col-sm-9 offset-sm-2">
				  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label"><?php echo lang('email');?></label>
                    <div class="col-sm-10">
                      <input type="type" placeholder="<?php echo lang('your_email');?>" class="form-control" id="email" name="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label"><?php echo lang('password');?></label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="password" name="password">
                    </div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
						<?php echo $captcha // tampilkan recaptcha ?>
					</div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
					  <label class="col-form-label"><a href="<?php echo base_url();?>login/forgotpassword" class="link-title"><?php echo lang('forgot_password');?>?</a></label><br/>
					  </div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('login');?></button>
                    </div>
                  </div>
				  <hr/>
				  <div class="form-group row">
					<div class="offset-sm-2 col-sm-10">
					<p><?php echo lang('dont_have_account');?> <a href="<?php echo base_url();?>registration" class="link-title"><?php echo lang('register');?></a></p>
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