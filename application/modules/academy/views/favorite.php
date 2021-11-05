<?php
	$querybanner = $this->db->query("SELECT * FROM `".$this->db->dbprefix('bannerberanda')."` WHERE idlanguage='".$idlanguage."'");
	$rowbanner = $querybanner->row();
	
	function day($bulan,$idlanguage)
	{
			if($idlanguage=="1")
			{
				if($bulan=="01"){$dayname="Januari";}
				else if($bulan=="02"){$dayname="Februari";}
				else if($bulan=="03"){$dayname="Maret";}
				else if($bulan=="04"){$dayname="April";}
				else if($bulan=="05"){$dayname="Mei";}
				else if($bulan=="06"){$dayname="Juni";}
				else if($bulan=="07"){$dayname="Juli";}
				else if($bulan=="08"){$dayname="Agustus";}
				else if($bulan=="09"){$dayname="September";}
				else if($bulan=="10"){$dayname="Okttober";}
				else if($bulan=="11"){$dayname="November";}
				else if($bulan=="12"){$dayname="Desember";}
			}
			else if($idlanguage=="2")
			{
				if($bulan=="01"){$dayname="January";}
				else if($bulan=="02"){$dayname="February";}
				else if($bulan=="03"){$dayname="March";}
				else if($bulan=="04"){$dayname="April";}
				else if($bulan=="05"){$dayname="May";}
				else if($bulan=="06"){$dayname="June";}
				else if($bulan=="07"){$dayname="July";}
				else if($bulan=="08"){$dayname="August";}
				else if($bulan=="09"){$dayname="September";}
				else if($bulan=="10"){$dayname="Okttober";}
				else if($bulan=="11"){$dayname="November";}
				else if($bulan=="12"){$dayname="December";}
			}		
			$day=$dayname;
			return $day;
	}
	
	function money($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}
?>
      
<!-- Inner Page Breadcrumb -->
<section class="inner_page_breadcrumb">
	<div class="container">
		<div class="row">
			<div class="col-xl-6 offset-xl-3 text-center">
				<div class="breadcrumb_content">
					<h4 class="breadcrumb_title"><?php echo lang('my_favorite');?></h4>
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="<?php echo base_url();?>"><?php echo lang('home');?></a></li>
						<li class="breadcrumb-item active" aria-current="page"><?php echo lang('my_favorite');?></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- Box Section -->
<section class="our-team pb40">
	<div class="container">
		<div class="row">

		<div class="card-body">
			<table id="data" class="table table-bordered table-striped">
			<thead>
			<tr class="dt-head-center">
				<th><?php echo lang('no');?></th>
				<th><?php echo lang('courses');?></th>
				<th><?php echo lang('date_favorite');?></th>
				<th><?php echo lang('action');?></th>
			</tr>
			</thead>
			<?php
				$i = 0;										
				foreach($data as $d)
				{ 
				$i++;

				$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses =".$d["idcourses"]."");
				$rowcorses = $querycourses->row();
				$title=$rowcorses->title;
				$price=$rowcorses->price;
				
				$split=explode('-',$d["date"]);
				$tahun=$split[0];
				$bulan=$split[1];
				$tgl=$split[2];
				$bulanind=day($bulan,$idlanguage);	
			?>	
				<tr>
				<td><?php echo $i;?></td>
				<td><a href="<?php echo base_url();?>learning/coursesdetail/<?php echo $d["idcourses"];?>" class="link-title"><?php echo $title;?></a></td>
				<td><?php echo $tgl." ".$bulanind." ".$tahun;?></td>
				<td class="dt-head-center">
				<a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-default-<?php echo $i;?>"><i class="fa fa-trash">&nbsp;</i>&nbsp;<?php echo lang('delete');?></a></td>
				</td>
			</tr>
			
			<div class="modal fade" id="modal-default-<?php echo $i;?>">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><?php echo lang('delete_title');?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p><?php echo lang('delete_message');?> <br/><br/><?php echo $title;?>&hellip;</p>
				<form action="<?php echo base_url()?>category/deletes" method="post" enctype="multipart/form-data">
					<input type="hidden" id="idfavorite<?php echo $i;?>" name="idfavorite<?php echo $i;?>" value="<?php echo $d["idfavorite"];?>">
				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo lang('close');?></button>
					<button type="submit" class="btn btn-danger" id="deleteFavCourses<?php echo $i;?>" name="deleteFavCourses<?php echo $i;?>"><?php echo lang('delete');?></button>
				</div>
				</form>  
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			
			<!-- JQuery JS -->
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
			
			<!-- Script jquery-validation -->
			<script type="text/javascript">
			$(document).ready(function () {
			$('#deleteFavCourses<?php echo $i;?>').on('click',function(){
					var idfavorite = $('#idfavorite<?php echo $i;?>').val();
					$.ajax({
						type : "POST",
						url  : "<?php echo site_url('academy/deletefavorite')?>",
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
						data : {idfavorite:idfavorite},
						success: function(value){
							$('#modal-default-<?php echo $i;?>').modal('hide');
							if (value.msg == 'true') {
								swal({
									type: "success",
									title: "<?php echo lang('my_favorite');?>",
									text: value.msg_success,
									confirmButtonColor: '#dc3545',
								});
								window.location.reload();
							}
							else
							{
								swal({
									type: "error",
									title: "<?php echo lang('my_favorite');?>",
									text: value.msg_error,
									confirmButtonColor: '#dc3545',
								});
							}
						}
					});
					return false;
				});
				
			});
			</script>
			
			<?php
				}
			?>
			</table>
		
		<!-- /.card -->	
		</div> 

		</div>
	</div>
</section>
		
