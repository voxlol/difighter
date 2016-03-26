<?
	$base_url = 'http://localhost:8888/di-fighter/';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DI Fighter</title>
</head>
<frameset cols="450px,1470px">
  <frame src="<?=$base_url?>views/main.php?application=score">
  <frame src="<?=$base_url?>views/main.php?application=battle">
</frameset>
</html>