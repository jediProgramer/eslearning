<?php
	$queryusers = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$instructure."'");
	$rowusers = $queryusers->row();
	
	$split=explode('-',$rowusers->date);
	$tahun=$split[0];
	$bulan=$split[1];
	$tgl=$split[2];
	$bulanind=day($bulan,$idlanguage);	
	
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
	
	function timeago($date,$idlanguage) 
	{
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
?>
      
		
		
<main role="main">

    <div class="jumbotron jumbotron-fluid profile">
	  <div class="container">
		 <div class="row">
		  <div class="col-sm-3"> <img src="<?php if($rowusers->profilepicture==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $rowusers->profilepicture;?><?php } ?>" class="img-thumbnail" alt="Cinque Terre"> </div>
		  <div class="col-sm-9">
			<p>
			<h1><?php echo $rowusers->fullname;?></h1>
			<br/><p>@<?php echo $rowusers->username;?></p><?php echo lang('joinedsince');?> <?php echo $tgl." ".$bulanind." ".$tahun;?>,&nbsp;<i class="fas fa-map-marker-alt"></i> <?php echo $rowusers->country;?>
			</p>
			<p align="justify"><?php echo $rowusers->profile;?></p>
			<p align="justify">
			<?php 
				$query_a = $this->db->query("SELECT * FROM ".$this->db->dbprefix('education')." WHERE iduser='".$rowusers->iduser."'");
				$data_a=$query_a->result(); 
				foreach ($data_a as $da)
				{
				echo $da->level." - ".$da->college." - ".$da->field_of_study."<br/>";
				}
			?>
			</p>
			</div>
		</div> 
	  </div>
    </div>


  <!-- Registration -->
  <div class="container-fluid codedume-content-item">
	<div class="row">
		<div class="container-fluid">
		
			<nav aria-label="breadcrumb ">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo lang('profile_instructors');?></li>
			  </ol>
			</nav>
		
            <div class="card-body">
			<h1><?php echo lang('courses_by');?> <?php echo $rowusers->fullname;?></h1><hr/><br/>
			
			<div class="row" id="postList">
			
			<?php
			if(!empty($posts))
			{
				foreach ($posts as $dlc)
				{
				$queryinstructors = $this->db->query("SELECT iduser FROM `".$this->db->dbprefix('instructors')."` WHERE idcourses='".$dlc["idcourses"]."'");
				$rowinstructors = $queryinstructors->row();
				
				// ================ Rating ================ //
				
				$querysumrating = $this->db->query("SELECT SUM(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dlc["idcourses"]."'");
				$rowsumrating = $querysumrating->row();
				$totalrating = $rowsumrating->ratingtotal;
				
				$querycountrating = $this->db->query("SELECT COUNT(*) AS reviewertotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dlc["idcourses"]."'");
				$rowcountrating = $querycountrating->row();
				$reviewtotal = $rowcountrating->reviewertotal;
				
				$reviewstar=$totalrating / $reviewtotal;
				$ratingchecked=round($reviewstar);

				$querycountpayment = $this->db->query("SELECT COUNT(*) AS totalpayment FROM `".$this->db->dbprefix('payment')."` WHERE idcourses='".$dlc["idcourses"]."'");
				$rowcountpayment = $querycountpayment->row();
				$totalpayment = $rowcountpayment->totalpayment;
				
		?>
		  <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
			<div class="card h-100 card-courses-item rounded-0">
			   <div class="img-gradient">
				<img class="card-img-top img-fluid" src="<?php echo base_url()?>assets/files/courses/<?php echo $dlc["image"];?>" alt="Card image cap">
				<?php
					if($totalpayment>='50')
					{
				?>
				<div class="courses-label">
					<span class="courses-text-label"><?php echo lang('best_seller');?></span>
				</div>
				<?php
					}			
				?>
			  </div>	
			  <div class="card-body">
				<h4 class="card-title"><a class="card-courses-title" href="<?php echo base_url()?>learning/coursesdetail/<?php echo $dlc["idcourses"];?>"><?php echo $dlc["title"];?></a></h4>
				<p class="card-text">
				<?php 
				$queryusers = $this->db->query("SELECT fullname FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$rowinstructors->iduser."'");
				$datausers=$queryusers->result(); 
				$x=0;
				$coma="";
				foreach ($datausers as $du)
				{
					$x++;
					if ($x<$queryusers->num_rows())
					{
						$coma=", ";	
					}
						echo $du->fullname.$coma;
				}	
				?>
				</p>
				<p class="card-text">
				<?php
					for($i=1;$i<=5;$i++) 
					{
				?>		
						<span class="fa fa-star <?php if($i<=$ratingchecked){ echo "checked";}?>"></span>
				<?php
					}
				?>	
					<b><?php echo number_format($reviewstar,1);?></b> (<?php echo $reviewtotal;?>)
				</p>
				<p class="card-text text-right"><b><?php if($dlc["price"]!=0){echo lang('curency')." ".money($dlc["price"]);}else{ echo lang('free');}?></b></p>
				<p class="card-text"><small class="text-muted"><?php echo timeago($dlc["date"],$idlanguage);?></small></p>
			  </div>
			</div>
		  </div>
		  
			<?php
				}
			?>
			<!-- Footer -->
			<div class="container">
			<div class="row">
			  <div class="col text-center">
				 <?php echo $this->ajax_pagination_instructors->create_links(); ?> 
			  </div>
			</div>
			</div>
			<!-- /Footer -->
		  <?php
			}
			else
			{	
		  ?>
			<!-- Footer -->
			<div class="container">
			<div class="row">
			  <div class="col text-center">
				  <img src="<?php echo base_url();?>assets/codedume/img/data_notfound.png" width="550" heigt="550"><br/>	
				  <p class="text-center"><h1><b><?php echo lang('no_data');?>.</b></h1></p>
			  </div>
			</div>
			</div>
			<!-- /Footer -->
		  <?php
			}
		  ?>
			</div>
			<!-- /.row -->	
			
            <!-- /.card -->	
            </div> 
		<!-- /.container-fluid -->		
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /Registration -->

</main>