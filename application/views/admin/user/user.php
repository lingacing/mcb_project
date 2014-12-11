<div class="row-fluid">
	<div class="form-actions">
		<a href="<?php echo base_url('admin/add_user')?>" class="btn btn-warning"><i class="icon-user icon-white"></i> Add User</a>
	</div>
</div>

<div class="row-fluid">
	<div class="span6">
		<h4><i class="icon-legal icon-large"></i> Admin</h4>
		<ul class="unstyled">
				<?php 
				if($admin){
				foreach($admin as $a){ ?>
					<li>
						<i class="icon-sort-up icon-rotate-90"></i>&nbsp;&nbsp;&nbsp;<?php echo $a->username;?> &nbsp;&nbsp;&nbsp;<?php if($a->user_stats == 'inactive') echo '<span class="text-warning"><i>Inactive User</i></span>';?>
						<div class="pull-right panel">
							<a  class="btn" rel="tooltip" title="Edit" href="<?php echo base_url('admin/user_edit/'.$a->id_admin)?>"><i class="icon-pencil"></i></a>
							<?php if($this->session->userdata('user_level') != 'top_admin'){?>
								<?php 
								if($a->user_stats == 'active'){
								?>
									<a class="btn" rel="tooltip" title="Inactive" href="<?php echo base_url('admin/user_status/inactive/'.$a->id_admin)?>"><i class="icon-off"></i></a> 
								<?php 
								}else{
								?>
									<a class="btn" rel="tooltip" title="Active" href="<?php echo base_url('admin/user_status/active/'.$a->id_admin.'?redirect='.current_url())?>"><i class="icon-ok-circle"></i></a>
								<?php 
								}
								?>
								<a  class="btn"  onclick='return confirm("Are you sure to delete?");'  class="delete_alert" rel="tooltip" title="Delete" href="<?php echo base_url('admin/user_delete/'.$a->id_admin)?>"><i class="icon-remove-sign"></i></a>
							<?php } ?>
						</div>
					</li>
				<?php 
					}
				}else{
					echo '<li><center>not Found</center></li>';
				}
				?>
			</ul>
	</div>
</div>