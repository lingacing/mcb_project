<div class="row-fluid">
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
							<?php if($r->category_status == 'publish'){ ?>
								<li><a href="<?php echo base_url('admin/category_set/draft/'.$r->category_id);?>">Draft</a></li>
							<?php }elseif($r->category_status == 'draft'){ ?>
								<li><a href="<?php echo base_url('admin/category_set/publish/'.$r->category_id);?>">Publish</a></li>
							<?php } ?>
							
							<?php if($r->category_status == 'publish'){?>
								<li><a href="<?php echo base_url('admin/category_set/trash/'.$r->category_id);?>">Trash</a></li>
							<?php }elseif($r->category_status == 'trash'){ ?>
								<li><a href="<?php echo base_url('admin/category_set/publish/'.$r->category_id);?>">Restore</a></li>
								<li><a onclick='return confirm("Are you sure to delete?");' href="<?php echo base_url('admin/category_delete/'.$r->category_id);?>">Delete</a></li>
							<?php } ?>
						</ul>
					</span>
					<div class="clear"></div>
				</li>
			<?php } ?>
		</ul>
	</div>
</div>