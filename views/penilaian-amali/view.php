<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PenilaianAmali */


?>
<div class="penilaian-amali-view">

<table class="table">
    <tr>
        <th>Mata Pelajaran</th>
        <th>Markah</th>
    
    </tr>

<?php $sum = 0; foreach ($details as $key => $value) { ?>
<tr>
    <td><?php echo $value['perkara']; ?></td>
    <td><?php $sum += $value['markah_penuh'];  echo $value['markah_penuh']; ?></td>

</tr>

<?php } ?>
<tr>
    <th>Jumlah Markah Penuh</th>
    <th><?php echo $sum.' / 100'; ?></th>
</tr>
</table>
</div>

</div>
