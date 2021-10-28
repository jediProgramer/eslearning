	<?php
		$querywc= $this->db->query("SELECT * FROM ".$this->db->dbprefix('webcontact'));
		$rowwc = $querywc->row();
		
		$querysm= $this->db->query("SELECT * FROM ".$this->db->dbprefix('websocialmedia'));
		$rowsm = $querysm->row();
	?>		
<!-- Our Footer -->
	<section class="footer_one">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-3">
					<div class="footer_contact_widget">
						<h4><?php echo lang('our_contact');?></h4>
						<?php echo lang('address');?>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_company_widget">
						<h4><?php echo lang('company');?></h4>
						<ul class="list-unstyled">
							<li><a href="<?php echo base_url()?>pagecontent/pages/1"><?php echo lang('about');?></a></li>
							<li><a href="<?php echo base_url()?>pagecontent/pages/2"><?php echo lang('faq');?></a></li>
							<li><a href="http://erlanggastudio.com"><?php echo lang('companysite');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_program_widget">
						<h4><?php echo lang('help');?></h4>
						<ul class="list-unstyled">
							<li><a href="#"><?php echo lang('help1');?></a></li>
							<li><a href="#"><?php echo lang('help2');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-4 col-md-3 col-lg-2">
					<div class="footer_support_widget">
						<h4><?php echo lang('helpcenter');?></h4>
						<ul class="list-unstyled">
							<li><a href="#"><?php echo lang('helpcenter1');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-6 col-md-6 col-md-3 col-lg-3">
					<div class="footer_apps_widget">
						<h4><?php echo lang('mobileapps');?></h4>
						<div class="app_grid">
							<button class="play_store_btn btn-dark">
								<span class="icon">
									<span class="flaticon-google-play"></span>
								</span>
								<span class="title"><?php echo lang('mobileapps1');?></span>
								<span class="subtitle"><?php echo lang('mobileapps2');?></span>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Our Footer Middle Area -->
	<section class="footer_middle_area p0">
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-md-3 col-lg-3 col-xl-2 pb15 pt15">
					<div class="logo-widget home1">
						<img class="img-fluid" src="<?php echo base_url()?>assets/edumy/images/es-logo-01.png" alt="es-logo.png">
						<span><?php echo lang('webname');?></span>
					</div>
				</div>
				<div class="col-sm-8 col-md-5 col-lg-6 col-xl-6 pb25 pt25 brdr_left_right">
					<div class="footer_menu_widget">
						<ul>
							<li class="list-inline-item"><a href="<?php echo base_url()?>"><?php echo lang('home');?></a></li>
							<li class="list-inline-item"><a href="<?php echo base_url()?>pagecontent/pages/1"><?php echo lang('about');?></a></li>
							<li class="list-inline-item"><a href="<?php echo base_url()?>pagecontent/pages/2"><?php echo lang('faq');?></a></li>
							<li class="list-inline-item"><a href="http://erlanggastudio.com"><?php echo lang('companysite');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-4 col-lg-3 col-xl-4 pb15 pt15">
					<div class="footer_social_widget mt15">
						<ul>
							<li class="list-inline-item"><a href="<?php echo $rowsm->facebook; ?>"><i class="fa fa-facebook"></i></a></li>
							<li class="list-inline-item"><a href="<?php echo $rowsm->twitter; ?>"><i class="fa fa-twitter"></i></a></li>
							<li class="list-inline-item"><a href="<?php echo $rowsm->instagram; ?>"><i class="fa fa-instagram"></i></a></li>
							<li class="list-inline-item"><a href="<?php echo $rowsm->youtube; ?>"><i class="fa fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<!-- Footer Links -->
	<?php
		$querywi = $this->db->query("SELECT * FROM  ".$this->db->dbprefix('webinfo')." WHERE idlanguage='".$idlanguage."' ");
		$rowwi = $querywi->row();
	?>
	
	<!-- Our Footer Bottom Area -->
	<section class="footer_bottom_area pt25 pb25">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 offset-lg-3">
					<div class="copyright-widget text-center">
						<p><?php echo lang('copyright');?> &copy; <?php echo $rowwi->year; ?> <?php echo lang('design_by');?> <a href="http://erlanggastudio.com" ><?php echo $rowwi->author; ?></a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
<a class="scrollToHome" href="#"><i class="flaticon-up-arrow-1"></i></a>
</div>
<!-- Wrapper End -->
<?php $this->load->view($javascript); ?>
</body>
</html>