<!-- jQuery -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/adminpanel/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url()?>assets/adminpanel/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/adminpanel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/adminpanel/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/adminpanel/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/adminpanel/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- <script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script> -->

<!-- Script bs-custom-file-input -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<!-- Script dataTables -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable();
	$('#example3').DataTable();
	$('#example4').DataTable();
  });
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
  $('#webbannerberandaForm').validate({
    rules: {
      text: {
        required: true
      },
	  image: {
        required: true
      },
    },
    messages: {
      text: {
        required: "Required"
      },
	  image: {
        required: "Required"
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
  
 $('#webbannerberandaFormEdit').validate({
    rules: {
      text: {
        required: true
      },
    },
    messages: {
      text: {
        required: "Required"
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
  
  $('#webbannerpageForm').validate({
    rules: {
      title: {
        required: true
      },
	  subtitle: {
        required: true
      },
	  image: {
        required: true
      },
    },
    messages: {
      text: {
        required: "Required"
      },
	  subtitle: {
        required: "Required"
      },
	  image: {
        required: "Required"
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
  
  $('#webbannerpageFormEdit').validate({
    rules: {
      title: {
        required: true
      },
	  subtitle: {
        required: true
      },
    },
    messages: {
      text: {
        required: "Required"
      },
	  subtitle: {
        required: "Required"
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