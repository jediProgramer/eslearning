<!DOCTYPE html>
<html dir="ltr" lang="ind">
<head>
		<?php
			$queryimg = $this->db->query("SELECT * FROM ".$this->db->dbprefix('weblogo'));
			$row = $queryimg->row();
		?>
		
		<?php $this->load->view($meta); ?>
		
		<!-- Favicon -->
		<link href="<?php echo base_url()?>assets/edumy/images/favicon.png" sizes="128x128" rel="shortcut icon" type="image/x-icon" />
		<link href="<?php echo base_url()?>assets/edumy/images/favicon.png" sizes="128x128" rel="shortcut icon" />

        <?php $this->load->view($css); ?>
		
</head>
<body>
<div class="wrapper">
	<div class="preloader"></div>
	
	<!-- Main Header Nav -->
	<header class="header-nav menu_style_home_one navbar-scrolltofixed stricky main-menu">
		<div class="container-fluid">
		    <!-- Ace Responsive Menu -->
		    <nav>
		        <!-- Menu Toggle btn-->
		        <div class="menu-toggle">
		            <img class="nav_logo_img img-fluid" src="<?php echo base_url()?>assets/edumy/images/es-logo-01.png" alt="<?php echo lang('webname');?>">
		            <button type="button" id="menu-btn">
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		                <span class="icon-bar"></span>
		            </button>
		        </div>
		        <a href="<?php echo base_url()?>" class="navbar_brand float-left dn-smd">
		            <img class="logo1 img-fluid" src="<?php echo base_url()?>assets/edumy/images/es-logo-01.png" alt="<?php echo lang('webname');?>">
		            <img class="logo2 img-fluid" src="<?php echo base_url()?>assets/edumy/images/es-logo-02.png" alt="<?php echo lang('webname');?>">
					<span><?php echo lang('webname');?></span>
		        </a>
		        <ul id="respMenu" class="ace-responsive-menu" data-menu-style="horizontal">
				<?php
						$query_mu = $this->db->query("SELECT * FROM ".$this->db->dbprefix('menuutama')." WHERE idlanguage='".$idlanguage."' AND main_menu='1'");
						$data_mu=$query_mu->result(); 
						foreach ($data_mu as $dmu)
						{
				?>
		            <li class="last">
		                <a href="<?php echo base_url();?><?php echo $dmu->link;?>"><span class="title"><?php echo $dmu->menu;?></span></a>
		            </li>
				<?php
						}
				?>	
		        </ul>
				<?php 
					if($logged_in!="true")
					{
				?>
		        <ul class="sign_up_btn pull-right dn-smd mt20">
	                <li class="list-inline-item list_s"><a href="<?php echo base_url();?>login" class="btn flaticon-user"> <span class="dn-lg"><?php echo lang('login');?></span></a></li>
					<li class="list-inline-item"><a href="<?php echo base_url();?>registration" class="btn flaticon-edit"> &nbsp;&nbsp;<span class="dn-lg"><?php echo lang('register');?></span></a></li>
	            </ul><!-- Button trigger modal -->
				<?php 
					}
					?>
					<?php 
					if($logged_in=="true")
					{
						$queryusers = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$idusers."'");
						$rowusers = $queryusers->row();
				?>
				<ul class="header_user_notif pull-right dn-smd">
	                <li class="user_notif">
						<div class="dropdown">
						    <a class="notification_icon" href="#" data-toggle="dropdown"><span class="flaticon-alarm"></span></a>
						    <div class="dropdown-menu notification_dropdown_content">
								<div class="so_heading">
									<p>Notifications</p>
								</div>
								<div class="so_content" data-simplebar="init">
									<ul>
										<li>
											<h5>Status Update</h5>
											<p>This is an automated server response message. All systems are online.</p>
										</li>
										<li>
											<h5>Status Update</h5>
											<p>This is an automated server response message. All systems are online.</p>
										</li>
										<li>
											<h5>Status Update</h5>
											<p>This is an automated server response message. All systems are online.</p>
										</li>
										<li>
											<h5>Status Update</h5>
											<p>This is an automated server response message. All systems are online.</p>
										</li>
										<li>
											<h5>Status Update</h5>
											<p>This is an automated server response message. All systems are online.</p>
										</li>
										<li>
											<h5>Status Update</h5>
											<p>This is an automated server response message. All systems are online.</p>
										</li>
										<li>
											<h5>Status Update</h5>
											<p>This is an automated server response message. All systems are online.</p>
										</li>
									</ul>
								</div>
								<a class="view_all_noti text-thm" href="#">View all alerts</a>
						    </div>
						</div>
	                </li>
	                <li class="user_setting">
						<div class="dropdown">
	                		<a class="btn dropdown-toggle" href="#" data-toggle="dropdown"><img class="rounded-circle" src="<?php if($rowusers->profilepicture==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $rowusers->profilepicture;?><?php } ?>" alt="<?php echo $fullname;?>" width="50px" height="50px"></a>
						    <div class="dropdown-menu">
						    	<div class="user_set_header">
						    		<img class="float-left" src="<?php if($rowusers->profilepicture==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $rowusers->profilepicture;?><?php } ?>" alt="e1.png" width="50px" height="50px">
							    	<p><?php echo $fullname;?> <br><span class="address"><?php echo $email;?></span></p>
						    	</div>
						    	<div class="user_setting_content">
									<a class="dropdown-item active" href="<?php echo base_url()?>academy/dashboard"><?php echo lang('academy_dashboard');?></a>
									<a class="dropdown-item" href="<?php echo base_url()?>academy/updateprofile"><?php echo lang('edit_profile');?></a>
									<a class="dropdown-item" href="<?php echo base_url()?>academy/mycourses"><?php echo lang('my_courses');?></a>
									<a class="dropdown-item" href="<?php echo base_url()?>academy/myfavorite"><?php echo lang('my_favorite');?></a>
									<a class="dropdown-item" href="<?php echo base_url()?>academy/order"><?php echo lang('my_order');?></a>
									<a class="dropdown-item" href="<?php echo base_url()?>academy/payment"><?php echo lang('payment');?></a>
									<a class="dropdown-item" href="<?php echo base_url()?>login/logout"><?php echo lang('logout');?></a>
						    	</div>
						    </div>
						</div>
			        </li>
	            </ul>
				<?php 
					}
				?>
		    </nav>
		</div>
	</header>

	<!-- Main Header Nav For Mobile -->
	<div id="page" class="stylehome1 h0">
		<div class="mobile-menu">
			<div class="header stylehome1">
				<div class="main_logo_home2">
		            <img class="nav_logo_img img-fluid float-left mt20" src="<?php echo base_url()?>assets/edumy/images/es-logo-01.png" alt="<?php echo lang('webname');?>">
		            <span><?php echo lang('webname');?></span>
				</div>
				<ul class="menu_bar_home2">
					<li class="list-inline-item">
					</li>
					<li class="list-inline-item"><a href="#menu"><span></span></a></li>
				</ul>
			</div>
		</div><!-- /.mobile-menu -->
		<nav id="menu" class="stylehome1">
			<ul>
			<?php
					$query_mu = $this->db->query("SELECT * FROM ".$this->db->dbprefix('menuutama')." WHERE idlanguage='".$idlanguage."' AND main_menu='1'");
					$data_mu=$query_mu->result(); 
					foreach ($data_mu as $dmu)
					{
			?>
				<li><a href="<?php echo base_url();?><?php echo $dmu->link;?>"><?php echo $dmu->menu;?></a></li>
			<?php
					}
			?>	
			<?php 
					if($logged_in!="true")
					{
			?>
				<li><a href="<?php echo base_url();?>login"><span class="flaticon-user"></span> <?php echo lang('login');?></a></li>
				<li><a href="<?php echo base_url();?>registration"><span class="flaticon-edit"></span> <?php echo lang('register');?></a></li>
			<?php 
					}
			?>	
			<?php 
					if($logged_in=="true")
					{
						$queryusers = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$idusers."'");
						$rowusers = $queryusers->row();
			?>
					<li><span><?php echo $fullname;?> &nbsp;&nbsp;&nbsp;<img class="rounded-circle float-right" src="<?php if($rowusers->profilepicture==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $rowusers->profilepicture;?><?php } ?>" alt="e1.png" width="30px" height="30px"></span>
					<ul>
	                    <li><a href="<?php echo base_url()?>academy/dashboard"><?php echo lang('academy_dashboard');?></a></li>
	                    <li><a href="<?php echo base_url()?>academy/updateprofile"><?php echo lang('edit_profile');?></a></a></li>
	                    <li><a href="<?php echo base_url()?>academy/mycourses"><?php echo lang('my_courses');?></a></li>
	                    <li><a href="<?php echo base_url()?>academy/myfavorite"><?php echo lang('my_favorite');?></a></a></li>
						<li><a href="<?php echo base_url()?>academy/order"><?php echo lang('my_order');?></a></a></li>
						<li><a href="<?php echo base_url()?>academy/payment"><?php echo lang('payment');?></a></a></li>
						<li><a href="<?php echo base_url()?>login/logout"><?php echo lang('logout');?></a></a></li>
					</ul>
				</li>
			<?php 
					}
			?>
			</ul>
		</nav>
	</div>