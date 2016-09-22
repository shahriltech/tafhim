<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Perkeso */

$this->title = 'Update Perkeso: ' . $model->id_perkeso;
$this->params['breadcrumbs'][] = ['label' => 'Perkesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_perkeso, 'url' => ['view', 'id' => $model->id_perkeso]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="perkeso-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
