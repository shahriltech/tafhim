<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CatatanKemajuaan */


?>
<div class="catatan-kemajuaan-view">

   



<table class="table">
	<tr>
		<th>Mata Pelajaran</th>
		<th>Markah</th>
		<th>Gred</th>
	</tr>

<?php foreach ($details as $key => $value) { ?>
<tr>
	<td><?php echo $value['mata_pelajaran']; ?></td>
	<td><?php echo $value['markah']; ?></td>
	<td><?php echo $value['gred'].' - '.$value['jenis']; ?></td>
</tr>

<?php } ?>
</table>
</div>
