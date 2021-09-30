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
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/adminpanel/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
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
  $('#webusersForm').validate({
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
        required: "Required"
      },
	  username: {
        required: "Required"
      },
	  password: {
        required: "Required"
      },
	  email: {
        required: "Required"
      },
	  phoneno: {
        required: "Required"
      },
	  jobs: {
        required: "Required"
      },
	  institution: {
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

$('#webeducationForm').validate({
    rules: {
      field_of_study: {
        required: true
      },
      college: {
        required: true
      },
      graduation_year: {
        required: true
      },
      city: {
        required: true
      },
    },
    messages: {
      field_of_study: {
        required: "Required"
      },
      college: {
        required: "Required"
      },
      graduation_year: {
        required: "Required"
      },
      city: {
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

</script>