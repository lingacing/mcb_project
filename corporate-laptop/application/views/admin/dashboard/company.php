<div class="row-fluid">
	<div class="span8">
		<?php  
			$company_map = (isset($setting['company_map'])) ? $setting['company_map'] : '';
			$company_address = (isset($setting['company_address'])) ? $setting['company_address'] : '';
			$company_phone = (isset($setting['company_phone'])) ? $setting['company_phone'] : '';
			$company_fax = (isset($setting['company_fax'])) ? $setting['company_fax'] : '';
			$company_about = (isset($setting['company_about'])) ? $setting['company_about'] : '';
			$company_email = (isset($setting['company_email'])) ? $setting['company_email'] : '';
			$company_facebook = (isset($setting['company_facebook'])) ? $setting['company_facebook'] : '';
			$company_twitter = (isset($setting['company_twitter'])) ? $setting['company_twitter'] : '';
			$company_gplus = (isset($setting['company_gplus'])) ? $setting['company_gplus'] : '';
			$company_linkedin = (isset($setting['company_linkedin'])) ? $setting['company_linkedin'] : '';
			$company_pinterest = (isset($setting['company_pinterest'])) ? $setting['company_pinterest'] : '';
		?>
		<?php echo form_open('admin/save_option'); ?>
			<fieldset>
				<legend>Company Info</legend>
				<div class="row-float">
					<label>About</label>
					<textarea name="company_about" class="input-block-level" rows="7"><?php echo $company_about; ?></textarea>
				</div>
				<div class="row-float">
					<label>Map Address</label>
					<textarea name="company_map" class="input-block-level" rows="5"><?php echo $company_map; ?></textarea>
					<p class="muted">Copy map code from http://map.google.com</p>
				</div>
				<div class="row-float">
					<label>Address</label>
					<textarea name="company_address" class="input-block-level"><?php echo $company_address; ?></textarea>
				</div>
				<div class="form-horizontal">
					<div class="control-group">
						<label class="control-label" for="company_phone">Phone</label>
						<div class="controls">
							<input type="text" id="company_phone" name="company_phone" value="<?php echo $company_phone; ?>" class="input-block-level">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="company_fax">FAX</label>
						<div class="controls">
							<input type="text" id="company_fax" name="company_fax" value="<?php echo $company_fax; ?>" class="input-block-level">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="company_phone">Email</label>
						<div class="controls">
							<input type="text" id="company_email" name="company_email" value="<?php echo $company_email; ?>" class="input-block-level">
						</div>
					</div>
					<p><strong>Social Media</strong></p>
					<div class="control-group">
						<label class="control-label">Facebook</label>
						<div class="controls">
							<input type="text" name="company_facebook" value="<?php echo $company_facebook; ?>" class="input-block-level">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Twitter</label>
						<div class="controls">
							<input type="text" name="company_twitter" value="<?php echo $company_twitter; ?>" class="input-block-level">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Google +</label>
						<div class="controls">
							<input type="text" name="company_gplus" value="<?php echo $company_gplus; ?>" class="input-block-level">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Linkedin</label>
						<div class="controls">
							<input type="text" name="company_linkedin" value="<?php echo $company_linkedin; ?>" class="input-block-level">
						</div>
					</div>
					<div class="control-group">
						<label class="control-label">Pinterest</label>
						<div class="controls">
							<input type="text" name="company_pinterest" value="<?php echo $company_pinterest; ?>" class="input-block-level">
						</div>
					</div>
					
					<p class="muted">Note : Dont forget add http://</p>
				</div>
				<div class="well" style="border-radius: 0px; margin-top: 20px;">
					<div class="row-float">
						<input type="hidden" name="redirect" value="admin"/>
						<input type="hidden" name="active" value="company"/>
						<button type="submit" class="btn">Submit</button>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
</div>