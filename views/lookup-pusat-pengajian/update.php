<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupPusatPengajian */

$this->title = 'Update Lookup Pusat Pengajian: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Pusat Pengajians', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-pusat-pengajian-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
