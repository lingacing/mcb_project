<?php 
	if(isset($error)){?>
	<div class="alert alert-error">
	  <button type="button" class="close" data-dismiss="alert">&times;</button>
	  <strong>Oh No!</strong> <?php echo $error;?>
	</div>
<?php }?>

<?php
	if(isset($error)){
		$title =  set_value('title');
		$article =  set_value('article');
		$meta_title =  set_value('meta_title');
		$meta_keyword =  set_value('meta_keyword');
		$meta_description =  set_value('meta_description');
		$category_val =  set_value('category');	
		$tag_val =  set_value('tag');
		$sub_tag_val =  set_value('sub-tag');
	}elseif(isset($post)){
		$title = $post->article_title;
		$article = $post->article_summary;
		$meta_title = $post->article_meta_title;
		$meta_keyword = $post->article_meta_keyword;
		$meta_description = $post->article_meta_description;
		$category_val = $post->article_category;	
	}else{
		$title = '';
		$article = '';
		$meta_title = '';
		$meta_keyword = '';
		$meta_description = '';
		$category_val = '';	
		$tag_val = '';
		$sub_tag_val = '';
	}
?>
<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
<?php echo form_open_multipart('','');?>
	<div class="row-fluid">
		<div class="form-actions form-inline">
			<input name="title" type="text" class="input-xxlarge" placeholder="Title" value="<?php echo $title; ?>">
			<div class="btn-group">
				<button class="btn btn-primary" type="submit"><i class="icon-file"></i> Save</button>
				<button class="btn" type="submit">Draft</button>
				<button class="btn" type="submit">Cancel</button>
			</div>
			<?php echo form_error('title', '<div class="help-block error-submit">', '</div>'); ?>
		</div>
	</div>
	<div class="row-fluid">
		<div class="span9">
			<div class="row-fluid">
				<textarea class="input-block-level" name="article" id="" cols="30" rows="10"><?php echo $article; ?></textarea>
				<script>
					CKEDITOR.replace( 'article',{
						filebrowserImageBrowseUrl : '<?php echo base_url();?>image/browse/',
						filebrowserImageUploadUrl : '<?php echo base_url();?>image/upload/',
						height:"300", 
						
					} );
					CKEDITOR.on( 'dialogDefinition', function( ev )
					{
						var dialogName = ev.data.name;
						var dialogDefinition = ev.data.definition;
						if ( dialogName == 'image' )
						{
							dialogDefinition.removeContents( 'advanced' );
							dialogDefinition.removeContents( 'Link' );
						}
					});
				</script>
				<?php echo form_error('article', '<div class="help-block error-submit">', '</div>'); ?>
			</div>
			<br/>
			<div class="row-fluid">
				<div class="form-actions form-horizontal seo">
					<legend>SEO</legend>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Meta Title</label>
						<div class="controls">
							<input name="meta_title" class="input-block-level" type="text" id="inputEmail" placeholder="Meta Title" value="<?php echo $meta_title; ?>">
							<?php echo form_error('meta_title', '<div class="help-block error-submit">', '</div>'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Meta Keyword</label>
						<div class="controls">
							<input name="meta_keyword" class="input-block-level" type="text" id="inputEmail" placeholder="Title" value="<?php echo $meta_keyword; ?>">
							<?php echo form_error('meta_keyword', '<div class="help-block error-submit">', '</div>'); ?>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Meta Description</label>
						<div class="controls">
							<textarea name="meta_description" class="input-block-level" id="" rows="3"><?php echo $meta_description; ?></textarea>
							<?php echo form_error('meta_description', '<div class="help-block error-submit">', '</div>'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="span3">
			<div class="form-actions">
				<div class="row-fluid">
					Category <br/><br/>
				</div>
				<div class="row-fluid">
					<select name="category" id="category" class="span12">
						<option value="">- Category -</option>
						<?php foreach($category as $c){?>
							<option <?php if($c->category_id == $category_val){ echo 'selected="selected"'; }?> value="<?php echo $c->category_id;?>"><?php echo $c->category;?></option>
						<?php }?>
					</select>
					<?php echo form_error('category', '<div class="help-block error-submit">', '</div>'); ?>
				</div>
				
			</div>
			<div class="form-actions form-inline">
				<div class="row-fluid">
					Post Thumbnail <br/><br/>
				</div>
				<?php if(isset($post) && !empty($post->article_image)){ ?>
					<div class="row-fluid">
						<center>
						<?php  
							$image = base_url('images/'.$post->article_image);
						?>
						<img class="media-object" src="<?php echo base_url('uploads/images/th.php?src='.$image.'&w=150&h=150') ?>">
						</center>
					</div>
					<br>
				<?php } ?>
				<div class="row-fluid">
					<input type="file" name="userfile" size="20" class="input-small" style="max-width:100%;"/>
					<?php if(isset($upload_error)){?>
						<div class="help-block error-submit"><?php echo  $upload_error; ?></div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</form>