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
