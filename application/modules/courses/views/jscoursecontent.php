<!-- jQuery -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/adminpanel/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/adminpanel/select2/js/select2.full.min.js"></script>
<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url()?>assets/adminpanel/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url()?>assets/adminpanel/dist/js/demo.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/adminpanel/summernote/summernote-bs4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/adminpanel/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- mask money -->
<script src="<?php echo base_url()?>assets/adminpanel/maskmoney/jquery.maskMoney.js"></script>

<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>

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

<!-- Script maskMoney -->
<script type="text/javascript">
			$(document).ready(function(){
			$('#price').maskMoney({thousands:'.', decimal:',', precision:0});
		});
	</script>

<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
  $('#coursescontentForm').validate({
    rules: {
    title: {
        required: true
      },
    description: {
        required: true
      },
    },
    messages: {
      title: {
        required: "Required"
      },
	  description: {
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

<script>
function myContent(a) {
  if(a=='video')
  {
    document.getElementById('vid').style.display = 'block';
    document.getElementById('file').style.display = 'none';
    document.getElementById('link').style.display = 'none';
  }
  else if(a=='files')
  {
    document.getElementById('vid').style.display = 'none';
    document.getElementById('file').style.display = 'block';
    document.getElementById('link').style.display = 'none';
  }
  else if(a=='link')
  {
    document.getElementById('vid').style.display = 'none';
    document.getElementById('file').style.display = 'none';
    document.getElementById('link').style.display = 'block';
  }
}
</script>