<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('users_log');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('users_log');?></li>
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
                <tr>
                  <th><?php echo lang('no');?></th>
                  <th><?php echo lang('name');?></th>
                  <th><?php echo lang('browser');?> </th>
                  <th><?php echo lang('login_time');?> </th>
                  <th><?php echo lang('last_login_time');?> </th>
                  <th><?php echo lang('logout_time');?> </th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($datauserslog as $dul)
					{ 
					$i++;
				?>	
                <tr>
					<td class="a-center">
					<?php echo $i;?>
					</td>
					<td class="a-center"><?php echo $dul["username"];?></td>
					<td class="a-center"><?php echo $dul["browser"];?></td>
					<td class="a-center"><?php echo $dul["login_time"];?></i></td>
					<td class="a-center"><?php echo $dul["last_act_time"];?></td>
					<td class="a-center"><?php echo $dul["logout_time"];?></td>
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