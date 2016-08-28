<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupBorangPenilaianAmaliTahun1 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-borang-penilaian-amali-tahun1-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'perkara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesi')->dropDownList([ 'Tengah Tahun' => 'Tengah Tahun', 'Akhir Tahun' => 'Akhir Tahun', 'Kedua dua' => 'Kedua dua', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'markah')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
