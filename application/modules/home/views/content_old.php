<?php
	function timeago($date,$idlanguage) 
	{
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
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
	<?php
	$querymaxbanner = $this->db->query("SELECT COUNT(*) AS totalbanner FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowmaxbanner = $querymaxbanner->row();
	$totalbanner = $rowmaxbanner->totalbanner;
	
	for($i=0;$i<$totalbanner;$i++)
	{	
	?>
    <li data-target="#demo" data-slide-to="<?php echo $i;?>" <?php if($i==0){?>class="active"><?php }?></li>
    <?php
	}
	?>
  </ul>
  <div class="carousel-inner">
	<?php
		$querybanner = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerberanda')." WHERE idlanguage='".$idlanguage."' ORDER BY idbanner DESC LIMIT 5");
		$databanner=$querybanner->result(); 
		foreach ($databanner as $db)
		{
	?>
    <div class="carousel-item active">
      <img src="<?php echo base_url()?>assets/files/banners/<?php echo $db->image;?>" width="1100" height="500">
	  	<div class="container">
            <div class="carousel-caption text-left">
			<?php echo $db->text;?>   
            </div>
        </div>   
    </div>
	<?php	
		}	
	?>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>


<!-- Page Lastest Courses -->
  <div class="container-fluid courses-content-item">
  
  	<div class="container-fluid courses-header">
		<div class="row">
			<div class="col text-left wow fadeInUp">
				<h1 class="courses-header-title"><?php echo lang('lastest_courses');?></h2>
			</div>
		</div>
    </div>
  
	<div class="row wow fadeInLeftBig">
	<?php
		$querylastestcourses = $this->db->query("SELECT * FROM ".$this->db->dbprefix('courses')." WHERE idcoursetype='2' AND idlanguage='".$idlanguage."' ORDER BY date DESC LIMIT 4");
		$datalastestcourses=$querylastestcourses->result(); 
		foreach ($datalastestcourses as $dlc)
		{
			$queryinstructors = $this->db->query("SELECT iduser FROM `".$this->db->dbprefix('instructors')."` WHERE idcourses='".$dlc->idcourses."'");
			$rowinstructors = $queryinstructors->row();
			
			// ================ Rating ================ //
			
			$querysumrating = $this->db->query("SELECT SUM(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dlc->idcourses."'");
			$rowsumrating = $querysumrating->row();
			$totalrating = $rowsumrating->ratingtotal;
			
			$querycountrating = $this->db->query("SELECT COUNT(*) AS reviewertotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dlc->idcourses."'");
			$rowcountrating = $querycountrating->row();
			$reviewtotal = $rowcountrating->reviewertotal;
			
			$reviewstar=$totalrating / $reviewtotal;
			$ratingchecked=round($reviewstar);

			$querycountpayment = $this->db->query("SELECT COUNT(*) AS totalpayment FROM `".$this->db->dbprefix('payment')."` WHERE idcourses='".$dlc->idcourses."'");
			$rowcountpayment = $querycountpayment->row();
			$totalpayment = $rowcountpayment->totalpayment;
			
	?>
      <div class="col-lg-3 col-md-6 mb-4 d-flex align-items-stretch">
        <div class="card h-100 card-courses-item rounded-0">
		   <div class="img-gradient">
			<img class="card-img-top img-fluid" src="<?php echo base_url()?>assets/files/courses/<?php echo $dlc->image;?>" alt="Card image cap">
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
            <h4 class="card-title"><a class="card-courses-title" href="<?php echo base_url()?>learning/coursesdetail/<?php echo $dlc->idcourses;?>"><?php echo $dlc->title;?></a></h4>
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
			<p class="card-text text-right"><b><?php if($dlc->price!=0){echo lang('curency')." ".money($dlc->price);}else{ echo lang('free');}?></b></p>
            <p class="card-text"><small class="text-muted"><?php echo timeago($dlc->date,$idlanguage);?></small></p>
          </div>
        </div>
      </div>
	  <?php
		}
	  ?>
	  
    </div>
    <!-- /.row -->

	
	
	<!-- Footer -->
    <div class="container">
	<div class="row">
      <div class="col text-center wow fadeInUp">
        <a class="btn btn-primary btn-more rounded-0 btn-lg" href="<?php echo base_url();?>learning/courses"><?php echo lang('view_all');?></a>
      </div>
	</div>
    </div>
  
</div>
<!-- /Lastets Courses -->

 

<!-- Page Popular Category -->
  <div class="container-fluid category-content-item">
  
  	<div class="container-fluid category-header">
		<div class="row">
			<div class="col text-left wow fadeInUp">
				<h1 class="category-header-title"><?php echo lang('popular_category');?></h2>
			</div>
		</div>
    </div>
  
	<div class="row wow fadeInLeftBig">
	<?php
		$querycategory = $this->db->query("SELECT * FROM ".$this->db->dbprefix('category')." WHERE favorite >= '50' AND idlanguage='".$idlanguage."' ORDER BY date DESC LIMIT 4");
		$datacategory = $querycategory->result(); 
		foreach ($datacategory as $dc)
		{
			
			// ================ Count Courses ================ //
			$querycountcourses = $this->db->query("SELECT COUNT(*) AS totalcourses FROM `".$this->db->dbprefix('courses')."` WHERE idcategory='".$dc->idcategory."'");
			$rowcountcourses = $querycountcourses->row();
			$totalcourses = $rowcountcourses->totalcourses;
			
	?>	
      <div class="col-lg-3 col-md-6">
        <div class="card card-category-item rounded-0">
		    <div class="category-gradient">
				<img class="card-img-top img-fluid" src="<?php echo base_url()?>assets/files/category/<?php echo $dc->image;?>" alt="Card image cap">
				<div class="card-img-overlay d-flex flex-column justify-content-end">
					<h4 class="card-title"><a class="card-category-title" href="<?php echo base_url()?>learning/coursescategory/<?php echo $dc->idcategory;?>/0"><?php echo $dc->title;?></a></h4>
					<p class="card-text category-text"><small class="category-text"><?php echo lang('total_courses');?> (<?php echo $totalcourses;?>)</small></p>
				</div>	
			</div>
        </div>
      </div>
	<?php
		}
	?>
    </div>
    <!-- /.row -->
	
	<!-- Footer -->
    <div class="container">
	<div class="row">
      <div class="col text-center wow fadeInUp">
        <a class="btn btn-primary btn-more rounded-0 btn-lg" href="<?php echo base_url();?>learning/courses"><?php echo lang('view_all');?></a>
      </div>
	</div>
    </div>
  
</div>
<!-- /Top Courses -->

</main>