	  <!-- JQuery JS -->
	  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	  <!-- Bootstrap JS -->
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
	  <!-- JQuery UI JS -->
	  <script src="<?php echo base_url()?>assets/eslearning/js/jquery-ui.js" type="text/javascript"></script>
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
	  <!-- codedume JS -->
	  <script  src="<?php echo base_url()?>assets/eslearning/js/scripts.js"></script>
	  <!-- jquery-validation -->
	  <script src="<?php echo base_url()?>assets/eslearning/jquery-validation/jquery.validate.min.js"></script>
      <script src="<?php echo base_url()?>assets/eslearning/jquery-validation/additional-methods.min.js"></script>
	  <!-- recaptcha -->
	  <?php echo $script_captcha; ?>
	  <!-- Script jquery-validation -->
	<script type="text/javascript">
	$(document).ready(function () {
	  $('#webregistersForm').validate({
		rules: {
		  fullname: {
			required: true
		  },
		  username: {
			required: true
		  },
		  password: {
			required: true
		  },
		  email: {
			required: true,
			email: true,
		  },
		  confirm_password: {
			equalTo: "#password"
		  },
		  agree_checked: {
			required: true
		  },

		},
		messages: {
		  fullname: {
			required: "<?php echo lang('fullname_error_msg');?>"
		  },
		  username: {
			required: "<?php echo lang('username_error_msg');?>"
		  },
		  password: {
			required: "<?php echo lang('password_error_msg');?>"
		  },
		  email: {
			required: "<?php echo lang('email_error_msg');?>"
		  },
		  confirm_password: {
			equalTo: "<?php echo lang('confirm_password_error_msg');?>",
		  },
		  agree_checked: {
			required: "<?php echo lang('agree_checked_error_msg');?>"
		  },
		},
		submitHandler: function (form) {
			var fullname = $('#fullname').val();
            var username = $('#username').val();
            var password = $('#password').val();
			var email = $('#email').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('registration/saveusers')?>",
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
                data : {fullname:fullname , username:username, password:password, email:email, recaptcha:grecaptcha.getResponse()},
                success: function(value){
					if (value.msg == 'true') {
						swal({
						  type: "success",
						  title: "<?php echo lang('registration');?>",
						  text: value.msg_success,
						  confirmButtonColor: '#007bff',
						});
					}
					else
					{
						swal({
						  type: "error",
						  title: "<?php echo lang('registration');?>",
						  text: value.msg_error,
						  confirmButtonColor: '#007bff',
						});
					}
                }
            });
            return false;
		},
		errorElement: 'span',
		errorPlacement: function (error, element) {
		  error.addClass('invalid-feedback');
		  element.closest('.col-sm-10').append(error);
		},
		highlight: function (element, errorClass, validClass) {
		  $(element).addClass('is-invalid');
		},
		unhighlight: function (element, errorClass, validClass) {
		  $(element).removeClass('is-invalid');
		}
	  });
	});
	</script>
