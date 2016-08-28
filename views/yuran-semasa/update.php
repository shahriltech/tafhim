<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\YuranSemasa */

$this->title = 'Update Yuran Semasa: ' . $model->id_yuran;
$this->params['breadcrumbs'][] = ['label' => 'Yuran Semasas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_yuran, 'url' => ['view', 'id' => $model->id_yuran]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="yuran-semasa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
