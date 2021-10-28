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
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- recaptcha -->
<?php echo $script_captcha; ?>
<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
  $('#webloginForm').validate({
	rules: {
	  email: {
		required: true,
		email: true,
	  },
	  password: {
		required: true
	  },
	},
	messages: {
	  email: {
		required: "<?php echo lang('email_error_msg');?>"
	  },
	  password: {
		required: "<?php echo lang('password_error_msg');?>"
	  },
	},
	submitHandler: function (form) {
		var email = $('#email').val();
		var password = $('#password').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('login/loginprocess')?>",
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
			data : {email:email, password:password, recaptcha:grecaptcha.getResponse()},
			success: function(value){
				if (value.msg == 'true') {
					swal({
					  type: "success",
					  title: "<?php echo lang('login');?>",
					  text: value.msg_success,
					  timer: 3000,
					  showCancelButton: false,
					  showConfirmButton: false
					});
						window.location.href = "<?php echo base_url() ?>";
						
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('login');?>",
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
	  element.closest('.form-group').append(error);
	},
	highlight: function (element, errorClass, validClass) {
	  $(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
	  $(element).removeClass('is-invalid');
	}
  });
  
  $('#webforgotPwdForm').validate({
	rules: {
	  email: {
		required: true,
		email: true,
	  },
	},
	messages: {
	  email: {
		required: "<?php echo lang('email_error_msg');?>"
	  },
	},
	submitHandler: function (form) {
		var email = $('#email').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('login/forgotpwdsend')?>",
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
			data : {email:email, recaptcha:grecaptcha.getResponse()},
			success: function(value){
				if (value.msg == 'true') 
				{
					swal({
					  type: "success",
					  title: "<?php echo lang('forgot_password');?>",
					  text: value.msg_success,
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('forgot_password');?>",
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
	  element.closest('.form-group').append(error);
	},
	highlight: function (element, errorClass, validClass) {
	  $(element).addClass('is-invalid');
	},
	unhighlight: function (element, errorClass, validClass) {
	  $(element).removeClass('is-invalid');
	}
  });
  
  $('#webresetPwdForm').validate({
	rules: {
	  password: {
		required: true
	  },
	  confirm_password: {
		required: true,
		equalTo: "#password"
	  },

	},
	messages: {
	  password: {
		required: "<?php echo lang('password_error_msg');?>"
	  },
	  confirm_password: {
		required: "<?php echo lang('confirm_password_error_empty_msg');?>",  
		equalTo: "<?php echo lang('confirm_password_error_msg');?>",
	  },
	},
	submitHandler: function (form) {
		var password = $('#password').val();
		var iduser = $('#iduser').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('login/saveresetpassword')?>",
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
			data : {password:password, iduser:iduser, recaptcha:grecaptcha.getResponse()},
			success: function(value){
				if (value.msg == 'true') {
					swal({
					  type: "success",
					  title: "<?php echo lang('reset_password');?>",
					  text: value.msg_success,
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('reset_password');?>",
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
	  element.closest('.form-group').append(error);
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
