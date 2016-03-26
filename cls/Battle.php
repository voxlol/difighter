<?php

include_once '../modules/Kint/Kint.class.php';

class Battle {
	private $players;
	private $skills;

	function __construct() {
		include_once '../data/players.php';
		include_once '../data/skills.php';

		$this->players = $players;
		$this->skills = $skills;
	}

	function get_fighter($exception = 0) {
		$count   = count($data);
		$fighter = rand(1, $count);
		if ($fighter == $exception) {

		}
	}

	function get_battle() {
		$hotpot = array_rand($this->players, 2);
		$intFighter = 0;
		$fighters = array(
			'battle' => array(
				'background' => 5,
				'rounds' => array(),
				'winner' => array(),
				'totals' => array(
					'player_1' => 0,
					'player_2' => 0
				),
			)
		);

		// Create initial dataset
		foreach($hotpot AS $intPlayer) {
			$player = $this->players[$intPlayer];

			$intFighter++;

			$fighters["player_$intFighter"] = array(
				'name' => $player['name'],
				'skills' => $this->get_skills($player),
			);
		}

		$skills = [
			$fighters['player_1']['skills'],
			$skills2 = $fighters['player_2']['skills']
		];

		// Merge skills
		foreach($skills[0] AS $skill=>$rating) {
			if(!array_key_exists($skill, $skills[1])) {
				$skills[1][$skill] = 0;
			}
		}

		$sharedSkills = [];

		foreach($skills[1] AS $skill=>$rating) {
			if(!array_key_exists($skill, $skills[0])) {
				$skills[0][$skill] = 0;
			} else {
				if(count($sharedSkills) < 5) {
					$sharedSkills[] = $skill;
				}
			}
		}

		$fighters['player_1']['skills'] = $skills[0];
		$fighters['player_2']['skills'] = $skills[1];

		// Minimum 5 skill catch
		while(count($skills[0]) < 5) {
			$skill = $this->skills[array_rand($this->skills, 1)];

			while(array_key_exists($skill, $skills[0])) {
				$skill = $this->skills[array_rand($this->skills, 1)];
			}

			$skills[0][$skill] = 0;
			$skills[1][$skill] = 0;
		}

		$rounds = [];

		// Generate Rounds
		while(count($sharedSkills) < 5) {
			foreach($skills[0] AS $skill=>$rating) {
				if(count($sharedSkills) == 5) {
					break;
				}

				if(!array_key_exists($skill, $sharedSkills)) {
					$sharedSkills[] = $skill;
				}
			}
		}

		foreach($sharedSkills AS $intSkill=>$skill) {
			$rating1 = $skills[0][$skill];
			$rating2 = $skills[1][$skill];

			if($rating1 > $rating2) {
				$winner = 'player_1';
			} else if($rating2 > $rating1) {
				$winner = 'player_2';
			} else {
				$winner = 'player_'.rand(1,2);
			}

			$rounds[$intSkill + 1] = array(
				'subject' => $skill,
				'winner' => $winner
			);

			// Total Wins
			$fighters['battle']['totals'][$winner]++;
		}

		$fighters['battle']['rounds'] = array_merge($fighters['battle']['rounds'], $rounds);

		$totals = $fighters['battle']['totals'];

		$winner = ($totals['player_1'] > $totals['player_2']) ? 'player_1' : 'player_2';

		$fighters['battle']['winner'] = array(
			'name' => $fighters[$winner]['name'],
			'score' => $totals[$winner] 
		);

		return $fighters;
	}

	private function get_skills($player) {
		$skils = [];

		foreach($player['skills'] AS $intSkill=>$rating) {
			if($rating) {
				$skill = $this->skills[$intSkill];
				$skills[$skill] = $rating;
			}
		}

		return $skills;
	}
}

$battle = new Battle();
$results = $battle->get_battle();

d($results);exit;