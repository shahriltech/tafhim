<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp11 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kwsp11-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'dari')->textInput(['maxlength' => true,'class'=>'form-control']) ?>

    <?= $form->field($model, 'hingga')->textInput(['maxlength' => true,'class'=>'form-control']) ?>

    <?= $form->field($model, 'oleh_majikan')->textInput(['maxlength' => true,'class'=>'form-control']) ?>

    <?= $form->field($model, 'oleh_pekerja')->textInput(['maxlength' => true,'class'=>'form-control']) ?>

    <?= $form->field($model, 'jumlah_caruman')->textInput(['maxlength' => true,'class'=>'form-control']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
