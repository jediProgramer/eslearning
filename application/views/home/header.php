<!DOCTYPE html>
<html lang="en">
	<!-- Head -->
    <head>
		<?php
			$queryimg = $this->db->query("SELECT * FROM ".$this->db->dbprefix('weblogo'));
			$row = $queryimg->row();
		?>
		
		<?php $this->load->view($meta); ?>
		
		<!--  favicon -->
		<link rel="shortcut icon" href="<?php echo base_url()?>assets/files/images/<?php echo $row->favicon; ?>">
		<!--  apple-touch-icon -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url()?>assets/files/images/<?php echo $row->favicon; ?>">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url()?>assets/files/images/<?php echo $row->favicon; ?>">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url()?>assets/files/images/<?php echo $row->favicon; ?>">
		<link rel="apple-touch-icon-precomposed" href="<?php echo base_url()?>assets/files/images/<?php echo $row->favicon; ?>">

        <?php $this->load->view($css); ?>
		
    </head>
	<!-- / Head -->
	
	<!-- Body -->
	<body>
	<!-- Navigation -->
	<header>
		<nav class="navbar navbar-expand-lg navbar-light-costume bg-white py-3 shadow-sm ">
			<div class="container-fluid">
				<a href="<?php echo base_url()?>" class="navbar-brand">
				<!-- Logo Image -->
				<img src="<?php echo base_url()?>assets/files/images/<?php echo $row->logo; ?>" width="170"   alt="" class="d-inline-block align-middle mr-2">
				<!-- Logo Text -->
				<!--<span class="text-uppercase font-weight-bold">UPI | Departemen Pendidikan Ilmu Komputer</span>-->
				</a>

				<button type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbars" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div id="navbarContent" >
					<ul class="navbar-nav ml-auto">
					<?php
						$query_mu = $this->db->query("SELECT * FROM ".$this->db->dbprefix('menuutama')." WHERE idlanguage='".$idlanguage."' AND main_menu='1'");
						$data_mu=$query_mu->result(); 
						foreach ($data_mu as $dmu)
						{
					?>
					<li class="nav-item"><a href="<?php echo base_url();?><?php echo $dmu->link;?>" class="nav-link menu font-weight-bold"><?php echo $dmu->menu;?></a></li>
					<?php
						}
					?>
					<?php 
					if($logged_in!="true")
					{
					?>
					<li class="nav-item"><a href="<?php echo base_url();?>registration" class="nav-link menu font-weight-bold"><i class="fas fa-user-plus"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('register');?></a></li>
					<li class="nav-item"><a href="<?php echo base_url();?>login" class="nav-link menu font-weight-bold"><i class="fas fa-sign-in-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('login');?></a></li>
					<?php 
					}
					?>
					<?php 
					if($logged_in=="true")
					{
						$queryusers = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$idusers."'");
						$rowusers = $queryusers->row();
					?>
					<li class="nav-item dropdown">
							<a class="nav-link menu dropdown-toggle font-weight-bold" href="#" id="navbarUsers" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $fullname;?></a>
							</a>
							<div class="dropdown-menu user border-0 p-0 m-0" aria-labelledby="navbarUsers">
							<ul class="list-unstyled">
								<li class="nav-item"><a href="<?php echo base_url()?>academy/dashboard" class="nav-link menu text-small pb-0"><i class="nav-icon fas fa-tachometer-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('academy_dashboard');?></a></li>
								<li class="nav-item"><a href="<?php echo base_url()?>academy/updateprofile" class="nav-link menu text-small pb-0"><i class="nav-icon fas fa-pencil-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('edit_profile');?></a></li>
								<li class="nav-item"><a href="<?php echo base_url()?>academy/mycourses" class="nav-link menu text-small pb-0"><i class="nav-icon fas fa-laptop-code"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('my_courses');?></a></li>
								<li class="nav-item"><a href="<?php echo base_url()?>academy/myfavorite" class="nav-link menu text-small pb-0"><i class="nav-icon fas fa-heart"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('my_favorite');?></a></li>
								<li class="nav-item"><a href="<?php echo base_url()?>academy/order" class="nav-link menu text-small pb-0"><i class="nav-icon fas fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('my_order');?></a></li>
								<li class="nav-item"><a href="<?php echo base_url()?>academy/payment" class="nav-link menu text-small pb-0"><i class="nav-icon fas fas fa-donate"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('payment');?></a></li>		
								<li class="nav-item"><a href="<?php echo base_url()?>login/logout" class="nav-link menu text-small pb-0"><i class="nav-icon fas fa-power-off"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('logout');?></a></li>
							</ul>
							</div>
					</li>
					<li class="nav-item"><span style="display: inline-block; margin-top: 15px;"><img src="<?php if($rowusers->profilepicture==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $rowusers->profilepicture;?><?php } ?>" class="rounded" width="32px" height="32px" alt="User Image"></span></li>
					<?php 
					}
					?>
					</ul>
				</div>
			</div>
		</nav>
	</header>