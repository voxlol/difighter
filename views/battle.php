<?
	$data = array(
		'player_1' => array(
			'name' => 'Alan Shih',
			'skills' => array(
				'mysql' => 3,
				'objective-c' => 3,
				'php' => 3,
				'something' => 3,
				'something' => 3,
			),
		),
		'player_2' => array(
			'name' => 'Peter Yang',
			'skills' => array(
				'mysql' => 3,
				'objective-c' => 3,
				'php' => 2,
				'something' => 1,
				'soasdfmething' => 3,
			),
		),
		'battle' => array(
			'background' => 5,
			'rounds' => array(
				1 => array(
					'subject' => 'mysql',
					'winner' => 'player_1',
				),
				2 => array(
					'subject' => 'mysql',
					'winner' => 'player_1',
				),
				3 => array(
					'subject' => 'mysql',
					'winner' => 'player_1',
				),
				4 => array(
					'subject' => 'mysql',
					'winner' => 'player_1',
				),
				5 => array(
					'subject' => 'mysql',
					'winner' => 'player_1',
				),
			)
		)
	);
?>
<div class="container" id="battle-preview-box" style="display:none;">
	<div class="row">
		<div class="col-sm-5">
			<img src="http://placehold.it/500x500" class="img-responsive">
			<div class="name"><?=$data['player_1']['name']?></div>
			<div class="stats">
				<?
					foreach($data['player_1']['skills'] as $skill_name => $skill_point) {
						switch($skill_point) {
							default:
								$percent = 0;
							break;
							case 1:
								$percent = 33;
							break;
							case 2:
								$percent = 66;
							break;
							case 3:
								$percent = 100;
							break;
						}
				?>
				<div class="row">
					<div class="col-sm-4">
						<div class="stat-label">
							<?=$skill_name?>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="progress" style="background-color:none;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$percent?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$percent?>%"></div>
						</div>
					</div>
				</div>
				<?
					}
				?>
			</div>
		</div>
		<div class="col-sm-2">
			<div class="text-center vs-sign">VS</div>
		</div>
		<div class="col-sm-5">
			<img src="http://placehold.it/500x500" class="img-responsive">
			<div class="name"><?=$data['player_2']['name']?></div>
			<div class="stats">
				<?
					foreach($data['player_2']['skills'] as $skill_name => $skill_point) {
						switch($skill_point) {
							default:
								$percent = 0;
							break;
							case 1:
								$percent = 33;
							break;
							case 2:
								$percent = 66;
							break;
							case 3:
								$percent = 100;
							break;
						}
				?>
				<div class="row">
					<div class="col-sm-4">
						<div class="stat-label">
							<?=$skill_name?>
						</div>
					</div>
					<div class="col-sm-8">
						<div class="progress" style="background-color:none;">
						  <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?=$percent?>" aria-valuemin="0" aria-valuemax="100" style="width: <?=$percent?>%"></div>
						</div>
					</div>
				</div>
				<?
					}
				?>
			</div>
		</div>
	</div>
</div>

<?
	$background = rand(1, 6);
	$bg_music = rand(1, 4);
?>
<div id="battle-fight" class="background-<?=$background?>" style="display:none;" data-music="<?=$bg_music?>">

</div>

<?
/*


<div class="container-fluid" id="statusbars">
	<div class="row">
		<div class="col-sm-5">
			<div class="energy-bar energy-bar-left">
				<div class="energy-bar-block energy-bar-1"></div>
				<div class="energy-bar-block energy-bar-2"></div>
				<div class="energy-bar-block energy-bar-3"></div>
				<div class="energy-bar-block energy-bar-4"></div>
				<div class="energy-bar-block energy-bar-5"></div>
			</div>
			<div class="fighter-name text-left">Alan Shih</div>
		</div>
		<div class="col-sm-2" id="versus">
			<img src="<?=$base_url?>assets/img/versusredshadow.png" alt="Versus Logo">
		</div>
		<div class="col-sm-5">
			<div class="energy-bar energy-bar-right">
				<div class="energy-bar-block energy-bar-1"></div>
				<div class="energy-bar-block energy-bar-2"></div>
				<div class="energy-bar-block energy-bar-3"></div>
				<div class="energy-bar-block energy-bar-4"></div>
				<div class="energy-bar-block energy-bar-5"></div>
			</div>
			<div class="fighter-name text-right">Peter Yang</div>
		</div>
	</div>
</div>
<div id="fight">
	<img src="<?=$base_url?>assets/img/fight.png" alt="Fight Logo">
</div>
*/
?>


