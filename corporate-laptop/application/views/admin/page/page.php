
<div class="row-fluid">
	<div class="form-actions">
		<a href="<?php echo base_url('admin/create_page/'.$page_type)?>" class="btn btn-primary"><i class="icon-plus-sign icon-white"></i> Create Page</a>
	</div>
</div>
<div class="row-fluid">
	<div class="btn-group post-menu">
		<a rel="tooltip" title="Page Publish" class="btn" href="<?php echo base_url('admin/page')?>"><i class="icon-check"></i></a>
		<a rel="tooltip" title="Page Draft" class="btn" href="<?php echo base_url('admin/page_status/draft')?>"><i class="icon-minus-sign"></i></a>
		<a rel="tooltip" title="Page Trash" class="btn" href="<?php echo base_url('admin/page_status/trash')?>"><i class="icon-trash"></i></a>
	</div>
</div>
<br/>
<div class="row-fluid">
	<div class="accordion post" id="accordion2">
		<?php 
		if($post){
		$i=0;
		foreach($post as $r){?>
		  <div class="accordion-group">
			<div class="accordion-heading">
				<input type="checkbox" class="post-check pull-left" value="<?php echo $r->page_id; ?>"/>
			  <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse-<?php echo $i;?>">
				<?php echo $r->page_title; ?>
			  </a>
			</div>
			<div id="collapse-<?php echo $i;?>" class="accordion-body collapse in">
			  <div class="accordion-inner action">
				<ul class="inline">
					<li>link : <?php echo base_url('page/'.$r->page_slug); ?></li>
					<li><?php echo $r->username; ?></li>
					<li><a rel="tooltip" title="Edit Page" href="<?php echo base_url('admin/edit_page/'.$r->page_id.'/'.$page_type);?>">edit</a></li>
					<li><a onclick='return confirm("Are you sure to delete?");' rel="tooltip" title="Delete" href="<?php echo base_url('admin/page_delete/'.$r->page_id.'/'.$page_type);?>">Delete</a></li>
				</ul>
			  </div>
			</div>
		  </div>
		<?php 
			$i++;
		}
		}else{
		?>
		<div class="row-fluid">
			<center>Not Found</center>
		</div>
		<?php } ?>
	</div>
</div>
<div class="row-fluid">
	<div class="pagination">
		<ul>
			<?php echo $pagination; ?>
		</ul>
	</div>
</div>