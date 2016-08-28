<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatCutiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-cuti-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'id_staff') ?>

    <?= $form->field($model, 'jenis_cuti') ?>

    <?= $form->field($model, 'tahun') ?>

    <?= $form->field($model, 'bulan') ?>

    <?php // echo $form->field($model, 'bilangan_cuti') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
