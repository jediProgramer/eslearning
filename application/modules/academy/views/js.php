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
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/adminpanel/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- Mask money -->
<script src="<?php echo base_url()?>assets/adminpanel/maskmoney/jquery.maskMoney.js"></script>

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
    $('.textarea').summernote()
  })
</script>

<!-- Script dataTables -->
<script type="text/javascript">
  $(function () {
    $("#data").DataTable({
		 "language": {
            "lengthMenu": "<?php echo lang('display');?> _MENU_ <?php echo lang('records_per_page');?>",
            "zeroRecords": "<?php echo lang('zeroRecords');?>",
            "info": "<?php echo lang('showing_page');?> _PAGE_ <?php echo lang('showing_page_of');?> _PAGES_",
            "infoEmpty": "<?php echo lang('infoEmpty');?>",
            "infoFiltered": "(<?php echo lang('infoFiltered_form');?> _MAX_ <?php echo lang('infoFiltered_record');?>)",
			"search": "<?php echo lang('search');?>:",
			"paginate": {
				  "previous": "<?php echo lang('previous');?>",
				  "next": "<?php echo lang('next');?>",
				}
		 }	
	});
  });
</script>

<!-- Script maskMoney -->
<script type="text/javascript">
	$(document).ready(function(){
		$('#amount_payment').maskMoney({thousands:'.', decimal:',', precision:0});
	});
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
	
  $('#webprofilepictureForm').validate({
	rules: {
	  image: {
		required: true
	  },
	},
	messages: {
	  image: {
		required: "<?php echo lang('image_error_msg');?>"
	  },
	},
	submitHandler: function (form) {
		var formData = new FormData(form);
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('academy/savesprofilepicture')?>",
			dataType : "JSON",
			data: formData,
			processData:false,
			contentType:false,
			cache:false,
			beforeSend :function () {
					swal({
						title: "<?php echo lang('waiting');?>",
						html: "<?php echo lang('data_prossecing');?>",
						onOpen: () => {
						  swal.showLoading()
						}
					  })      
			},
			success: function(data){
				if (data.msg == 'true') {
					window.location.reload();
					swal({
					  type: "success",
					  title: "<?php echo lang('profilepicture');?>",
					  text: data.msg_success,
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('profilepicture');?>",
					  text: data.msg_error,
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
  
$('#webprofileaccountForm').validate({
	rules: {
	  fullname: {
		required: true
	  },
	  username: {
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
	},
	submitHandler: function (form) {
		var fullname = $('#fullname').val();
		var username = $('#username').val();
		var country = $('#country').val();
		var phoneno = $('#phoneno').val();
		var jobs = $('#jobs').val();
		var institution = $('#institution').val();
		var profile = $('#profile').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('academy/saveusersprofile')?>",
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
			data : {fullname:fullname , username:username, country:country, phoneno:phoneno, jobs:jobs, institution:institution, profile:profile},
			success: function(value){
				if (value.msg == 'true') {
					window.location.reload();
					swal({
					  type: "success",
					  title: "<?php echo lang('accountsetting');?>",
					  text: value.msg_success,
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('accountsetting');?>",
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
  
  $('#webprofilepasswordForm').validate({
	rules: {
	  old_password: {
		required: true
	  },
	  new_password: {
		required: true
	  },
	  confirm_password: {
		equalTo: "#new_password"
	  },
	},
	messages: {
	  old_password: {
		required: "<?php echo lang('oldpassword_error_msg');?>"
	  },
	  new_password: {
		required: "<?php echo lang('password_error_msg');?>"
	  },
	  confirm_password: {
		equalTo: "<?php echo lang('confirm_password_error_msg');?>",
	  },
	},
	submitHandler: function (form) {
		var old_password = $('#old_password').val();
		var new_password = $('#new_password').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('academy/saveuserspassword')?>",
			dataType : "JSON",
			beforeSend :function () {
					swal({
						title: "<?php echo lang('password');?>",
						html: "<?php echo lang('data_prossecing');?>",
						onOpen: () => {
						  swal.showLoading()
						}
					  })      
			},
			data : {old_password:old_password, new_password:new_password},
			success: function(value){
				if (value.msg == 'true') {
					swal({
					  type: "success",
					  title: "<?php echo lang('password');?>",
					  text: value.msg_success,
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('password');?>",
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
  
  $('#webprofileemailForm').validate({
	rules: {
	  email_new: {
			required: true,
			email: true,
		},
	},
	messages: {
	  email_new: {
			required: "<?php echo lang('email_error_msg');?>"
		},
	},
	submitHandler: function (form) {
		var email_new = $('#email_new').val();
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('academy/saveusersemail')?>",
			dataType : "JSON",
			beforeSend :function () {
					swal({
						title: "<?php echo lang('email');?>",
						html: "<?php echo lang('data_prossecing');?>",
						onOpen: () => {
						  swal.showLoading()
						}
					  })      
			},
			data : {email_new:email_new},
			success: function(value){
				if (value.msg == 'true') {
					swal({
					  type: "success",
					  title: "<?php echo lang('email');?>",
					  text: value.msg_success,
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('email');?>",
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
  
  $('#confirmForm').validate({
	rules: {
	  accountnumber: {
		required: true
	  },
	  accountname: {
		required: true
	  },
	  amount_payment: {
		required: true
	  },
	  files: {
		required: true
	  },
	},
	messages: {
	  accountnumber: {
		required: "<?php echo lang('account_number_error');?>"
	  },
	  accountname: {
		required: "<?php echo lang('accountname_error');?>"
	  },
	  amount_payment: {
		required: "<?php echo lang('amountpayment_error');?>"
	  },
	  files: {
		required: "<?php echo lang('filesproofpayment_error');?>"
	  },
	},
	submitHandler: function (form) {
		var formData = new FormData(form);
		$.ajax({
			type : "POST",
			url  : "<?php echo site_url('academy/savesconfirm')?>",
			dataType : "JSON",
			data: formData,
			processData:false,
			contentType:false,
			cache:false,
			beforeSend :function () {
					swal({
						title: "<?php echo lang('waiting');?>",
						html: "<?php echo lang('data_prossecing');?>",
						onOpen: () => {
						  swal.showLoading()
						}
					  })      
			},
			success: function(data){
				if (data.msg == 'true') {
					swal({
					  type: "success",
					  title: "<?php echo lang('confirmation');?>",
					  text: data.msg_success,
					  confirmButtonColor: '#007bff',
					});
				}
				else
				{
					swal({
					  type: "error",
					  title: "<?php echo lang('confirmation');?>",
					  text: data.msg_error,
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
