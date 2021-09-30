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
            <h1><?php echo lang('report_payment');?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url()?>admin"><?php echo lang('home');?></a></li>
              <li class="breadcrumb-item active"><?php echo lang('report_payment');?></li>
            </ol>
          </div>
        </div>
		
		
		<?php if($this->session->flashdata('msg_error')){?>
			<div class="alert alert-danger alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<h5><i class="icon fas fa-ban"></i> <?php echo lang('error_message_title');?></h5>
				<?php echo $this->session->flashdata('msg_error');?>.
			</div>
		 <?php }?>
		
	    <?php if($this->session->flashdata('msg_success')){?>
		<div class="alert alert-success alert-dismissible">
		  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		  <h5><i class="icon fas fa-check"></i> <?php echo lang('success_message_title');?></h5>
		  <?php echo $this->session->flashdata('msg_success');?>.
		</div>
		<?php }?>
		
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
			
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				  <th><?php echo lang('no_order');?></th>
				  <th><?php echo lang('courses');?></th>
				  <th><?php echo lang('name');?></th>
				  <th><?php echo lang('account_name');?></th>
				  <th><?php echo lang('to_bank');?></th>
				  <th><?php echo lang('amount_payment_adm');?></th>
				  <th><?php echo lang('date_payment');?></th>
				  <th><?php echo lang('status');?></th>
				  <th><?php echo lang('action');?></th>
                </tr>
                </thead>
                <tbody>
				<?php
					$i = 0;										
					foreach($data as $do)
					{ 
					$i++;
					
					$querycourses = $this->db->query("SELECT * FROM `".$this->db->dbprefix('courses')."` WHERE idcourses='".$do["idcourses"]."'");
					$rowcorses = $querycourses->row();
					$title=$rowcorses->title;
					$price=$rowcorses->price;
					
					$queryuser = $this->db->query("SELECT fullname FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$do["iduser"]."'");
					$rowuser = $queryuser->row();
					$fullname=$rowuser->fullname;
					
					$split=explode('-',$do["date"]);
					$tahun=$split[0];
					$bulan=$split[1];
					$tgl=$split[2];
					$bulanind=day($bulan);	
					
					$splitb=explode('-',$do["datepayment"]);
					$tahunb=$splitb[0];
					$bulanb=$splitb[1];
					$tglb=$splitb[2];
					$bulanindb=day($bulanb);	
				?>	
				 <tr>
				  <td>#<?php echo $do["idorder"];?></td>
				  <td><a href="<?php echo base_url();?>learning/coursesdetail/<?php echo $do["idcourses"];?>" class="link-title"><?php echo $title;?></a></td>
				  <td><?php echo $fullname;?></td>
				  <td><?php echo $do["sendingaccountname"];?> - <?php echo $do["sendingbank"];?> (<?php echo $do["sendingaccountnumber"];?>)</td>
				  <td><?php echo $do["accountbank"];?></td>
				  <td><?php echo lang('curency_ind')." ".money($do["amountpayment"]);?></td>
				   <td><?php echo $tglb." ".$bulanindb." ".$tahunb;?></td>
				  <td><?php if($do["status"]=="1"){ echo lang('unpaid');}else if($do["status"]=="2"){ echo lang('in_process');}else if($do["status"]=="3"){ echo lang('paid');}?></td>
				  <td class="dt-head-center">
					<a class="btn btn-info btn-sm" href="<?php echo base_url()?>academy/invoiceprint/<?php echo $do["idorder"];?>" target="_blank"><i class="far fa-money-bill-alt"></i></a>
					<a class="btn btn-warning btn-sm" href="<?php echo base_url()?>assets/files/paymentproof/<?php echo $do["file"];?>"  target=”_blank"><i class="fa fa-eye"></i></a>
					<?php if($do["status"]!="3"){ ?><a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-default-<?php echo $i;?>"><i class="fas fa-check-circle"></i></a><?php } ?>
				  </td>
                </tr>
				
				<div class="modal fade" id="modal-default-<?php echo $i;?>">
						<div class="modal-dialog">
						  <div class="modal-content">
							<div class="modal-header">
							  <h4 class="modal-title"><?php echo lang('payment_vld_title');?></h4>
							  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							  </button>
							</div>
							<div class="modal-body">
							  <p><?php echo lang('payment_vld_msg');?> #<?php echo $do["idorder"];?>&hellip;</p>
							<form action="<?php echo base_url()?>paymentreport/validate" method="post" enctype="multipart/form-data">
							  <input type="hidden" id="idorder" name="idorder" value="<?php echo $do["idorder"];?>">
							</div>
							<div class="modal-footer justify-content-between">
							  <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo lang('close');?></button>
							  <button type="submit" class="btn btn-primary"><?php echo lang('payment_vld_btn');?></button>
							</div>
							</form>  
						  </div>
						  <!-- /.modal-content -->
						</div>
						<!-- /.modal-dialog -->
				  </div>
				
				<?php
					}
				?>
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