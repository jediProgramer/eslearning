<?php
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
	
	$querycontent = $this->db->query("SELECT * FROM `".$this->db->dbprefix('pagesweb')."` WHERE idmenuutama='".$idmenuutama."'");
	$rowcontent = $querycontent->row();
	$pages = $rowcontent->pages;
?>
      
<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 offset-xl-3 text-center">
				<div class="breadcrumb_content">
					<h4 class="breadcrumb_title"><?php echo $menutitle;?></h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('home');?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo $menutitle;?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>  	

<!-- Box Section -->
<section class="our-team pb40">
	<div class="container">
		<div class="row">
			<div class="col-xl-12">
				<p><?php echo $pages;?></p>
			</div>
		</div>
	</div>
</section>		