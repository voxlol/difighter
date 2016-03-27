<div id="score-table">
  <div class="row">
    <div class="text-center">
      <table>
        <tr>
	        <th></th>
	        <th>NAME</th>
          <th class="text-right">WIN</th>
          <th class="text-right">LOSS</th>
          <th class="text-right">RATE</th>
        </tr>
        <?
					usort($standings, "cmp");
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
						$start++;
          }
        ?>
      </table>
    </div>
  </div>
</div>