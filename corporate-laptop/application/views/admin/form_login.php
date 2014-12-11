<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title;?></title>
	<link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/admin-style.css" rel="stylesheet">
</head>
<body>
	<div class="container register" style="max-width: 500px;">
	<br/>
	<br/>
	<br/>
	<?php if($this->session->flashdata('no')){
		?>
			<div class="alert alert-error">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Oh snap!</strong> <?php echo $this->session->flashdata('no'); ?>
            </div>
		<?php
		}
		?>
	<?php
		echo form_open('porta/form','class="row-fluid"');
	?>
		<div class="span5">
			<div class="row-fluid">
				<center>
					<?php
					#$setting = $this->msetting->get_option();
					?>
					<!--<img src="<?php echo base_url('images/logo/'.$setting['logo'])?>" alt=""/>-->
				</center>
			</div>
		</div>
		<div class="span7">
			<div class="row-fluid">
				<label for="">Username</label>
				<input class="span12" type="text" name="username" value="<?php echo set_value('username'); ?>" placeholder="Username"/>
				<?php echo form_error('username','<div class="text-error">','</div>'); ?>
			</div>
			<div class="row-fluid">
				<label for="">Password</label>
				<input class="span12" type="password" name="password" placeholder="Password" value="<?php echo set_value('username'); ?>"/>
				<?php echo form_error('password','<div class="text-error">','</div>'); ?>
			</div>
			<div class="row-fluid">
				<button class="btn btn-primary" name="submit_login" value="Login"><i class="icon-signin"></i> Signin</button>
			</div>
		</div>
	<?php
		echo form_close();
	?>
	</div>
</body>
</html>

