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
            <h1><?php echo lang('review_report');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('review_report');?></li>
            </ol>
          </div>
        </div>
		
		
		<?php if($this->session->flashdata('msg_error')){?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> <?php echo lang('error_message_title');?></h5>
				<?php echo $this->session->flashdata('msg_error');?>.
			</div>
		 <?php }?>
		
	    <?php if($this->session->flashdata('msg_success')){?>
		<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h5><i class="icon fas fa-check"></i> <?php echo lang('success_message_title');?></h5>
		  <?php echo $this->session->flashdata('msg_success');?>.
		</div>
		<?php }?>
		
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
                <tr>
				  <th><?php echo lang('no');?></th>
				  <th><?php echo lang('courses');?></th>
				  <th><?php echo lang('review');?></th>
				  <th><?php echo lang('name');?></th>
				  <th><?php echo lang('coment');?></th>
				  <th><?php echo lang('date');?></th>
				  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($data as $do)
					{ 
					$i++;
					
					$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$do["idcourses"]."'");
					$rowcorses = $querycourses->row();
					$title=$rowcorses->title;
					
					$queryreview = $this->db->query("SELECT * FROM `".$this->db->dbprefix('review')."` WHERE idreview='".$do["idreview"]."'");
					$rowreview = $queryreview->row();
					$coment=$rowreview->coment;
					
					$queryuser = $this->db->query("SELECT fullname FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$do["iduser"]."'");
					$rowuser = $queryuser->row();
					$fullname=$rowuser->fullname;
					
					$split=explode('-',$do["date"]);
					$tahun=$split[0];
					$bulan=$split[1];
					$tgl=$split[2];
					$bulanind=day($bulan);	
				?>	
				 <tr>
				  <td><?php echo $i;?></td>
				  <td><a href="<?php echo base_url();?>learning/coursesdetail/<?php echo $do["idcourses"];?>" class="link-title"><?php echo $title;?></a></td>
				  <td><?php echo $coment;?></td>
				  <td><?php echo $fullname;?></td>
				  <td><?php echo $do["reportcoment"];?></td>
				  <td><?php echo $tgl." ".$bulanind." ".$tahun;?></td>
				  <td>
					<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-default-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i><?php echo lang('delete');?></a></td>
				  </td>
                </tr>
				
				<div class="modal fade" id="modal-default-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title"><?php echo lang('review_report');?></h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p><?php echo $do["reportcoment"];?></p>
							<form action="<?php echo base_url()?>reviewreport/deletes" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="idreviewreport " name="idreviewreport " value="<?php echo $do["idreviewreport"];?>">
							  <input type="hidden" id="idreview " name="idreview" value="<?php echo $do["idreview"];?>">
							</div>
							<div class="modal-footer justify-content-between">
							  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
							  <button type="submit" class="btn btn-primary"><?php echo lang('finish');?></button>
							</div>
							</form>  
						  </div>
						  <!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
				  </div>
				
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