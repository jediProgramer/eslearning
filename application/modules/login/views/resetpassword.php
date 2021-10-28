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
					<h4 class="breadcrumb_title"><?php echo lang('reset_password');?></h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('home');?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo lang('reset_password');?></li>
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
					<form id="webresetPwdForm">
						<div class="form-group">
							<input type="password" name="password" class="form-control" id="password" placeholder="<?php echo lang('password');?>">
						</div>
						<div class="form-group">
							<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?php echo lang('confirm_password');?>">
						</div>
						<div class="form-group">
							<center><?php echo $captcha // tampilkan recaptcha ?></center>
						</div>
						<button type="submit" class="btn btn-log btn-block btn-thm2"><?php echo lang('saves');?></button>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>		