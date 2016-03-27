<div id="battle-wrapper">
	<div class="container" id="battle-preview-box" style="display:none;">
		<div class="row">
			<div class="col-sm-5">
				<img src="http://placehold.it/500x500" class="img-responsive">
				<div class="name"><?=$results['player_1']['name']?></div>
				<div class="stats">
					<?
						$loop = 1;
						asort($results['player_1']['skills'], SORT_REGULAR);
						$results['player_1']['skills'] = array_reverse($results['player_1']['skills']);
						foreach($results['player_1']['skills'] as $skill_name => $skill_point) {
							$percent = get_percentage($skill_point);
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
							if ($loop == 8) {
								break;
							}
							$loop++;
						}
					?>
				</div>
			</div>
			<div class="col-sm-2">
				<div class="text-center vs-sign">VS</div>
			</div>
			<div class="col-sm-5">
				<img src="http://placehold.it/500x500" class="img-responsive">
				<div class="name"><?=$results['player_2']['name']?></div>
				<div class="stats">
					<?
						$loop = 1;
						asort($results['player_2']['skills'], SORT_REGULAR);
						$results['player_2']['skills'] = array_reverse($results['player_2']['skills']);
						foreach($results['player_2']['skills'] as $skill_name => $skill_point) {
							$percent = get_percentage($skill_point);
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
							if ($loop == 8) {
								break;
							}
							$loop++;
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
	<div id="battle-fight" class="background-<?=$background?>" style="display:none;" data-music="<?=$bg_music?>"
		data-winner="<?=$results['battle']['winner']['player']?>"
		data-score="<?=$results['battle']['winner']['score']?>"
		data-loser-id="<?=$results['battle']['loser']['id']?>"
		data-winner-id="<?=$results['battle']['winner']['id']?>">

		<div id="player-names">
			<div class="container">
				<div class="row">
					<div class="col-sm-6 player_1">
						<div class="player-name"><?=$results['player_1']['name']?></div>
						<div class="trophy"></div>
					</div>
					<div class="col-sm-6 text-right player_2">
						<div class="player-name"><?=$results['player_2']['name']?></div>
						<div class="trophy text-right"></div>
					</div>
				</div>
			</div>
		</div>

		<div id="subject" class="text-center" >
			<?
				$loop = 1;
				foreach($results['battle']['rounds'] as $round) {
			?>
			<div class="round round-<?=$loop?>" data-winner="<?=$round['winner']?>" style="display:none;">
				<div class="round-number">Round <?=$loop?></div>
				<div class="subject-title"><?=$round['subject']?></div>
			</div>
			<?
					$loop++;
				}
			?>
			<div class="winner-item winner-name" style="display:none;"><?=$results['battle']['winner']['name']?> Wins</div>
			<div class="winner-item winner-perfect" style="display:none;">PERFECT</div>
		</div>
		<div id="fighters">
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="player-box player-1">
							<div class="sprite">
								<div class="standing">
									<div class="fire hide"><img src="<?=BASE_URL?>assets/img/fire.gif" /></div>
									<div class="hit hide"><img src="<?=BASE_URL?>assets/img/hit.png" /></div>
									<img class="head bounce" src="<?=BASE_URL?>assets/img/players/<?=$results['player_1']['id']?>.png" />
									<img class="gif" src="<?=BASE_URL?>assets/img/char-1-stand.gif" />
								</div>
								<div class="fighting hide">
									<img class="head bounce-2" src="<?=BASE_URL?>assets/img/players/<?=$results['player_1']['id']?>.png" />
									<img class="gif" src="<?=BASE_URL?>assets/img/char-1-fight.gif" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="player-box player-2">
							<div class="sprite pull-right">
								<div class="standing">
									<div class="fire hide"><img src="<?=BASE_URL?>assets/img/fire.gif" /></div>
									<div class="hit hide"><img src="<?=BASE_URL?>assets/img/hit.png" /></div>
									<img class="head bounce-2" src="<?=BASE_URL?>assets/img/players/<?=$results['player_2']['id']?>.png" />
									<img class="gif" src="<?=BASE_URL?>assets/img/char-2-stand.gif" />
								</div>
								<div class="fighting hide">
									<img class="head bounce-2" src="<?=BASE_URL?>assets/img/players/<?=$results['player_2']['id']?>.png" />
									<img class="gif" src="<?=BASE_URL?>assets/img/char-2-fight.gif" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="battle-winner-info" style="display:none;">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<img src="http://placehold.it/600x600" class="img-responsive">
				<div class="name"><?=$results['battle']['winner']['name']?></div>
				<div class="row records">
					<div class="col-sm-4 text-center">
						Wins: 0
					</div>
					<div class="col-sm-4 text-center">
						Loses: 0
					</div>
					<div class="col-sm-4 text-center">
						Rate: 0%
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="quote text-center">Quote goes here Quote goes here Quote goes here Quote goes here </div>
			</div>
		</div>
	</div>
</div>
