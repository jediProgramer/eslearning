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
      
		
		
<main role="main">

    <div class="jumbotron jumbotron-fluid pages">
	  <div class="container-fluid">
		<nav aria-label="breadcrumb ">
		  <ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
			<li class="breadcrumb-item"><a href="<?php echo base_url();?>academy/order" class="link-title"><?php echo lang('my_order');?></a></li>
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('confirmation');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


  <!-- Registration -->
  <div class="container-fluid codedume-content-item">
	<div class="row">
		<div class="container">
            <div class="card-body">
				<?php
					foreach($dataorder as $do)
					{ 

					$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses =".$do["idcourses"]."");
					$rowcorses = $querycourses->row();
					$title=$rowcorses->title;
					$price=$rowcorses->price;
					
					$split=explode('-',$do["date"]);
					$tahun=$split[0];
					$bulan=$split[1];
					$tgl=$split[2];
					$bulanind=day($bulan,$idlanguage);	
				?>	
						<form id="confirmForm">
						
							<div class="form-group row">
								<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('no_order');?></label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="idorderview" name="idorderview" value="#<?php echo $do["idorder"];?>" disabled>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('courses');?></label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="idorder" name="idorder" value="<?php echo $title;?>" disabled>
								</div>
							</div>
							
							<div class="form-group row">
								<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('order_date');?></label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="idorder" name="idorder" value="<?php echo $tgl." ".$bulanind." ".$tahun;?>" disabled>
								</div>
							</div>
							
							<div class="form-group row">
							  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('bank');?></label>
							  <div class="col-sm-10">
							  <select class="form-control select2" id="bank" name="bank">
							  <?php
								foreach($databank as $db)
								{
							  ?>
											<option value="<?php echo $db["code"];?> - <?php echo $db["name"];?>"><?php echo $db["code"];?> - <?php echo $db["name"];?></option>
							  <?php
								}
							  ?>  
								</select>
							  </div>
							</div>
							
							<div class="form-group row">
								<label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('account_number');?></label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="accountnumber" name="accountnumber" >
								</div>
							</div>
							
							<div class="form-group row">
								<label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('account_name');?></label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="accountname" name="accountname" >
								</div>
							</div>
							
							<div class="form-group row">
							  <label for="inputJudul" class="col-sm-2 col-form-label"><?php echo lang('to_bank');?></label>
							  <div class="col-sm-10">
							  <select class="form-control select" id="accountbank" name="accountbank">
							  <?php
								foreach($dataaccountbank as $dab)
								{
							  ?>
								<option value="<?php echo $dab["bank"];?>">
								<?php echo $dab["bank"];?> - <?php echo $dab["accountname"];?> (<?php echo $dab["accountnumber"];?>)
								</option>
							  <?php
								}
							  ?>  
								</select>
							  </div>
							</div>
							
							<div class="form-group row">
								<label for="inputReport" class="col-sm-2 col-form-label"><?php echo lang('amount_payment');?></label>
								<div class="col-sm-10">
								  <input type="text" class="form-control" id="amount_payment" name="amount_payment">
								</div>
							</div>
							
							<div class="form-group row">
							<label for="inputFiles" class="col-sm-2 col-form-label"><?php echo lang('proof_of_payment');?></label>
								<div class="col-sm-10">
									<div class="custom-file">
										<input type="file" class="custom-file-input" id="files" name="files">
										<label class="custom-file-label" for="files"><?php echo lang('chose_file_payment');?></label>
									</div>
								</div>
							</div>
						
						  <input type="hidden" name="idorder" id="idorder" value="<?php echo $do["idorder"];?>">
						  <input type="hidden" name="valinc" id="valinc" value="">						  
						  <div class="form-group row">
							<div class="offset-sm-2 col-sm-10">
							  <button type="submit" class="btn btn-primary float-left" id="btn_save"><?php echo lang('saves');?></button>
							</div>
					</form>
				<?php
					}
				?>
				</table>
			
            <!-- /.card -->	
            </div> 
		<!-- /.container-fluid -->		
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /Registration -->

</main>