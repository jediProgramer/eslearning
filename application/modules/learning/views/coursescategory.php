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

<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
		<div class="container">
			<div class="row">
				<div class="col-xl-6 offset-xl-3 text-center">
					<div class="breadcrumb_content">
						<h4 class="breadcrumb_title"><?php echo lang('courses');?></h4>
						<ol class="breadcrumb">
						    <li class="breadcrumb-item"><a href="<?php echo base_url();?>home"><?php echo lang('home');?></a></li>
						    <li class="breadcrumb-item active" aria-current="page"><?php echo lang('courses');?></li>
						</ol>
					</div>
				</div>
			</div>
		</div>
</section>

<!-- Our Team Members -->
<section class="our-team pb40">
		<div class="container">
					<div class="row">
						<div class="col-xl-12">
							<div class="candidate_revew_select style2 text-center mb25">
								<ul>
									<li class="list-inline-item">
										<select class="selectpicker show-tick" id="sortBy">
											<option value="no">-- <?php echo lang('order_by');?> --</option>
											<option value="lastest"><?php echo lang('lastest_courses');?></option>
											<option value="top"><?php echo lang('top_courses');?></option>
										</select>
									</li>
									<li class="list-inline-item">
										<select class="selectpicker show-tick" id="category">
											<option value="0">-- <?php echo lang('category');?> --</option>
											<?php 
											foreach($datacategory as $dc)
											{ 
											?>
												<option value="<?php echo $dc["idcategory"];?>" <?php if($dc["idcategory"]==$idcategory){ echo "selected";} ?>><?php echo $dc["title"];?></option>
											<?php
											}
											?>
										</select>
									</li>
									<li class="list-inline-item">
										<select class="selectpicker show-tick" id="subcategory">
										<option value="0">-- <?php echo lang('subcategory');?> --</option>
										<?php 
										foreach($datasubcategory as $dsc)
										{ 
										?>
											<option value="<?php echo $dsc["idsubcategory"];?>" <?php if($dsc["idsubcategory"]==$idsubcategory){ echo "selected";} ?>><?php echo $dsc["title"];?></option>
										<?php
										}
										?>
										</select>
									</li>
									<li class="list-inline-item">
										<div class="candidate_revew_search_box course mb30 fn-520">
											<form class="form-inline my-2 my-lg-0">
										    	<input class="form-control mr-sm-2" type="search" id="search" name="search" placeholder="<?php echo lang('search_courses');?>" aria-label="Search">
										    	<button class="btn my-2 my-sm-0" type="submit" id="btnSearch"><span class="flaticon-magnifying-glass"></span></button>
										    </form>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>	
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
						<div class="col-lg-6 col-xl-4">
							<div class="top_courses">
								<div class="thumb">
									<img class="img-whp" src="<?php echo base_url()?>assets/files/courses/<?php echo $dlc["image"];?>" alt="<?php echo $dlc["image"];?>">
									<div class="overlay">
										<?php
											if($totalpayment>='50')
											{
										?>
											<div class="tag"><?php echo lang('best_seller');?></div>
										<?php
											}			
										?>
										<a class="tc_preview_course" href="<?php echo base_url()?>learning/coursesdetail/<?php echo $dlc["idcourses"];?>"><?php echo lang('pc');?></a>
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
										<h5><?php echo $dlc["title"];?></h5>
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
										<div class="tc_price float-right"><?php if($dlc["price"]!=0){echo lang('curency')." ".money($dlc["price"]);}else{ echo lang('free');}?></div>
									</div>
								</div>
							</div>
						</div>
					<?php
							}
					?>
						<div class="col-lg-12">
							<div class="mbp_pagination">
							<?php echo $this->ajax_pagination_category->create_links(); ?> 
							</div>
						</div>
					<?php
					}	
					else
					{	
					?>
						<div class="col text-center">
				  		<img src="<?php echo base_url();?>assets/eslearning/img/data_notfound.png" width="550" heigt="550"><br/>	
				 		<p class="text-center"><h1><b><?php echo lang('no_data');?>.</b></h1></p>
			 			</div>
					<?php
					}
					?>	
					</div>
		</div>
</section>
