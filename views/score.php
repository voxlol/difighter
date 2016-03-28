<?
	usort($standings, "cmp");
?>
<div id="score-table">
  <div class="row">
    <div class="text-center">
			<div class="logo">
				<div>
						<img id="diLogo" src="<?=BASE_URL?>assets/img/DI-logo.png" />
				</div>
				<div class"title">
					<h4>Digital</h4>
					<h4>Interactive</h4>
				</div>
			</div>
			<div class="number-1">
				<img class="medal" src="<?=BASE_URL?>assets/img/goldMedal.png" />
				<img class="profile img-responsive" src="<?=BASE_URL?>assets/img/players/profile/<?=$standings[0]->id?>.jpg" />
			</div>
      <table>
        <tr>
	        <th></th>
	        <th>NAME</th>
          <th class="text-right">WIN</th>
          <th class="text-right">LOSS</th>
          <th class="text-right">RATE</th>
        </tr>
        <?
					$start = 1;
          foreach($standings AS $standing){
						$highlight = ($start < 4 ? 'highlight' : '');
						switch($start) {
							case 1:
								$show_rank = '<img class="medals" src="'.BASE_URL.'assets/img/goldMedal.png" />';
							break;
							case 2:
								$show_rank = '<img class="medals" src="'.BASE_URL.'assets/img/silverMedal.png" />';
							break;
							case 3:
								$show_rank = '<img class="medals" src="'.BASE_URL.'assets/img/bronzeMedal.png" />';
							break;
							default:
								$show_rank = $start;
							break;
						}
				?>
        <tr class="<?=$highlight?>">
					<td class="rank"><?=$show_rank?></td>
          <td class="name"><?=$standing->name?></td>
          <td class="win"><?=$standing->win?></td>
          <td class="loss"><?=$standing->loss?></td>
          <td class="percentage"><?=number_format($standing->rate * 100, 0)?>%</td>
        </tr>
        <?
						if ($start == 10) {
							break;
						}
						$start++;
          }
        ?>
      </table>
    </div>
  </div>
</div>
