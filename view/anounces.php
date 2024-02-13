<?php
/**
 *Created by bargylus.
 *FILE_NAME:home.php
 *USER:marwan
 *DATE:14.05.2020
 */

ob_start();
?>
<div class="col-12 col-lg-8"  style="position: relative;bottom:0px;justify-content: center;align-items: center; height: 100%; ">




<table class="table table-striped ">
  <thead >
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">fecha</th>
      <th scope="col">horario</th> 
      <th scope="col">lugar</th>
      <th scope="col">comité</th>
      <th scope="col">detalles</th>
    </tr>
  </thead>
  <tbody>

  <?php foreach($events as $key  => $oneEvent){ ?>
    <tr>
      <th><?=$oneEvent['name']?></th>
      <td><?=$oneEvent['date_event']?></td>
      <td><?=$oneEvent['time_init']?>-<?=$oneEvent['time_end']?></td>
      <td><?=$oneEvent['place']?></td>
      <td><?=$oneEvent['name_comite']?></td>
      <td><?=$oneEvent['details']?></td>
      <td><?=$oneEvent['offering']?></td>
      <td><a type=button href="index.php?action=home&id=<?=$oneEvent['id_event']?>" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
  <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001m-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708z"/>
</svg></a></td>
    </tr>
<?php } ?>


  </tbody>
</table>


</div>


<?php
$content2 = ob_get_clean();
require "view/gabarit.php";
?>
