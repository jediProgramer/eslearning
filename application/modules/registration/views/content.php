<?php
	function timeago($date,$idlanguage) {
	    $timestamp = strtotime($date);	
		$strTime = array("detik", "menit", "jam", "hari", "bulan", "tahun");
		$length = array("60","60","24","30","12","10");
		$ago=" yang lalu";

	    $currentTime = time();
	    if($currentTime >= $timestamp) 
	    {	
			$diff     = time()- $timestamp;
			for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) 
			{
				$diff = $diff / $length[$i];
			}

			$diff = round($diff);
			return $diff . " " . $strTime[$i] ."".$ago." ";
		}
	}
	
	function money($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}
	
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
?>

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 offset-xl-3 text-center">
				<div class="breadcrumb_content">
					<h4 class="breadcrumb_title"><?php echo lang('register');?></h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('home');?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo lang('register');?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>      

<!-- Our LogIn Register -->
<section class="our-log-reg bgc-fa">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-lg-6 offset-lg-3">
				<div class="sign_up_form inner_page">
					<div class="heading">
						<h3 class="text-center"><?php echo lang('reg_title');?></h3>
						<p class="text-center"><?php echo lang('have_account');?> <a class="text-thm" href="<?php echo base_url();?>login"><?php echo lang('login');?></a></p>
					</div>
					<div class="details">
						<form id="webregistersForm">
							<div class="form-group">
								<input type="text" class="form-control" id="username" name="username" placeholder="<?php echo lang('username');?>">
							</div>
							<div class="form-group">
								<input type="text" class="form-control" id="fullname" name="fullname" placeholder="<?php echo lang('name');?>">
							</div>
							 <div class="form-group">
								<input type="email" class="form-control" id="email" name="email" placeholder="<?php echo lang('email');?>">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('password');?>">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="<?php echo lang('confirm_password');?>">
							</div>
							<div class="form-group">
								<center><?php echo $captcha // tampilkan recaptcha ?></center>
							</div>
							<div class="form-group custom-control custom-checkbox">
							<input type="checkbox" class="custom-control-input" id="agree_checked" name="agree_checked">
							<label class="custom-control-label" for="exampleCheck3"><?php echo lang('agree');?> <?php echo lang('term');?> <?php echo lang('and');?> <?php echo lang('privacy');?>.</label>
						</div>
							<button type="submit" class="btn btn-log btn-block btn-thm2"><?php echo lang('register');?></button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>	