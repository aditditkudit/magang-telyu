<!DOCTYPE html>
<html>

<head>
	<title> Dashboard</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/css/style.css">
	<style>
	.person {
		border: 10px solid transparent;
		margin-bottom: 25px;
		width: 50%;
		height: 50%;
		
	}

	.person:hover {
		border-color: #f1f1f1;
	}
	</style>


</head>
<!--/* Header and Side Bar -->
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php base_url(); ?>dashboard">TELKOM</a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<div class="navbar-form navbar-right">
					<a href="<?php echo base_url() ?>dashboard/logout" type="submit" class="btn btn-success">
					<i class="fas fa-sign-out-alt"></i> Logout</a>
				</div>
			</div>
	</nav>
	<div class="container" style="margin-top: 80px">
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<a href="#" class="list-group-item active" style="text-align: center;background-color: black;border-color: black">
						ADMINISTRATOR
					</a>
					<a href="<?php echo base_url() ?>dashboard" class="list-group-item">
					<i class="fas fa-tachometer-alt"></i> Dashboard</a>
					<a href="<?php echo base_url() ?>file" class="list-group-item">
						<i class="fa fa-file"></i> File</a>
					<a href="<?php echo base_url() ?>list_database" class="list-group-item">
						<i class="fa fa-gavel"></i> List Database</a>
					<a href="<?php echo base_url() ?>cSettings" class="list-group-item">
						<i class="fa fa-cog"></i> Setting</a>
					<a href="<?php echo base_url() ?>aboutus" class="list-group-item">
						<i class="fas fa-users"></i> About Us</a>	
					
				</div>
            </div>
<!-- Header and Side Bar */ -->