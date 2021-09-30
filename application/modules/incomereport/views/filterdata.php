<?php
	
	function day($bulan)
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
		$day=$dayname;
		return $day;
	}
	
	function money($nilai, $pecahan = 0) 
	{
		return number_format($nilai, $pecahan, ',', '.');
	}
?>

<!-- DataTables -->
<link rel="stylesheet" href="<?php echo base_url()?>assets/adminpanel/datatables-bs4/css/dataTables.bootstrap4.css">

<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
  <th><?php echo lang('no');?></th>
  <th><?php echo lang('courses');?></th>
  <th><?php echo lang('name');?></th>
  <th><?php echo lang('date_payment');?></th>
  <th><?php echo lang('amount_payment_adm');?></th>
</tr>
</thead>
<tbody>
<?php
	$i = 0;	
	$total=0;	
	foreach($data as $do)
	{ 
	$i++;
	
	$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$do["idcourses"]."'");
	$rowcorses = $querycourses->row();
	$title=$rowcorses->title;
	$price=$rowcorses->price;
	
	$queryuser = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$do["iduser"]."'");
	$rowuser = $queryuser->row();
	$fullname=$rowuser->fullname;
	
	$split=explode('-',$do["date"]);
	$tahun=$split[0];
	$bulan=$split[1];
	$tgl=$split[2];
	$bulanind=day($bulan);
	
	$total=$total+$do["price"];	
?>	
 <tr>
  <td>#<?php echo $do["idpayment"];?></td>
  <td><a href="<?php echo base_url();?>learning/coursesdetail/<?php echo $do["idcourses"];?>" class="link-title"><?php echo $title;?></a></td>
  <td><?php echo $fullname;?></td>
  <td><?php echo $tgl." ".$bulanind." ".$tahun;?></td>
  <td><?php echo lang('curency_ind')." ".money($do["price"]);?></td>
</tr>
<?php
	}
?>
</tbody>
<tfoot>
<tr>
  <th colspan="4"><center><?php echo lang('total');?></center></th>
  <th><?php echo lang('curency_ind')." ".money($total);?></th>
</tr>
</tfoot>
</table>


<!-- DataTables -->
<script src="<?php echo base_url()?>assets/adminpanel/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url()?>assets/adminpanel/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- Script dataTables -->
<script type="text/javascript">
  $(function () {
    $("#example1").DataTable();
  });
</script>