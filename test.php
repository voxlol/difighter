<?php
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

	echo '<pre>';
	$battle = new Battle();
	if (!empty($_GET['winner']) && !empty($_GET['loser'])) {
		$battle->update_standings($_GET['winner'], $_GET['loser']);
	}
	$results = $battle->get_battle();
	print_r($standings);
	$standings = $battle->get_battle_results();
	print_r($results);
	
	$winner = $battle->get_player_standings($standings, $results['battle']['winner']['id']);
?>