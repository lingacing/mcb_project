<?php  
	$slideshow_link = '';
	$slideshow_title = '';
	$slideshow_description = '';
	if(isset($slideshow)){
		$slideshow_link = $slideshow->slideshow_link;
		$slideshow_title = $slideshow->slideshow_title;
		$slideshow_description = $slideshow->slideshow_description;
	}
?>
<div class="row-fluid">
	<div class="span7">
		<?php echo form_open_multipart('','class="form-horizontal"');?>
			<?php if(isset($slideshow)){ ?>
			<div class="control-group">
				<?php  
					$slideshow_image = base_url('uploads/images/'.$slideshow->slideshow_image);
				?>
				<img class="media-object" src="<?php echo $slideshow_image ?>">
			</div>
			<?php } ?>
			<div class="control-group">
				<label for="username">Select Image File</label>
				<input type="file" name="userfile" size="20" class="input-block-level"/>
			</div>
			<div class="control-group">
				<label for="username">Slideshow Link</label>
				<input type="text" name="slideshow_link" value="<?php echo $slideshow_link ?>" class="input-block-level">
			</div>
			<div class="control-group">
				<label for="username">Slideshow Title</label>
				<input type="text" name="slideshow_title" value="<?php echo $slideshow_title ?>" class="input-block-level">
			</div>
			<div class="control-group">
				<label for="username">Slideshow Title</label>
				<textarea name="slideshow_description" id=""  class="input-block-level" rows="4"><?php echo $slideshow_description; ?></textarea>
			</div>
			<div class="well" style="border-radius: 0px;">
				<button class="btn btn-primary" type="submit">Save</button>
			</div>
		</form>
	</div>
</div>

<br>
<br>
<br>