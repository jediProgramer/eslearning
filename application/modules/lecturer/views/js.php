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
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/adminpanel/summernote/summernote-bs4.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>


<!-- Script Summernote -->
<script>
  $(function () {
    // Summernote
    $('.textarea1').summernote(),
	$('.textarea2').summernote(),
	$('.textarea3').summernote(),
	$('.textarea4').summernote()
  })
</script>

<!-- Script bs-custom-file-input -->
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
    $("#example2").DataTable();
	$("#example3").DataTable();
	$("#example4").DataTable();
	$("#example5").DataTable();
	$("#example6").DataTable();
	$("#example7").DataTable();
});
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">

$(document).ready(function () {
  $('#weblecturerForm').validate({
    rules: {
      fullname: {
        required: true
      },
	  nip: {
        required: true
      },
	  nidn: {
        required: true
      },
    },
    messages: {
      fullname: {
        required: "Masukan nama dan gelar"
      },
	  nip: {
        required: "Masukan nip"
      },
	  nidn: {
        required: "Masukan nidn"
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
  
  $('#webeducationForm').validate({
    rules: {
      bidang_studi: {
        required: true
      },
	  perguruan_tinggi: {
        required: true
      },
	  tahun_lulus: {
        required: true
      },
	   kota: {
        required: true
      },
    },
    messages: {
      bidang_studi: {
        required: "Masukan bidang studi"
      },
	  perguruan_tinggi: {
        required: "Masukan perguruan tinggi"
      },
	  tahun_lulus: {
        required: "Masukan tahun lulus"
      },
	   kota: {
        required: "Masukan kota"
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
  
  $('#webteachForm').validate({
    rules: {
      tahun: {
        required: true
      },
	  kode_mk: {
        required: true
      },
	  nama_mk: {
        required: true
      },
	  kode_kelas: {
        required: true
      },
    },
    messages: {
      tahun: {
        required: "Masukan tahun"
      },
	  kode_mk: {
        required: "Masukan kode matakuliah"
      },
	  nama_mk: {
        required: "Masukan nama matakuliah"
      },
	  kode_kelas: {
        required: "Masukan kode kelas"
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
  
  $('#webresearchForm').validate({
    rules: {
	  judul: {
        required: true
      },
	  tahun: {
        required: true
      },
    },
    messages: {
      judul: {
        required: "Masukan judul"
      },
	  tahun: {
        required: "Masukan tahun"
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
  
   $('#webdedicationForm').validate({
    rules: {
	  judul: {
        required: true
      },
	  kota: {
        required: true
      },
	  tahun: {
        required: true
      },
    },
    messages: {
      judul: {
        required: "Masukan judul"
      },
	  kota: {
        required: "Masukan kota"
      },
	  tahun: {
        required: "Masukan tahun"
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
  
  $('#webpublicationForm').validate({
    rules: {
	  judul: {
        required: true
      },
	  penerbit: {
        required: true
      },
	  tahun: {
        required: true
      },
	  volume: {
        required: true
      },
	  link: {
        required: true
      },
    },
    messages: {
      judul: {
        required: "Masukan judul"
      },
	  penerbit: {
        required: "Masukan penerbit"
      },
	  tahun: {
        required: "Masukan tahun"
      },
	  volume: {
        required: "Masukan volume"
      },
	  link: {
        required: "Masukan link"
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
  
  $('#webrewardForm').validate({
    rules: {
	  penghargaan: {
        required: true
      },
	  kategori: {
        required: true
      },
	  lembaga: {
        required: true
      },
	  tahun: {
        required: true
      },
    },
    messages: {
      penghargaan: {
        required: "Masukan penghargaan"
      },
	  kategori: {
        required: "Masukan kategori"
      },
	  lembaga: {
        required: "Masukan lembaga"
      },
	  tahun: {
        required: "Masukan tahun"
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
  
  $('#webhkiForm').validate({
    rules: {
	  judul: {
        required: true
      },
	  nomor: {
        required: true
      },
	  lembaga: {
        required: true
      },
	  tahun: {
        required: true
      },
    },
    messages: {
      judul: {
        required: "Masukan judul"
      },
	  nomor: {
        required: "Masukan nomor"
      },
	  lembaga: {
        required: "Masukan lembaga"
      },
	  tahun: {
        required: "Masukan tahun"
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

<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2({
      theme: 'bootstrap4'
    })

  });
</script>