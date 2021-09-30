<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('dashboard');?></h1>
	  </div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('dashboard');?></li>
		</ol>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
	
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>
				<?php
					$query_ca = $this->db->query("SELECT COUNT(*) as total FROM ".$this->db->dbprefix('category'));
					$row_ca = $query_ca->row();
					echo $row_ca->total;
				?>
				</h3>

                <p><?php echo lang('courses');?></p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-book"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>
				<?php
					$query_cb = $this->db->query("SELECT COUNT(*) as total FROM ".$this->db->dbprefix('users')." WHERE roles='5'");
					$row_cb= $query_cb->row();
					echo $row_cb->total;
				?>
				</h3>

                <p><?php echo lang('instructors');?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>
				<?php
					$query_cb = $this->db->query("SELECT COUNT(*) as total FROM ".$this->db->dbprefix('users'));
					$row_cb= $query_cb->row();
					echo $row_cb->total;
				?>
				</h3>

                <p><?php echo lang('users');?></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php $count_my_page = ("hitcounter.txt"); $hits = file($count_my_page); $hits[0] ++; $fp = fopen($count_my_page , "w"); fputs($fp , "$hits[0]"); fclose($fp); echo $hits[0]; ?></h3>

                <p><?php echo lang('visitors');?></p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- /.row (main row) -->
		  <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title"><?php echo lang('visitor_statistics');?></h5>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <div class="btn-group">
                  </div>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <p class="text-center">
                      <strong><?php echo lang('most_visitor_title');?></strong>
                    </p>

                    <div class="card-body">
                      <!-- Sales Chart Canvas -->
                      <table id="example1" class="table table-bordered table-striped">
						<thead>
						<tr>
							<th><?php echo lang('no');?></th>
							<th><?php echo lang('country');?></th>
							<th><?php echo lang('visitors');?></th>
						</tr>
						</thead>
						<tbody>
						<?php
							$i = 0;		
							$query_users = $this->db->query("SELECT DISTINCT country, COUNT(country) as total  FROM ".$this->db->dbprefix('visitors')." GROUP BY country ORDER BY total DESC");
							$datavisitors=$query_users->result(); 	
							foreach($datavisitors as $dv)
							{ 
							$i++;
						?>	
						<tr>
							<td class="a-center">
							<?php echo $i;?>
							</td>
							<td class="a-center"><?php echo $dv->country;?></td>
							<td><?php echo $dv->total;?></td>
						</tr>
						<?php
							}
						?>
					  </table>
                    </div>
                    <!-- /.chart-responsive -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-4">
                    <p class="text-center">
                      <strong><?php echo lang('top_courses');?></strong>
                    </p>
					<?php
						$query_c= $this->db->query("SELECT * FROM ".$this->db->dbprefix('courses')." WHERE favorite>='50' ORDER BY date DESC LIMIT 10");
						$datatop_c=$query_c->result(); 	
						foreach($datatop_c as $dtc)
						{ 
					?>	
						<div class="progress-group">
						  <?php echo $dtc->title;?>
						  <span class="float-right">
						  <b>
						   <?php
						    echo $dtc->favorite;
							$persen=($dtc->favorite/100)*100;
							?>
						  </b>% / 100 %</span>
						  <div class="progress progress-sm">
							<div class="progress-bar bg-primary" style="width: <?php echo $persen;?>%"></div>
						  </div>
						</div>
                    <!-- /.progress-group -->
					<?php
						}
					?>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
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