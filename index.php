<?
	require_once "settings/config.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>DI Fighter</title>
</head>
<frameset cols="450px,1470px">
  <frame name="score" src="<?=BASE_URL?>views/main.php?application=score">
  <frame name="battle" src="<?=BASE_URL?>views/main.php?application=battle">
</frameset>
</html>