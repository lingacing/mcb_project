<div class="row-fluid">
	<div class="form-actions">
		<a href="<?php echo base_url('admin/create_article')?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Create Article</a>
	</div>
</div>
<div class="row-fluid">
	<div class="btn-group post-menu">
		<a rel="tooltip" title="Article Publish" class="btn" href="<?php echo base_url('admin/article')?>"><i class="icon-check"></i></a>
		<a rel="tooltip" title="Article Draft" class="btn" href="<?php echo base_url('admin/article_status/draft')?>"><i class="icon-minus-sign"></i></a>
		<a rel="tooltip" title="Article Trash" class="btn" href="<?php echo base_url('admin/article_status/trash')?>"><i class="icon-trash"></i></a>
	</div>
</div>
<br/>
<div class="row-fluid">
	<div class="accordion post" id="accordion2">
		<?php 
		$i=0;
		foreach($post as $r){?>
		  <div class="accordion-group">
			<div class="accordion-heading">
				<input type="checkbox" class="post-check pull-left" value="<?php echo $r->article_id; ?>"/>
			  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo $i;?>">
				<?php echo $r->article_title; ?>
			  </a>
			</div>
			<div id="collapse-<?php echo $i;?>" class="accordion-body collapse in">
			  <div class="accordion-inner action">
				<ul class="inline">
					<li><?php echo $r->username; ?></li>
					<li><a rel="tooltip" title="Edit Article" href="<?php echo base_url('admin/edit_article/'.$r->article_id);?>">edit</a></li>
					<?php if($r->article_status == 'publish'){?>
						<li><a rel="tooltip" title="Set Draft" href="<?php echo base_url('admin/article_set/draft/'.$r->article_id);?>">draft</a></li>
					<?php }elseif($r->article_status == 'draft'){ ?>
						<li><a rel="tooltip" title="Set Draft" href="<?php echo base_url('admin/article_set/publish/'.$r->article_id);?>">publish</a></li>
					<?php } ?>
					<?php if($r->article_status == 'trash'){?>
						<li><a rel="tooltip" title="Delete" href="<?php echo base_url('admin/article_set/publish/'.$r->article_id);?>">restore</a></li>
					<?php }else{?>
						<li><a rel="tooltip" title="Delete" href="<?php echo base_url('admin/article_set/trash/'.$r->article_id);?>">trash</a></li>
					<?php }?>
				</ul>
			  </div>
			</div>
		  </div>
		<?php 
			$i++;
		} ?>
	</div>
</div>
<div class="row-fluid">
	<div class="pagination">
		<ul>
			<?php echo $pagination; ?>
		</ul>
	</div>
</div>