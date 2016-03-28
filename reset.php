<?php

include_once 'modules/Kint/Kint.class.php';
include_once 'data/players.php';

$standings = [];
foreach($players AS $id => $player) {
	$standings[] = array(
		'id' => $id,
		'name' => $player['name'],
		'win' => 0,
		'loss' => 0,
		'rate' => 1,
		'total' => 0
	);
}

$contents = json_encode($standings);

file_put_contents('data/results.json', $contents);

d('Resetted');