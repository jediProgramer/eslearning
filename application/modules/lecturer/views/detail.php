    <?php
		function day($bulan)
		{
				if($bulan=="01"){$dayname="Januari";}
				if($bulan=="02"){$dayname="Februari";}
				if($bulan=="03"){$dayname="Maret";}
				if($bulan=="04"){$dayname="April";}
				if($bulan=="05"){$dayname="Mei";}
				if($bulan=="06"){$dayname="Juni";}
				if($bulan=="07"){$dayname="Juli";}
				if($bulan=="08"){$dayname="Agsustus";}
				if($bulan=="09"){$dayname="September";}
				if($bulan=="10"){$dayname="Okttober";}
				if($bulan=="11"){$dayname="November";}
				if($bulan=="12"){$dayname="Desember";}
				$day=$dayname;
				return $day;
		}
	?>
	<!--page title start-->
        <section class="page-title ptb-50">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
						<?php
								$query_title = $this->db->query("SELECT title,subtitle FROM `".$this->db->dbprefix('bannerweb')."` WHERE title='".$title."'");
								$rowt = $query_title->row();
								
								$query_fullname = $this->db->query("SELECT fullname FROM `".$this->db->dbprefix('lecturer')."` WHERE idlecturer='".$idlecturer."'");
								$rowfn = $query_fullname->row();
						?>	
                        <h2><?php echo $rowt->title;?></h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>"><?php echo lang('home');?></a></li>
							<li><a href="<?php echo base_url()?>lecturer"><?php echo lang('lecturer');?></a></li>
                            <li class="active"><?php echo $rowfn->fullname;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!--page title end-->


		<!--Section lecture start-->
        <section class="section-padding">
            <div class="container">
			<div class="team-tab" role="tabpanel">
			<!-- Tab panes -->
            <div class="panel-body">
            <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active" id="team-1">			
              <div class="row">
				<?php
					//$querynews = $this->db->query("SELECT * FROM ".$this->db->dbprefix('news')." ORDER BY date DESC");
					//$datanews=$querynews->result();
					foreach($datalecturer as $dl)
					{
						
				?>	
				<div class="col-md-4 col-sm-3">
					  <figure class="team-img text-center">
						  <img src="<?php echo base_url()?>assets/files/lecturer/<?php echo $dl["picture"];?>" alt="Image" width="360" height="467" >	
						  <ul class="team-social-links list-inline">
							  <li><a href="tel:<?php echo $dl["phoneno"];?>"><i class="fa fa-phone"></i></a></li>
							  <li><a href="mailto:<?php echo $dl["email"];?>"><i class="fa fa-envelope-o"></i></a></li>
						  </ul>
					  </figure>
				  </div><!-- /.col-md-4 -->
				
				<div class="col-md-8 col-sm-9">

				  <div class="team-intro">
					  <h3><?php echo $dl["fullname"];?> <small><?php echo $dl["jafung"];?></small></h3>
					  <p align="justify"><?php echo $dl["profile"];?></p>
					  <h4><b><?php echo lang('programmes');?></b></h4>
					  <p align="justify"><?php echo $dl["programmes"];?></p>
					  <table>
					  <thead>
					  <tr valign="top">
					  <td>
						  <b><?php echo lang('sinta_id');?></b>
					  </td>
					  <td>
						  <b><?php echo lang('scopus_id');?></b>
					  </td>
					  <td>
						  <b><?php echo lang('google_scholar_id');?></b>
					  </td>
					  </tr>
					  </thead>
					  <tr valign="top">
					  <td>
						  <p align="justify"><a href="http://sinta.ristekbrin.go.id/authors/detail?id=<?php echo $dl["sinta_id"];?>&view=overview"><?php echo $dl["sinta_id"];?></a></p>
					  </td>
					  <td>
						  <p align="justify"><a href="https://www.scopus.com/authid/detail.uri?authorId=<?php echo $dl["scopus_id"];?>"><?php echo $dl["scopus_id"];?></a></p>
					  </td>
					  <td>
						  <p align="justify"><a href="https://scholar.google.com/citations?user=<?php echo $dl["google_scholar_id"];?>"><?php echo $dl["google_scholar_id"];?></a></p>
					  </td>
					  </tr>
					  <thead>
					  <tr valign="top">
					  <td>
						<b><?php echo lang('kbk');?></b>
					  </td>
					  <td>
						<b><?php echo lang('research_areas');?></b>
					  </td>
					  <td>
						<b><?php echo lang('research_interests');?></b>
					  </td>
					  </tr>
					  </thead>
					   <tr valign="top">
					   <td>
						<p align="justify"><?php echo $dl["kbk"];?></p>
					  </td>
					  <td>
						<p align="justify"><?php echo $dl["research_areas"];?></p>
					  </td>
					  <td>
						<p align="justify"><?php echo $dl["research_interests"];?></p>
					  </td>
					  </tr>
					  </table>
				  </div>

			    </div> <!-- col-md-8 -->
				<?php
					}
				?>
				<!-- /.Tab panes -->
				</div>
				</div>
				</div>
              </div><!-- /.row -->
			  </div><!-- /.tab -->
			  
			  
			  <div class="row">
                <div class="col-md-12">

                    <div class="border-box-tab">

                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs nav-justified" role="tablist">
                        <li role="presentation" class="active"><a href="#tab-18" class="waves-effect waves-dark"  role="tab" data-toggle="tab"> <i class="fa fa-graduation-cap"></i><?php echo lang('education');?></a></li>
                        <li role="presentation"><a href="#tab-19" class="waves-effect waves-dark" role="tab" data-toggle="tab"> <i class="fa fa-university"></i><?php echo lang('lecture');?></a></li>
                        <li role="presentation"><a href="#tab-20" class="waves-effect waves-dark" role="tab" data-toggle="tab"> <i class="fa fa-clone"></i><?php echo lang('research');?></a></li>
                        <li role="presentation"><a href="#tab-21" class="waves-effect waves-dark" role="tab" data-toggle="tab"> <i class="fa fa-users"></i><?php echo lang('dedication');?></a></li>
						<li role="presentation"><a href="#tab-22" class="waves-effect waves-dark" role="tab" data-toggle="tab"> <i class="fa fa-book"></i><?php echo lang('publication');?></a></li>
						<li role="presentation"><a href="#tab-23" class="waves-effect waves-dark" role="tab" data-toggle="tab"> <i class="fa fa-trophy"></i><?php echo lang('reward');?></a></li>
						<li role="presentation"><a href="#tab-24" class="waves-effect waves-dark" role="tab" data-toggle="tab"> <i class="fa fa-certificate"></i><?php echo lang('hki');?></a></li>
                      </ul>

                      <!-- Tab panes -->
                      <div class="panel-body">
                        <div class="tab-content">
                          <div role="tabpanel" class="tab-pane fade in active" id="tab-18">
							<?php $this->load->view($pendidikan); ?>
						  </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab-19">
							<?php $this->load->view($pengajaran); ?>
						  </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab-20">
							<?php $this->load->view($penelitian); ?>
						  </div>
                          <div role="tabpanel" class="tab-pane fade" id="tab-21">
							<?php $this->load->view($pengabdian); ?>
						  </div>
						  <div role="tabpanel" class="tab-pane fade" id="tab-22">
							<?php $this->load->view($publikasi); ?>
						  </div>
						  <div role="tabpanel" class="tab-pane fade" id="tab-23">
							<?php $this->load->view($penghargaan); ?>
						  </div>
						  <div role="tabpanel" class="tab-pane fade" id="tab-24">
							<?php $this->load->view($hki); ?>
						  </div>
                        </div>
                      </div>
                      
                    </div><!-- /.border-bottom-tab -->

                </div><!-- /.col-md-12 -->
              </div><!-- /.row -->
			  
			  
            </div><!-- /.container -->
        </section>
        <!-- lecturer section end -->
		
		