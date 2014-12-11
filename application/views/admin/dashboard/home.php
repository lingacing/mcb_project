<div class="row-float">
	<div class="span5">
		<div class="row-float">
			<div class="row-float">
				<div class="row-float">
					Logo
				</div>
				<div class="row-float">
					<img src="<?php echo base_url('uploads/images/'.$setting['home_logo'])?>" alt=""/>
				</div>
			</div><br/>
			<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
				<div class="row-float">
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="img_status" value="home_logo"/>
					<input type="hidden" name="redirect" value="admin"/>
					<input type="hidden" name="active" value="landing_page"/>
					<input class="btn" type="submit" value="upload" />
				</div>
			</form>	
		</div><br/>
		<div class="row-float">
			<div class="row-float">
				<div class="row-float">
					Logo Hover
				</div>
				<div class="row-float">
					<img src="<?php echo base_url('uploads/images/'.$setting['home_logo_hover'])?>" alt=""/>
				</div>
			</div><br/>
			<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
				<div class="row-float">
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="img_status" value="home_logo_hover"/>
					<input type="hidden" name="redirect" value="admin"/>
					<input type="hidden" name="active" value="landing_page"/>
					<input class="btn" type="submit" value="upload" />
				</div>
			</form>	
		</div><br/>
		
		<div class="row-float">
			<div class="row-float">
				<div class="row-float">
					Landing Page Background
				</div>
				<div class="row-float">
					<img src="<?php echo base_url('uploads/images/th.php?src='.base_url('uploads/images/'.$setting['home_background']).'&w=200&h=100')?>" alt=""/>
				</div>
			</div><br/>
			<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
				<div class="row-float">
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="img_status" value="home_background"/>
					<input type="hidden" name="redirect" value="admin"/>
					<input type="hidden" name="active" value="landing_page"/>
					<input class="btn" type="submit" value="upload" />
				</div>
			</form>	
		</div><br/>
		<div class="row-float">
			<div class="row-float">
				<div class="row-float">
					Landing Page Background
				</div>
				<div class="row-float">
					<img src="<?php echo base_url('uploads/images/th.php?src='.base_url('uploads/images/'.$setting['home_background_hover']).'&w=200&h=100')?>" alt=""/>
				</div>
			</div><br/>
			<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
				<div class="row-float">
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="img_status" value="home_background_hover"/>
					<input type="hidden" name="redirect" value="admin"/>
					<input type="hidden" name="active" value="landing_page"/>
					<input class="btn" type="submit" value="upload" />
				</div>
			</form>	
		</div>
	</div>
	<div class="span7">
		<?php 
			$landing_title = '';
			$landing_description = '';
			if(isset($setting['landing_title'])) $landing_title = $setting['landing_title'];
			if(isset($setting['landing_description'])) $landing_description = $setting['landing_description'];
		?>
		<?php echo form_open('admin/save_option'); ?>
		  <fieldset>
			<legend>Landing Setting</legend>
			<div class="row-float">
				<label>Title</label>
				<input type="text" name="landing_title" value="<?php echo $landing_title;?>" class="input-xlarge">
			</div>
			<div class="row-float">
				<label>Description</label>
				<textarea name="landing_description" class="input-xlarge"><?php echo $landing_description; ?></textarea>
			</div>
			
			<input type="hidden" name="redirect" value="admin"/>
			<input type="hidden" name="active" value="landing_page"/>
			<button type="submit" class="btn">Submit</button>
		  </fieldset>
		</form>
	</div>
</div>