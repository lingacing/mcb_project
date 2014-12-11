<div class="row-fluid">
				<div class="span8">
					<div class="row-float">
						<div class="row-float">
							<div class="row-float">
								<legend>Logo Setup</legend>
							</div>
							<div class="row-float" style="padding:15px;">
								<img src="<?php echo base_url('uploads/images/'.$setting['home_page_logo'])?>" alt=""/>
							</div>
						</div><br/>
						<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
							<div class="row-float">
								<input type="file" name="userfile" size="20" />
								<input type="hidden" name="img_status" value="home_page_logo"/>
								<input type="hidden" name="redirect" value="admin"/>
								<input type="hidden" name="active" value="home"/>
								<input class="btn" type="submit" value="upload" />
							</div>
						</form>	
					</div>
					<div class="row-float">
						<?php 
							$site_name = '';
							$site_description = '';

							if(isset($setting['site_name'])) $site_name = $setting['site_name'];
							if(isset($setting['site_description'])) $site_description = $setting['site_description'];
							
						?>
						<?php echo form_open('admin/save_option'); ?>
						  <fieldset>
							<legend>Site Setting</legend>
							<div class="row-float">
								<label>Site Name</label>
								<input type="text" name="site_name" value="<?php echo $site_name;?>" class="input-block-level">
							</div>
							<div class="row-float">
								<label>Site Description</label>
								<textarea name="site_description" class="input-block-level"><?php echo $site_description; ?></textarea>
							</div>
							
							<div class="well" style="border-radius: 0px; margin-top: 20px;">
								<div class="row-float">
									<input type="hidden" name="redirect" value="admin"/>
									<input type="hidden" name="active" value="home"/>
									<button type="submit" class="btn">Submit</button>
								</div>
							</div>
						  </fieldset>
						</form>
					</div>
				</div>
				<div class="span7">
				
				</div>
				<div class="clear"></div>
			</div>