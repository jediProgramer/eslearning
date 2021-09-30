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



        <!-- blog section start -->
        <section class="blog-section section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                      <div class="posts-content default-blog">
						<?php
							foreach($datapages as $dp)
							{
								
						?>	
                        <article class="post-wrapper">

                          <div class="entry-content">
                            <p><?php echo $dp["pages"]; ?></p>
                          </div><!-- .entry-content -->


                        </article><!-- /.post-wrapper -->
						<?php
							}
						?>


                      </div><!-- /.posts-content -->
                    </div><!-- /.col-md-8 -->

                    <div class="col-md-4">
                      <div class="tt-sidebar-wrapper" role="complementary">


                          <div  class="widget widget_tt_popular_post">
                            <div class="tt-popular-post border-bottom-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tt-popular-post-tab1" data-toggle="tab" aria-expanded="true"><?php echo lang('lastest_news');?></a>
                                    </li>
                                    <li class="">
                                        <a href="#tt-popular-post-tab2" data-toggle="tab" aria-expanded="false"><?php echo lang('lastest_video');?></a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <!-- latest post tab -->
                                    <div id="tt-popular-post-tab1" class="tab-pane fade active in">
									<?php
									$querynewsl = $this->db->query("SELECT * FROM ".$this->db->dbprefix('news')." ORDER BY date DESC  LIMIT 10");
									$datanewsl=$querynewsl->result();
									foreach($datanewsl as $dnl)
									{
									?>
                                      <div class="media">
                                        <a class="media-left" href="<?php echo base_url()?>news/detail/<?php echo $dnl->idnews;?>">
                                          <img src="<?php echo base_url()?>assets/files/news/<?php echo $dnl->image; ?>" alt="">
                                        </a>

                                        <div class="media-body">
                                          <h4><a href="<?php echo base_url()?>news/detail/<?php echo $dnl->idnews;?>"><?php echo $dnl->title;?></a></h4>
                                        </div> <!-- /.media-body -->
                                      </div> <!-- /.media -->
									<?php
									}
									?>	
                                    </div>

                                    <!-- popular post tab-->
                                    <div id="tt-popular-post-tab2" class="tab-pane fade">

                                      <?php
										$queryvideopop = $this->db->query("SELECT * FROM ".$this->db->dbprefix('video')." ORDER BY date DESC  LIMIT 10");
										$datavideopop=$queryvideopop->result();
										foreach($datavideopop as $dnp)
										{
									   ?>
                                      <div class="media">
                                        <a class="media-left popup-video" href="https://www.youtube.com/watch?v=<?php echo $dnp->video;?>">
                                          <img src="<?php echo base_url()?>assets/files/video/<?php echo $dnp->image; ?>" alt="">
                                        </a>

                                        <div class="media-body">
                                          <h4><a class="external-link popup-video" href="https://www.youtube.com/watch?v=<?php echo $dnp->video;?>"><?php echo $dnp->title;?></a></h4>
                                        </div> <!-- /.media-body -->
                                      </div> <!-- /.media -->
									<?php
										}
									?>	
                                    </div>
                                </div><!-- /.tab-content -->
                            </div><!-- /.tt-popular-post -->
                          </div><!-- /.widget_tt_popular_post -->
						  
							<?php
								//$querytwitter = $this->db->query("SELECT * FROM ".$this->db->dbprefix('twitter')." ORDER BY RAND () LIMIT 1  ");
								//$datatwitter=$querytwitter->result();
								//foreach($datatwitter as $dt)
								//{
							?>
								<div class="widget widget_tt_twitter">
								<i class="fa fa-twitter"></i>
								<div id="twitter-gallery-feed">
								<div class="twitter-widget"><?php //echo $dt->twitter; ?></div>
								</div>
								<!-- this div is required for carousel injected by javascript -->
								<!-- html code injected via javascript -->
								</div><!-- /.widget_tt_twitter -->
							<?php
								//}
							?>

							<?php
								//$queryinstagram = $this->db->query("SELECT * FROM ".$this->db->dbprefix('instagram')." ORDER BY RAND () LIMIT 1  ");
								//$datainstagram=$queryinstagram->result();
								//foreach($datainstagram as $di)
								//{
							?>
								<div class="widget widget_tt_instafeed">
								<i class="fa fa-instagram"></i>
								<h3 class="widget-title">Instagram Photos</h3>
								<div id="myinstafeed">
								   <?php //echo $dt->instagram; ?>
								</div> 
								</div><!-- /.widget_tt_instafeed -->
							<?php
								//}
							?>

                      </div><!-- /.tt-sidebar-wrapper -->
                    </div><!-- /.col-md-4 -->

                  </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        <!-- blog section end -->