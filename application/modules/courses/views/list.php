<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('courses');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('courses');?></li>
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
              <a class="btn btn-success btn-sm float-right" href="<?php echo base_url()?>courses/tambah"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add');?></a>
            </div>
			
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th><?php echo lang('no');?></th>
				  <th><?php echo lang('language');?></th>
				  <th><?php echo lang('category');?></th>
				  <th><?php echo lang('subcategory');?></th>
				  <th><?php echo lang('title');?></th>
				  <th><?php echo lang('price');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
                     function rupiah($nilai, $pecahan = 0) 
					 {
						 return number_format($nilai, $pecahan, ',', '.');
					 }

					$i = 0;										
					foreach($data as $d)
					{ 
					$i++;

					$querybahasa = $this->db->query("SELECT language FROM `".$this->db->dbprefix('language')."` WHERE idlanguage =".$d["idlanguage"]."");
					$row = $querybahasa->row();
					$bahasa=$row->language;

					$querycategory = $this->db->query("SELECT title FROM `".$this->db->dbprefix('category')."` WHERE idcategory =".$d["idcategory"]."");
					$rowc = $querycategory->row();
					$category=$rowc->title;

					$querysubcategory = $this->db->query("SELECT title FROM `".$this->db->dbprefix('subcategory')."` WHERE idsubcategory =".$d["idsubcategory"]."");
					$rowsc = $querysubcategory->row();
					$subcategory=$rowsc->title;
				?>	
                <tr>
				  <td><?php echo $i;?></td>
				  <td><?php echo $bahasa;?></td>
				  <td><?php echo $category;?></td>
				  <td><?php echo $subcategory;?></td>
				  <td><?php echo $d["title"];?></td>
				  <td><?php if($d["price"]=="0"){ echo lang('free');}else{ echo rupiah($d["price"]);} ?></td>
                  <td><a class="btn btn-success btn-sm" href="<?php echo base_url()?>courses/addsyllabus/<?php echo $d["idcourses"];?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('syllabus');?></a>&nbsp; | &nbsp;<a class="btn btn-warning btn-sm" href="<?php echo base_url()?>courses/addinstructors/<?php echo $d["idcourses"];?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('instructors');?></a>&nbsp; | &nbsp;<a class="btn btn-info btn-sm" href="<?php echo base_url()?>courses/edit/<?php echo $d["idcourses"];?>"><i class="fas fa-pencil-alt">&nbsp;</i><?php echo lang('edit');?></a>&nbsp; | &nbsp;<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-default-<?php echo $i;?>"><i class="fas fa-trash">&nbsp;</i><?php echo lang('delete');?></a></td>
                </tr>
					
				  <div class="modal fade" id="modal-default-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title"><?php echo lang('delete_title');?></h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p><?php echo lang('delete_message');?> <br/><br/><?php echo $d["title"];?>&hellip;</p>
							<form action="<?php echo base_url()?>courses/deletes" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="idcourses" name="idcourses" value="<?php echo $d["idcourses"];?>">
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