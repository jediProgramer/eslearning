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
      
<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 offset-xl-3 text-center">
				<div class="breadcrumb_content">
					<h4 class="breadcrumb_title"><?php echo lang('my_courses');?></h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('home');?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo lang('my_courses');?></li>
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

		<div class="card-body">
			
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
				<button type="button" class="btn btn-success" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunctionCs()"><i class="fa fa-vcard"></i></i>&nbsp;&nbsp;&nbsp;<?php echo lang('certificate');?></button>
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
				<button type="button" class="btn btn-primary" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunction()"><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('continue_learning');?></button></p>
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

		</div>
	</div>
</section>