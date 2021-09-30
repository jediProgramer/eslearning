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
				<div class="col-md-12">
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
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>
        <!-- blog section end -->