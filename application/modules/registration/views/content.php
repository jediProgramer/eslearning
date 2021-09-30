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
      
		
		
<main role="main">
    <div class="jumbotron jumbotron-fluid pages">
	  <div class="container-fluid">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('register');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


<!-- Registration -->
  <div class="container-fluid register-content-item">
	<div class="row ">
	
	<div class="container">
          <div class="card-body">
            	
               <form class="form-horizontal" id="webregistersForm">
                <div class="card-body">
				  <div class="form-group row">
                    <label for="inputUserName" class="col-sm-2 col-form-label"><?php echo lang('username');?></label>
                    <div class="col-sm-10">
                      <input type="text" placeholder="<?php echo lang('username');?>" class="form-control" id="username" name="username">
                    </div>
                  </div>
				  <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label"><?php echo lang('name');?></label>
                    <div class="col-sm-10">
                      <input type="type" placeholder="<?php echo lang('name');?>" class="form-control" id="fullname" name="fullname">
                    </div>
                  </div>
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
					  <label class="checkbox-inline"><input type="checkbox" value="" id="agree_checked" name="agree_checked"> <?php echo lang('agree');?> <?php echo lang('term');?> <?php echo lang('and');?> <?php echo lang('privacy');?>.</label><br/>
                    </div>
                  </div>
				  <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                      <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('register');?></button>
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