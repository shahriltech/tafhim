<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupYuranTahun5 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-yuran-tahun5-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'jenis_bayaran')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jumlah')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
