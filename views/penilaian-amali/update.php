<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PenilaianAmali */

$this->title = 'Update Penilaian Amali: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Penilaian Amalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="penilaian-amali-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
