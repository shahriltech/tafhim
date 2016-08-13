<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CatatanKemajuaan */

$this->title = 'Jana Catatan Kemajuaan -'.$umur.' Tahun';
$this->params['breadcrumbs'][] = ['label' => 'Catatan Kemajuaan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catatan-kemajuaan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    	'id'=>$id,
        'model' => $model,
         'umur'=> $umur,
         'model2' => $model2,
    ]) ?>

</div>
