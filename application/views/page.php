<?php include('header.php') ?>
<div id="content">
	<br>
	<br>
	<div class="wrapper-inner">
		<div class="row-fluid">
			<div class="span8">
				<div class="single-post">
					<h1 class="post-title"><?php echo $page->page_title ?></h1>
					<div class="post-meta">
						<ul class="inline">
							<?php 
								$author = (! empty($page->full_name)) ? $page->full_name : $page->username ;
							?>
							<li><i class="icon-user"></i> <?php echo $author ?></li>
							<li><i class="icon-time"></i> <?php echo date('d F, Y', strtotime($page->page_date)) ?></li>
						</ul>
					</div>
					<div class="post-content">
						<?php echo $page->page_content ?>
					</div>
					<div class="post-footer">
						<div class="post-footer-title pull-left">
							<i class="icon-retweet"></i> Share
						</div>
						<div class="sosmed">
							<a class="tool-tip share-btn facebook" rel="noindex, nofollow" title="Share To Google+"  href="javascript:void(0);" onclick="social_share('https://plus.google.com/share?url=<?php echo current_url() ?>')">
								<span class="sosmed-icon"><i class="icon-facebook"></i></span> Facebook
							</a>
						
							<a class="tool-tip share-btn twitter" rel="noindex, nofollow" title="Share To Twitter"  href="javascript:void(0);" onclick="social_share('http://twitter.com/intent/tweet?status=<?php echo $page->page_title ?> <?php current_url() ?>')">
								<span class="sosmed-icon"><i class="icon-twitter"></i></span> Twitter
							</a>
						
							<a class="tool-tip share-btn gplus" rel="noindex, nofollow" title="Share To Facebook"  href="javascript:void(0);" onclick="social_share('http://www.facebook.com/sharer.php?url=<?php current_url() ?>')">
								<span class="sosmed-icon"><i class="icon-google-plus"></i></span> Google +
							</a>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
			</div>
			<div class="span4">
				<div id="sidebar">
					<?php include('widget-other-product.php') ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>