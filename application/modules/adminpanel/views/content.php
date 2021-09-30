<?php
	$queryimg = $this->db->query("SELECT * FROM ".$this->db->dbprefix('weblogo'));
  	$row = $queryimg->row();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--  favicon -->
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/files/images/<?php echo $row->favicon; ?>">

  <title><?php echo lang('login_adminpanel');?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminpanel/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminpanel/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Sweet Alert CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/adminpanel/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="<?php echo base_url()?>" class="h1"><img src="<?php echo base_url()?>assets/files/images/<?php echo $row->logo; ?>" width="170"   alt="" class="d-inline-block align-middle mr-2"></a>
    </div>
    <div class="card-body">

      <form class="form-horizontal" id="webloginForm">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail"><?php echo lang('email');?></label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo lang('email');?>">
          
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword"><?php echo lang('password');?></label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('password');?>">
                  </div>
				  <div class="form-group ">
						<?php echo $captcha // tampilkan recaptcha ?>
                  </div>
                  <div class="form-group mb-0">
                    <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                      <label class="custom-control-label" for="remember"> <?php echo lang('remember');?></label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-primary"><?php echo lang('login');?></button>
                </div>
              </form>

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/adminpanel/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/adminpanel/dist/js/adminlte.min.js"></script>
<!-- Sweet Alert JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.1/sweetalert2.all.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- recaptcha -->
<?php echo $script_captcha; ?>
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
                url  : "<?php echo site_url('adminpanel/loginprocess')?>",
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
						window.location.href = "<?php echo base_url() ?>admin";
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
	  
  });
</script>
</body>
</html>