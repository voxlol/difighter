<?
	//	debug
	$debug_battle_preview_box = "display:none;";
	$debug_battle_winner_info = "display:none;";
	$debug_battle_fight = "display:none;";
	$debug_battle_di = "display:none;";

	// $debug_battle_preview_box = "";
	// $debug_battle_winner_info = "";
	// $debug_battle_fight = "";
	// $debug_battle_di = "";
?>


<div id="battle-wrapper" data-show-market="<?=SHOW_SIGN?>">
	<div class="container" id="battle-preview-box" style="<?=$debug_battle_preview_box?>">
		<div class="row">
			<div class="col-sm-5">
				<img src="<?=BASE_URL?>assets/img/players/profile/<?=$results['player_1']['id']?>.jpg" class="img-responsive">
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
				<img src="<?=BASE_URL?>assets/img/players/profile/<?=$results['player_2']['id']?>.jpg" class="img-responsive">
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
		$background = rand(1, 22);
		$bg_music = rand(1, 10);
	?>
	<div id="battle-fight" class="background-<?=$background?>" style="<?=$debug_battle_fight?>" data-music="<?=$bg_music?>"
		data-winner="<?=$results['battle']['winner']['player']?>"
		data-score="<?=$results['battle']['winner']['score']?>"
		data-loser-id="<?=$results['battle']['loser']['id']?>"
		data-winner-id="<?=$results['battle']['winner']['id']?>">

			<div class="player-profile-1">
				<img src="<?=BASE_URL?>assets/img/players/profile/<?=$results['player_1']['id']?>.jpg" class="img-responsive">
			</div>
			<div class="player-profile-2">
				<img src="<?=BASE_URL?>assets/img/players/profile/<?=$results['player_2']['id']?>.jpg" class="img-responsive">
			</div>
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
						<?
							$standing = '';
							$fighting = 'hide';
						?>
						<div class="player-box player-1">
							<div class="sprite char-<?=$results['player_1']['model']?>">
								<div class="standing <?=$standing?>">
									<div class="fire hide"><img src="<?=BASE_URL?>assets/img/fire.gif" /></div>
									<div class="hit hide"><img src="<?=BASE_URL?>assets/img/hit.png" /></div>
									<img class="head bounce" src="<?=BASE_URL?>assets/img/players/head/<?=$results['player_1']['id']?>.png" />
									<img class="sprite-gif" src="<?=BASE_URL?>assets/img/char-<?=$results['player_1']['model']?>-stand.gif" />
								</div>
								<div class="fighting <?=$fighting?>">
									<img class="head bounce-2" src="<?=BASE_URL?>assets/img/players/head/<?=$results['player_1']['id']?>.png" />
									<img class="sprite-gif" src="<?=BASE_URL?>assets/img/char-<?=$results['player_1']['model']?>-fight.gif" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="player-box player-2">
							<div class="sprite char-<?=$results['player_2']['model']?> pull-right">
								<div class="standing <?=$standing?>">
									<div class="fire hide"><img src="<?=BASE_URL?>assets/img/fire.gif" /></div>
									<div class="hit hide"><img src="<?=BASE_URL?>assets/img/hit.png" /></div>
									<div class="flipX">
										<img class="head bounce-2" src="<?=BASE_URL?>assets/img/players/head/<?=$results['player_2']['id']?>.png" />
										<img class="sprite-gif" src="<?=BASE_URL?>assets/img/char-<?=$results['player_2']['model']?>-stand.gif" />
									</div>
								</div>
								<div class="fighting <?=$fighting?>">
									<div class="flipX">
										<img class="head bounce-2" src="<?=BASE_URL?>assets/img/players/head/<?=$results['player_2']['id']?>.png" />
										<img class="sprite-gif" src="<?=BASE_URL?>assets/img/char-<?=$results['player_2']['model']?>-fight.gif" />
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container" id="battle-winner-info" style="<?=$debug_battle_winner_info?>">
		<div class="row">
			<div class="col-sm-6 col-sm-offset-3">
				<div class="winner">WINNER</div>
				<img src="<?=BASE_URL?>assets/img/players/profile/<?=$results['battle']['winner']['id']?>.jpg" style="width: 100%;">
				<div class="name"><?=$results['battle']['winner']['name']?></div>
				<div class="row records">
					<div class="col-sm-4 text-center">
						Wins: <?=$winner['win']?>
					</div>
					<div class="col-sm-4 text-center">
						Loses: <?=$winner['loss']?>
					</div>
					<div class="col-sm-4 text-center">
						Rate: <?=$winner['rate']?>%
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-12">
				<div class="quote text-center"><?=$results['battle']['winner']['quote']?></div>
			</div>
		</div>
	</div>
	

	<div class="container" id="battle-di" style="<?=$debug_battle_di?>">
		<div class="row" style="margin-top: 320px;">
			<div class="col-sm-12">
				<div class="blink_me text-center">
					<div style="font-size: 45px; margin-bottom: 20px;">To see more of demos</div>
					<div style="font-size: 60px; margin-bottom: 20px;">visit <span style="color: #fff;">2B205</span></div>
				</div> 
			</div>
		</div>
	</div>
	
</div>
