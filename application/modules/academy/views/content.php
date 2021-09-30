<?php
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
	
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
?>
      
		
		
<main role="main">

    <div class="jumbotron jumbotron-fluid pages">
	  <div class="container-fluid">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('academy_dashboard');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


  <!-- Registration -->
  <div class="container-fluid codedume-content-item">
	<div class="row">
		
		<div class="container">
            <div class="card-body">
			
			<div class="row">
			
				<div class="col-lg-3 col-6">
				  <div class="card h-60 bg-info text-white rounded-0">
					  <div class="card-body ">
						<div class="row">
							<div class="col-6">
								<h3><b>
								<?php
									$query_a = $this->db->query("SELECT COUNT(*) as total FROM ".$this->db->dbprefix('enroll')." WHERE iduser='".$idusers."'");
									$row_a = $query_a->row();
									echo $row_a->total;
								?></b></h3>
								<p><a href="<?php echo base_url();?>academy/mycourses" class="link-card"><b><?php echo lang('my_courses');?></a></b></p>
							</div>	
							<div class="col-6">	
									<i class="fas fa-laptop-code fa-5x"></i>
							</div>	
						</div>
					  </div>
				   </div>
				</div>
				
				<div class="col-lg-3 col-6">
				  <div class="card h-60 bg-danger text-white rounded-0">
					  <div class="card-body ">
						<div class="row">
							<div class="col-6">
								<h3><b>
								<?php
									$query_b = $this->db->query("SELECT COUNT(*) as total FROM ".$this->db->dbprefix('favorite')." WHERE iduser='".$idusers."'");
									$row_b = $query_b->row();
									echo $row_b->total;
								?></b></h3>
								<p><b><a href="<?php echo base_url();?>academy/myfavorite" class="link-card"><?php echo lang('my_favorite');?></a></b></p>
							</div>	
							<div class="col-6">	
									<i class="fas fa-heart fa-5x"></i>
							</div>	
						</div>
					  </div>
				   </div>
				</div>
				
				<div class="col-lg-3 col-6">
				  <div class="card h-60 bg-warning text-white rounded-0">
					  <div class="card-body ">
						<div class="row">
							<div class="col-6">
								<h3><b>
								<?php
									$query_c = $this->db->query("SELECT COUNT(*) as total FROM ".$this->db->dbprefix('order')." WHERE iduser='".$idusers."'");
									$row_c = $query_c->row();
									echo $row_c->total;
								?></b></h3>
								<p><b><a href="<?php echo base_url();?>academy/order" class="link-card"><?php echo lang('my_order');?></a></b></p>
							</div>	
							<div class="col-6">	
									<i class="fas fa-shopping-cart fa-5x"></i>
							</div>	
						</div>
					  </div>
				   </div>
				</div>
				
				<div class="col-lg-3 col-6">
				  <div class="card h-60 bg-success text-white rounded-0">
					  <div class="card-body ">
						<div class="row">
							<div class="col-6">
								<h3><b>
								<?php
									$query_d = $this->db->query("SELECT COUNT(*) as total FROM ".$this->db->dbprefix('order')." WHERE iduser='".$idusers."' AND status='3'");
									$row_d = $query_d->row();
									echo $row_d->total;
								?></b></h3>
								<p><b><a href="<?php echo base_url();?>academy/payment" class="link-card"><?php echo lang('payment');?></a></b></p>
							</div>	
							<div class="col-6">	
									<i class="fas fa-donate fa-5x"></i>
							</div>	
						</div>
					  </div>
				   </div>
				</div>
				
			</div>
			
			<br/>
		
			
			<h1><?php echo lang('my_courses');?></h1>
			<hr/>
			
			<table id="data" class="table table-bordered table-striped">
                <thead>
                <tr class="dt-head-center">
				  <th><?php echo lang('no');?></th>
				  <th><?php echo lang('courses');?></th>
                  <th><?php echo lang('courses_progress');?></th>
				  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
				<?php
					$i = 0;										
					foreach($data as $d)
					{ 
					$i++;

					$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses =".$d["idcourses"]."");
					$rowcorses = $querycourses->row();
					$title=$rowcorses->title;
					
					// ================ Progress ================ //
					$cekcontent = $this->db->query("SELECT COUNT(*) AS progress FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$d["idcourses"]."' AND iduser='".$idusers."' AND progress='1'");
					$rowcekcontent = $cekcontent->row();
					$progress = $rowcekcontent->progress;
					
					// ================ Total Module ================ //
					$querycountmodule = $this->db->query("SELECT COUNT(*) AS totalmodule FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$d["idcourses"]."'");
					$rowmodule = $querycountmodule->row();
					$totalmodule = $rowmodule->totalmodule;
					
					$persent_progress=($progress/$totalmodule)*100;
					
					// ================ Max Id ================ //
					$querymaxidcontent = $this->db->query("SELECT MAX(idcontent) AS maxidcontent FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$d["idcourses"]."' AND iduser='".$idusers."' AND progress='1'");
					$rowmaxidcontent = $querymaxidcontent->row();
					$maxidcontent = $rowmaxidcontent->maxidcontent;
					$nextidcontent = $maxidcontent+1;
						
				?>	
				 <tr>
				  <td class="dt-head-center"><?php echo $i;?></td>
				  <td><a href="<?php echo base_url();?>learning/coursesdetail/<?php echo $d["idcourses"];?>" class="link-title"><?php echo $title;?></a></td>
                  <td>
					<?php
					if($persent_progress=="0")
					{		
					?>
					<center><img src="<?php echo base_url()?>assets/files/images/sadicon.png" width="80" height="80"><br/><br/><b><?php echo lang('zero_progress');?></b></center>
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
				  </td>
				  <td class="dt-head-center">
					<?php
					if($persent_progress=="100")
					{		
					?>
					<button type="button" class="btn btn-success" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunctionCs()"><i class="fas fa-award"></i></i>&nbsp;&nbsp;&nbsp;<?php echo lang('certificate');?></button>
					<script type="text/javascript">
					function myFunctionCs() {
					  window.open("<?php echo base_url();?>learning/printcertificate/<?php echo $idusers;?>/<?php echo $d['idcourses'];?>");
					}
					</script>
					<?php
					}
					else
					{	
					?>	
					<button type="button" class="btn btn-primary" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunction()"><i class="fas fa-book-reader"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('continue_learning');?></button></p>
					<script type="text/javascript">
						function myFunction() {
						  window.open("<?php echo base_url();?>learning/contentcourses/<?php echo $d['idcourses'];?>/<?php echo $nextidcontent;?>");
						}
					</script>
					<?php
					}
					?>	
				  </td>
                </tr>
				<?php
					}
				?>
				</table>
			
            <!-- /.card -->	
            </div> 
		<!-- /.container-fluid -->		
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /Registration -->

</main>