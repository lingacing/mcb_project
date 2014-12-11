<div class="widget">
	<h3 class="widget-title">
		<div class="widget-icon"><i class="icon-group"></i></div>
		Founder
	</h3>
	<div class="widget-content founder-content">
		<div class="founder-image">
			<span class="img-circle">
				<img src="<?php echo base_url('uploads/images/'.$setting['founder_photo']) ?>" alt="<?php echo $setting['founder_name'] ?>">
			</span>
		</div>
		<div class="founder-bio">
			<h5 class="founder-name"><?php echo $setting['founder_name'] ?></h5>
			<p><?php echo $setting['founder_bio'] ?></p>
			<ul class="unstyled founder-meta">
				<li class="email">
					<span class="founder-icon"><i class="icon-envelope"></i></span>
					<?php echo $setting['founder_email'] ?>
				</li>
				<li class="phone">
					<span class="founder-icon"><i class="icon-mobile-phone"></i></span>
					<?php echo $setting['founder_phone'] ?>
				</li>
				<li class="bb">
					<span class="founder-icon"><i class="icon-comments"></i></span>
					BBM : <?php echo $setting['founder_bbm'] ?>
				</li>
				<li class="facebook">
					<span class="founder-icon"><i class="icon-facebook-sign"></i></span>
					<?php echo $setting['founder_facebook'] ?>
				</li>
				<li class="twitter">
					<span class="founder-icon"><i class="icon-twitter"></i></span>
					<?php echo $setting['founder_twitter'] ?>
				</li>
				
				
			</ul>
		</div>
	</div>
</div>