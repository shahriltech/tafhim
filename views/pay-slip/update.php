<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PaySlip */

$this->title = 'Update Pay Slip: ' . $model->pay_slip_id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Slips', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pay_slip_id, 'url' => ['view', 'id' => $model->pay_slip_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pay-slip-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
