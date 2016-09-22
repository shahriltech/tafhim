<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PaySlip */

$this->title = 'Create Pay Slip';
$this->params['breadcrumbs'][] = ['label' => 'Pay Slips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-slip-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
