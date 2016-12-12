<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Carpool</title>
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta name="author" content="">

	<!-- css -->
	<link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet">

	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->



<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/common.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen"
     href="css/datetimepicker.css">

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="http://twitter.github.com/bootstrap/assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="http://twitter.github.com/bootstrap/assets/ico/apple-touch-icon-57-precomposed.png">

</head>
<body>

	<header id="site-header">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="<?= base_url() ?>">Carpool</a>
				</div>
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						<?php if (isset($_SESSION['username']) && $_SESSION['logged_in'] === true) : ?>
							<li><a href="<?= base_url('') ?>"><i class="icon-home"></i> Inicio </a></li>
            <li class="divider-vertical"></li>
            <li><a href="<?= base_url('') ?>"><i class="icon-th-list"></i> Comparte tu ride</a></li>
            <li class="divider-vertical"></li>
            <li><a href="<?= base_url('') ?>"><i class="icon-pencil"></i> Consigue un ride</a></li>
            <li class="divider-vertical"></li>
            <li><a href="notification.php"><i class="icon-list"></i> Notificaciones </a></li>
            <li class="divider-vertical"></li>
            <li><a href="leaderboard.php"><i class="icon-list"></i> Tabla de clasificación </a></li>
            <li class="divider-vertical"></li>
            <li><a href="<?= base_url('users/index') ?>"><i class="icon-wrench"></i> Perfil </a></li>
            <li class="divider-vertical"></li>
<li><a href="<?= base_url('logout') ?>">salir</a></li>
						<?php else : ?>
							
					<li><a href="<?= base_url('') ?>"><i class="icon-home"></i> Inicio </a></li>
            <li class="divider-vertical"></li>
            <li><a href="<?= base_url('') ?>"><i class="icon-th-list"></i> Consigue un ride</a></li>
            <li class="divider-vertical"></li>
<li><a href="<?= base_url('register') ?>">Registrarse</a></li>
<li class="divider-vertical"></li>
							<li><a href="<?= base_url('login') ?>">Iniciar sesion</a></li>
						<?php endif; ?>
					</ul>
				</div><!-- .navbar-collapse -->
			</div><!-- .container-fluid -->
		</nav><!-- .navbar -->
	</header><!-- #site-header -->

	
		
