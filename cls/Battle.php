<?php


class Battle {
	private $players;
	private $skills;

	function __construct() {
		include_once 'data/players.php';
		include_once 'data/skills.php';

		$this->players = $players;
		$this->skills = $skills;
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
				)
			)
		);

		// Create initial dataset
		$loop = 0;
		foreach($hotpot AS $intPlayer) {
			$player = $this->players[$intPlayer];

			$intFighter++;

			$fighters["player_$intFighter"] = array(
				'id' => $hotpot[$loop],
				'name' => $player['name'],
				'skills' => $this->get_skills($player),
			);
			$loop++;
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

		$sharedSkills = []; // Shared skills
		$sharedActualSkills = []; // Shared skills that are not 0

		foreach($skills[1] AS $skill=>$rating) {
			if(!array_key_exists($skill, $skills[0])) {
				$skills[0][$skill] = 0;
			} else {
				$sharedActualSkills[] = $skill;
			}
		}

		$intSkill = 0;

		foreach($sharedActualSkills AS $skill) {
			$intSkill++;

			if($intSkill == 5) {
				$sharedSkills[] = $skill;
				break;
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
		$loser = ($totals['player_1'] > $totals['player_2']) ? 'player_2' : 'player_1';

		$fighters['battle']['winner'] = array(
			'id' => $fighters[$winner]['id'],
			'player' => $winner,
			'name' => $fighters[$winner]['name'],
			'score' => $totals[$winner]
		);
		$fighters['battle']['loser'] = array(
			'id' => $fighters[$loser]['id'],
			'player' => $loser,
			'name' => $fighters[$loser]['name'],
			'score' => $totals[$loser]
		);

		$winner = $fighters[$winner]['name'];
		$loser = $fighters[$loser]['name'];

		$this->update_standings($winner, $loser);

		return $fighters;
	}

	public function update_standings($winner, $loser) {
		$data = json_decode(file_get_contents('data/results.json'));

		foreach($data AS $intItem=>$item) {
			if($item->id == $winner) {
				$data[$intItem]->win++;
				$data[$intItem]->rate = $data[$intItem]->win / ($data[$intItem]->win + $data[$intItem]->loss);
			}

			if($item->id == $loser) {
				$data[$intItem]->loss++;
				$data[$intItem]->rate = $data[$intItem]->win / ($data[$intItem]->win + $data[$intItem]->loss);
			}
		}
		file_put_contents('data/results.json', json_encode($data));
	}

	public function get_battle_results() {
		$data = json_decode(file_get_contents('data/results.json'));
		$rankings = [];
		$results = [];

		foreach($data AS $intItem=>$item) {
			$rankings[$intItem] = $item->rate;
		}

		foreach($rankings AS $intRanking=>$ranking) {
			$results[] = $data[$intRanking];
		}

		return $results;
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