<?
$battle = new Battle();
$standings = $battle->get_battle_results();
?>
<div class="container-fluid">
  <div class="row">
    <div class="text-center">
      <table>
        <tr>
          <th>NAME</th>
          <th class="text-right">WIN</th>
          <th class="text-right">LOSS</th>
          <th class="text-right">RATE</th>
        </tr>
        <?
          foreach($standings AS $standing){
        ?>

        <tr>
          <td class="name"><?=$standing->name?></td>
          <td class="win"><?=$standing->win?></td>
          <td class="loss"><?=$standing->loss?></td>
          <td class="percentage"><?=number_format($standing->rate * 100, 0)?>%</td>
        </tr>

        <?
          }
        ?>
      </table>
    </div>
  </div>
</div>
