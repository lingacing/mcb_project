<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title ?></title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <!--  <link href="<?php echo base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet"> -->
    <link href="<?php echo base_url()?>assets/css/flexslider.css" rel="stylesheet">
	<link href="<?php echo base_url()?>assets/css/font-awesome/font-awesome.min.css" rel="stylesheet">
	<link id="open-sans-css" media="all" type="text/css" href="<?php echo base_url()?>assets/open-sans/open-sans.css" rel="stylesheet">
	
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta name="robots" content="no-cache" />
	
</head>
<body>
	<div class="wrapper">
		<header id="header">
			<div class="wrapper-inner">
				<div class="row-fluid">
					<div class="span4">
						<div class="site-logo">
							<img src="<?php echo base_url('uploads/images/'.$setting['home_page_logo']) ?>" alt="<?php echo $setting['site_name'] ?>">
							<h1 class="site-title hide"><?php echo $setting['site_name'] ?></h1>
							<h1 class="site-description hide"><?php echo $setting['site_description'] ?></h1>
						</div>
					</div>
					<div class="span8">
						<div class="navbar">
							<div class="navbar-inner">
								<div class="container">
									 
									<!-- Everything you want hidden at 940px or less, place within here -->
									<div class="nav-collapse collapse navbar-responsive-collapse">
										<?php if($setting['menu_list']){ ?>
											<ul class="nav pull-right">
											<?php foreach($setting['menu_list'] as $ml){ ?>
												<li>
													<a href="<?php echo $ml['menu_link']?>"><?php echo $ml['menu_name']?></a>
													<?php $child = $this->db->get_where('menu',array('menu_parent'=>$ml['menu_id']))->result(); ?>
													<?php if($child){?>
														<ul class="submenu">
														<?php foreach($child as $ch){?>
															<li>
																<a href="<?php echo $ch->menu_link; ?>"><?php echo $ch->menu_name; ?></a>
																<?php $sub_child = $this->db->get_where('menu',array('menu_parent'=>$ch->menu_id))->result(); ?>
																<?php if($sub_child){?>
																	<ul class="submenu">
																	<?php foreach($sub_child as $sch){?>
																		<li><a href="<?php echo $sch->menu_link; ?>"><?php echo $sch->menu_name; ?></a></li>
																	<?php } ?>
																	</ul>
																<?php } ?>
															</li>
														<?php } ?>
														</ul>
													<?php } ?>
												</li>
											<?php } ?>
											</ul>
										<?php } ?>
									</div>
								 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>