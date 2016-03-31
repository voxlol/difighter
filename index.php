<?php
	session_start();
	if(!empty($_SERVER['BASE_URL'])) {
		define('BASE_URL', $_SERVER['BASE_URL']);
		define('SHOW_SIGN', $_SERVER['SHOW_SIGN']);
	} else {
		require_once "local_config.php";
	}

	require_once "cls/functions.php";
	require_once "cls/Battle.php";
	require_once "cls/Score.php";
	include_once 'modules/Kint/Kint.class.php';


	$battle = new Battle();
	if (!empty($_SESSION['winner']) && !empty($_SESSION['loser'])) {
		$battle->update_standings($_SESSION['winner'], $_SESSION['loser']);
	}
	$results = $battle->get_battle();
	$standings = $battle->get_battle_results();
	
	$winner = $battle->get_player_standings($standings, $results['battle']['winner']['id']);
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
<script src="<?=BASE_URL?>assets/js/battle.js?v=1"></script>
</body>
</html>