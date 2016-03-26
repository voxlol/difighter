<div class="container-fluid">
  <div class="row">
    <div class="text-center">
      <img src="<?=$base_url?>assets/img/DIFighterLogo.png" alt="DI Fighter Logo" height="75" width="350">

      <table>
        <tr>
          <th>NAME</th>
          <th class="text-right">WIN</th>
          <th class="text-right">LOSS</th>
          <th class="text-right">RATE</th>
        </tr>
        <?
          for($i = 1; $i < 11; $i++){
        ?>

        <tr>
          <td class="name">Alan Shih</td>
          <td class="win">100</td>
          <td class="loss">0</td>
          <td class="percentage">100%</td>
        </tr>
        <tr>
          <td class="name">Kevin Chiu</td>
          <td class="win">99</td>
          <td class="loss">1</td>
					<td class="percentage">99%</td>
        </tr>
        <tr>
          <td class="name">Peter Yang</td>
          <td class="win">1</td>
          <td class="loss">99</td>
          <td class="percentage">1%</td>
        </tr>
        <?
          }
        ?>
      </table>
    </div>
  </div>
</div>
