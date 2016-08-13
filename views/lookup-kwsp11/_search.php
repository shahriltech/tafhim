<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp11Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kwsp11-search">

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
        <?= Html::submitButton('<span class="glyphicon glyphicon-search"></span> Carian', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
