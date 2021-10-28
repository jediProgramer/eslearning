<?php
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
?>
<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 offset-xl-3 text-center">
				<div class="breadcrumb_content">
					<h4 class="breadcrumb_title"><?php echo lang('login');?></h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('home');?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo lang('login');?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Our LogIn Register -->
<section class="our-log bgc-fa">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-6 offset-lg-3">
				<div class="login_form inner_page">
					<form id="webloginForm">
						<div class="heading">
							<h3 class="text-center"><?php echo lang('login_account');?></h3>
							<p class="text-center"><?php echo lang('dont_have_account');?>  <a class="text-thm" href="<?php echo base_url();?>registration"><?php echo lang('register');?>!</a></p>
						</div>
						 <div class="form-group">
							<input type="email" name="email" class="form-control" id="email" placeholder="<?php echo lang('email');?>">
						</div>
						<div class="form-group">
							<input type="password" name="password" class="form-control" id="password" placeholder="<?php echo lang('password');?>">
						</div>
						<div class="form-group">
							<center><?php echo $captcha // tampilkan recaptcha ?></center>
						</div>
						<div class="form-group custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="exampleCheck3">
							<label class="custom-control-label" for="exampleCheck3"><?php echo lang('rm');?></label>
							<a class="tdu btn-fpswd float-right" href="<?php echo base_url();?>login/forgotpassword"><?php echo lang('forgot_password');?>?</a>
						</div>
						<button type="submit" class="btn btn-log btn-block btn-thm2"><?php echo lang('login');?></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>

