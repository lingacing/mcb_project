<ul class="nav nav-list form-actions menu-left">
  <!--<li class="nav-header">Admin Menu</li>-->
  <li <?php if(isset($is_admin)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin')?>"><i class="icon-home icon-large"></i> Home</a></li>
  <li <?php if(isset($is_article)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin/article')?>"><i class="icon-edit-sign icon-large"></i> Article</a></li>
  <li <?php if(isset($is_category)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin/category')?>"><i class="icon-random icon-large"></i> Category</a></li>
  <li <?php if(isset($is_page)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin/page')?>"><i class="icon-file-text"></i> Page</a></li>
  <li <?php if(isset($is_slideshow)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin/slideshow')?>"><i class="icon-desktop"></i> Slideshow</a></li>
  <li <?php if(isset($is_contact)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin/contact')?>"><i class="icon-info-sign"></i> Contact</a></li>
  <li <?php if(isset($is_menu)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin/menu')?>"><i class="icon-align-justify"></i> Menu</a></li>
  <li <?php if(isset($is_user)){ echo 'class="active"'; }?>><a href="<?php echo base_url('admin/user')?>"><i class="icon-user icon-large"></i> User</a></li>
  ...
</ul>