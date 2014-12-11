		<footer id="footer">
			<div class="wrapper-inner">
				<div class="row-fluid">
					<div class="span5">
						<div class="widget">
							<h3 class="widget-title">
								<div class="widget-icon"><i class="icon-map-marker"></i></div>
								Location
							</h3>
							<div class="widget-content map">
								<div class="map-location">
									<?php echo $setting['company_map']; ?>
								</div>
								<div class="address"><?php echo  str_replace(PHP_EOL,'<br/>',$setting['company_address']); ?></div>
							</div>
						</div>
					</div>
					<div class="span4">
						<div class="widget">
							<h3 class="widget-title">
								<div class="widget-icon"><i class="icon-building"></i></div>
								About
							</h3>
							<div class="widget-content about">
								<div class="summary">
									<?php echo  str_replace(PHP_EOL,'<br/>',$setting['company_about']); ?>
								</div>
								<ul class="unstyled about-meta">
									<li>
										<span class="info-icon"><i class="icon-phone"></i></span>
										<?php echo $setting['company_phone'] ?>
									</li>
									<li>
										<span class="info-icon"><i class="icon-print"></i></span>
										<?php echo $setting['company_fax'] ?>
									</li>
									<li>
										<span class="info-icon"><i class="icon-envelope"></i></span>
										<?php echo $setting['company_email'] ?>
									</li>
									
								</ul>
							</div>
						</div>
					</div>
					<div class="span3">
						<div class="widget">
							<h3 class="widget-title">
								<div class="widget-icon"><i class="icon-random"></i></div>
								Social Media
							</h3>
							<div class="widget-content sosmed">
								<a href="<?php echo $setting['company_facebook'] ?>" class="facebook">
									<span class="sosmed-icon"><i class="icon-facebook"></i></span> Facebook
								</a>
								<a href="<?php echo $setting['company_linkedin'] ?>" class="linkedin">
									<span class="sosmed-icon"><i class="icon-linkedin"></i></span> Linkedin
								</a>
								<a href="<?php echo $setting['company_twitter'] ?>" class="twitter">
									<span class="sosmed-icon"><i class="icon-twitter"></i></span> Twitter
								</a>
								
								
								<a href="<?php echo $setting['company_pinterest'] ?>" class="pinterest">
									<span class="sosmed-icon"><i class="icon-pinterest"></i></span> Pinterest
								</a>
								<a href="<?php echo $setting['company_gplus'] ?>" class="gplus">
									<span class="sosmed-icon"><i class="icon-google-plus"></i></span> Google +
								</a>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
	
	<script type="text/javascript" src="<?php echo base_url()?>assets/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-collapse.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.flexslider.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/js/custom.js"></script>
</body>
</html>