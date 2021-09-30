<?php
	$queryimg = $this->db->query("SELECT * FROM ".$this->db->dbprefix('weblogo'));
  	$row = $queryimg->row();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo lang('es_adminpanel');?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  favicon -->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/files/images/<?php echo $row->favicon; ?>">
  
  <?php $this->load->view($css); ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

	<?php
		$query_ca = $this->db->query("SELECT COUNT(*) as total FROM `".$this->db->dbprefix('order')."` WHERE status='2'");
		$row_ca = $query_ca->row();
		
		$query_rr = $this->db->query("SELECT COUNT(*) as total FROM `".$this->db->dbprefix('reviewreport')."` WHERE report='1'");
		$row_rr = $query_rr->row();
		
		if(($roles=="1") || ($roles=="4"))
		{
	?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <?php if($row_ca->total+$row_rr->total>='1'){ ?><span class="badge badge-warning navbar-badge"><?php echo $row_ca->total+$row_rr->total;?></span><?php } ?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?php echo lang('notification');?></span>
          <div class="dropdown-divider"></div>
          <a href="<?php echo base_url()?>paymentreport" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $row_ca->total;?> <?php echo lang('payment_notification_message');?>
          </a>
		  <?php
			if(($roles=="1"))
			{
		  ?>
          <div class="dropdown-divider"></div>
		  <a href="<?php echo base_url()?>reviewreport" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?php echo $row_rr->total;?> <?php echo lang('review_report');?>
          </a>
		  <?php
			}
		  ?>
		   <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        <a class="btn btn-block btn-warning" href="<?php echo base_url()?>adminpanel/logout" role="button">
          <i class="fas fa-power-off mr-1"></i><?php echo lang('logout');?>
        </a>
      </li>
      
    </ul>
	<?php
		}
	?>
  </nav>
  <!-- /.navbar -->