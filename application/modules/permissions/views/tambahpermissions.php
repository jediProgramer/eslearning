<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
	<div class="row mb-2">
	  <div class="col-sm-6">
		<h1 class="m-0 text-dark"><?php echo lang('users_access');?></h1>
	</div><!-- /.col -->
	  <div class="col-sm-6">
		<ol class="breadcrumb float-sm-right">
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
		  <li class="breadcrumb-item"><a href="<?php echo base_url()?>permissions"><?php echo lang('users_access');?></a></li>
		  <li class="breadcrumb-item active"><?php echo lang('users_access');?></li>
		</ol>
	  </div><!-- /.col -->
	</div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
				
<!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="card card-primary card-outline">
          <div class="card-body">
            	<?php 
				    $queryz = $this->db->query("SELECT * FROM ".$this->db->dbprefix('permissions')." WHERE idroles='".$idroles."'");
					if ($queryz->num_rows() >= 1)
					{
				?>
				<form class="form-horizontal" action="<?php echo base_url()?>permissions/savepermissions" method="post" enctype="multipart/form-data" id="webrolesForm">
					<?php
					$queryx = $this->db->query("SELECT * FROM ".$this->db->dbprefix('roles')." WHERE idroles='$idroles'");
					if ($queryx->num_rows() >= 1)
					{
					?>
					<table class="table table-bordered">
					  <thead>                  
						<tr>
						  <th><?php echo lang('menu');?></th>
						  <?php 
							foreach($datarolesglobal as $drg)
							{ 
						   ?>	
						  <th><?php echo lang('users_access');?> - <?php echo $drg["roles"];?></th>
						 <?php
							}
						 ?> 
						</tr>
					  </thead>
					  <tbody>
					  <?php
						$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('navigation')."");
						$datanav=$query->result();
						foreach ($datanav as $dn)
						{
							$queryz = $this->db->query("SELECT * FROM ".$this->db->dbprefix('subnavigation')." WHERE idnavigation='$dn->idnavigation'");
							if ($queryz->num_rows() >= 1)
							{
					   ?>
						<tr>
							<td><?php echo $dn->name;?></td>
							<?php 
								foreach($datarolesglobal as $drg)
								{ 
							?>	
							<td>
								<input type="hidden" id="permissionsparent<?php echo $dn->idnavigation;?>" name="permissionsparent<?php echo $dn->idnavigation;?>" value="1">
								<input type="hidden" id="idnavigationsparent<?php echo $dn->idnavigation;?>" name="idnavigationsparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavigation;?>">
								<input type="hidden" id="idnavcategorysparent<?php echo $dn->idnavigation;?>" name="idnavcategorysparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavcategory;?>">
							</td>
							<?php
								}
							?>	
						</tr>
						<?php 		
								$datasubnav=$queryz->result();
								foreach ($datasubnav as $dsn)
								{
						?>		
						<tr>
						<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dsn->name;?></td>
						<?php 
									foreach($datarolesglobal as $drg)
									{ 
										$queryuac = $this->db->query("SELECT users_access FROM `".$this->db->dbprefix('permissions')."` WHERE idroles=".$drg["idroles"]." AND idnavigation = $dn->idnavigation AND idsubnavigation= $dsn->idsubnavigation");
										$row = $queryuac->row();
										$users_access=$row->users_access;	
						?>		
									<td>
									<input type="hidden" id="permissionschild<?php echo $dsn->idsubnavigation;?>" name="permissionschild<?php echo $dsn->idsubnavigation;?>" value="0">
									<input type="checkbox" id="permissionschild<?php echo $dsn->idsubnavigation;?>" name="permissionschild<?php echo $dsn->idsubnavigation;?>" value="1" <?php if($users_access==1){ echo "checked";}?>>
									<input type="hidden" id="idsunavigationchild<?php echo $dsn->idsubnavigation;?>" name="idsunavigationchild<?php echo $dsn->idsubnavigation;?>" value="<?php echo $dsn->idsubnavigation;?>">
									</td>
						<?php
									}
						?>	
						</tr>
						<?php
								}
							}
							else
							{
						?>
						<tr>
							<td><?php echo $dn->name;?></td>
							<?php 
									foreach($datarolesglobal as $drg)
									{
										$queryua = $this->db->query("SELECT users_access FROM `".$this->db->dbprefix('permissions')."` WHERE idroles=".$drg["idroles"]." AND idnavigation=$dn->idnavigation");
										$row = $queryua->row();
										$users_access=$row->users_access;		
							?>		
									<td>
									<input type="hidden" id="permissionsparent<?php echo $dn->idnavigation;?>" name="permissionsparent<?php echo $dn->idnavigation;?>" value="0">
									<input type="checkbox" id="permissionsparent<?php echo $dn->idnavigation;?>" name="permissionsparent<?php echo $dn->idnavigation;?>" value="1" <?php if($users_access==1){ echo "checked";}?>>
									<input type="hidden" id="idnavigationsparent<?php echo $dn->idnavigation;?>" name="idnavigationsparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavigation;?>">
									<input type="hidden" id="idnavcategorysparent<?php echo $dn->idnavigation;?>" name="idnavcategorysparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavcategory;?>">
									</td>
								<?php
									}
								?>	
							</tr>
						<?php   }	
						}
						?>
					  </tbody>
					</table>
					<!-- /.card-body -->
					</div>
					<div class="card-footer">
					  <input type="hidden" id="idroles" name="idroles" value="<?php echo $idroles;?>">
					  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
					</div>
					<!-- /.card-footer -->
				</form> 
				<?php		
					}
					else
					{
				?>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><?php echo lang('no_data_found');?></center>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
						<br/>
				<?php 
					}	
				?>
				<?php
				}
				else
				{	
				?>	
					<form class="form-horizontal" action="<?php echo base_url()?>permissions/savepermissions" method="post" enctype="multipart/form-data" id="webrolesForm">
						<?php
						$queryx = $this->db->query("SELECT * FROM ".$this->db->dbprefix('roles')." WHERE idroles='$idroles'");
						if ($queryx->num_rows() >= 1)
						{
						?>
						<table class="table table-bordered">
						<thead>
							<tr>
								<th><?php echo lang('menu');?></th>
						<?php 
							foreach($datarolesglobal as $drg)
							{ 
						?>		
								<th><?php echo lang('users_access');?> - <?php echo $drg["roles"];?></th>
						<?php
							}
						?>		
							</tr>
						</thead>
						<tbody>
						<?php
							$query = $this->db->query("SELECT * FROM ".$this->db->dbprefix('navigation')."");
							$datanav=$query->result();
							foreach ($datanav as $dn)
							{
								$queryz = $this->db->query("SELECT * FROM ".$this->db->dbprefix('subnavigation')." WHERE idnavigation='$dn->idnavigation'");
								if ($queryz->num_rows() >= 1)
								{
						?>
									<tr>
									<td><?php echo $dn->name;?></td>
						<?php 
									foreach($datarolesglobal as $drg)
									{ 
						?>		
									<td>
									<input type="hidden" id="permissionsparent<?php echo $dn->idnavigation;?>" name="permissionsparent<?php echo $dn->idnavigation;?>" value="1">
									<input type="hidden" id="idnavigationsparent<?php echo $dn->idnavigation;?>" name="idnavigationsparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavigation;?>">
									<input type="hidden" id="idnavcategorysparent<?php echo $dn->idnavigation;?>" name="idnavcategorysparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavcategory;?>">
									</td>
						<?php
									}
						?>	
									</tr>	
						<?php 		$datasubnav=$queryz->result();
									foreach ($datasubnav as $dsn)
									{
						?>			
									<tr>
										<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $dsn->name;?></td>
						<?php 
										foreach($datarolesglobal as $drg)
										{ 
						?>		
										<td>
										<input type="hidden" id="permissionschild<?php echo $dsn->idsubnavigation;?>" name="permissionschild<?php echo $dsn->idsubnavigation;?>" value="0">
										<input type="checkbox" id="permissionschild<?php echo $dsn->idsubnavigation;?>" name="permissionschild<?php echo $dsn->idsubnavigation;?>" value="1">
										<input type="hidden" id="idsunavigationchild<?php echo $dsn->idsubnavigation;?>" name="idsunavigationchild<?php echo $dsn->idsubnavigation;?>" value="<?php echo $dsn->idsubnavigation;?>">
										</td>
						<?php
										}
						?>	
									</tr>
						<?php
									}
								}
								else
								{
						?>
									<tr>
									<td><?php echo $dn->name;?></td>
						<?php 
										foreach($datarolesglobal as $drg)
										{ 
						?>		
										<td>
										<input type="hidden" id="permissionsparent<?php echo $dn->idnavigation;?>" name="permissionsparent<?php echo $dn->idnavigation;?>" value="0">
										<input type="checkbox" id="permissionsparent<?php echo $dn->idnavigation;?>" name="permissionsparent<?php echo $dn->idnavigation;?>" value="1">
										<input type="hidden" id="idnavigationsparent<?php echo $dn->idnavigation;?>" name="idnavigationsparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavigation;?>">
										<input type="hidden" id="idnavcategorysparent<?php echo $dn->idnavigation;?>" name="idnavcategorysparent<?php echo $dn->idnavigation;?>" value="<?php echo $dn->idnavcategory;?>">
										</td>
						<?php
										}
						?>	
									</tr>
						<?php   }	
							}
						?>
						  </tbody>
						</table>
					</div>	
					<!-- /.card-body -->
					<div class="card-footer">
					  <input type="hidden" id="idroles" name="idroles" value="<?php echo $idroles;?>">
					  <button type="submit" class="btn btn-danger float-right"><?php echo lang('saves');?></button>
					</div>
					<!-- /.card-footer -->
					</form>
						<?php		
						}
						else
						{
						?>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<center><?php echo lang('no_data_found');?></center>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
							<br/>
						<?php 
						}	
						?>
				<?php
				}
				?>	
        </div>
        <!-- /.card -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->