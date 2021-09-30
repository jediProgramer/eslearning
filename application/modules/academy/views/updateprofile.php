<?php
	$queryusers = $this->db->query("SELECT * FROM `".$this->db->dbprefix('users')."` WHERE iduser='".$idusers."'");
	$rowusers = $queryusers->row();
	
	$split=explode('-',$rowusers->date);
	$tahun=$split[0];
	$bulan=$split[1];
	$tgl=$split[2];
	$bulanind=day($bulan,$idlanguage);	
	
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
?>
      
		
		
<main role="main">

    <div class="jumbotron jumbotron-fluid profile">
	  <div class="container">
		 <div class="row">
		  <div class="col-sm-3"> <img src="<?php if($rowusers->profilepicture==""){ ?><?php echo base_url()?>assets/files/users/default_user.png<?php }else{ ?><?php echo base_url()?>assets/files/users/<?php echo $rowusers->profilepicture;?><?php } ?>" class="img-thumbnail" alt="Cinque Terre"> </div>
		  <div class="col-sm-9"><p><h1><?php echo $fullname;?></h1><br/><p>@<?php echo $username;?></p><?php echo lang('joinedsince');?> <?php echo $tgl." ".$bulanind." ".$tahun;?>,&nbsp;<i class="fas fa-map-marker-alt"></i> <?php echo $rowusers->country;?></p><p align="justify"><?php echo $rowusers->profile;?></p></div>
		</div> 
	  </div>
    </div>


  <!-- Registration -->
  <div class="container-fluid codedume-content-item">
	<div class="row">
		<div class="container">
		
			<nav aria-label="breadcrumb ">
			  <ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="<?php echo base_url();?>home" class="link-title"><?php echo lang('home');?></a></li>
				<li class="breadcrumb-item active" aria-current="page"><?php echo lang('edit_profile');?></li>
			  </ol>
			</nav>
		
            <div class="card-body">
			
			<!-- Nav tabs -->
			  <ul class="nav nav-tabs">
				<li class="nav-item">
				  <a class="nav-link active link-title" data-toggle="tab" href="#profilepicture"><?php echo lang('profilepicture');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link link-title" data-toggle="tab" href="#accountsetting"><?php echo lang('accountsetting');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link link-title" data-toggle="tab" href="#password"><?php echo lang('password');?></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link link-title" data-toggle="tab" href="#email"><?php echo lang('email');?></a>
				</li>
			  </ul>

			  <!-- Tab panes -->
			  <div class="tab-content">
				<div id="profilepicture" class="container tab-pane active">
				  <?php $this->load->view($profilepictureform); ?>
				</div>
				<div id="accountsetting" class="container tab-pane fade">
				  <?php $this->load->view($profileaccountform); ?>
				</div>
				<div id="password" class="container tab-pane fade">
				  <?php $this->load->view($profilepasswordform); ?>
				</div>
				<div id="email" class="container tab-pane fade">
				  <?php $this->load->view($profileemailform); ?>
				</div>
			  </div>
            <!-- /.card -->	
            </div> 
		<!-- /.container-fluid -->		
        </div>
    </div>
    <!-- /.row -->
</div>
<!-- /Registration -->

</main>