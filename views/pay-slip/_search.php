<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaySlipSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pay-slip-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pay_slip_id') ?>

    <?= $form->field($model, 'staff_id') ?>

    <?= $form->field($model, 'gaji_asas') ?>

    <?= $form->field($model, 'elaun_rumah') ?>

    <?= $form->field($model, 'elaun_asas') ?>

    <?php // echo $form->field($model, 'ctg') ?>

    <?php // echo $form->field($model, 'kksk') ?>

    <?php // echo $form->field($model, 'tabung_guru') ?>

    <?php // echo $form->field($model, 'tabung_haji') ?>

    <?php // echo $form->field($model, 'cuti_ehsan') ?>

    <?php // echo $form->field($model, 'cuti_sakit') ?>

    <?php // echo $form->field($model, 'pelarasan') ?>

    <?php // echo $form->field($model, 'potongan') ?>

    <?php // echo $form->field($model, 'kwsp') ?>

    <?php // echo $form->field($model, 'socso') ?>

    <?php // echo $form->field($model, 'gaji_tahan') ?>

    <?php // echo $form->field($model, 'sewa_rumah') ?>

    <?php // echo $form->field($model, 'loan') ?>

    <?php // echo $form->field($model, 'tarikhmasa') ?>

    <?php // echo $form->field($model, 'memo_ctg') ?>

    <?php // echo $form->field($model, 'hibah') ?>

    <?php // echo $form->field($model, 'bonus') ?>

    <?php // echo $form->field($model, 'lain') ?>

    <?php // echo $form->field($model, 'lain_tambahan') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
