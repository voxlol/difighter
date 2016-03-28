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
		
		$reorder_players = json_decode(file_get_contents('data/results.json'));
		usort($reorder_players, "cmp_total");
		//	randomize from lowest 10
		$total = count($reorder_players) - 10;
		$player_array = array();
		$loop = 0;
		foreach($reorder_players as $player) {
			$player_array[] = $player;
			$loop++;
			if ($loop == 5) {
				break;
			}
		}
		
		$select_random = array_rand($player_array, 2);
		$select_random_1 = $select_random[0];
		$select_random_2 = $select_random[1];
		$hotpot = array(
			$player_array[$select_random_1]->id,
			$player_array[$select_random_2]->id,
		);
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
				'quote' => $player['quote'],
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

		shuffle($sharedSkills);
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
	
	public function get_player_standings($standings, $id) {
		$output = [];
		foreach($standings AS $standing) {
			if ($standing->id == $id) {
				$win = $standing->win + 1;
				$loss = $standing->loss;
				$rate = $win / ($win + $loss);
				$output = array(
					'win' => $win,
					'loss' => $loss,
					'total' => $win + $loss,
					'rate' => number_format($rate * 100, 0)
				);
				break;
			}
		}
		return $output;
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