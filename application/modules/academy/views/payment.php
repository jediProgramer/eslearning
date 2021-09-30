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
			<li class="breadcrumb-item active" aria-current="page"><?php echo lang('payment');?></li>
		  </ol>
		</nav>
	  </div>
    </div>


  <!-- Registration -->
  <div class="container-fluid codedume-content-item">
	<div class="row">
		<div class="container">
            <div class="card-body">
			
				<table id="data" class="table table-bordered table-striped">
                <thead>
                <tr class="dt-head-center">
				  <th><?php echo lang('no_receipt');?></th>
				  <th><?php echo lang('courses');?></th>
                  <th><?php echo lang('payment_date');?></th>
                  <th><?php echo lang('total_payment');?></th>
				  <th><?php echo lang('status');?></th>
				  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
				<?php
					$i = 0;										
					foreach($dataorder as $do)
					{ 
					$i++;

					$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses =".$do["idcourses"]."");
					$rowcorses = $querycourses->row();
					$title=$rowcorses->title;
					$price=$rowcorses->price;
					
					$split=explode('-',$do["datepayment"]);
					$tahun=$split[0];
					$bulan=$split[1];
					$tgl=$split[2];
					$bulanind=day($bulan,$idlanguage);	
				?>	
				 <tr>
				  <td>#<?php echo $do["idorder"];?></td>
				  <td><a href="<?php echo base_url();?>learning/coursesdetail/<?php echo $do["idcourses"];?>" class="link-title"><?php echo $title;?></a></td>
                  <td><?php echo $tgl." ".$bulanind." ".$tahun;?></td>
                  <td><?php echo lang('curency')." ".money($do["amountpayment"]);?></td>
				  <td><?php if($do["status"]=="1"){ echo lang('unpaid');}else if($do["status"]=="2"){ echo lang('in_process');}else if($do["status"]=="3"){ echo lang('paid');}?></td>
				  <td class="dt-head-center">
					<a class="btn btn-success btn-sm" href="<?php echo base_url()?>academy/receiptprint/<?php echo $do["idorder"];?>" target="_blank"><i class="fas fa-print"></i>&nbsp;</i>&nbsp;<?php echo lang('print_receipt');?></a>&nbsp;
				  </td>
                </tr>
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