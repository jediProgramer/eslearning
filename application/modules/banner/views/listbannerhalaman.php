<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('banner_pages');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('banner_pages');?></li>
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
	 <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-body">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="custom-content-below-menuutama-tab" data-toggle="pill" href="#custom-content-below-menuutama" role="tab" aria-controls="custom-content-below-menuutama" aria-selected="true"><?php echo lang('banner_main_menu');?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-menukedua-tab" data-toggle="pill" href="#custom-content-below-menukedua" role="tab" aria-controls="custom-content-below-menukedua" aria-selected="false"><?php echo lang('banner_second_menu');?></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-menuketiga-tab" data-toggle="pill" href="#custom-content-below-menuketiga" role="tab" aria-controls="custom-content-below-menuketiga" aria-selected="false"><?php echo lang('banner_third_menu');?></a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="custom-content-below-menuutama" role="tabpanel" aria-labelledby="custom-content-below-menuutama-tab">
			  
		<div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo lang('no');?></th>
                  <th><?php echo lang('main_menu');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($datamenuutamaweb as $dmw)
					{ 
					$i++;
				?>	
                <tr>
                  <td><?php echo $i;?></td>
                  <td><?php echo $dmw["menu"];?></td>
                  <td><?php 
					    $query_b = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerweb')." WHERE idmenuutama =".$dmw["idmenuutama"]."");
						if ($query_b->num_rows() >= 1)
						{ 
					   ?>
							<a class="btn btn-info btn-sm" href="<?php echo base_url()?>banner/kelolabannermenuweb/menuutama/<?php echo $dmw["idmenuutama"];?>"><i class="fas fa-pencil-alt">&nbsp;</i><?php echo lang('edit');?></a>
						<?php
						}						
					    else
						{ 
					   ?>
							<a class="btn btn-info btn-sm" href="<?php echo base_url()?>banner/kelolabannermenuweb/menuutama/<?php echo $dmw["idmenuutama"];?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add');?></a>
					   <?php
						}
					   ?>
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
	
      
				
              </div>
              <div class="tab-pane fade" id="custom-content-below-menukedua" role="tabpanel" aria-labelledby="custom-content-below-menukedua-tab">
			  
		<div class="row">
        <div class="col-12">
         <div class="card">
            <!-- /.card-header -->
			
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo lang('no');?></th>
                  <th><?php echo lang('main_menu');?></th>
				  <th><?php echo lang('second_menu');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($datamenukeduaweb as $dmw)
					{ 
					$i++;
					
					$querymenuutama = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menuutama')."` WHERE idmenuutama =".$dmw["idmenuutama"]."");
					$row = $querymenuutama->row();
					$menuutama=$row->menu;
				?>	
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $menuutama;?></td>
                  <td><?php echo $dmw["menu"];?></td>
                  <td>
					 <?php 
					    $query_b = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerweb')." WHERE idmenukedua =".$dmw["idmenukedua"]."");
						if ($query_b->num_rows() >= 1)
						{ 
					   ?>
							<a class="btn btn-info btn-sm" href="<?php echo base_url()?>banner/kelolabannermenuweb/menukedua/<?php echo $dmw["idmenukedua"];?>"><i class="fas fa-pencil-alt">&nbsp;</i><?php echo lang('edit');?></a>
						<?php
						}						
					    else
						{ 
					   ?>
							<a class="btn btn-info btn-sm" href="<?php echo base_url()?>banner/kelolabannermenuweb/menukedua/<?php echo $dmw["idmenukedua"];?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add');?></a>
					   <?php
						}
					   ?>
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
			  
			  </div>
              <div class="tab-pane fade" id="custom-content-below-menuketiga" role="tabpanel" aria-labelledby="custom-content-below-menuketiga-tab">
			  
		<div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
			
            <div class="card-body">
              <table id="example4" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><?php echo lang('no');?></th>
                  <th><?php echo lang('second_menu');?></th>
				  <th><?php echo lang('third_menu');?></th>
                  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($datamenuketigaweb as $dmw)
					{ 
					$i++;
					
					$querymenukedua = $this->db->query("SELECT menu FROM `".$this->db->dbprefix('menukedua')."` WHERE idmenukedua =".$dmw["idmenukedua"]."");
					$row = $querymenukedua->row();
					$menukedua=$row->menu;
				?>	
                <tr>
                  <td><?php echo $i;?></td>
				  <td><?php echo $menukedua;?></td>
                  <td><?php echo $dmw["menu"];?></td>
                  <td>
				  <?php 
					$query_b = $this->db->query("SELECT * FROM ".$this->db->dbprefix('bannerweb')." WHERE idmenuketiga =".$dmw["idmenuketiga"]."");
					if ($query_b->num_rows() >= 1)
					{ 
				   ?>
						<a class="btn btn-info btn-sm" href="<?php echo base_url()?>banner/kelolabannermenuweb/menuketiga/<?php echo $dmw["idmenuketiga"];?>"><i class="fas fa-pencil-alt">&nbsp;</i><?php echo lang('edit');?></a>
					<?php
					}						
					else
					{ 
				   ?>
						<a class="btn btn-info btn-sm" href="<?php echo base_url()?>banner/kelolabannermenuweb/menuketiga/<?php echo $dmw["idmenuketiga"];?>"><i class="fas fa-plus">&nbsp;</i><?php echo lang('add');?></a>
				   <?php
					}
				   ?>
				  
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
			  
              </div>
			  
            </div>
            
          </div>
          <!-- /.card -->
        </div>
        <!-- /.card -->
      </div>
	 <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->