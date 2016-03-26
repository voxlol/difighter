<?php
	require_once "../data/players.php";
	require_once "../data/skills.php";
	require_once "../cls/Battle.php";
	require_once "../cls/Score.php";

	$application = $_GET['application'];
	$base_url = 'http://localhost:8888/di-fighter/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DI Fighter</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
	<link href="<?=$base_url?>assets/css/application.css" media="all" rel="stylesheet" type="text/css">
</head>
<body id="application-<?=$application?>">
<?
	include $application.'.php';
?>
<script src="https://code.jquery.com/jquery-2.2.2.min.js" integrity="sha256-36cp2Co+/62rEAAYHLmRCPIych47CvdM+uTBJwSzWjI="   crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>