<?php
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
	
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
?>
      
		
		
<main role="main">

    <div class="jumbotron jumbotron-fluid pages">
	  <div class="container-fluid">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('courses');?></li>
		  </ol>
		</nav>
	  </div>
    </div>

	<!-- Search Box -->
	  <div class="container-fluid eslearning-coursessearch-item">
		<div class="row">
			<div class="container-fluid">
				<div class="card-body">
				
				<div class="row">
					<div class="col-lg-12">
					
						<form class="form-inline">
						<input type="text" class="form-control form-control-lg rounded-0" id="search" name="search" placeholder="<?php echo lang('search_courses');?>">
						&nbsp;&nbsp;&nbsp;
						<select class="form-control form-control-lg rounded-0" id="sortBy">
							<option value="no">-- <?php echo lang('order_by');?> --</option>
							<option value="lastest"><?php echo lang('lastest_courses');?></option>
							<option value="top"><?php echo lang('top_courses');?></option>
						</select>
						&nbsp;&nbsp;&nbsp;
						<select class="form-control form-control-lg rounded-0" id="category">
							<option value="0">-- <?php echo lang('category');?> --</option>
							<?php 
							foreach($datacategory as $dc)
							{ 
							?>
								<option value="<?php echo $dc["idcategory"];?>" ><?php echo $dc["title"];?></option>
							<?php
							}
							?>
						</select>
						&nbsp;&nbsp;&nbsp;
						<select class="form-control form-control-lg rounded-0" id="subcategory">
							<option value="0">-- <?php echo lang('subcategory');?> --</option>
						</select>
						&nbsp;&nbsp;&nbsp;
						<button class="btn btn-primary btn-lg rounded-0" type="submit" id="btnSearch"><i class="fas fa-search"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('search_courses');?></button>
						</form> 	
					
					</div>
				</div>	
				
				<!-- /.card -->	
				</div> 
			<!-- /.container-fluid -->		
			</div>
		</div>
		<!-- /.row -->
	</div>
	<!-- /Search Box -->

  <!-- Courses List -->
  <div class="container-fluid eslearning-courseslist-item">
	<div class="row">
		<div class="container-fluid">
            <div class="card-body">
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
				 <?php echo $this->ajax_pagination->create_links(); ?> 
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
				  <img src="<?php echo base_url();?>assets/eslearning/img/data_notfound.png" width="550" heigt="550"><br/>	
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
			</div>
            <!-- /.card -->	
            </div> 
		<!-- /.container-fluid -->		
        </div>
    </div>
    <!-- /.row -->
	

	
</div>
<!-- /Courses List -->

<div class="loading" style="display: none;"><div class="content"><img src="<?php echo base_url().'assets/eslearning/img/loading.gif'; ?>"/></div></div>


</main>