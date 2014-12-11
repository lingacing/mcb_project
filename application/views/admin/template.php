<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link id="open-sans-css" media="all" type="text/css" href="<?php echo base_url()?>assets/open-sans/open-sans.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/admin-style.css" rel="stylesheet">
	<script src="<?php echo base_url()?>assets/jquery/jquery.min.js" type="text/javascript"></script>
</head>
<body>
	<div class="navbar">
		  <div class="navbar-inner">
			<div class="container">

			  <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </a>

			  <!-- Be sure to leave the brand out there if you want it shown -->
			  <a class="brand" href="<?php echo base_url(); ?>" target="_blank">ULTRATECH</a>

			  <!-- Everything you want hidden at 940px or less, place within here -->
			  <div class="nav-collapse collapse">
					<ul class="nav">
					  <li><a href="<?php echo base_url(); ?>" target="_blank"><i class="icon-globe"></i> View Site</a></li>
					</ul>
					
					<?php $user_data = $this->user->data($this->session->userdata('user_id'));?>
					<ul class="nav pull-right">
						<li class="dropdown">
							<a class="dropdown-toggle"
							   data-toggle="dropdown"
							   href="#">
								<?php echo $user_data->username;?>
								<b class="caret"></b>
							  </a>
							<ul class="dropdown-menu">
								<li><a href="#">Edit Profil</a></li>
								<li class="divider"></li>
								<li><a href="<?php echo base_url('login/logout')?>">Logout</a></li>
							</ul>
						  </li>
					</ul>
			  </div>

			</div>
		  </div>
		</div>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="span2">
				<?php include('menu-left.php');?>
			</div>
			<div class="span10">
				<div class="row-fluid">
					<h3 class="page-header"><?php echo $sub_title; ?></h3>
				</div>
				<?php 
					if($this->session->flashdata('yes')){?>
					<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>OK!</strong> <?php echo $this->session->flashdata('yes');?>
					</div>
				<?php }elseif($this->session->flashdata('no')){?>
					<div class="alert alert-error">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>ERROR!</strong> <?php echo $this->session->flashdata('no');?>
					</div>
				<?php }elseif(isset($error)){?>
					<div class="alert alert-error">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>ERROR!</strong> <?php echo $error;?>
					</div>
				<?php } elseif(isset($succes)){?>
					<div class="alert alert-success">
					  <button type="button" class="close" data-dismiss="alert">&times;</button>
					  <strong>ERROR!</strong> <?php echo $succes;?>
					</div>
				<?php } ?>
				<?php $this->load->view('admin/'.$template);?>
			</div>
		</div>
	</div>
	<div class="row-fluid" id="footer">
	
	</div>
	<script src="<?php echo base_url()?>assets/jquery/jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-dropdown.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-collapse.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-tooltip.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-transition.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-carousel.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-tab.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/bootstrap-alert.js" type="text/javascript"></script>
	<script src="<?php echo base_url()?>assets/js/admin.js" type="text/javascript"></script>
</body>
</html>