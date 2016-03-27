<?php

include_once '../modules/Kint/Kint.class.php';

class Battle {
	private $players;
	private $skills;

	function __construct() {

		$this->players = array(
			1 => array(
				'name' => 'Dave Bittle',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,2,2,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
			),
			2 => array(
				'name' => 'Daniel Boos',
				'skills' => array(0,0,1,0,0,0,0,0,1,0,2,2,1,1,1,0,1,2,2,0,0,0,0,0,0,0,0,1,0,0,0,1,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,1,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,3,0,1,0,1,0,0,0,0,0,0)
			),
			3 => array(
				'name' => 'Michael Bray',
				'skills' => array(3,1,0,0,0,0,1,2,2,1,3,3,3,3,2,0,0,3,2,2,2,1,2,1,1,2,1,2,1,1,0,1,0,0,0,0,1,3,3,3,3,3,3,3,2,3,3,2,0,2,1,0,0,0,0,3,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0)
			),
			4 => array(
				'name' => 'Nick Brown',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
			),
			5 => array(
				'name' => 'Alisa Burdeyny',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,2,2,2,1,1,1,1,2,1,0,0,2,2,0,0,0,0,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,1,0,0,0,0,1,0,0,2,1,0,0,0,2,0,0,0,0,1,0,2,1,0,0)
			),
			6 => array(
				'name' => 'Nat Burgwyn',
				'skills' => array(1,0,2,1,1,0,0,0,2,1,3,2,2,1,2,0,0,3,3,0,1,1,2,1,1,0,1,2,3,3,3,1,0,0,0,2,2,2,1,2,0,0,1,0,0,0,1,1,0,0,0,1,0,0,2,0,2,2,2,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0)
			),
			7 => array(
				'name' => 'Charles Chao',
				'skills' => array(2,2,1,0,2,0,0,0,1,1,3,3,3,2,2,0,0,2,2,0,2,0,1,1,0,1,1,2,1,2,0,3,1,0,0,0,1,0,1,1,0,0,1,0,0,0,0,0,0,0,0,1,0,0,0,0,2,0,0,0,0,0,2,0,1,0,1,0,1,2,2,1,0,0,0,1,0,1,0,0,1,0,0,0,0,0)
			),
			8 => array(
				'name' => 'Anthony Chen',
				'skills' => array(2,0,0,0,0,1,1,2,2,1,2,2,2,2,2,2,2,2,2,2,2,2,2,2,2,1,0,2,0,0,0,0,0,0,1,0,0,2,2,2,2,2,2,2,2,2,2,2,1,1,1,1,0,1,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,1,0,0,0,0,0,0,0,0)
			),
			9 => array(
				'name' => 'Kevin Chiu',
				'skills' => array(0,0,1,0,0,0,2,2,3,2,3,3,2,3,3,1,2,3,3,1,2,1,1,2,2,3,2,3,3,0,0,2,3,0,0,0,1,1,3,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,2,1,1,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,2,1,3,0,0,0,0,0,0,0,0)
			),
			10 => array(
				'name' => 'Seth Clark',
				'skills' => array(0,0,0,0,0,0,1,3,1,1,1,1,1,1,0,1,1,1,1,0,0,0,0,1,1,0,0,1,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,3,0,0,0,0,0,0,0,0,0)
			),
			11 => array(
				'name' => 'Zachary Clay',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,2,2,0,0,0,0,0,1,1,0,0,1,0,0,0,0,0,2,1,2,1,1,1,1,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,3,2,2,3,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,2,0,0,0,0,0)
			),
			12 => array(
				'name' => 'Elizabeth Dabbs',
				'skills' => array(1,0,1,0,0,0,0,0,2,0,2,2,2,2,2,0,0,1,1,0,1,0,0,0,0,0,0,2,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,1)
			),
			13 => array(
				'name' => 'Davis Ford',
				'skills' => array(0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
			),
			14 => array(
				'name' => 'Mike Hess',
				'skills' => array(0,1,1,0,0,0,0,0,2,1,3,3,2,2,1,1,2,3,3,1,2,3,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,2,2,2,2,1,2,2,0,2,0,0,0,0,0,0,1,0,0,0,2,0,0,0,0,0,0,0,0,0,1,1,0,1,1,1,0,0,1,1,1,1,0,0,1,0,0,0,0,0)
			),
			15 => array(
				'name' => 'Noelle Jung',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,3,3,3,3,2,0,0,3,3,0,3,0,0,2,2,0,0,1,0,0,0,1,0,0,3,0,0,0,0,1,1,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,2,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,3,1,1,0,0,0,2,0,0,0,0)
			),
			16 => array(
				'name' => 'Sunggyun Kim',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,2,2,1,2,0,3,3,2,2,1,1,1,0,1,1,2,1,2,0,0,0,0,1,0,1,0,0,2,2,2,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,1,1,1,1)
			),
			17 => array(
				'name' => 'Waikay Kong',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,1,0,2,0,0,0,0,1,1,0,0,0,0,0,0,1,0,0,0,2,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,0,1,1,1,3,3,1,3,0,1,2,1,1,0,0,0,0,0,0,0,0)
			),
			18 => array(
				'name' => 'Samuel Levine',
				'skills' => array(1,0,2,1,0,0,1,2,2,2,3,3,2,3,2,0,0,3,2,0,1,0,0,0,0,2,1,2,0,2,1,2,1,0,0,0,0,3,3,3,3,3,3,3,3,2,2,3,0,1,1,0,0,0,0,3,2,1,1,0,1,0,3,1,0,2,2,3,2,3,3,2,3,1,3,2,0,1,0,0,1,1,0,1,1,1)
			),
			19 => array(
				'name' => 'Kevin Li',
				'skills' => array(3,0,1,0,1,0,1,1,2,2,3,3,3,2,2,1,1,2,2,1,0,0,3,2,2,1,1,2,1,1,0,0,0,0,0,0,0,2,1,2,2,1,2,2,1,0,0,0,0,0,0,1,0,2,0,1,0,0,0,0,0,0,1,0,0,0,0,0,1,0,0,0,0,1,0,1,1,1,0,0,0,0,0,0,0,0)
			),
			20 => array(
				'name' => 'Nathan Mellis',
				'skills' => array(3,3,0,0,0,0,2,3,3,3,3,3,3,3,1,3,3,3,2,1,1,1,2,0,0,1,2,3,1,1,1,1,1,1,0,0,0,3,2,2,2,2,2,2,1,0,0,0,0,0,0,1,1,0,0,2,0,0,0,0,0,0,0,0,0,0,1,0,1,0,0,0,0,0,0,1,0,1,0,0,0,1,1,0,0,0)
			),
			21 => array(
				'name' => 'Samantha Mitchual',
				'skills' => array(0,0,1,0,0,0,0,0,0,0,3,3,0,1,1,1,1,2,2,0,2,0,0,1,0,0,0,2,1,2,2,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,2,2,1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,1,0,0,0,0,0)
			),
			22 => array(
				'name' => 'Andrew Mshar',
				'skills' => array(0,0,1,0,0,0,0,0,0,0,2,2,1,1,1,0,0,2,2,0,2,0,1,1,1,0,0,2,1,2,1,0,1,0,0,0,0,1,1,1,1,0,0,1,0,0,0,0,0,0,0,0,0,0,1,0,1,0,0,0,0,0,3,0,0,0,0,3,0,2,3,1,3,1,0,1,0,1,0,1,1,1,0,0,1,1)
			),
			23 => array(
				'name' => 'Virginia Nguyen',
				'skills' => array(0,0,0,0,0,0,1,1,1,1,3,3,2,2,1,0,0,2,2,0,0,1,0,0,0,0,0,1,1,0,0,3,2,1,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0)
			),
			24 => array(
				'name' => 'Martin Press',
				'skills' => array(0,0,1,0,0,0,0,0,0,0,3,2,0,2,2,0,0,2,2,2,0,0,1,0,0,0,0,2,1,2,1,0,0,0,0,0,0,3,3,3,3,0,2,3,3,0,0,1,0,0,0,0,0,0,0,0,3,1,0,0,0,0,2,0,0,0,2,0,1,3,3,3,0,0,0,1,2,0,2,2,2,1,3,3,0,2)
			),
			25 => array(
				'name' => 'Dan Rich',
				'skills' => array(0,0,0,0,0,0,2,2,2,1,3,3,2,2,2,3,3,2,2,0,0,0,0,0,0,3,0,2,1,0,1,0,2,3,0,2,0,2,3,3,0,2,2,3,0,0,0,2,0,0,0,0,0,0,1,1,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,1,2,0,0,0,0,0,0,0,0)
			),
			26 => array(
				'name' => 'Alan Shih',
				'skills' => array(3,1,2,0,1,0,2,2,0,0,1,1,0,0,0,0,0,1,0,0,1,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,2,2,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
			),
			27 => array(
				'name' => 'David Trinh',
				'skills' => array(0,0,1,0,0,0,0,0,2,2,3,3,1,2,2,0,0,2,2,0,2,0,0,1,0,0,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,0,1,0,0,0,0,0,0,0,0,2,0,0,0,1,0,0,0,0,0,0)
			),
			28 => array(
				'name' => 'Andrew Vogel',
				'skills' => array(0,0,0,0,0,0,0,0,0,0,2,1,0,0,2,0,0,1,0,0,0,0,0,0,0,0,0,1,0,2,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0)
			),
			29 => array(
				'name' => 'James Worcester',
				'skills' => array(0,0,2,1,0,0,0,0,0,0,1,0,0,0,2,0,0,1,0,0,0,0,0,0,0,0,0,2,0,2,1,2,0,0,0,0,2,1,2,2,2,0,0,2,0,0,0,2,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,1,0,0,0,1,0,1,1,1,0,0,1,2,0,0,0,0,1,2,3,3,2,2)
			),
			30 => array(
				'name' => 'Peter Yang',
				'skills' => array(1,0,0,0,0,0,2,2,3,3,3,3,3,3,3,2,2,3,3,0,1,0,0,1,0,2,0,3,2,0,1,2,2,0,0,0,0,3,3,3,3,3,3,3,0,0,0,1,0,0,0,0,0,0,0,3,1,0,0,0,0,0,0,0,0,0,2,0,0,0,0,0,0,0,0,1,0,1,0,0,0,0,0,0,0,0)
			),
		);

		$this->skills = array(
			'Objective-C',
			'Swift',
			'Android',
			'Windows Phone',
			'Parse',
			'Ionic',
			'Social Integration',
			'Analytics Integration',
			'Mobile-Specific Web Dev',
			'Mobile Browser Debugging',
			'HTML',
			'CSS',
			'SASS/LESS',
			'Responsiveness',
			'PHP',
			'Ruby',
			'Ruby on Rails',
			'Javascript',
			'jQuery',
			'Backbone',
			'Angular',
			'Ember',
			'React',
			'Node',
			'Express',
			'Highcharts',
			'D3',
			'MySQL',
			'MSSQL',
			'C#',
			'.NET',
			'Drupal',
			'Wordpress',
			'Joomla',
			'Django',
			'Adobe CQ',
			'Salesforce',
			'General Architecture',
			'EC2',
			'S3',
			'RDS',
			'IAM',
			'Route 53',
			'Elastic Beanstalk',
			'Dynamo DB',
			'SQS',
			'SNS',
			'SES',
			'SWF',
			'CloudFront',
			'CloudFormation',
			'Docker',
			'MapReduce/Hadoop',
			'Lamdba',
			'Azure',
			'Asset Extraction in PS / AI',
			'Java',
			'J2EE',
			'Spring MVC',
			'JSF',
			'Struts',
			'GWT',
			'Unity',
			'Unreal',
			'Construct',
			'Pygame',
			'HTML5 Canvas',
			'Game Design',
			'Real-Time Networking',
			'Applied Geometry',
			'Gameplay Programming',
			'AI',
			'Oculus SDK',
			'Augmented Reality',
			'Kinect',
			'Python',
			'VBA',
			'Bash',
			'Boost',
			'STL',
			'Visual Studio',
			'Numeric Methods',
			'Genetic Algorithms',
			'Neural Networks',
			'Bayesian Networks',
			'Simulations',
		);
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
				)
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
			'name' => $fighters[$winner]['name'],
			'score' => $totals[$winner]
		);

		$winner = $fighters[$winner]['name'];
		$loser = $fighters[$loser]['name'];

		$this->update_standings($winner, $loser);

		return $fighters;
	}

	public function update_standings($winner, $loser) {
		$data = json_decode(file_get_contents('../data/results.json'));

		foreach($data AS $intItem=>$item) {
			if($item->name == $winner) {
				$data[$intItem]->win++;
				$data[$intItem]->rate = $data[$intItem]->win / ($data[$intItem]->win + $data[$intItem]->loss);
			}

			if($item->name == $loser) {
				$data[$intItem]->loss++;
				$data[$intItem]->rate = $data[$intItem]->win / ($data[$intItem]->win + $data[$intItem]->loss);
			}
		}

		file_put_contents('../data/results.json', $data);
	}

	public function get_battle_results() {
		$data = json_decode(file_get_contents('../data/results.json'));
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