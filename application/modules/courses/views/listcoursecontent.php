<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('add_courses_content');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
			  <li class="breadcrumb-item"><a href="<?php echo base_url()?>courses/content"><?php echo lang('courses_content');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('add_courses_content');?></li>
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
			<div class="card-header">
			<?php
				$query_description = $this->db->query("SELECT description FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$idcourses."'");
				$rowd = $query_description->row();
			?>	
                        <p align="justify"><?php echo $rowd->description;?></p>
            </div>
			
            <div class="card-body">
				<?php
					$i = 0;										
					foreach($data as $d)
					{ 
					$i++;
				?>	
				<div class="card card-primary">
           		 <div class="card-header">
              		<h3 class="card-title"><?php echo $d["syllabus"];?></h3>
					<div class="card-tools">
                		<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  		<i class="fas fa-minus"></i></button>
             		 </div>
            		</div>
            	  <div class="card-body">
				  <div class="card-header">
				   <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>courses/tambahcoursecontent/<?php echo $d["idcourses"];?>/<?php echo $d["idsyllabus"];?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add');?></a>
				  </div>
				  <div class="card-body"> 
				  <table id="example_dt<?php echo $i; ?>" class="table table-bordered table-striped">
					<thead>
					<tr>
					<th><?php echo lang('no');?></th>
					<th><?php echo lang('title');?></th>
					<th><?php echo lang('type');?></th>
					<th><?php echo lang('action');?></th>
					</tr>
					</thead>
					<tbody>
					<?php
						$y=0;
						$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('content')." WHERE idcourses='$idcourses' AND idsyllabus='".$d["idsyllabus"]."'");
						$datacontent=$query->result(); 
						foreach ($datacontent as $dc)
						{
						$y++;
					?>	
						<tr>
						<td><?php echo $y;?></td>
						<td><?php echo $dc->title;?></td>
						<td><?php if($dc->type=="1"){ echo lang('video');}else if($dc->type=="2"){ echo lang('files');}else if($dc->type=="3"){ echo lang('link');} ?></td>
						<td>&nbsp;<a class="btn btn-info btn-sm" href="<?php echo base_url()?>courses/editcoursecontent/<?php echo $dc->idcontent;?>/<?php echo $dc->idcourses;?>/<?php echo $dc->idsyllabus;?>"><i class="fas fa-pencil-alt">&nbsp;</i><?php echo lang('edit');?></a>&nbsp; | &nbsp;<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-default-<?php echo $y;?>"><i class="fas fa-trash">&nbsp;</i><?php echo lang('delete');?></a></td>
						</tr>

						<div class="modal fade" id="modal-default-<?php echo $y;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title"><?php echo lang('delete_title');?></h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p><?php echo lang('delete_message');?> <br/><br/><?php echo $dc->title;?>&hellip;</p>
							<form action="<?php echo base_url()?>courses/deletescoursecontent" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="idcontent" name="idcontent" value="<?php echo $dc->idcontent;?>">
							  <input type="hidden" id="idcourses" name="idcourses" value="<?php echo $dc->idcourses;?>">
							  <input type="hidden" id="idsyllabus" name="idsyllabus" value="<?php echo $dc->idsyllabus;?>">
							</div>
							<div class="modal-footer justify-content-between">
							  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
							  <button type="submit" class="btn btn-primary"><?php echo lang('delete');?></button>
							</div>
							</form>  
						  </div>
						  <!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
						</div>
						<!-- /.modal -->		

					<?php
						}
					?>
					</tbody>	
				   </table>
				  <!-- /.card-body -->

				  <!-- Script dataTables -->
					<script type="text/javascript">
					$(function () {
						$("#example_dt<?php echo $i; ?>").DataTable();
					});
					</script>

				  </div>
				   <!-- /.card-body -->
				   </div>
				<!-- /.card -->
				</div>
				<?php
					}
				?>
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