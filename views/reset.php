<?php

include_once '../modules/Kint/Kint.class.php';
include_once '../data/players.php';

$standings = [];

foreach($players AS $player) {
	$standings[] = array(
		'name' => $player['name'],
		'win' => 0,
		'loss' => 0,
		'rate' => 1
	);
}

$contents = json_encode($standings);

file_put_contents('../data/results.json', $contents);

d('Resetted');