<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupMarkah */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-markah-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'markah')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gred')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jenis')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
