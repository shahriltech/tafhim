<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaySlip */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pay-slip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'staff_id')->textInput() ?>

    <?= $form->field($model, 'gaji_asas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'elaun_rumah')->textInput() ?>

    <?= $form->field($model, 'elaun_asas')->textInput() ?>

    <?= $form->field($model, 'ctg')->textInput() ?>

    <?= $form->field($model, 'kksk')->textInput() ?>

    <?= $form->field($model, 'tabung_guru')->textInput() ?>

    <?= $form->field($model, 'tabung_haji')->textInput() ?>

    <?= $form->field($model, 'cuti_ehsan')->textInput() ?>

    <?= $form->field($model, 'cuti_sakit')->textInput() ?>

    <?= $form->field($model, 'pelarasan')->textInput() ?>

    <?= $form->field($model, 'potongan')->textInput() ?>

    <?= $form->field($model, 'kwsp')->textInput() ?>

    <?= $form->field($model, 'socso')->textInput() ?>

    <?= $form->field($model, 'gaji_tahan')->textInput() ?>

    <?= $form->field($model, 'sewa_rumah')->textInput() ?>

    <?= $form->field($model, 'loan')->textInput() ?>

    <?= $form->field($model, 'tarikhmasa')->textInput() ?>

    <?= $form->field($model, 'memo_ctg')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hibah')->textInput() ?>

    <?= $form->field($model, 'bonus')->textInput() ?>

    <?= $form->field($model, 'lain')->textInput() ?>

    <?= $form->field($model, 'lain_tambahan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
