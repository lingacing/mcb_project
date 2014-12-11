<div class="widget">
	<h3 class="widget-title">
		<div class="widget-icon"><i class="icon-file-text"></i></div>
		Other Product
	</h3>
	<div class="widget-content sidebar recent-post">
		<?php if($recent_post){ ?>
			<?php foreach($recent_post as $rp){ ?>
				<div class="media post-item">
					<a class="pull-left post-image" href="<?php echo base_url('read/'.$rp->article_title_slug ) ?>">
						<?php  
							$image = base_url('images/'.$rp->article_image);
						?>
						<img class="media-object" src="<?php echo base_url('uploads/images/th.php?src='.$image.'&w=80&h=80') ?>">
					</a>
					<div class="media-body">
						<div class="post-meta">
							<ul class="inline">
								<li><i class="icon-time"></i> <?php echo date('d F, Y', strtotime($rp->date)) ?></li>
							</ul>
						</div>
						<h4 class="media-heading post-title"><a href="<?php echo base_url('read/'.$rp->article_title_slug ) ?>"><?php echo $rp->article_title ?></a></h4>
						
					</div>
				</div>
			<?php } ?>
		<?php } else { ?>
		No Post
		<?php } ?>
	</div>
</div>