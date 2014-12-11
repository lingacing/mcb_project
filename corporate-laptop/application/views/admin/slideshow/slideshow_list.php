<div class="row-fluid">
	<div class="form-actions">
		<a class="btn btn-primary" href="<?php echo base_url('admin/add_slideshow') ?>"><i class="icon-plus-sign icon-white"></i> Create Slideshow</a>
	</div>
</div>
<div class="row-fluid">
	<div class="span8">
		<?php if($slideshow){ ?>
			<?php foreach($slideshow as $r){ ?>
				<div class="media">
					<a class="pull-left" href="<?php echo base_url('admin/edit_slideshow/'.$r->slideshow_id) ?>">
						<?php  
							$image = base_url('uploads/images/'.$r->slideshow_image);
						?>
						<img class="media-object" src="<?php echo base_url('uploads/images/th.php?src='.$image.'&w=100&h=100') ?>">
					</a>
					<div class="media-body">
					<h4 class="media-heading">
						<?php echo (! empty($r->slideshow_title)) ? $r->slideshow_title : 'No Title'; ?>
					</h4>
					<p> 
						<small>
							<a class="" href="<?php echo base_url('admin/edit_slideshow/'.$r->slideshow_id) ?>">Edit</a> | 
							<a onclick='return confirm("Are you sure to delete?");' href="<?php echo base_url('admin/delete_slideshow/'.$r->slideshow_id) ?>">Delete</a>
						</small>
					</p>
					<p class="muted" style="margin-bottom: 0px;"><small><b>Link</b> : <?php echo (! empty($r->slideshow_link)) ? $r->slideshow_link : 'none'; ?></small></p>
					<p style="line-height: 1;"><small><?php echo (! empty($r->slideshow_description)) ? $r->slideshow_description : 'no description'; ?></small></p>
					</div>
				</div>
			<?php } ?>
		<?php } ?>
	</div>
</div>
<br>
<br>
<br>