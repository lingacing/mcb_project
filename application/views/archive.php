<?php include('header.php') ?>
<div id="content">
	<br>
	<br>
	<div class="wrapper-inner">
		<div class="row-fluid">
			<div class="span8">
				<header class="page-header">
					<h1 class="page-title"><?php echo $page_title ?></h1>
					<?php 
						if(isset($page_description) && ! empty($page_description)) 
							echo '<p class="page-description">'.$page_description.'</p>'
					?>
				</header>
				<div class="widget">
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
							<?php echo $pagination; ?>
						<?php } else { ?>
							No Post
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="span4">
				<div id="sidebar">
					<?php include('widget-founder.php') ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>