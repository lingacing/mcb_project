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
		$page_content =  set_value('page_content');
		$page_order =  set_value('page_order');
		$meta_title =  set_value('meta_title');
		$meta_keyword =  set_value('meta_keyword');
		$meta_description =  set_value('meta_description');
		$page_width =  set_value('page_width');
		$page_float =  set_value('page_float');
		$page_summary =  set_value('page_summary');
		$page_template =  set_value('page_template');
		$page_award =  set_value('page_award');
	}elseif(isset($page)){
		$title = $page->page_title;
		$page_content = entities_to_ascii($page->page_content);
		$page_order = $page->page_order;
		$meta_title = $page->meta_title;
		$meta_keyword = $page->meta_keyword;
		$meta_description = $page->meta_description;
		$page_width = $page->page_width;
		$page_float = $page->page_float;
		$page_summary = $page->page_summary;
		$page_template = $page->page_template;
		$page_award = $page->page_award;
	}else{
		$title = '';
		$page_content = '';
		$page_order = '';
		$meta_title = '';
		$meta_keyword = '';
		$meta_description = '';
		$page_width = 'span6';
		$page_float = 'pull-left';
		$page_summary = 'page_summary';
		$page_template = 'page';
		$page_award = '';
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
			<?php if($page_type == 'associates'){?>
			<div class="row-fluid">
				Gunakan Foto dengan ukuran persegi. maksimal 200px x 200px
				<textarea class="input-block-level" name="page_summary" id="" cols="30" rows="10"><?php echo $page_summary; ?></textarea>
				<script>
					CKEDITOR.replace( 'page_summary',{
						filebrowserImageBrowseUrl : '<?php echo base_url();?>image/browse/',
						filebrowserImageUploadUrl : '<?php echo base_url();?>image/upload/',
						height:"150", 
						
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
				<?php echo form_error('page_content', '<div class="help-block error-submit">', '</div>'); ?>
			</div>
			<br/>
			<?php } ?>
			<div class="row-fluid">
				<textarea class="input-block-level" name="page_content" id="" cols="30" rows="10"><?php echo $page_content; ?></textarea>
				<script>
					CKEDITOR.replace( 'page_content',{
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
				<?php echo form_error('page_content', '<div class="help-block error-submit">', '</div>'); ?>
			</div>
			<br/>
			<?php if($page_type == 'our_people'){?>
			<div class="row-fluid">
				<legend>Award</legend>
				<textarea class="input-block-level" name="page_award" id="" cols="30" rows="10"><?php echo $page_award; ?></textarea>
				<script>
					CKEDITOR.replace( 'page_award',{
						filebrowserImageBrowseUrl : '<?php echo base_url();?>image/browse/',
						filebrowserImageUploadUrl : '<?php echo base_url();?>image/upload/',
						height:"200", 
						
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
				<?php echo form_error('page_award', '<div class="help-block error-submit">', '</div>'); ?>
			</div>
			<br/>
			<?php } ?>
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
			
		</div>
	</div>
</form>