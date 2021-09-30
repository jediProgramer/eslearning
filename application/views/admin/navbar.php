<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
     <a href="<?php echo base_url()?>admin" class="brand-link">
      <img src="<?php echo base_url()?>assets/adminpanel/dist/img/erlanggastudio.png" alt="Admin Codedume Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><b><i><?php echo lang('es');?></i></b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
		<?php
			$query_users = $this->db->query("SELECT * FROM ".$this->db->dbprefix('users')." WHERE iduser='$iduser' ");
			$datausers=$query_users->result(); 
			foreach ($datausers as $du)
			{
		?>
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?php if($du->profilepicture==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $du->profilepicture;?><?php } ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="<?php echo base_url()?>profile" class="d-block"><?php echo $du->fullname;?></a>
        </div>
      </div>
		<?php
			}
		?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
          
			<?php 
			$query1 = $this->db->query("SELECT DISTINCT a.idnavcategory, a.name FROM `".$this->db->dbprefix('navcategory')."` a, `".$this->db->dbprefix('permissions')."` b WHERE  a.idnavcategory=b.idnavcategory AND b.users_access=1 AND b.idroles=".$roles."");
				$datanavcat=$query1->result(); 
				foreach ($datanavcat as $dn)
				{
			?>
				<li class="nav-header"><?php echo $dn->name;?></li>
				<?php
					$query2 = $this->db->query("SELECT DISTINCT a.idnavigation, a.name, a.icon, a.link, b.users_access FROM ".$this->db->dbprefix('navigation')." a, ".$this->db->dbprefix('permissions')." b WHERE a.idnavcategory=b.idnavcategory AND a.idnavcategory='$dn->idnavcategory' AND b.users_access='1' AND a.idnavigation=b.idnavigation AND b.idroles='$roles'");
					$datanav=$query2->result(); 
					foreach ($datanav as $dnv)
					{
				?>
					
					<?php
						$query3 = $this->db->query("SELECT DISTINCT a.idnavigation, a.name, a.link, b.users_access FROM ".$this->db->dbprefix('subnavigation')." a, ".$this->db->dbprefix('permissions')." b WHERE a.idnavigation='$dnv->idnavigation' AND b.users_access='1' AND a.idnavigation=b.idnavigation AND a.idsubnavigation=b.idsubnavigation AND b.idroles='$roles'");
						if ($query3->num_rows() >= 1)
						{
					?>
						<li class="nav-item has-treeview" >
						<a href="#" class="nav-link">
						  <i class="nav-icon <?php echo $dnv->icon;?>"></i>
						  <p>
							<?php echo $dnv->name;?>
							<i class="fas fa-angle-left right"></i>
						  </p>
						</a>
						<ul class="nav nav-treeview">
							<?php 
							$datasubnav=$query3->result(); 
							foreach ($datasubnav as $dsnv)
							{
					?>
							<li class="nav-item">
							<a href="<?php echo base_url()?><?php echo $dsnv->link;?>" class="nav-link">
							  <i class="far fa-circle nav-icon"></i>
							  <p><?php echo $dsnv->name;?></p>
							</a>
						    </li>
					<?php 
							}
						?>
							</ul>
						</li>
					<?php	
						}	
						else
						{	
					?>
							<li class="nav-item">
							<a href="<?php echo base_url()?><?php echo $dnv->link;?>" class="nav-link">
							  <i class="nav-icon <?php echo $dnv->icon;?>"></i>
							  <p>
								<?php echo $dnv->name;?>
							  </p>
							</a>
							</li>
				<?php
						}
					}
				?>	
			<?php
				}
			?>
         
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  
 