<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Perkeso */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="perkeso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'dari')->textInput() ?>

    <?= $form->field($model, 'hingga')->textInput() ?>

    <?= $form->field($model, 'syer_majikan')->textInput() ?>

    <?= $form->field($model, 'syer_pekerja')->textInput() ?>

    <?= $form->field($model, 'jumlah_caruman')->textInput() ?>

    <?= $form->field($model, 'jumlah_caruman_majikan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
