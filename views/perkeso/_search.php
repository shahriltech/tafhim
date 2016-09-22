<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PerkesoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perkeso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_perkeso') ?>

    <?= $form->field($model, 'dari') ?>

    <?= $form->field($model, 'hingga') ?>

    <?= $form->field($model, 'syer_majikan') ?>

    <?= $form->field($model, 'syer_pekerja') ?>

    <?php // echo $form->field($model, 'jumlah_caruman') ?>

    <?php // echo $form->field($model, 'jumlah_caruman_majikan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
