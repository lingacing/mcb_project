<div class="row-fluid" id="contact-content">
	<div class="span8">
		<div class="accordion" id="accordion2">
			<?php if($contact){ ?>
				<?php foreach($contact as $c){ ?>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#contact-<?php echo $c->contact_id  ?>">
								<?php echo date('d M, Y', strtotime($c->contact_date )) ?>
								<span class="subject"><?php echo $c->contact_subject  ?></span>
							</a>
						</div>
						<div id="contact-<?php echo $c->contact_id  ?>" class="accordion-body collapse">
							<div class="accordion-inner">
								<dl class="dl-horizontal">
									<dt>Name</dt>
									<dd><?php echo $c->contact_name  ?></dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Email</dt>
									<dd><?php echo $c->contact_email  ?></dd>
								</dl>
								<dl class="dl-horizontal">
									<dt>Message</dt>
									<dd><?php echo str_replace(PHP_EOL,'<br/>',$c->contact_message) ?></dd>
								</dl>
								
							</div>
						</div>
					</div>
				<?php } ?>
				
				<div class="pagination">
					<ul><?php echo $pagination; ?></ul>
				</div>
			<?php } else { ?>
				No Contact
			<?php } ?>
		</div>
	</div>
</div>