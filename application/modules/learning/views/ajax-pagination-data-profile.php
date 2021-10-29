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
							<?php echo $this->ajax_pagination->create_links(); ?> 
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