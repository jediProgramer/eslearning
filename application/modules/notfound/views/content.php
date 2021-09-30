<?php
	function timeago($date,$idlanguage) {
	    $timestamp = strtotime($date);	
		if($idlanguage="1")
		{
			$strTime = array("detik", "menit", "jam", "hari", "bulan", "tahun");
			$length = array("60","60","24","30","12","10");
			$ago=" yang lalu";
		}
		else if($idlanguage="2")		
		{	
			$strTime = array("second", "minute", "hour", "day", "month", "year");
			$length = array("60","60","24","30","12","10");
			$ago="(s) ago";
		}	

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
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('notfound_page');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


<!-- Registration -->
<div class="container-fluid register-content-item">
	<div class="row ">
	
		<div class="container">
			  <div class="card-body">
				<center>
				<img src="<?php echo base_url();?>assets/eslearning/img/404_page_not_found.png" width="550" heigt="550"><br/>
				<h1><b><?php echo lang('notfound_page');?></b></h1>	
				</center>
			  </div>	
		</div>
		<!-- /.container-fluid -->
	  
    </div>
    <!-- /.row -->
</div>
<!-- /Registration -->

</main>