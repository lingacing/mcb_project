		<?php include('header.php'); ?>
		<div id="content">
			<?php if($slideshow){ ?>
				<div id="home-slideshow">
					<div class="flexslider">
						<ul class="slides">
							<?php foreach($slideshow as $ss){ ?>
							<li>
								<img src="<?php echo base_url('uploads/images/'.$ss->slideshow_image) ?>"/>
								<div class="caption">
									<?php if( ! empty($ss->slideshow_title) ){ ?>
										<h2 class="slideshow-title">
											<?php if( empty($ss->slideshow_link) ){ ?>
												<?php echo $ss->slideshow_title ?>
											<?php } else { ?>
												<a href="<?php echo $ss->slideshow_link ?>"><?php echo $ss->slideshow_title ?></a>
											<?php } ?>
										</h2>
									<?php } ?>
									<?php if(! empty($ss->slideshow_description) ){ ?>
										<div class="slideshow-summary">
											<?php echo $ss->slideshow_description ?>
										</div>
									<?php } ?>
								</div>
							</li>
							<?php } ?>
						</ul>
					</div>
				</div>
			<?php } ?>
			
			<div id="home-content">
				<div class="wrapper-inner">
					<div class="row-fluid">
						<div class="span8">
							<div class="widget">
								<h3 class="widget-title">
									<div class="widget-icon"><i class="icon-file-text"></i></div>
									Recent Product
								</h3>
								<div class="widget-content recent-post">
									<?php if($post){ ?>
										<?php foreach($post as $p){ ?>
											<div class="media post-item">
												<a class="pull-left post-image" href="<?php echo base_url('read/'.$p->article_title_slug ) ?>">
													<?php  
														$image = base_url('images/'.$p->article_image);
													?>
													<img class="media-object" src="<?php echo base_url('uploads/images/th.php?src='.$image.'&w=270&h=190') ?>">
												</a>
												<div class="media-body">
													<h4 class="media-heading post-title"><a href="<?php echo base_url('read/'.$p->article_title_slug ) ?>"><?php echo $p->article_title ?></a></h4>
													<div class="post-meta">
														<ul class="inline">
															<?php 
																$author = (! empty($p->full_name)) ? $p->full_name : $p->username ;
															?>
															<li><i class="icon-user"></i> <?php echo $author ?></li>
															<li><i class="icon-time"></i> <?php echo date('d F, Y', strtotime($p->date)) ?></li>
														</ul>
													</div>
													<div class="post-summary">
														<?php echo word_limiter(strip_tags($p->article_summary), 25); ?>
													</div>
												</div>
											</div>
										<?php } ?>
										<div class="row-fluid">
											<a class="show-archive pull-right" href="<?php echo base_url('archive') ?>">Archive <i class="icon-circle-arrow-right"></i></a>
											<div class="clear"></div>
										</div>
									<?php } else { ?>
										No Post
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="span4">
							<?php include('widget-founder.php') ?>
						</div>
					</div>
				</div>
			</div>
		</div>
<?php include('footer.php') ?>