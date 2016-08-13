<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CatatanKemajuaan */

$this->title = 'Update Catatan Kemajuaan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Catatan Kemajuaans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="catatan-kemajuaan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
