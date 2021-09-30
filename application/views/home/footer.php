	<?php
		$querywc= $this->db->query("SELECT * FROM ".$this->db->dbprefix('webcontact'));
		$rowwc = $querywc->row();
		
		$querysm= $this->db->query("SELECT * FROM ".$this->db->dbprefix('websocialmedia'));
		$rowsm = $querysm->row();
	?>		
<button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-angle-up"></i></button>

<!-- Footer -->
<footer class="page-footer font-small footer-eslearning">

  <div style="background-color: #007bff;">
    <div class="container-fluid">

      <!-- Grid row-->
      <div class="row py-4 d-flex align-items-center">


      </div>
      <!-- Grid row-->

    </div>
  </div>
  
  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left mt-5 ">

    <!-- Grid row -->
    <div class="row mt-3">

      <!-- Grid column -->
      <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">

        <!-- Content -->
        <p><img src="<?php echo base_url()?>assets/eslearning/img/eslogo_white.png" alt="logo" width="200" height="50" ></p>
        
      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold"><?php echo lang('company');?></h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="<?php echo base_url()?>pagecontent/pages/1" class="footer-link-title"><?php echo lang('about');?></a>
        </p>
        <p>
          <a href="<?php echo base_url()?>pagecontent/pages/2" class="footer-link-title"><?php echo lang('help');?></a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

        <!-- Links -->
        <h6 class="text-uppercase font-weight-bold"><?php echo lang('important_links');?></h6>
        <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
        <p>
          <a href="http://erlanggastudio.com" class="footer-link-title"><?php echo lang('es');?></a>
        </p>

      </div>
      <!-- Grid column -->

      <!-- Grid column -->
      <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

        <!-- Facebook -->
          <a href="<?php echo $rowsm->facebook; ?>" class="fb-ic footer-link-title">
            <i class="fab fa-facebook-f white-text mr-4"> </i>
          </a>
          <!-- Twitter -->
          <a href="<?php echo $rowsm->twitter; ?>"  class="tw-ic footer-link-title">
            <i class="fab fa-twitter white-text mr-4"> </i>
          </a>
          <!-- Yoututbe -->
          <a href="<?php echo $rowsm->youtube; ?>" class="gplus-ic footer-link-title">
            <i class="fab fa-youtube white-text mr-4"> </i>
          </a>
          <!--Instagram-->
          <a href="<?php echo $rowsm->instagram; ?>" class="ins-ic footer-link-title">
            <i class="fab fa-instagram white-text"> </i>
          </a>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>
	<!-- Footer Links -->
	<?php
		$querywi = $this->db->query("SELECT * FROM  ".$this->db->dbprefix('webinfo')." WHERE idlanguage='".$idlanguage."' ");
		$rowwi = $querywi->row();
	?>

  <!-- Copyright -->
  <div class="footer-copyright text-center py-3 footer-eslearning-copyright">
     <span class="copy-text"><?php echo lang('copyright');?> &copy; <?php echo $rowwi->year; ?> <a href="#" class="footer-link-title"><?php echo $rowwi->websitename; ?> </a> &nbsp;  | &nbsp;  <?php echo lang('allrighreserve');?> &nbsp;  | &nbsp;  <?php echo lang('design_by');?> <a href="http://erlanggastudio.com" class="footer-link-title"><?php echo $rowwi->author; ?></a></span>
  </div>
  <!-- Copyright -->

</footer>
<!-- Footer -->
  
<!-- Preloader -->
<div id="preloader">
  <div class="preloader-position"> 
	<img src="<?php echo base_url()?>assets/eslearning/img/favicon-eslearning.png" alt="eslearning" >
	<div class="progress">
	  <div class="indeterminate"></div>
	</div>
  </div>
</div>
<!-- End Preloader -->  
  
<?php $this->load->view($javascript); ?>
  
  
</body>
</html>