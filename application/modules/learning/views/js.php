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
<!-- Magnific Popup core JS file -->
<script src="<?php echo base_url()?>assets/eslearning/magnific-popup/jquery.magnific-popup.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/adminpanel/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/adminpanel/summernote/summernote-bs4.min.js"></script>

<!-- Script bs-custom-file-input -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<!--Initialize Select2 Elements -->
<script type="text/javascript">
$('.select2').select2({
  theme: 'bootstrap4'
})
</script>

<!-- Script Summernote -->
<script>
  $(function () {
    // Summernote
	$('#feedbackComent').summernote({
		placeholder: '<?php echo lang('feedback_placeholder');?>'
	});
  })
</script>

<!-- Star Radio Value -->
<script>
var radio = document.querySelectorAll(".myStarRating");
var demo = document.getElementById("starRatingValue");
  
function checkBox(e){
	demo.value = e.target.value;
}

radio.forEach(check => {
	check.addEventListener("click", checkBox);
});
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
	
	$('#addCourses').on('click',function(){
		var idcourses = $('#idcourses').val();
		var price = $('#price').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('learning/addcourses')?>",
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
			data : {idcourses:idcourses, price:price},
			success: function(value){
				if (value.msg == 'true') {
					swal({
					  type: "success",
					  title: "<?php echo lang('courses');?>",
					  text: value.msg_success,
					  confirmButtonColor: '#007bff',
					});
					window.location.reload();
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('courses');?>",
					  text: value.msg_error,
					  confirmButtonColor: '#007bff',
					});
				}
			}
		});
		return false;
  });
  
  $('#addFavorite').on('click',function(){
		var idcourses = $('#idcourses').val();
		var price = $('#price').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('learning/addfavorite')?>",
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
			data : {idcourses:idcourses, price:price},
			success: function(value){
				if (value.msg == 'true') {
					swal({
					  type: "success",
					  title: "<?php echo lang('favorite');?>",
					  text: value.msg_success,
					  confirmButtonColor: '#007bff',
					});
					window.location.reload();
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('favorite');?>",
					  text: value.msg_error,
					  confirmButtonColor: '#007bff',
					});
				}
			}
		});
		return false;
  });  
  
  $('#feedbackCoursesBtn').on('click',function(e){
				e.preventDefault();
				if($('#starRatingValue').val().trim() == ''){
				   //handle error message
				   swal({
					  type: "error",
					  title: "<?php echo lang('feedback_title');?>",
					  text: "<?php echo lang('rating_empty');?>",
					  confirmButtonColor: '#007bff',
					});
				}
				else if($('#feedbackComent').val().trim() == ''){
				   //handle error message
				   swal({
					  type: "error",
					  title: "<?php echo lang('feedback_title');?>",
					  text: "<?php echo lang('feedback_empty');?>",
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					var idcourses = $('#idcourses').val();
					var iduser = $('#iduser').val();
					var rating = $('input[name=rating]:checked').val();
					var feedbackComent = $('#feedbackComent').val();
					$.ajax({
						type : "POST",
						url  : "<?php echo site_url('learning/feedbackcourses')?>",
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
						data : {idcourses:idcourses, iduser:iduser, rating:rating, feedbackComent:feedbackComent},
						success: function(value){
							if (value.msg == 'true') {
								$('#modal-reporting-material').modal('hide');
								swal({
								  type: "success",
								  title: "<?php echo lang('feedback_title');?>",
								  text: value.msg_success,
								  confirmButtonColor: '#007bff',
								});
								window.location.reload();
							}
							else
							{
								swal({
								  type: "error",
								  title: "<?php echo lang('feedback_title');?>",
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
