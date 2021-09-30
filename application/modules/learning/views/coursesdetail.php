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
	
	foreach($datacourses as $dc)
	{

		$split=explode('-',$dc["date"]);
		$tahun=$split[0];
		$bulan=$split[1];
		$tgl=$split[2];
		$bulanind=day($bulan,$idlanguage);	
		
		function money($nilai, $pecahan = 0) 
		{
			return number_format($nilai, $pecahan, ',', '.');
		}
		
		$queryinstructors = $this->db->query("SELECT iduser FROM `".$this->db->dbprefix('instructors')."` WHERE idcourses='".$dc["idcourses"]."'");
		$rowinstructors = $queryinstructors->row();
		
		// ================ Rating ================ //
		
		$querysumrating = $this->db->query("SELECT SUM(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."'");
		$rowsumrating = $querysumrating->row();
		$totalrating = $rowsumrating->ratingtotal;
		
		$querycountrating = $this->db->query("SELECT COUNT(*) AS reviewertotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."'");
		$rowcountrating = $querycountrating->row();
		$reviewtotal = $rowcountrating->reviewertotal;
		
		$reviewstar=$totalrating / $reviewtotal;
		$ratingchecked=round($reviewstar);

		$querycountpayment = $this->db->query("SELECT COUNT(*) AS totalpayment FROM `".$this->db->dbprefix('payment')."` WHERE idcourses='".$dc["idcourses"]."'");
		$rowcountpayment = $querycountpayment->row();
		$totalpayment = $rowcountpayment->totalpayment;
		
		// ================ Level ================ //
		$querylevel = $this->db->query("SELECT level FROM `".$this->db->dbprefix('level')."` WHERE idlanguage='".$idlanguage."' AND idlevel='".$dc["idlevel"]."'");
		$rowlevel = $querylevel->row();
		$level = $rowlevel->level;
		
		// ================ Level ================ //
		$querycountenroll = $this->db->query("SELECT COUNT(*) AS totalenroll FROM `".$this->db->dbprefix('enroll')."` WHERE idcourses='".$dc["idcourses"]."'");
		$rowcountenroll = $querycountenroll->row();
		$totalenroll = $rowcountenroll->totalenroll;
		
		// ================ Language ================ //
		$querylanguage = $this->db->query("SELECT language FROM `".$this->db->dbprefix('language')."` WHERE idlanguage='".$idlanguage."'");
		$rowlanguage = $querylanguage->row();
		$language = $rowlanguage->language;
		
		// ================ Total Module ================ //
		$querycountmodule = $this->db->query("SELECT COUNT(*) AS totalmodule FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$dc["idcourses"]."'");
		$rowmodule = $querycountmodule->row();
		$totalmodule = $rowmodule->totalmodule;
		
		// ================ Category ================ //
		$querycategory = $this->db->query("SELECT idcategory, title FROM `".$this->db->dbprefix('category')."` WHERE idcategory='".$dc["idcategory"]."'");
		$rowcategory = $querycategory->row();
		$idcategory = $rowcategory->idcategory;
		$category = $rowcategory->title;
		
		// ================ Subcategory ================ //
		$querysubcategory = $this->db->query("SELECT idsubcategory, title FROM `".$this->db->dbprefix('subcategory')."` WHERE idcategory='".$idcategory."'");
		$rowsubcategory = $querysubcategory->row();
		$idsubcategory = $rowsubcategory->idsubcategory;
		$subcategory = $rowsubcategory->title;
?>
      
		
		
<main role="main">

    <div class="jumbotron jumbotron-fluid bgcourses">
	  <div class="container">
		 <div class="row">
		  <div class="col-sm-3"> <img src="<?php echo base_url()?>assets/files/courses/<?php echo $dc["image"];?>" class="img-thumbnail"> </div>
		  <div class="col-sm-9"><p><h1><b><?php echo $dc["title"];?></b></h1><br/>
		    <form>
			<div class="btn-group">
			<?php
			if($dc["price"]!="0")
			{
				$cekoder = $this->db->query("SELECT COUNT(*) AS totalorder FROM `".$this->db->dbprefix('order')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."'");
				$rowcekorder = $cekoder->row();
				$totalorder = $rowcekorder->totalorder;
				if($totalorder>='1')
				{	
					$cekenroll = $this->db->query("SELECT COUNT(*) AS totalenroll FROM `".$this->db->dbprefix('enroll')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."'");
					$rowcekenroll = $cekenroll->row();
					$totalenroll = $rowcekenroll->totalenroll;
					if($totalenroll>='1'){}else
					{
			?>
				<input type="hidden" name="idcourses" id="idcourses" value="<?php echo $dc["idcourses"];?>">
				<input type="hidden" name="price" id="price" value="<?php echo $dc["price"];?>">
				<button type="button" class="btn btn-primary rounded-0" id="addCourses" disabled><i class="fas fa-plus"></i> <?php echo lang('take_class');?></button>
				&nbsp;&nbsp;&nbsp;
			<?php
					}
				}	
				else
				{
			?>		
				<input type="hidden" name="idcourses" id="idcourses" value="<?php echo $dc["idcourses"];?>">
				<input type="hidden" name="price" id="price" value="<?php echo $dc["price"];?>">
				<button type="button" class="btn btn-primary rounded-0" id="addCourses"><i class="fas fa-plus"></i> <?php echo lang('take_class');?></button>
				&nbsp;&nbsp;&nbsp;
			<?php
				}	
			}
			else
			{	
				$cekenroll = $this->db->query("SELECT COUNT(*) AS totalenroll FROM `".$this->db->dbprefix('enroll')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."'");
				$rowcekenroll = $cekenroll->row();
				$totalenroll = $rowcekenroll->totalenroll;
				if($totalenroll>='1'){}else
				{
			?>	
				<input type="hidden" name="idcourses" id="idcourses" value="<?php echo $dc["idcourses"];?>">
				<input type="hidden" name="price" id="price" value="<?php echo $dc["price"];?>">
				<button type="button" class="btn btn-primary rounded-0" id="addCourses"><i class="fas fa-plus"></i> <?php echo lang('take_class');?></button>
				&nbsp;&nbsp;&nbsp;
			<?php	
				}					
			}
			?>
			</form>
			<form>
			<?php
				$cekfav = $this->db->query("SELECT COUNT(*) AS totalfav FROM `".$this->db->dbprefix('favorite')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."'");
				$rowcekfav = $cekfav->row();
				$totalfav = $rowcekfav->totalfav;
				if($totalfav>='1')
				{	
			?>
				<input type="hidden" name="idcourses" id="idcourses" value="<?php echo $dc["idcourses"];?>">
				<input type="hidden" name="price" id="price" value="<?php echo $dc["price"];?>">
				<button type="button" class="btn btn-danger rounded-0" id="addFavorite"><i class="fas fa-heart"></i> <?php echo lang('favorite_delete');?></button>
			<?php
				}
				else
				{
			?>		
				<input type="hidden" name="idcourses" id="idcourses" value="<?php echo $dc["idcourses"];?>">
				<input type="hidden" name="price" id="price" value="<?php echo $dc["price"];?>">
				<button type="button" class="btn btn-danger rounded-0" id="addFavorite"><i class="far fa-heart"></i> <?php echo lang('favorite');?></button>
			<?php	
				}		
			?>	
			</form>
			</div><br/>
			<?php echo lang('created_by');?>
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
					echo "<a href='".base_url()."learning/instructorsdetail/".$rowinstructors->iduser."' class='link-instructors'><b>".$du->fullname."</b></a>".$coma;
			}	
			?>
		  </p>
		  <p>
		    <?php
				for($i=1;$i<=5;$i++) 
				{
			?>		
					<span class="fa fa-star <?php if($i<=$ratingchecked){ echo "checked";}?>"></span>
			<?php
				}
			?>	
				<b><?php echo number_format($reviewstar,1);?></b> (<?php echo $reviewtotal;?>)&nbsp;&nbsp;&nbsp;
				<i class="fas fa-calendar-alt"></i> <?php echo $tgl." ".$bulanind." ".$tahun;?>&nbsp;&nbsp;&nbsp;
				<i class="fas fa-comment"></i> <?php echo $language;?>
		  </p>
			<?php 
			if($totalenroll>='1')
			{
				//Empty
			}
			else
			{
				//Not Empty
			?>
			<p align="justify">
			<button type="button" class="btn btn-success"><b><?php if($dc["price"]!=0){echo lang('curency')." ".money($dc["price"]);}else{ echo lang('free');}?></b></button>&nbsp;&nbsp;&nbsp;
			<?php
			}
			?>
			<i class="fas fa-users"></i> <?php echo $totalenroll;?>&nbsp;<?php echo lang('students_enrolled');?>&nbsp;&nbsp;&nbsp;
			<i class="fas fa-level-up-alt"></i>&nbsp;<?php echo lang('level');?> <?php echo $level;?>&nbsp;&nbsp;&nbsp;
			<i class="fas fa-book-open"></i>&nbsp;<?php echo lang('module');?> <?php echo $totalmodule;?>
		  </p>
		  </div>
		</div> 
	  </div>
    </div>


	<!-- The Modal -->
	  <div class="modal fade" id="modal-feedback-courses">
		<div class="modal-dialog modal-dialog-centered">
		  <div class="modal-content">
		  
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title"><?php echo lang('feedback_title');?></h4>
			  <button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<form id="feedbackCourses">
			<!-- Modal body -->
			<div class="modal-body">
			
			<?php
				$querycrc = $this->db->query("SELECT COUNT(*) AS totalreview FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$idcourses."' AND iduser='".$idusers."'");
				$rowcrc = $querycrc->row();
				$totalreview = $rowcrc->totalreview;
				
				if($totalreview>=1)
				{
					$queryidr = $this->db->query("SELECT idreview  FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$idcourses."' AND iduser='".$idusers."'");
					$rowidr = $queryidr->row();
					$idreview = $rowidr->idreview;
					
					$queryrv = $this->db->query("SELECT * FROM `".$this->db->dbprefix('review')."` WHERE idreview='".$idreview."' AND idcourses='".$idcourses."' AND iduser='".$idusers."'");
					$rowrv = $queryrv->row();
					$rating = $rowrv->rating;
					$coment = $rowrv->coment;
			?>
			
			  <div class="form-group row">
				<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('rating');?></label>
				<div class="col-sm-10">
				
					<div class="star-rating text-center">
					  <input id="star-5" type="radio" name="rating" value="5" <?php if($rating=="5"){ echo "checked";}?> class="myStarRating" />
					  <label for="star-5" title="5 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-4" type="radio" name="rating" value="4" <?php if($rating=="4"){ echo "checked";}?>  class="myStarRating" />
					  <label for="star-4" title="4 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-3" type="radio" name="rating" value="3" <?php if($rating=="3"){ echo "checked";}?>  class="myStarRating" />
					  <label for="star-3" title="3 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-2" type="radio" name="rating" value="2" <?php if($rating=="2"){ echo "checked";}?>  class="myStarRating" />
					  <label for="star-2" title="2 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-1" type="radio" name="rating" value="1" <?php if($rating=="1"){ echo "checked";}?>  class="myStarRating" />
					  <label for="star-1" title="1 star">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					</div>
					<input type="hidden" name="starRatingValue" id="starRatingValue" value="<?php echo $coment;?>">
				</div>
			  </div>
			
			  <div class="form-group row">
				<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('feedback_coment');?></label>
				<div class="col-sm-10">
				  <textarea class="textarea" placeholder="<?php echo lang('feedback_placeholder');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="feedbackComent" name="feedbackComent"><?php echo $coment;?></textarea>
				</div>
			  </div>
			  <?php
				}
				else
				{	
			  ?>
			  <div class="form-group row">
				<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('rating');?></label>
				<div class="col-sm-10">
				
					<div class="star-rating text-center">
					  <input id="star-5" type="radio" name="rating" value="5" class="myStarRating" />
					  <label for="star-5" title="5 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-4" type="radio" name="rating" value="4"class="myStarRating" />
					  <label for="star-4" title="4 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-3" type="radio" name="rating" value="3" class="myStarRating" />
					  <label for="star-3" title="3 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-2" type="radio" name="rating" value="2" class="myStarRating" />
					  <label for="star-2" title="2 stars">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					  <input id="star-1" type="radio" name="rating" value="1" class="myStarRating" />
					  <label for="star-1" title="1 star">
						<i class="active fa fa-star" aria-hidden="true" style="font-size:48px"></i>
					  </label>
					</div>
					<input type="hidden" name="starRatingValue" id="starRatingValue" >
				</div>
			  </div>
			
			  <div class="form-group row">
				<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('feedback_coment');?></label>
				<div class="col-sm-10">
				  <textarea class="textarea" placeholder="<?php echo lang('feedback_placeholder');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="feedbackComent" name="feedbackComent"></textarea>
				</div>
			  </div>
			  <?php
				}	
			  ?>
			  
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
			  <input type="hidden" name="idcourses" id="idcourses" value="<?php echo $idcourses;?>">
			  <input type="hidden" name="iduser" id="iduser" value="<?php echo $idusers;?>">
			  <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo lang('close');?></button>
			  <button type="submit" class="btn btn-primary" name="feedbackCoursesBtn" id="feedbackCoursesBtn"><?php echo lang('saves');?></button>
			</div>
			</form>
		  </div>
		</div>
	  </div>

  <!-- Courses Infor -->
  <div class="container-fluid eslearing-content-item">
	<div class="row">
		<div class="container">
		
			<nav aria-label="breadcrumb ">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>learning/coursescategory/<?php echo $idcategory;?>/0" class="link-title"><?php echo $category;?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>learning/coursescategory/<?php echo $idcategory;?>/<?php echo $idsubcategory;?>" class="link-title"><?php echo $subcategory;?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo $dc["title"];?></li>
			  </ol>
			</nav>
		
		<!-- Nav tabs -->
			  <ul class="nav nav-tabs">
				<li class="nav-item">
				  <a class="nav-link active link-title" data-toggle="tab" href="#description"><?php echo lang('courses_information');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link link-title" data-toggle="tab" href="#coursesmaterial"><?php echo lang('coursesmaterial');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link link-title" data-toggle="tab" href="#review"><?php echo lang('review');?></a>
				</li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div id="description" class="container tab-pane active">
				
				    <br/>
					<?php
						$cekenroll = $this->db->query("SELECT COUNT(*) AS totalenroll FROM `".$this->db->dbprefix('enroll')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."'");
						$rowcekenroll = $cekenroll->row();
						$totalenroll = $rowcekenroll->totalenroll;
						if($totalenroll>="1")
						{
							// ================ Progress ================ //
							$cekcontent = $this->db->query("SELECT COUNT(*) AS progress FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."' AND progress='1'");
							$rowcekcontent = $cekcontent->row();
							$progress = $rowcekcontent->progress;
							
							// ================ Total Module ================ //
							$querycountmodule = $this->db->query("SELECT COUNT(*) AS totalmodule FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$dc["idcourses"]."'");
							$rowmodule = $querycountmodule->row();
							$totalmodule = $rowmodule->totalmodule;
							
							$persent_progress=($progress/$totalmodule)*100;
							
							// ================ Max Id ================ //
							$querymaxidcontent = $this->db->query("SELECT MAX(idcontent) AS maxidcontent FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."' AND progress='1'");
							$rowmaxidcontent = $querymaxidcontent->row();
							$maxidcontent = $rowmaxidcontent->maxidcontent;
							$nextidcontent = $maxidcontent+1;
					?>
					<div class="row">
					<div class="col-sm-9">
						<!-- Progress -->
						<div class="card h-100 card-progresscourses-item rounded-0">
							<div class="card-body ">
								<p><h5><b><?php echo lang('courses_progress');?></h5></b></p>
								<?php
								if($persent_progress=="0")
								{		
								?>
								<center><img src="<?php echo base_url()?>assets/files/images/sadicon.png" width="80" height="80"><br/><br/><b><?php echo lang('zero_progress');?></b></center>
								<?php
								}
								else if($persent_progress=="100")
								{
								?>	
								<center><img src="<?php echo base_url()?>assets/files/images/confetti.png" width="40" height="40">
								&nbsp;&nbsp;&nbsp;<b><?php echo lang('graduate_title');?></b>
								<br/><?php echo lang('graduate_content');?><br/>
								<img src="<?php echo base_url();?>assets/eslearning/img/certificate_graduate.png" width="250" height="250"><br/></center>
								<br/>
								<div class="text-center">
								<p>
								<button type="button" class="btn btn-success" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunctionCs()"><i class="fas fa-award"></i></i>&nbsp;&nbsp;&nbsp;<?php echo lang('certificate');?></button>
								&nbsp;
								<button type="button" class="btn btn-info" id="btnFeedBack" name="btnFeedBack" data-toggle="modal" data-target="#modal-feedback-courses"><i class="fas fa-thumbs-up"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('feedback');?></button>
								</p>
								</div>
								<script type="text/javascript">
								function myFunctionCs() {
								  window.open("<?php echo base_url();?>learning/printcertificate/<?php echo $idusers;?>/<?php echo $dc['idcourses'];?>");
								}
								function myFunctionFb() {
								  window.open("<?php echo base_url();?>learning/coursesfeedback/<?php echo $idusers;?>/<?php echo $dc['idcourses'];?>");
								}
								</script>
								<?php
								}	
								else
								{	
								?>
								<div class="bar-container">
								  <div style="width: <?php echo $persent_progress;?>%; height: 25px; background-color: #4CAF50; margin-bottom:3px; text-align: center;"><?php echo $persent_progress;?>%</div>
								</div>
								<?php
								}	
								?>
							</div>
						</div>
					</div>
					<div class="col-sm-3">
						<?php
						if($persent_progress=="100")
						{	
						?>
						<div class="alert alert-info">
						  <p align="justify"><?php echo lang('graduate_title');?></p>
						</div>
						<?php
						}		
						else
						{	
						?>
						<div class="alert alert-info">
						  <p align="justify"><?php echo lang('courses_enroll');?></p>
						</div>
						<p><button type="button" class="btn btn-primary btn-block" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunction()"><i class="fas fa-book-reader"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('continue_learning');?></button></p>
						<script type="text/javascript">
							function myFunction() {
							  window.open("<?php echo base_url();?>learning/contentcourses/<?php echo $dc['idcourses'];?>/<?php echo $nextidcontent;?>");
							}
						</script>
						<?php
						}
						?>
					</div>	
					</div>
					<?php
						}
					?>
				  <br/>	
				  <p><h5><b><?php echo lang('description');?></h5></b></p>
				  <hr/>	
				  <p><?php echo $dc["description"];?></p>
				</div>
				<div id="coursesmaterial" class="container tab-pane fade">
				<br/>
				<?php
				$querysyllabus = $this->db->query("SELECT * FROM `".$this->db->dbprefix('syllabus')."` WHERE idcourses='".$dc["idcourses"]."'");
				$datasyllabus=$querysyllabus->result(); 
				$x=0;
				foreach ($datasyllabus as $ds)
				{
					$x++;
				?>
				  <p><b><?php echo $x.". ".$ds->syllabus;?></b></p>
				  <table class="table tablecontent">
					<?php
					$querycontent = $this->db->query("SELECT * FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$dc["idcourses"]."' AND idsyllabus='".$ds->idsyllabus."'");
					$datacontent =$querycontent->result(); 
					$y=0;
					foreach ($datacontent as $dcc)
					{
						$y++;	
						$cekenroll = $this->db->query("SELECT COUNT(*) AS totalenroll FROM `".$this->db->dbprefix('enroll')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."'");
						$rowcekenroll = $cekenroll->row();
						$totalenroll = $rowcekenroll->totalenroll;
						if($totalenroll>='1')
						{	
							// ================ Max Id ================ //
							$querymaxidcontent = $this->db->query("SELECT MAX(idcontent) AS maxidcontent FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$dc["idcourses"]."' AND iduser='".$idusers."' AND progress='1'");
							$rowmaxidcontent = $querymaxidcontent->row();
							$maxidcontent = $rowmaxidcontent->maxidcontent;
							$nextidcontent = $maxidcontent+1;
					?>
							<?php
							//Cek Next Courses
							if($y<=$nextidcontent)
							{	
							//Cek Type
							if($dcc->type=="1")
							{
							?>
							  <tr>
								<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
								<td width="80%">&nbsp;&nbsp;<span class="fa fa-play-circle text-info mr-2"></span>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>learning/contentcourses/<?php echo $dc['idcourses'];?>/<?php echo $dcc->idcontent;?>" class="link-content-courses"><?php echo $dcc->title;?></a></td>
								<td class="text-right">
								<span class="fa fa-video mr-2"></span>(<?php echo $dcc->duration;?>)
								<?php if($y<=$maxidcontent){?>&nbsp;<span class="fa fa-check text-info mr-2"></span><?php }?>
								</td>
							  </tr>
						  <?php 
							}
							else if($dcc->type=="2")
							{	
						  ?>
							   <tr>
								<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
								<td width="80%">&nbsp;&nbsp;<span class="far fa-file-pdf text-info mr-2"></span>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>learning/contentcourses/<?php echo $dc['idcourses'];?>/<?php echo $dcc->idcontent;?>" class="link-content-courses"><?php echo $dcc->title;?></a></td>
								<td class="text-right"><?php if($y<=$maxidcontent){?>&nbsp;<span class="fa fa-check text-info mr-2"></span><?php }?></td>
							   </tr>
						  <?php 
							}
							else if($dcc->type=="3")
							{	
						  ?>
							 <tr>
								<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
								<td width="80%">&nbsp;&nbsp;<span class="fas fa-link text-info mr-2"></span>&nbsp;&nbsp;&nbsp;<a href="<?php echo base_url();?>learning/contentcourses/<?php echo $dc['idcourses'];?>/<?php echo $dcc->idcontent;?>" class="link-content-courses"><?php echo $dcc->title;?></a></td>
								<td class="text-right"><?php if($y<=$maxidcontent){?>&nbsp;<span class="fa fa-check text-info mr-2"></span><?php }?></td>
							   </tr>
						  <?php
							}
							//End Cek Type
							}
							//End Cek Next Courses
							else
							{
							?>	
							
									<?php 
									//Block Courses
									if($dcc->type=="1")
									{
									?>
									  <tr>
										<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
										<td width="80%"><span class="fa fa-lock mr-22"></span>&nbsp;&nbsp;<span class="fa fa-play-circle mr-2"></span>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></td>
										<td class="text-right"><span class="fa fa-video mr-2"></span>(<?php echo $dcc->duration;?>)</td>
									  </tr>
								  <?php 
									}
									else if($dcc->type=="2")
									{	
								  ?>
									   <tr>
										<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
										<td width="80%"><span class="fa fa-lock mr-22"></span>&nbsp;&nbsp;<span class="far fa-file-pdf mr-2"></span>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></td>
										<td></td>
									   </tr>
								  <?php 
									}
									else if($dcc->type=="3")
									{	
								  ?>
									 <tr>
										<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
										<td width="80%"><span class="fa fa-lock mr-22"></span>&nbsp;&nbsp;<span class="fas fa-link mr-2"></span>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></td>
										<td></td>
									   </tr>
								  <?php
									}
									//End Block Courses
								?>
								
							<?php
							}	
						}
						else
						{	
					  ?>
							<?php 
							if($dcc->type=="1")
							{
							?>
							  <tr>
								<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
								<td width="80%"><span class="fa fa-lock mr-22"></span>&nbsp;&nbsp;<span class="fa fa-play-circle mr-2"></span>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></td>
								<td class="text-right"><span class="fa fa-video mr-2"></span>(<?php echo $dcc->duration;?>)</td>
							  </tr>
						  <?php 
							}
							else if($dcc->type=="2")
							{	
						  ?>
							   <tr>
								<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
								<td width="80%"><span class="fa fa-lock mr-22"></span>&nbsp;&nbsp;<span class="far fa-file-pdf mr-2"></span>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></td>
								<td></td>
							   </tr>
						  <?php 
							}
							else if($dcc->type=="3")
							{	
						  ?>
							 <tr>
								<td>&nbsp;<?php echo $x.".".$y.". ";?></td>
								<td width="80%"><span class="fa fa-lock mr-22"></span>&nbsp;&nbsp;<span class="fas fa-link mr-2"></span>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></td>
								<td></td>
							   </tr>
						  <?php
							}
						?>
				  <?php 
						}
					}
				  ?>
				  </table>
				<?php
				}
				?>	  
				</div>
				<div id="review" class="container tab-pane fade">
				  <br/>
				  
				  <span class="heading"><?php echo lang('user_rating');?></span>
					<?php
						for($i=1;$i<=5;$i++) 
						{
					?>		
							<span class="fa fa-star <?php if($i<=$ratingchecked){ echo "checked";}?>"></span>
					<?php
						}
					?>	
					<p><?php echo number_format($reviewstar,1);?> <?php echo lang('user_rating_avg');?> <?php echo $reviewtotal;?> <?php echo lang('user_rating_review');?></p>
					<hr style="border:3px solid #f1f1f1">
					<?php
						// ================ Rating ================ //
						
					$querysumrating5 = $this->db->query("SELECT COUNT(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."' AND rating='5'");
					$rowsumrating5 = $querysumrating5->row();
					$totalrating5 = $rowsumrating5->ratingtotal;

					$querysumrating4 = $this->db->query("SELECT COUNT(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."' AND rating='4'");
					$rowsumrating4 = $querysumrating4->row();
					$totalrating4= $rowsumrating4->ratingtotal;
					
					$querysumrating3 = $this->db->query("SELECT COUNT(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."' AND rating='3'");
					$rowsumrating3 = $querysumrating3->row();
					$totalrating3= $rowsumrating3->ratingtotal;
					
					$querysumrating2 = $this->db->query("SELECT COUNT(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."' AND rating='2'");
					$rowsumrating2 = $querysumrating2->row();
					$totalrating2= $rowsumrating2->ratingtotal;
					
					$querysumrating1 = $this->db->query("SELECT COUNT(rating) AS ratingtotal FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."' AND rating='1'");
					$rowsumrating1 = $querysumrating1->row();
					$totalrating1= $rowsumrating1->ratingtotal;
			
					$presentase5=$totalrating5/$reviewtotal*100;
					$presentase4=$totalrating4/$reviewtotal*100;
					$presentase3=$totalrating3/$reviewtotal*100;
					$presentase2=$totalrating2/$reviewtotal*100;
					$presentase1=$totalrating1/$reviewtotal*100;
			
					?>	
					
					<div class="row">
						<div class="container">
						  <div class="side">
						  <div>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
							<span class="fa fa-star checked"></span>
						  </div>
						  </div>
						  <div class="middle">
							<div class="bar-container">
							  <div style="width: <?php echo $presentase5;?>%; height: 18px; background-color: #4CAF50;"></div>
							</div>
						  </div>
						  <div class="side right">
							<div><?php echo $totalrating5;?></div>
						  </div>
						  <div class="side">
							<div>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star "></span>
							</div>
						  </div>
						  <div class="middle">
							<div class="bar-container">
							  <div style="width: <?php echo $presentase4;?>%; height: 18px; background-color: #2196F3;"></div>
							</div>
						  </div>
						  <div class="side right">
							<div><?php echo $totalrating4;?></div>
						  </div>
						  <div class="side">
							<div>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star "></span>
								<span class="fa fa-star "></span>
							</div>
						  </div>
						  <div class="middle">
							<div class="bar-container">
							  <div style="width: <?php echo $presentase3;?>%; height: 18px; background-color: #00bcd4;"></div>
							</div>
						  </div>
						  <div class="side right">
							<div><?php echo $totalrating3;?></div>
						  </div>
						  <div class="side">
							<div>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star "></span>
								<span class="fa fa-star "></span>
								<span class="fa fa-star "></span>
							</div>
						  </div>
						  <div class="middle">
							<div class="bar-container">
							  <div style="width: <?php echo $presentase2;?>%; height: 18px; background-color: #ff9800;"></div>
							</div>
						  </div>
						  <div class="side right">
							<div><?php echo $totalrating2;?></div>
						  </div>
						  <div class="side">
							<div>
								<span class="fa fa-star checked"></span>
								<span class="fa fa-star "></span>
								<span class="fa fa-star "></span>
								<span class="fa fa-star "></span>
								<span class="fa fa-star "></span>
							</div>
						  </div>
						  <div class="middle">
							<div class="bar-container">
							  <div style="width: <?php echo $presentase1;?>%; height: 18px; background-color: #f44336;"></div>
							</div>
						  </div>
						  <div class="side right">
							<div><?php echo $totalrating1;?></div>
						  </div>
						</div>
					</div>
					<br/>	
					<hr/>
					<?php
						$queryreview = $this->db->query("SELECT * FROM `".$this->db->dbprefix('review')."` WHERE idcourses='".$dc["idcourses"]."'");
						$dataqueryreview =$queryreview->result(); 
						$z=0;
						foreach ($dataqueryreview as $dr)
						{
							$queryratinguser = $this->db->query("SELECT fullname,profilepicture FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$dr->iduser."'");
							$rowsumratinguser = $queryratinguser->row();
							$namauser = $rowsumratinguser->fullname;
							$imageuser = $rowsumratinguser->profilepicture;
							
							$querytrr = $this->db->query("SELECT COUNT(*) AS totalrr FROM `".$this->db->dbprefix('reviewreport')."` WHERE iduser='".$idusers."' AND idcourses='".$dc["idcourses"]."' AND idreview='".$dr->idreview."'");
							$rowtrr = $querytrr->row();
							$totalrr = $rowtrr->totalrr;
							if($totalrr=="0")
							{
								$yes = "0";
								$no = "0";
								$report = "0";
							}	
							else
							{	
								$queryrr = $this->db->query("SELECT * FROM `".$this->db->dbprefix('reviewreport')."` WHERE iduser='".$idusers."' AND idcourses='".$dc["idcourses"]."' AND idreview='".$dr->idreview."'");
								$rowrr = $queryrr->row();
								$yes = $rowrr->yes;
								$no = $rowrr->no;
								$report = $rowrr->report;
							}
							
							$z++;
					?>
					<br/>	
					<div class="container">
							<div class="row">	
								<div class="col-sm-3 text-center">
										<p class="align-middle"><img src="<?php if($imageuser==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $imageuser;?><?php } ?>" class="rounded-circle" width="80" height="80"></p>
										<p class="align-middle"><b><?php echo $namauser;?></b></p>
										<p class="align-middle"><?php echo timeago($dr->date,$idlanguage);?></p>
								</div>
								<div class="col-sm-9">
									<p>
										<?php
											for($i=1;$i<=5;$i++) 
											{
										?>		
												<span class="fa fa-star <?php if($i<=$dr->rating){ echo "checked";}?>"></span>
										<?php
											}
										?>
									</p>
									<p>
										<?php echo $dr->coment;?>
									</p>
									<p>
										<?php echo lang('was_this_review_helpful');?>&nbsp; 
										<div class="btn-group">
											<form>
												<input type="hidden" name="idreview<?php echo $z;?>" id="idreview<?php echo $z;?>" value="<?php echo $dr->idreview;?>">
												<input type="hidden" name="idcourses<?php echo $z;?>" id="idcourses<?php echo $z;?>" value="<?php echo $dc["idcourses"];?>">
												<input type="hidden" name="iduser<?php echo $z;?>" id="iduser<?php echo $z;?>" value="<?php echo $idusers;?>">
												<button type="button" <?php if($yes=="1"){?>class="btn-dark" disabled<?php }else{?> class="btn-outline-dark"<?php }?> id="yesReview<?php echo $z;?>"><?php echo lang('yes');?></button>&nbsp;
											</form>
											<form>
												<input type="hidden" name="idreview<?php echo $z;?>" id="idreview<?php echo $z;?>" value="<?php echo $dr->idreview;?>">
												<input type="hidden" name="idcourses<?php echo $z;?>" id="idcourses<?php echo $z;?>" value="<?php echo $dc["idcourses"];?>">
												<input type="hidden" name="iduser<?php echo $z;?>" id="iduser<?php echo $z;?>" value="<?php echo $idusers;?>">
												<button type="button" <?php if($no=="1"){?>class="btn-dark" disabled<?php }else{?> class="btn-outline-dark"<?php }?> id="noReview<?php echo $z;?>"><?php echo lang('not');?></button>&nbsp;
											</form>	
											<?php if($report=="1")
											{
											?>
											<button type="button" class="btn-outline-danger" id="reportingReviewCanceled<?php echo $z;?>"><?php echo lang('cancel_reproting');?></button>
											<?php
											}
											else if($report=="0")
											{	
											?>
											<button type="button" class="btn-outline-danger" id="reportingReview<?php echo $z;?>" data-toggle="modal" data-target="#modal-default-<?php echo $z;?>"><?php echo lang('report');?></button>
											<?php
											}	
											?>
										</div>	
									</p>
								</div>
							</div>	
					</div>
					<br/>	
					<hr/>
					
					<!-- The Modal -->
					  <div class="modal fade" id="modal-default-<?php echo $z;?>">
						<div class="modal-dialog modal-dialog-centered">
						  <div class="modal-content">
						  
							<!-- Modal Header -->
							<div class="modal-header">
							  <h4 class="modal-title"><?php echo lang('report');?></h4>
							  <button type="button" class="close" data-dismiss="modal">&times;</button>
							</div>
							<form id="reportReview<?php echo $z;?>">
							<!-- Modal body -->
							<div class="modal-body">
							  <div class="form-group row">
								<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('reporting');?></label>
								<div class="col-sm-10">
								  <textarea class="textarea" placeholder="<?php echo lang('add_report_here');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="reportcoment<?php echo $z;?>" name="reportcoment<?php echo $z;?>"></textarea>
								</div>
							  </div>
							</div>
							
							<!-- Modal footer -->
							<div class="modal-footer">
							  <input type="hidden" name="idreview<?php echo $z;?>" id="idreview<?php echo $z;?>" value="<?php echo $dr->idreview;?>">
							  <input type="hidden" name="idcourses<?php echo $z;?>" id="idcourses<?php echo $z;?>" value="<?php echo $dc["idcourses"];?>">
							  <input type="hidden" name="iduser<?php echo $z;?>" id="iduser<?php echo $z;?>" value="<?php echo $idusers;?>">
							  <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo lang('close');?></button>
							  <button type="submit" class="btn btn-primary" name="reportReviewBtn<?php echo $z;?>" id="reportReviewBtn<?php echo $z;?>"><?php echo lang('saves');?></button>
							</div>
							</form>
						  </div>
						</div>
					  </div>
					  
											<!-- JQuery JS -->
											<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
											
											<!-- jquery-validation -->
											<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
											<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
											
											<!-- Script Summernote -->
											<script>
											  $(function () {
												// Summernote
											   $('#reportcoment<?php echo $z;?>').summernote({
													placeholder: '<?php echo lang('add_report_here');?>'
												});
											  })
											</script>
											
											<script type="text/javascript">
												$(document).ready(function(){
												  //$("#reportingReviewCanceled<?php echo $z;?>").hide();
												
												$('#yesReview<?php echo $z;?>').on('click',function(){
													var idreview = $('#idreview<?php echo $z;?>').val();
													var idcourses = $('#idcourses<?php echo $z;?>').val();
													var iduser = $('#iduser<?php echo $z;?>').val();
													$.ajax({
														type : "POST",
														url  : "<?php echo site_url('learning/helpfullcommentyes')?>",
														dataType : "JSON",
														beforeSend :function () {
																swal({
																	title: "<?php echo lang('waiting');?>",
																	html: "<?php echo lang('data_prossecing');?>",
																	onOpen: () => {
																	  swal.showLoading()
																	}
																  })      
														},
														data : {idreview:idreview, idcourses:idcourses, iduser:iduser},
														success: function(value){
															if (value.msg == 'true') {
																$("#yesReview<?php echo $z;?>").removeClass("btn-outline-dark");
																$("#yesReview<?php echo $z;?>").addClass("btn-dark");
																$("#yesReview<?php echo $z;?>").prop('disabled', true);	
																$("#noReview<?php echo $z;?>").prop('disabled', false);
																$("#noReview<?php echo $z;?>").addClass("btn-outline-dark");
																$("#noReview<?php echo $z;?>").removeClass("btn-dark");	
																swal({
																  type: "success",
																  title: "<?php echo lang('review');?>",
																  text: value.msg_success,
																  confirmButtonColor: '#007bff',
																});
															}
															else
															{
																swal({
																  type: "error",
																  title: "<?php echo lang('review');?>",
																  text: value.msg_error,
																  confirmButtonColor: '#007bff',
																});
															}
														}
													});
													return false;
												});
											  
											   $('#noReview<?php echo $z;?>').on('click',function(){
													var idreview = $('#idreview<?php echo $z;?>').val();
													var idcourses = $('#idcourses<?php echo $z;?>').val();
													var iduser = $('#iduser<?php echo $z;?>').val();
													$.ajax({
														type : "POST",
														url  : "<?php echo site_url('learning/helpfullcommentno')?>",
														dataType : "JSON",
														beforeSend :function () {
																swal({
																	title: "<?php echo lang('waiting');?>",
																	html: "<?php echo lang('data_prossecing');?>",
																	onOpen: () => {
																	  swal.showLoading()
																	}
																  })      
														},
														data : {idreview:idreview, idcourses:idcourses, iduser:iduser},
														success: function(value){
															if (value.msg == 'true') {
																$("#yesReview<?php echo $z;?>").addClass("btn-outline-dark");
																$("#yesReview<?php echo $z;?>").removeClass("btn-dark");
																$("#yesReview<?php echo $z;?>").prop('disabled', false);					
																$("#noReview<?php echo $z;?>").addClass("btn-dark");
																$("#noReview<?php echo $z;?>").removeClass("btn-outline-dark");
																$("#noReview<?php echo $z;?>").prop('disabled', true);					
																swal({
																  type: "success",
																  title: "<?php echo lang('review');?>",
																  text: value.msg_success,
																  confirmButtonColor: '#007bff',
																});
															}
															else
															{
																swal({
																  type: "error",
																  title: "<?php echo lang('review');?>",
																  text: value.msg_error,
																  confirmButtonColor: '#007bff',
																});
															}
														}
													});
													return false;
											  });
											  
											   $('#reportReviewBtn<?php echo $z;?>').on('click',function(e){
													e.preventDefault();
													if($('#reportcoment<?php echo $z;?>').val().trim() == ''){
													   //handle error message
													   swal({
														  type: "error",
														  title: "<?php echo lang('report');?>",
														  text: "<?php echo lang('reporting_empty');?>",
														  confirmButtonColor: '#007bff',
														});
													}
													else
													{
														var idreview = $('#idreview<?php echo $z;?>').val();
														var idcourses = $('#idcourses<?php echo $z;?>').val();
														var iduser = $('#iduser<?php echo $z;?>').val();
														var reportcoment = $('#reportcoment<?php echo $z;?>').val();
														$.ajax({
															type : "POST",
															url  : "<?php echo site_url('learning/helpfullcommentreport')?>",
															dataType : "JSON",
															beforeSend :function () {
																	swal({
																		title: "<?php echo lang('waiting');?>",
																		html: "<?php echo lang('data_prossecing');?>",
																		onOpen: () => {
																		  swal.showLoading()
																		}
																	  })      
															},
															data : {idreview:idreview, idcourses:idcourses, iduser:iduser, reportcoment:reportcoment},
															success: function(value){
																if (value.msg == 'true') {
																	//$("#reportingReview<?php echo $z;?>").hide();
																	//$("#reportingReviewCanceled<?php echo $z;?>").show();
																	// bersihkan form pada modal
																	$('#modal-default-<?php echo $z;?>').modal('hide');
																	swal({
																	  type: "success",
																	  title: "<?php echo lang('report');?>",
																	  text: value.msg_success,
																	  confirmButtonColor: '#007bff',
																	});
																	window.location.reload();	
																}
																else
																{
																	swal({
																	  type: "error",
																	  title: "<?php echo lang('report');?>",
																	  text: value.msg_error,
																	  confirmButtonColor: '#007bff',
																	});
																}
															}
														});
														return false;	
													}	
												});
												
												$('#reportingReviewCanceled<?php echo $z;?>').on('click',function(){
													var idreview = $('#idreview<?php echo $z;?>').val();
													var idcourses = $('#idcourses<?php echo $z;?>').val();
													var iduser = $('#iduser<?php echo $z;?>').val();
													$.ajax({
														type : "POST",
														url  : "<?php echo site_url('learning/helpfullcancelledreport')?>",
														dataType : "JSON",
														beforeSend :function () {
																swal({
																	title: "<?php echo lang('waiting');?>",
																	html: "<?php echo lang('data_prossecing');?>",
																	onOpen: () => {
																	  swal.showLoading()
																	}
																  })      
														},
														data : {idreview:idreview, idcourses:idcourses, iduser:iduser},
														success: function(value){
															if (value.msg == 'true') {
																//$("#reportingReview<?php echo $z;?>").show();
																//$("#reportingReviewCanceled<?php echo $z;?>").hide();												
																swal({
																  type: "success",
																  title: "<?php echo lang('report');?>",
																  text: value.msg_success,
																  confirmButtonColor: '#007bff',
																});
																window.location.reload();				
															}
															else
															{
																swal({
																  type: "error",
																  title: "<?php echo lang('report');?>",
																  text: value.msg_error,
																  confirmButtonColor: '#007bff',
																});
															}
														}
													});
													return false;
											  });
												
											});
										  </script>
					
					<?php
						}	
					?>
				</div>
			  </div>
            <!-- /.card -->	
            </div> 
		
		<!-- /.container-fluid -->		
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /Registration -->

</main>
<?php
	}
?>