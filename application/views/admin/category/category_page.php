<?php 
	if(isset($error)){
		$category = set_value('category');
		$category_slug = set_value('category_slug');
		$category_description = set_value('category_description');
		$category_meta_title = set_value('category_meta_title');
		$category_meta_keyword = set_value('category_meta_keyword');
	
	}else{
		$category = '';
		$category_slug = '';
		$category_description = '';
		$category_meta_title = '';
		$category_meta_keyword = '';
	}
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
	<div class="span7 category_list">
		<h4>Category List</h4>
		<div class="row-fluid">
			<div class="btn-group post-menu">
				<a rel="tooltip" title="Category Publish" class="btn" href="<?php echo base_url('admin/category_status/publish')?>"><i class="icon-check"></i></a>
				<a rel="tooltip" title="Category Draft" class="btn" href="<?php echo base_url('admin/category_status/draft')?>"><i class="icon-minus-sign"></i></a>
				<a rel="tooltip" title="Category Trash" class="btn" href="<?php echo base_url('admin/category_status/trash')?>"><i class="icon-trash"></i></a>
			</div>
		</div>
		<br/>
		<ul class="unstyled">
			<?php foreach($allcategory as $r){?>
				<li>
					<span style="float:left;">
					<input type="checkbox" name="category_id" value="<?php echo $r->category_id; ?>"/>&nbsp;&nbsp;<?php echo $r->category; ?>
					</span>
					<span class="action_category" style="float:left;">
						<ul class="inline">
							<li><a href="<?php echo base_url('admin/category_edit/'.$r->category_id);?>">Edit</a></li>
							<li><a href="<?php echo base_url('admin/category_set/draft/'.$r->category_id);?>">Draft</a></li>
							<li><a href="<?php echo base_url('admin/category_set/trash/'.$r->category_id);?>">Trash</a></li>
						</ul>
					</span>
					<div class="clear"></div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>