<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $title ?></title>

	<!--Bootstrap v4 Css-->
	<link rel="stylesheet" href="<?= ASSET_URL ?>frontend/bootstrap/css/bootstrap.min.css" />
	<!--Fontawesome Icon-->
	<link rel="stylesheet" href="<?= ASSET_URL ?>fontawesome/css/all.min.css" />
	<!--Main Css-->
	<link rel="stylesheet" href="<?= ASSET_URL ?>frontend/css/custom.css">
	<!--Aos-->
	<link href="<?= ASSET_URL ?>frontend/css/aos.css" rel="stylesheet">
	<!--Aos-->
	<script src="<?= ASSET_URL ?>frontend/jquery/js/jquery-3.5.1.min.js"></script>
</head>

<body>
	<!--Nav bar-->
	<?php include(APPPATH . 'views/' . $folder . '/includes/navbar.php'); ?>
	<!--Nav bar-->
