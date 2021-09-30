<!-- Content Wrapper. Contains page content -->

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

<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo lang('icome_report');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('icome_report');?></li>
            </ol>
          </div>
        </div>
		
      </div><!-- /.container-fluid -->
    </section>
<!-- /.content-header -->
				
<!-- Main content -->
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          
          <div class="card">
            <!-- /.card-header -->
			
			  <div class="overlay" style="display: none;" id="loading">
				<i class="fas fa-2x fa-sync-alt fa-spin"></i>
			  </div>
			
			<div class="card-header">
               <form class="form-inline" id="filterDate">
				  <label for="date"><?php echo lang('month');?></label>&nbsp;&nbsp;&nbsp;
				  <select class="form-control " id="month">
					<?php
					for ($i = 1; $i < 12;   $i++) 
					{
					?>
					<option value="<?php if($i<=9){echo "0".$i;}else{echo $i;}?>"><?php if($i<=9){echo day("0".$i);}else{echo day($i);}?></option>
					<?php
					}
					?>
				  </select>&nbsp;&nbsp;&nbsp;
				  <label for="year"><?php echo lang('years');?></label>&nbsp;&nbsp;&nbsp;
				  <select class="form-control " id="years">
					<?php
					for ($i = 2018; $i<=date('Y');   $i++) 
					{
					?>
					<option value="<?php echo $i;?>"><?php echo $i;?></option>
					<?php
					}
					?>
				  </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <button type="submit" class="btn btn-primary" id="filterDateBtn"><?php echo lang('submit');?></button>
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				  <button type="submit" class="btn btn-primary float-right" id="printPdf"><i class="fas fa-print"></i>&nbsp;&nbsp;&nbsp;<?php echo lang('print');?></button>
				</form> 
            </div>
			
            <div class="card-body" id="listReport">
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
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
