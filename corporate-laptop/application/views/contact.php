<?php include('header.php') ?>
<div id="content">
	<br>
	<br>
	<div class="wrapper-inner">
		<div class="row-fluid">
			<div class="span8">
				<header class="page-header">
					<h1 class="page-title"><i class="icon-info-sign"></i> Contact Us</h1>
				</header>
				<div class="single-post">
					<?php echo form_open('','class="form-horizontal contact" autocomplete="off"') ?>
						<?php if($this->session->flashdata('ok')){ ?>
							<div class="alert alert-success">
								<strong>OK</strong> <?php echo $this->session->flashdata('ok') ?>
							</div>
						<?php } ?>
						<div class="control-group">
							<label class="control-label">Name</label>
							<div class="controls">
								<input type="text" name="contact_name" class="input-block-level" required="required">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Email</label>
							<div class="controls">
								<input type="email" name="contact_email" class="input-block-level"  required="required">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Subject</label>
							<div class="controls">
								<input type="text" name="contact_subject" class="input-block-level"  required="required">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label">Message</label>
							<div class="controls">
								<textarea name="contact_message" class="input-block-level" rows="5"  required="required"></textarea>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" class="btn">Send</button>
							</div>
						</div>
					</form>
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