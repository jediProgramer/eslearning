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

	function day($bulan,$idlanguage)
	{
			if($idlanguage=="1")
			{
				if($bulan=="01"){$dayname="Januari";}
				else if($bulan=="02"){$dayname="Februari";}
				else if($bulan=="03"){$dayname="Maret";}
				else if($bulan=="04"){$dayname="April";}
				else if($bulan=="05"){$dayname="Mei";}
				else if($bulan=="06"){$dayname="Juni";}
				else if($bulan=="07"){$dayname="Juli";}
				else if($bulan=="08"){$dayname="Agustus";}
				else if($bulan=="09"){$dayname="September";}
				else if($bulan=="10"){$dayname="Okttober";}
				else if($bulan=="11"){$dayname="November";}
				else if($bulan=="12"){$dayname="Desember";}
			}
			else if($idlanguage=="2")
			{
				if($bulan=="01"){$dayname="January";}
				else if($bulan=="02"){$dayname="February";}
				else if($bulan=="03"){$dayname="March";}
				else if($bulan=="04"){$dayname="April";}
				else if($bulan=="05"){$dayname="May";}
				else if($bulan=="06"){$dayname="June";}
				else if($bulan=="07"){$dayname="July";}
				else if($bulan=="08"){$dayname="August";}
				else if($bulan=="09"){$dayname="September";}
				else if($bulan=="10"){$dayname="Okttober";}
				else if($bulan=="11"){$dayname="November";}
				else if($bulan=="12"){$dayname="December";}
			}		
			$day=$dayname;
			return $day;
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
					<h4 class="breadcrumb_title"><?php echo lang('checkcertificate_page');?></h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('home');?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo lang('checkcertificate_page');?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>  	

<!-- Box Section -->
<section class="our-team pb40">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
                <table class="table">
				<?php
					foreach($dataveritification as $d)
					{

						$queryusers = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$d["iduser"]."'");
						$rowusers = $queryusers->row();
						$fullname = $rowusers->fullname;

						$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$d["idcourses"]."'");
						$rowcourses = $querycourses->row();
						$coursesname = $rowcourses->title;

						$split=explode('-',$d["graduatedate"]);
						$tahun_u=$split[0];
						$bulan_u=$split[1];
						$tgl_u=$split[2];
						$mount_u= day($bulan_u,$idlanguage);	
						$year_grad_u = $tgl_u." ".$mount_u." ".$tahun_u;

						$split_exp = explode('-',$d["expiredate"]);
						$tahun_exp_u= $split_exp[0];
						$bulan_exp_u= $split_exp[1];
						$tgl_exp_u = $split_exp[2];
						$mount_exp_u = day($bulan_exp_u,$idlanguage);	
						$year_exp_u = $tgl_exp_u." ".$mount_exp_u." ".$tahun_exp_u;
			   ?>		
                      <tr>
                        <th style="width:30%"><?php echo lang('checkcertificate_no');?></th>
                        <td><?php echo $d["certnumber"]; ?></td>
                      </tr>
                      <tr>
                        <th><?php echo lang('checkcertificate_name');?></th>
                        <td><?php echo $fullname; ?></td>
                      </tr>
                      <tr>
                        <th><?php echo lang('checkcertificate_coursesname');?></th>
                        <td><?php echo $coursesname; ?></td>
                      </tr>
					  <tr>
                        <th><?php echo lang('checkcertificate_date');?></th>
                        <td><?php echo $year_grad_u; ?></td>
                      </tr>
					  <tr>
                        <th><?php echo lang('checkcertificate_date_exp');?></th>
                        <td><?php echo $year_exp_u; ?></td>
                      </tr>
					  <tr>
                        <th></th>
                        <td><?php echo lang('checkcertificate_ybs');?> <?php echo $fullname; ?> <?php echo lang('checkcertificate_cc');?> <?php echo $coursesname; ?><?php echo lang('checkcertificate_cex');?> <?php echo lang('checkcertificate_vs');?></td>
                      </tr>
				<?php
					}
			   ?>	
              
                    </table>
					

			</div>
		</div>
	</div>
</section>	
