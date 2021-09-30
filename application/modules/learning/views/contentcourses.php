<?php
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
	
	// ================ Category ================ //
	$querycategory = $this->db->query("SELECT idcategory, title FROM `".$this->db->dbprefix('category')."` WHERE idcategory='".$idcategory."'");
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

    <div class="jumbotron jumbotron-fluid pages">
	  <div class="container-fluid">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>learning/category/<?php echo $idcategory;?>" class="link-title"><?php echo $category;?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>learning/subcategory/<?php echo $idsubcategory;?>" class="link-title"><?php echo $subcategory;?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><a href="<?php echo base_url();?>learning/coursesdetail/<?php echo $idcourses;?>" class="link-title"><?php echo $coursestitle;?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $contenttitle;?></li>
		  </ol>
		</nav>
	  </div>
    </div>


<!-- Content -->
  <div class="container-fluid codedume-content-item">
	<div class="row">
		<div class="container">
            <div class="card-body">
			
			<div class="row">
			  <div class="col-3">
				<h1><?php echo lang('material');?></h1>
				<hr/>
				<p>
				<button type="button" class="btn btn-primary btn-block" id="reportingMaterial" data-toggle="modal" data-target="#modal-reporting-material"><i class="fas fa-info"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('report_material');?></button>
				</p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
					  <span class="input-group-text"><i class="fas fa-search"></i></span>
					</div>
					<input class="form-control" id="searchMaterialContent" type="text" placeholder="<?php echo lang('search_course_material');?>">
				</div>
				<div class="list-modul">
				<table id="dataSilabusContent" class="table table-responsive-sm table-striped">
					<?php
					$querysyllabus = $this->db->query("SELECT * FROM `".$this->db->dbprefix('syllabus')."` WHERE idcourses='".$idcourses."'");
					$datasyllabus=$querysyllabus->result(); 
					$x=0;
					foreach ($datasyllabus as $ds)
					{
						$x++;
					?>
					<tr>
						<td align="left" valign= "top"><b><?php echo $x;?>&nbsp;&nbsp;&nbsp;<?php echo $ds->syllabus;?></b></td>
						<td></td>
					</tr>
					<?php
						$querycontent = $this->db->query("SELECT * FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$idcourses."' AND idsyllabus='".$ds->idsyllabus."'");
						$datacontent =$querycontent->result(); 
						$y=0;
						foreach ($datacontent as $dcc)
						{
							// ================ Max Id ================ //
							$querymaxidcontent = $this->db->query("SELECT MAX(idcontent) AS maxidcontent FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$idcourses."' AND iduser='".$idusers."' AND progress='1'");
							$rowmaxidcontent = $querymaxidcontent->row();
							$maxidcontent = $rowmaxidcontent->maxidcontent;
							//$nextidcontent = $maxidcontent+1;
							
							$y++;
					?>
						
						<?php
							//Cek Next Courses
							if($y<=$maxidcontent)
							{	
								if($y==$idcontent)
								{
						?>
								<tr>
									<td width="80%" align="left" valign= "top"><a href="<?php echo base_url();?>learning/contentcourses/<?php echo $idcourses;?>/<?php echo $dcc->idcontent;?>" class="link-content-courses"><b><?php echo $x.".".$y.". ";?>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></b></a></td>
									<td valign= "top"><?php if($y<=$maxidcontent){?><i class="fa fa-check text-info mr-2"></i><?php }?></td>
								</tr>
							  <?php
								}
								else 
								{	
						  ?>
							  <tr>
								<td width="80%" align="left" valign= "top"><a href="<?php echo base_url();?>learning/contentcourses/<?php echo $idcourses;?>/<?php echo $dcc->idcontent;?>" class="link-content-courses"><?php echo $x.".".$y.". ";?>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></a></td>
								<td valign= "top"><?php if($y<=$maxidcontent){?><i class="fa fa-check text-info mr-2"></i><?php }?></td>
							  </tr>
						  <?php
								}
							}
							else
							{	
						  ?>
							<tr>
								<td width="80%" align="left"><?php echo $x.".".$y.". ";?>&nbsp;&nbsp;&nbsp;<?php echo $dcc->title;?></td>
								<td valign= "top"><i class="fa fa-lock mr-22"></i></td>
							  </tr>
						  <?php
							}
						  ?>
					<?php
						}
					}	
					?>
					</table>
					</div>
			  </div>
			  <div class="col-9">
					<div id="card">
						<div id="card-body">
							<?php
								// ================ Content ================ //
								$querycontent = $this->db->query("SELECT * FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$idcourses."' AND idcontent='".$idcontent."'");
								$rowcontent = $querycontent->row();
								$title = $rowcontent->title;
								$video = $rowcontent->video;
								$description = $rowcontent->description;
								$link = $rowcontent->link;
								$file = $rowcontent->file;
								$type = $rowcontent->type;
							?>
							<h1><?php echo $title;?></h1>
							<hr>
							<br/>
							<?php
							if($type=="1")
							{		
							?>
							<p align="center">
							<iframe width="760" height="515" src="<?php echo $video;?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
							</p>
							<br/>
							<p align="justify"><?php echo $description;?></p>
							<?php
							}
							else if($type=="2")
							{	
							?>
							<p align="center">
							<iframe src="<?php echo base_url();?>assets/files/courses_material/<?php echo $file;?>" width="800" height="600">
<?php echo lang('no_pdf');?> 
<a href="<?php echo base_url();?>assets/files/courses_material/<?php echo $file;?>">Download PDF</a></iframe>
							
							</p>
							<br/>
							<p align="justify"><?php echo $description;?></p>
							<?php
							} 
							else if($type=="3")
							{
							?>
							<p align="justify"><?php echo $description;?></p>
								<div class="card card-progresscourses-item rounded-0">
								<div class="card-body ">
									<div class="alert alert-info">
									<p align="center"><span class="fas fa-link mr-2"></span>&nbsp;&nbsp;&nbsp;<a href="<?php echo $link;?>" class="link-content-courses"><?php echo $title;?></a></p>
									</div>
								</div>
								</div>
							<?php
							}
							?>
							<br/>
							<hr/>
							<div class="row">
							<?php
							// ================ MIN ID ================ //
							$queryminidcontent = $this->db->query("SELECT MIN(idcontent) AS minidcontent FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$idcourses."'");
							$rowminidcontent = $queryminidcontent->row();
							$minidcontent = $rowminidcontent->minidcontent;
							
							// ================ MAX ID ================ //
							$querymaxidcontent = $this->db->query("SELECT MAX(idcontent) AS maxidcontent FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$idcourses."'");
							$rowmaxidcontent = $querymaxidcontent->row();
							$maxidcontent = $rowmaxidcontent->maxidcontent;
							?>
								<?php
								if($idcontent==$minidcontent)
								{
								?>	
								<div class="col-sm-6 text-left">
								</div>
								<?php
								}
								else
								{	
								?>
								<div class="col-sm-6 text-left">
									<button type="button" class="btn btn-outline-dark" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunctionPrev()"><i class="fas fa-long-arrow-alt-left"></i></i>&nbsp;&nbsp;&nbsp;
							<?php echo lang('prev_courses');?></button>
								</div>
								<?php
								}
								?>
								<?php
								if($idcontent==$maxidcontent)
								{
								?>	
								<div class="col-sm-6 text-right">
								</div>
								<?php
								}
								else
								{	
								?>
								<div class="col-sm-6 text-right">
									<button type="button" class="btn btn-outline-dark" id="btnCountinueCourses" name="btnCountinueCourses" onclick="myFunctionNext()"><?php echo lang('next_courses');?>&nbsp;&nbsp;&nbsp;<i class="fas fa-long-arrow-alt-right"></i></button>
								</div>
								<?php
								}
								?>
								
								<script type="text/javascript">
								function myFunctionPrev() {
								  window.open("<?php echo base_url();?>learning/contentcourses/<?php echo $idcourses;?>/<?php echo $idcontent-1;?>");
								}
								function myFunctionNext() {
								  window.open("<?php echo base_url();?>learning/contentcourses/<?php echo $idcourses;?>/<?php echo $idcontent+1;?>");
								}
								</script>
							</div>	
						</div>
					</div>
			</div>
			
			<!-- The Modal -->
			  <div class="modal fade" id="modal-reporting-material">
				<div class="modal-dialog modal-dialog-centered">
				  <div class="modal-content">
				  
					<!-- Modal Header -->
					<div class="modal-header">
					  <h4 class="modal-title"><?php echo lang('report');?></h4>
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form id="reportMaterial">
					<!-- Modal body -->
					<div class="modal-body">
					  <div class="form-group row">
						<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('reporting');?></label>
						<div class="col-sm-10">
						  <textarea class="textarea" placeholder="<?php echo lang('add_text_here_report_material');?>" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="reportcoment" name="reportcoment"></textarea>
						</div>
					  </div>
					</div>
					
					<!-- Modal footer -->
					<div class="modal-footer">
					  <input type="hidden" name="idcourses" id="idcourses" value="<?php echo $idcourses;?>">
					  <input type="hidden" name="idcontent" id="idcontent" value="<?php echo $idcontent;?>">
					  <input type="hidden" name="idsyllabus" id="idsyllabus" value="<?php echo $idsyllabus;?>">
					  <input type="hidden" name="iduser" id="iduser" value="<?php echo $idusers;?>">
					  <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo lang('close');?></button>
					  <button type="submit" class="btn btn-primary" name="reportMaterialBtn" id="reportMaterialBtn"><?php echo lang('saves');?></button>
					</div>
					</form>
				  </div>
				</div>
			  </div>
			
            <!-- /.card -->	
            </div> 
		<!-- /.container-fluid -->		
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /Content -->

</main>