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
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/adminpanel/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url()?>assets/adminpanel/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
  $('#webinfoForm').validate({
    rules: {
      nama: {
        required: true
      },
      katakunci: {
        required: true
      },
      pembuatwebsite: {
        required: true
      },
	  tahunwebsite: {
        required: true
      },
	  deskripsi: {
        required: true
      },
    },
    messages: {
      nama: {
        required: "Required"
      },
      katakunci: {
        required: "Required"
      },
	  pembuatwebsite: {
        required: "Required"
      },
	  tahunwebsite: {
        required: "Required"
      },
	  deskripsi: {
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
  
  $('#webkontakForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      telepon: {
        required: true
      },
      alamat: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Required"
      },
      telepon: {
        required: "Required"
      },
	  alamat: {
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
  
  $('#websosmedForm').validate({
    rules: {
      facebook: {
        required: true
      },
      twitter: {
        required: true
      },
      youtube: {
        required: true
      },
	  instagram: {
        required: true
      },
    },
    messages: {
      facebook: {
        required: "Required"
      },
      twitter: {
        required: "Required"
      },
	  youtube: {
        required: "Required"
      },
	  instagram: {
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
  
  $('#weblogoForm').validate({
    rules: {
      filelogo: {
        required: true
      },
      filefavicon: {
        required: true
      },
    },
    messages: {
      filelogo: {
        required: "Required"
      },
      filefavicon: {
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

<!-- Script bs-custom-file-input -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<script type="text/javascript">
  function changeFuncBahasa() {
    var selectBahasa = document.getElementById("idlanguage");
    var selectedValueBahasa = selectBahasa.options[selectBahasa.selectedIndex].value;
    //alert(selectedValue);
    window.location.href = "<?php echo base_url();?>infowebsite/detailprofile/"+selectedValueBahasa+"";
  }
</script>