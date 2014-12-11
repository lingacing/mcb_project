<?php 
	$category = $allcategory->category;
	$category_slug = $allcategory->category_slug;
	$category_description = $allcategory->category_description;
	$category_meta_title = $allcategory->category_meta_title;
	$category_meta_keyword = $allcategory->category_meta_keyword;
?>

<div class="row-fluid">
	<div class="span5 category">
		<h4>Add Category</h4>
		<?php echo form_open();?>
			<label for="">Category</label>
			<input class="input-block-level" name="category" type="text" value="<?php echo $category?>"/>
			<?php echo form_error('category', '<div class="help-block error-submit">', '</div>'); ?>
			<label for="">Category Slug</label>
			<input class="input-block-level" name="category_slug" type="text" value="<?php echo $category_slug?>"/>
			<?php echo form_error('category_slug', '<div class="help-block error-submit">', '</div>'); ?>
			<label for="">Description</label>
			<textarea class="input-block-level" name="category_description" id="" rows="2"><?php echo $category_description?></textarea>
			<?php echo form_error('category_description', '<div class="help-block error-submit">', '</div>'); ?>
			<div class="form-horizontal">
				<div class="control-group">
					<label class="control-label">Meta Title</label>
					<div class="controls">
					  <input name="category_meta_title" class="input-block-level" type="text" value="<?php echo $category_meta_title?>">
					  <?php echo form_error('category_meta_title', '<div class="help-block error-submit">', '</div>'); ?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label">Meta Keyword</label>
					<div class="controls">
					  <input name="category_meta_keyword" class="input-block-level" type="text" value="<?php echo $category_meta_keyword?>">
					  <?php echo form_error('category_meta_keyword', '<div class="help-block error-submit">', '</div>'); ?>
					</div>
				</div>
			</div>
			<div class="form-actions">
			  <button type="submit" class="btn btn-warning">Save Category</button>
			  <button type="button" class="btn">Cancel</button>
			</div>
		</form>
	</div>
</div>