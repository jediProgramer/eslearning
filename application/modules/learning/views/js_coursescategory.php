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

<!-- jquery-validation -->
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/jquery.validate.min.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/jquery-validation/additional-methods.min.js"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url()?>assets/adminpanel/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url()?>assets/adminpanel/select2/js/select2.full.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url()?>assets/adminpanel/summernote/summernote-bs4.min.js"></script>

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
	$('#feedbackComent').summernote({
		placeholder: '<?php echo lang('feedback_placeholder');?>'
	});
  })
</script>

<!-- Star Radio Value -->
<script>
var radio = document.querySelectorAll(".myStarRating");
var demo = document.getElementById("starRatingValue");
  
function checkBox(e){
	demo.value = e.target.value;
}

radio.forEach(check => {
	check.addEventListener("click", checkBox);
});
</script>

<!-- Script jquery-validation -->
<script type="text/javascript">
$(document).ready(function () {
	
	$('#category').change(function(){ 
		var id=$(this).val();
		$.ajax({
			url : "<?php echo site_url('learning/get_sub_category');?>",
			method : "POST",
			data : {id: id},
			async : true,
			dataType : 'json',
			success: function(data){
				 
				var html = '';
				var i;
				for(i=0; i<data.length; i++){
					html += '<option value='+data[i].idsubcategory+'>'+data[i].title+'</option>';
				}
				$('#subcategory').html(html);
				window.location.href = '<?php echo base_url(); ?>learning/coursescategory/'+id;
			}
		});
		return false;
	}); 
  
	$('#search').autocomplete({
                source: "<?php echo site_url('home/get_autocomplete');?>",
				select: function (event, ui) {
                    $('[name="search"]').val(ui.item.label);
                }
    });
	
	$('#btnSearch').on('click',function(e){
		e.preventDefault();
		page_num = 0;
		var keywords = $('#search').val();
		var sortBy = $('#sortBy').val();
		var category = $('#category').val();
		var subcategory = $('#subcategory').val();
		$.ajax({
		type : "POST",
		url: '<?php echo base_url(); ?>learning/ajaxPaginationData/'+page_num,
		beforeSend :function () {
			$('.preloader').show();    
		},
		data:{page:page_num, keywords:keywords, sortBy:sortBy, category:category, subcategory:subcategory},
		success: function (result) {
			$('#postList').html(result);
			$('.preloader').fadeOut("slow");
		}
		});
	});
  
});
</script>
<script>
function searchFilter(page_num) {
	page_num = page_num?page_num:0;
	var keywords = $('#search').val();
	var sortBy = $('#sortBy').val();
	var category = $('#category').val();
	var subcategory = $('#subcategory').val();
	$.ajax({
		type: 'POST',
		url: '<?php echo base_url(); ?>learning/ajaxPaginationDataCategory/'+page_num,
		beforeSend: function () {
			$('.preloader').show();
		},
		data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&category='+category+'&subcategory='+subcategory,
		success: function (html) {
			$('#postList').html(html);
			$('.preloader').fadeOut("slow");
			//alert(page_num);
		}
	});
}
</script>
