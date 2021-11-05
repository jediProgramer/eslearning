<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/jquery-migrate-3.0.0.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/popper.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/jquery.mmenu.all.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/ace-responsive-menu.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/bootstrap-select.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/snackbar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/simplebar.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/parallax.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/scrollto.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/jquery-scrolltofixed-min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/jquery.counterup.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/wow.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/progressbar.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/slider.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/timepicker.js"></script>
<!-- Custom script for all pages --> 
<script type="text/javascript" src="<?php echo base_url()?>assets/edumy/js/script.js"></script>

<!-- Sweet Alert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>
<!-- Carousel core JS -->
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<!-- Carousel JS -->
<script  src="<?php echo base_url()?>assets/eslearning/js/carousel.js"></script>
<!-- WOW JS -->
<script  src="<?php echo base_url()?>assets/eslearning/js/wow.min.js"></script>
<!-- Magnific Popup core JS file -->
<script src="<?php echo base_url()?>assets/eslearning/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- eslearning JS -->
<script  src="<?php echo base_url()?>assets/eslearning/js/scripts.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/adminpanel/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/adminpanel/summernote/summernote-bs4.min.js"></script>

<!-- Script Search Material -->
<script>
$(document).ready(function(){
  $("#searchMaterialContent").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#dataSilabusContent tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<!-- Script Summernote -->
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote({
		placeholder: '<?php echo lang('add_text_here_report_material');?>'
	});
  })
</script>

<script type="text/javascript">
	$(document).ready(function(){
		
		$('#reportMaterialBtn').on('click',function(e){
				e.preventDefault();
				if($('#reportcoment').val().trim() == ''){
				   //handle error message
				   swal({
					  type: "error",
					  title: "<?php echo lang('report');?>",
					  text: "<?php echo lang('reporting_empty');?>",
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					var idcourses = $('#idcourses').val();
					var idcontent = $('#idcontent').val();
					var idsyllabus = $('#idsyllabus').val();
					var iduser = $('#iduser').val();
					var reportcoment = $('#reportcoment').val();
					$.ajax({
						type : "POST",
						url  : "<?php echo site_url('learning/reportmaterialcourses')?>",
						dataType : "JSON",
						beforeSend :function () {
								swal({
									title: "<?php echo lang('waiting');?>",
									html: "<?php echo lang('data_prossecing');?>",
									onOpen: () => {
									  swal.showLoading()
									}
								  })      
						},
						data : {idcourses:idcourses, idcontent:idcontent, idsyllabus:idsyllabus, iduser:iduser, reportcoment:reportcoment},
						success: function(value){
							if (value.msg == 'true') {
								$('#modal-reporting-material').modal('hide');
								swal({
								  type: "success",
								  title: "<?php echo lang('report');?>",
								  text: value.msg_success,
								  confirmButtonColor: '#007bff',
								});
							}
							else
							{
								swal({
								  type: "error",
								  title: "<?php echo lang('report');?>",
								  text: value.msg_error,
								  confirmButtonColor: '#007bff',
								});
							}
						}
					});
					return false;
				}	
		});	
		
	});
</script>