<!DOCTYPE html>
<html lang="en">  
<head>
<title>CodeIgniter User Login System by CodexWorld</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900" 	type="text/css" media="all">

<!-- Stylesheet file -->
<!-- <link href="<?php echo base_url('assets/css/style.css'); ?>" rel='stylesheet' type='text/css' /> -->
</head>
<body>

<div class="col-sm-12">
	<div class="col-sm-6"><h1>Online Shopping</h1></div>
	<div class="col-sm-3"></div>
	<div class="col-sm-3">
		<?php if (!empty($user)){ ?>
			<div class="col-sm-9"><p>Welcome <?php echo $user['name']; ?>!</p></div>
		    <div class="col-sm-3"><a href="<?php echo base_url('users/logout'); ?>" class="logout">Logout</a></div>
		    <!-- <div class="regisFrm">
		        <p><b>Name: </b><?php echo $user['name']; ?></p>
		        <p><b>Email: </b><?php echo $user['email']; ?></p>
		        <p><b>Phone: </b><?php echo $user['phone']; ?></p>
		        <p><b>Gender: </b><?php echo $user['gender']; ?></p>
		    </div> -->

		<?php } else { ?>
			<a href="<?php echo base_url('users/login'); ?>">Login</a> /
			<a href="<?php echo base_url('users/registration'); ?>">Register</a>
		<?php } ?>
		
	</div>
</div>
