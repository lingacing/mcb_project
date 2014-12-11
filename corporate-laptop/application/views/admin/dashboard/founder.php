<div class="row-fluid">
	<div class="span8">
		<div class="row-float">
			<div class="row-float">
				<div class="row-float">
					<legend>Founder Photo</legend>
				</div>
				<?php if(isset($setting['founder_photo']) && !empty($setting['founder_photo'])){ ?>
					<div class="row-float" style="padding:15px;">
						<img src="<?php echo base_url('uploads/images/'.$setting['founder_photo'])?>" alt="" style="max-width: 180px;"/>
					</div>
				<?php } ?>
			</div><br/>
			<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
				<div class="row-float">
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="img_status" value="founder_photo"/>
					<input type="hidden" name="redirect" value="admin"/>
					<input type="hidden" name="active" value="founder"/>
					<input class="btn" type="submit" value="upload" />
				</div>
			</form>	
		</div>
		
		<div class="row-float">
			<?php 
				$founder_bio = (isset($setting['founder_bio'])) ? $setting['founder_bio'] : '';				
				$founder_email = (isset($setting['founder_email'])) ? $setting['founder_email'] : '';				
				$founder_phone = (isset($setting['founder_phone'])) ? $setting['founder_phone'] : '';				
				$founder_bbm = (isset($setting['founder_bbm'])) ? $setting['founder_bbm'] : '';				
				$founder_twitter = (isset($setting['founder_twitter'])) ? $setting['founder_twitter'] : '';				
				$founder_facebook = (isset($setting['founder_facebook'])) ? $setting['founder_facebook'] : '';				
				$founder_name = (isset($setting['founder_name'])) ? $setting['founder_name'] : '';				
			?>
			<?php echo form_open('admin/save_option'); ?>
				<fieldset>
					<legend>Founder Info</legend>
					<div class="row-float">
						<label>Founder Bio</label>
						<textarea name="founder_bio" class="input-block-level"><?php echo $founder_bio; ?></textarea>
					</div>
					<div class="row-float">
						<label>Founder Contact</label>
					</div>
					<div class="form-horizontal">
						<div class="control-group">
							<label class="control-label" for="founder_name">Name</label>
							<div class="controls">
								<input type="text" id="founder_name" name="founder_name" value="<?php echo $founder_name; ?>" class="input-block-level">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="founder_email">Email</label>
							<div class="controls">
								<input type="text" id="founder_email" name="founder_email" value="<?php echo $founder_email; ?>" class="input-block-level">
							</div>
						</div>
						
						<div class="control-group">
							<label class="control-label" for="founder_phone">Phone</label>
							<div class="controls">
								<input type="text" id="founder_phone" name="founder_phone" value="<?php echo $founder_phone; ?>" class="input-block-level">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="founder_bbm">BBM</label>
							<div class="controls">
								<input type="text" id="founder_bbm" name="founder_bbm" value="<?php echo $founder_bbm; ?>" class="input-block-level">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="founder_twitter">Twitter</label>
							<div class="controls">
								<input type="text" id="founder_twitter" name="founder_twitter" value="<?php echo $founder_twitter; ?>" class="input-block-level">
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="founder_facebook">Facebook</label>
							<div class="controls">
								<input type="text" id="founder_facebook" name="founder_facebook" value="<?php echo $founder_facebook; ?>" class="input-block-level">
							</div>
						</div>
						
					</div>
					<div class="well" style="border-radius: 0px; margin-top: 20px;">
						<div class="row-float">
							<input type="hidden" name="redirect" value="admin"/>
							<input type="hidden" name="active" value="founder"/>
							<button type="submit" class="btn">Submit</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>
</div>