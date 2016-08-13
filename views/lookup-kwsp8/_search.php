<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp8Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kwsp8-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kwsp') ?>

    <?= $form->field($model, 'dari') ?>

    <?= $form->field($model, 'hingga') ?>

    <?= $form->field($model, 'oleh_majikan') ?>

    <?= $form->field($model, 'oleh_pekerja') ?>

    <?php // echo $form->field($model, 'jumlah_caruman') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
