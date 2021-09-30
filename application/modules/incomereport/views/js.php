<!-- jQuery -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/adminpanel/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/adminpanel/select2/js/select2.full.min.js"></script>
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
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/adminpanel/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/adminpanel/summernote/summernote-bs4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!--<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>-->

<!-- Script bs-custom-file-input -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<!--Initialize Select2 Elements -->
<script type="text/javascript">
$('.select2').select2()

$('.select2bs4').select2({
  theme: 'bootstrap4'
})
</script>

<!-- Script dataTables -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
  });
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
   $('#accountbankForm').validate({
    rules: {
      accountname: {
        required: true
      },
      accountnumber: {
        required: true
      },
    },
    messages: {
      accountname: {
        required: "Required"
      },
      accountnumber: {
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
  
  $('#filterDateBtn').on('click',function(e){
		e.preventDefault();
		page_num = 0;
		var month = $('#month').val();
		var years = $('#years').val();
		$.ajax({
		type : "POST",
		url: '<?php echo base_url(); ?>incomereport/filterdate',
		beforeSend :function () {
			$('#loading').show();    
		},
		data:{month:month, years:years},
		success: function (result) {
			$('#listReport').html(result);
			$('#loading').fadeOut("slow");
		}
		});
	});
	
	$('#printPdf').on('click',function(e){
		e.preventDefault();
		page_num = 0;
		var month = $('#month').val();
		var years = $('#years').val();
		$.ajax({
		type : "POST",
		data:{month:month, years:years},
		success: function (result) {
			window.location.href = "<?php echo base_url()?>incomereport/reportprint/"+month+"/"+years;
		}
		});
	});
  
});
</script>