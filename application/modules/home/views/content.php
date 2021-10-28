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
      
		
		
<!-- 2nd Home Slider -->
	<div class="home1-mainslider">
		<div class="container-fluid p0">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-banner-wrapper">
					    <div class="banner-style-one owl-theme owl-carousel">
					    <?php
							$querybanner = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerberanda')." WHERE idlanguage='".$idlanguage."' ORDER BY idbanner DESC LIMIT 5");
							$databanner=$querybanner->result(); 
							foreach ($databanner as $db)
							{
						?>    
							<div class="slide slide-one" style="background-image: url(<?php echo base_url()?>assets/files/banners/<?php echo $db->image;?>); height: 95vh;">
					            <div class="container">
					                <div class="row home-content">
					                    <div class="col-lg-12 text-center p0">
					                        <?php echo $db->text;?> 
					                    </div>
					                </div>
					            </div>
					        </div>
							<?php	
								}	
							?>
					        <div class="slide slide-one" style="background-image: url(<?php echo base_url()?>assets/edumy/images/home/2.jpg);height: 95vh;">
					            <div class="container">
					                <div class="row home-content">
					                    <div class="col-lg-12 text-center p0">
					                        <h3 class="banner-title">Self EducatIon Resources and Infos</h3>
					                        <p>Technology is brining a massive wave of evolution on learning things on different ways</p>
					                        <div class="btn-block"><a href="#" class="banner-btn">Ready to get Started?</a></div>
					                    </div>
					                </div>
					            </div>
					        </div>
							
					        <div class="slide slide-one" style="background-image: url(<?php echo base_url()?>assets/edumy/images/home/3.jpg);height: 95vh;">
					            <div class="container">
					                <div class="row home-content">
					                    <div class="col-lg-12 text-center p0">
					                        <h3 class="banner-title">Find the Best Courses</h3>
					                        <p>Technology is brining a massive wave of evolution on learning things on different ways</p>
					                        <div class="btn-block"><a href="#" class="banner-btn">Ready to get Started?</a></div>
					                    </div>
					                </div>
					            </div>
					        </div>
					    </div>
					    <div class="carousel-btn-block banner-carousel-btn">
					        <span class="carousel-btn left-btn"><i class="flaticon-left-arrow left"></i></span>
					        <span class="carousel-btn right-btn"><i class="flaticon-right-arrow-1 right"></i></span>
					    </div><!-- /.carousel-btn-block banner-carousel-btn -->
					</div><!-- /.main-banner-wrapper -->
				</div>
			</div>
		</div>
	</div>

	<!-- School Category Courses -->
	<section id="our-courses" class="our-courses pt90 pt650-992">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<a href="#our-courses">
				    	<div class="mouse_scroll">
			        		<div class="icon"><span class="flaticon-download-arrow"></span></div>
				    	</div>
				    </a>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mt0"><?php echo lang('popular_category');?></h3>
						<p><?php echo lang('popular_category');?></p>
					</div>
				</div>
			</div>
			<div class="row">
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
			
				<div class="col-sm-6 col-lg-3">
					<div class="img_hvr_box" style="background-image: url(<?php echo base_url()?>assets/files/category/<?php echo $dc->image;?>);">
						<div class="overlay">
							<div class="details">
								<h5><?php echo $dc->title;?></h5>
								<p><?php echo lang('total_courses');?> (<?php echo $totalcourses;?>)</p>
							</div>
						</div>
					</div>
				</div>
			<?php
				}
			?>	
				
				
				<div class="col-lg-6 offset-lg-3">
					<div class="courses_all_btn text-center">
						<a class="btn btn-transparent" href="<?php echo base_url();?>learning/courses"><?php echo lang('view_all');?></a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Popular Courses -->
	<section class="popular-courses pb0 pt0">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="main-title text-center">
						<h3 class="mt0"><?php echo lang('lastest_courses');?></h3>
						<p><?php echo lang('lastest_courses');?></p>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12">
					<div class="popular_course_slider_home3">
					
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
					
						<div class="item">
							<div class="top_courses mb0">
								<div class="thumb">
									<img class="img-whp" src="<?php echo base_url()?>assets/files/courses/<?php echo $dlc->image;?>" alt="<?php echo $dlc->image;?>">
									<div class="overlay">
									<?php
										if($totalpayment>='50')
										{
									?>
										<div class="tag"><?php echo lang('best_seller');?></div>
									<?php
										}			
									?>	
										<a class="tc_preview_course" href="<?php echo base_url()?>learning/coursesdetail/<?php echo $dlc->idcourses;?>"><?php echo lang('pc');?></a>
									</div>
								</div>
								<div class="details">
									<div class="tc_content">
										<p>
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
										<h5><?php echo $dlc->title;?></h5>
										<ul class="tc_review">
										<?php
											for($i=1;$i<=5;$i++) 
											{
										?>		
											<li class="list-inline-item"><a href="#"><i class="<?php if($i<=$ratingchecked){ echo "fa fa-star";}else{ echo "fa fa-star-o";}?>"></i></a></li>
										<?php
											}
										?>		
											<li class="list-inline-item"><a href="#"><b><?php echo number_format($reviewstar,1);?></b> (<?php echo $reviewtotal;?>)</a></li>
										</ul>
									</div>
									<div class="tc_footer">
										<div class="tc_price float-right"><?php if($dlc->price!=0){echo lang('curency')." ".money($dlc->price);}else{ echo lang('free');}?></div>
									</div>
								</div>
							</div>
						</div>
	<?php
		}
	?>
						
						
					</div>
				</div>
			</div>
		</div>
	</section>