<?
$battle = new Battle();
$results = $battle->get_battle();

?>
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
<div id="battle-fight" class="background-<?=$background?>" style="" data-music="<?=$bg_music?>">

	<div id="subject">
		<div class="round-1">Round 1</div>
		<div class="round-2">Round 2</div>
		<div class="round-3">Round 3</div>
		<div class="round-4">Round 4</div>
		<div class="round-5">Round 5</div>
	</div>


	<div id="fighters">
		<div class="container">
			<div class="row">
				<div class="col-sm-6">
					<div class="player-box player-1">
						<div class="sprite">
							<div class="standing">
								<img src="<?=BASE_URL?>assets/img/character-1-stand.gif" />
							</div>
							<div class="fighting">
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="player-box player-2">
						<div class="sprite pull-right">

							<div class="standing">
								<img class="head" src="<?=BASE_URL?>assets/img/anthonyChen.png" />
								<img class="gif" src="<?=BASE_URL?>assets/img/character-2-stand.gif" />
							</div>
							<div class="fighting">
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

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


