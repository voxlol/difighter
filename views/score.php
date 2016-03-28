<?
	usort($standings, "cmp");
?>
<div id="score-table">
  <div class="row">
    <div class="text-center">
			<div class="number-1" style="padding: 25px 50px 0 50px;">
				<img class="img-responsive" src="<?=BASE_URL?>assets/img/players/profile/<?=$standings[0]->id?>.jpg" />
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
        ?>
        <tr class="<?=$highlight?>">
					<td class="rank"><?=$start?></td>
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