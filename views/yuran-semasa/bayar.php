<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\TransaksiYuran */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-yuran-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php  echo '<label class="control-label">Tarikh Bayaran</label>';
    echo DatePicker::widget([
        'name' => 'YuranSemasa[tarikh_akhir_bayaran]',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy'
        ]
    ]); ?>
            <br>
  
    <?= $form->field($model, 'jumlah_bayaran')->textInput() ?>

    <?= $form->field($model, 'nota')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_resit')->textInput(['maxlength' => true]) ?>

   
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Bayar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>