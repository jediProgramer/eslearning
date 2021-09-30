<!-- Content Wrapper. Contains page content -->

<?php
	
	function day($bulan)
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
		$day=$dayname;
		return $day;
	}
	
	function money($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}
?>

<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('courses_users');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('courses_users');?></li>
            </ol>
          </div>
        </div>
		
      </div><!-- /.container-fluid -->
    </section>
<!-- /.content-header -->
				
<!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
				<div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr class="dt-head-center">
				  <th><?php echo lang('no');?></th>
				  <th><?php echo lang('user_name');?></th>
				  <th><?php echo lang('courses');?></th>
                  <th><?php echo lang('courses_progress');?></th>
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
					
					$queryuser = $this->db->query("SELECT fullname FROM `".$this->db->dbprefix('users')."` WHERE iduser ='".$d["iduser"]."'");
					$rowuser= $queryuser->row();
					$fullname=$rowuser->fullname;
					
					// ================ Progress ================ //
					$cekcontent = $this->db->query("SELECT COUNT(*) AS progress FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$d["idcourses"]."' AND iduser='".$d["iduser"]."' AND progress='1'");
					$rowcekcontent = $cekcontent->row();
					$progress = $rowcekcontent->progress;
					
					// ================ Total Module ================ //
					$querycountmodule = $this->db->query("SELECT COUNT(*) AS totalmodule FROM `".$this->db->dbprefix('content')."` WHERE idcourses='".$d["idcourses"]."'");
					$rowmodule = $querycountmodule->row();
					$totalmodule = $rowmodule->totalmodule;
					
					$persent_progress=($progress/$totalmodule)*100;
					
					// ================ Max Id ================ //
					$querymaxidcontent = $this->db->query("SELECT MAX(idcontent) AS maxidcontent FROM `".$this->db->dbprefix('contentprogress')."` WHERE idcourses='".$d["idcourses"]."' AND iduser='".$d["iduser"]."' AND progress='1'");
					$rowmaxidcontent = $querymaxidcontent->row();
					$maxidcontent = $rowmaxidcontent->maxidcontent;
					$nextidcontent = $maxidcontent+1;
						
				?>	
				 <tr>
				  <td class="dt-head-center"><?php echo $i;?></td>
				  <td><?php echo $fullname;?></td>
				  <td><?php echo $title;?></td>
                  <td>
					<div class="bar-container">
					  <div style="width: <?php echo $persent_progress;?>%; height: 25px; background-color: #4CAF50; margin-bottom:3px; text-align: center;"><?php echo $persent_progress;?>%</div>
					</div>
				  </td>
                </tr>
				<?php
					}
				?>
				</table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->