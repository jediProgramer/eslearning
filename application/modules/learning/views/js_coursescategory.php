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
			$('.loading').show();    
		},
		data:{page:page_num, keywords:keywords, sortBy:sortBy, category:category, subcategory:subcategory},
		success: function (result) {
			$('#postList').html(result);
			$('.loading').fadeOut("slow");
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
			$('.loading').show();
		},
		data:'page='+page_num+'&keywords='+keywords+'&sortBy='+sortBy+'&category='+category+'&subcategory='+subcategory,
		success: function (html) {
			$('#postList').html(html);
			$('.loading').fadeOut("slow");
			//alert(page_num);
		}
	});
}
</script>
