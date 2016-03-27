<?php
	require_once "../settings/config.php";
	require_once "../cls/functions.php";
	require_once "../cls/Battle.php";
	require_once "../cls/Score.php";

	$application = $_GET['application'];
	$body_class = ($application == 'battle' ? 'battle-preview' : '');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DI Fighter</title>
	<link rel="stylesheet" href="<?=BASE_URL?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=BASE_URL?>assets/css/bootstrap-theme.min.css">
	<link href="<?=BASE_URL?>assets/css/application.css" media="all" rel="stylesheet" type="text/css">
</head>
<body data-base-url="<?=BASE_URL?>" id="application-<?=$application?>">
<?
	include $application.'.php';
?>
<script src="<?=BASE_URL?>assets/js/jquery.js"></script>
<script src="<?=BASE_URL?>assets/js/bootstrap.min.js"></script>
<script src="<?=BASE_URL?>assets/js/battle.js"></script>
</body>
</html>