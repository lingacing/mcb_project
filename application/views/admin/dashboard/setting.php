<div class="row-fluid">
	<div class="span6">
		<div class="row-float">
			<div class="row-float">
				<div class="row-float">
					Logo
				</div>
				<div class="row-float" style="padding:15px;text-align:center">
					<img src="<?php echo base_url('uploads/images/'.$setting['site_logo'])?>" alt=""/>
				</div>
			</div><br/>
			<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
				<div class="row-float">
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="img_status" value="site_logo"/>
					<input type="hidden" name="redirect" value="admin"/>
					<input type="hidden" name="active" value="setting"/>
					<input class="btn" type="submit" value="upload" />
				</div>
			</form>	
		</div>
		<div class="row-float">
			<div class="row-float">
				<div class="row-float">
					Logo
				</div>
				<div class="row-float" style="padding:15px;text-align:center">
					<img src="<?php echo base_url('uploads/images/'.$setting['site_logo'])?>" alt=""/>
				</div>
			</div><br/>
			<?php echo form_open_multipart('upload/do_upload','class="form-inline row-float"');?>
				<div class="row-float">
					<input type="file" name="userfile" size="20" />
					<input type="hidden" name="img_status" value="site_logo_hover"/>
					<input type="hidden" name="redirect" value="admin"/>
					<input type="hidden" name="active" value="setting"/>
					<input class="btn" type="submit" value="upload" />
				</div>
			</form>	
		</div>
		
	</div>
	<div class="span7">
	
	</div>
	<div class="clear"></div>
</div>