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
						?>	
                        <h2><?php echo $rowt->title;?></h2>
                        <ol class="breadcrumb">
                            <li><a href="<?php echo base_url()?>"><?php echo lang('home');?></a></li>
                            <li class="active"><?php echo $title;?></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <!--page title end-->


		<!--Section lecture start-->
        <section class="section-padding">
            <div class="container">

              <div class="text-center mb-80">
                  <h2 class="section-title"><?php echo lang('lecturer');?></h2>
                  <p class="section-sub"><?php echo lang('lecturer_description');?></p>
              </div>

              <div class="row">
				<?php
					//$querynews = $this->db->query("SELECT * FROM ".$this->db->dbprefix('news')." ORDER BY date DESC");
					//$datanews=$querynews->result();
					foreach($datalecturer as $dl)
					{
						
				?>	
				
				<div class="col-md-3 col-sm-6">
                  <div class="team-wrapper text-center">
                      <div class="team-img">
                          <a href="<?php echo base_url()?>lecturer/detail/<?php echo $dl->idlecturer;?>"><img src="<?php echo base_url()?>assets/files/lecturer/<?php echo $dl->picture;?>" alt="Image" width="260" height="260"></a>
                      </div><!-- /.team-img -->

                      <div class="team-title">
                          <h3><a href="<?php echo base_url()?>lecturer/detail/<?php echo $dl->idlecturer;?>"><?php echo $dl->fullname;?></a></h3>
                          <span><?php echo $dl->jafung;?></span>
                      </div><!-- /.team-title -->

                      <ul class="team-social-links list-inline text-center">
                          <li><a href="tel:<?php echo $dl->phoneno;?>"><i class="fa fa-phone"></i></a></li>
                          <li><a href="mailto:<?php echo $dl->email;?>"><i class="fa fa-envelope-o"></i></a></li>
                      </ul>

                  </div><!-- /.team-wrapper -->
                </div><!-- /.col-md-3 -->
				
				<?php
					}
				?>
              </div><!-- /.row -->
			  
				<?php 
						echo $this->pagination->create_links();
				?>
            </div><!-- /.container -->
        </section>
        <!-- lecturer section end -->