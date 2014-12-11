<style type="text/css">
	.form-horizontal .control-label{
		width:120px;
	}
	.control-group .controls{
		margin-left:130px;
	}
	.form-horizontal .form-actions{
		padding-left:130px;
	}
</style>

<div class="row-fluid">
	<div class="span5">
		<?php 
			if(isset($error)){
				$user_name = set_value('user_name');
				$email = set_value('email');
				$full_name = set_value('full_name');
				$user_level = set_value('user_level');
				$num_post_perday = set_value('num_post_perday');
				$genre =  set_value('genre');
				$site =  set_value('site');
				$about_me =  set_value('about_me');
			}else{
				$user_name = '';
				$email = '';
				$full_name = '';
				$user_level = '';
				$num_post_perday = '';
				$genre = '';
				$site = '';
				$about_me = '';
			}
		?>
		<?php echo form_open_multipart('','class="form-horizontal"');?>
			<div class="control-group">
				<label for="username">Username</label>
				<input  class="input-block-level" value="<?php echo $user_name; ?>" type="text" name="username"/>
				<?php echo form_error('username', '<div class="text-error">', '</div>'); ?>
			</div>
			<div class="control-group">
				<label for="username">Email</label>
				<input  class="input-block-level" value="<?php echo $email; ?>" type="text" name="email"/>
				<?php echo form_error('email', '<div class="text-error">', '</div>'); ?>
			</div>
			<div class="control-group">
				<label for="username">Full Name</label>
				<input  class="input-block-level" value="<?php echo $full_name; ?>" type="text" name="full_name"/>
				<?php echo form_error('full_name', '<div class="text-error">', '</div>'); ?>
			</div>

			<div class="control-group">
				<label  class="control-label" for="username">Genre</label>
				<div class="controls">
					<select name="genre" id="">
						<option value="">Pilih Genre</option>
						<option value="laki-laki" <?php if($genre == 'laki-laki') echo 'selected="selected"';?>>Laki-Laki</option>
						<option value="perempuan" <?php if($genre == 'perempuan') echo 'selected="selected"';?>>Perempuan</option>
					</select>
					<?php echo form_error('genre', '<div class="text-error">', '</div>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label  class="control-label" for="username">User Level</label>
				<div class="controls">
					<select name="user_level" id="">
						<option value="">Pilih Level User</option>
						<option value="top_admin" <?php if($user_level == 'top_admin') echo 'selected="selected"';?>>Admin</option>
						<option value="user" <?php if($user_level == 'user') echo 'selected="selected"';?>>User</option>
						<option value="new_user" <?php if($user_level == 'new_user') echo 'selected="selected"';?>>New</option>
					</select>
					<?php echo form_error('user_level', '<div class="text-error">', '</div>'); ?>
				</div>
			</div>
			<div class="control-group">
				<label for="username">About</label>
				<textarea  class="input-block-level" name="about_me" id="" cols="30" rows="3"><?php echo $about_me; ?></textarea>
				<?php echo form_error('about_me', '<div class="text-error">', '</div>'); ?>
			</div>
			<div class="control-group">
				<label  class="control-label" for="username">Avatar</label>
				<div class="controls">
					<input type="file" name="userfile" size="20" />
					<?php if(isset($image_error)) echo '<div class="text-error">'.$image_error.'</div>'; ?>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="site">Password</label>
				<div class="controls">
					<input type="password" name="password" id="site" value=""/>
					<?php echo form_error('password', '<p class="text-error">', '</p>'); ?>
					<span class="help-block">Kosongkan kolom ini apabila password tidak di rubah</span>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="site">Confirm Password</label>
				<div class="controls">
					<input type="password" name="conf_password" id="site" value=""/>
					<?php echo form_error('conf_password', '<p class="text-error">', '</p>'); ?>
				</div>
			</div>
			
			<div class="form-actions">
			  <button type="submit" class="btn btn-primary">Save changes</button>
			  <a href="<?php echo base_url('admin/user')?>" class="btn">Cancel</a>
			</div>
		</form>
	</div>
</div>