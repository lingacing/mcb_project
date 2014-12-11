<?php 
	if($this->session->flashdata('active')){
		$active = $this->session->flashdata('active');
	}
?>

<div class="row-fluid">
	<div class="span12">
		<ul class="nav nav-tabs" id="myTab">
			<li <?php if($active == 'home') echo 'class="active"'; ?>><a href="#home">Home</a></li>
			<li <?php if($active == 'company') echo 'class="active"'; ?>><a href="#company">Company</a></li>
			<li <?php if($active == 'founder') echo 'class="active"'; ?>><a href="#founder">Founder</a></li>
		</ul>

		<div class="tab-content">
			<div class="tab-pane <?php if($active == 'home') echo 'active'; ?>" id="home"><?php include('dashboard/home_setting.php');?></div>
			<div class="tab-pane <?php if($active == 'company') echo 'active'; ?>" id="company"><?php include('dashboard/company.php');?></div>
			<div class="tab-pane <?php if($active == 'founder') echo 'active'; ?>" id="founder"><?php include('dashboard/founder.php');?></div>
		</div>
	</div>
	<div class="clear"></div>
</div>