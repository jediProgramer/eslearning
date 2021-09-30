<?php
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
	
	$querycontent = $this->db->query("SELECT * FROM `".$this->db->dbprefix('pagesweb')."` WHERE idmenuutama='".$idmenuutama."'");
	$rowcontent = $querycontent->row();
	$pages = $rowcontent->pages;
?>
      
		
		
<main role="main">
    <div class="jumbotron jumbotron-fluid pages">
	  <div class="container-fluid">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo $menutitle;?></li>
		  </ol>
		</nav>
	  </div>
    </div>


<!-- Registration -->
  <div class="container-fluid register-content-item">
	<div class="row ">
	
		<div class="container">
		    <div class="card-body">
			<p><?php echo $pages;?></p>
		    </div>
			<!-- /.card -->	   
		</div>
		<!-- /.container-fluid -->
	  
    </div>
    <!-- /.row -->
  
</div>
<!-- /Registration -->

</main>