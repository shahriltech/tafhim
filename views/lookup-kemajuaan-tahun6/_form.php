<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKemajuaanTahun6 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kemajuaan-tahun6-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mata_pelajaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sesi')->dropDownList([ 'Tengah Tahun' => 'Tengah Tahun', 'Akhir Tahun' => 'Akhir Tahun', 'Kedua dua' => 'Kedua dua', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'id_catatan_pelajaran')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
