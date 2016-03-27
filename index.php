<?php
	if(!empty($_SERVER['BASE_URL'])) {
		define('BASE_URL', $_SERVER['BASE_URL']);
	} else {
		require_once "local_config.php";
	}

	require_once "cls/functions.php";
	require_once "cls/Battle.php";
	require_once "cls/Score.php";
	include_once 'modules/Kint/Kint.class.php';


	$battle = new Battle();
	if (!empty($_GET['winner']) && !empty($_GET['loser'])) {
		$battle->update_standings($_GET['winner'], $_GET['loser']);
	}
	$results = $battle->get_battle();
	$standings = $battle->get_battle_results();
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
<body data-base-url="<?=BASE_URL?>" id="application-battle">
<?
	include 'views/score.php';
	include 'views/battle.php';
?>
<script src="<?=BASE_URL?>assets/js/jquery.js"></script>
<script src="<?=BASE_URL?>assets/js/bootstrap.min.js"></script>
<script src="<?=BASE_URL?>assets/js/battle.js"></script>
</body>
</html>