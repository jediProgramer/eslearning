<!-- jQuery -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/adminpanel/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/adminpanel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/adminpanel/dist/js/demo.js"></script>

<!-- Script jquery-validation -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">

$(document).ready(function () {
  $('#webusersProfileForm').validate({
    rules: {
      fullname: {
        required: true
      },
	  username: {
        required: true
      },
	  email: {
        required: true,
		email: true,
      },
	  phoneno: {
        required: true
      },
	  jobs: {
        required: true
      },
	  institution: {
        required: true
      },
    },
    messages: {
      fullname: {
        required: "Masukan nama lengkap"
      },
	  username: {
        required: "Masukan nama pengguna"
      },
	  email: {
        required: "Masukan email"
      },
	  phoneno: {
        required: "Masukan nomor telepon"
      },
	  jobs: {
        required: "Masukan pekerjaan"
      },
	  institution: {
        required: "Masukan peran"
      },
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

<!-- Script bs-custom-file-input -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>