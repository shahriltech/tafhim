<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatatanKemajuaan */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="catatan-kemajuaan-form">

    <?php  $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'peperiksaan')->dropDownList([ 'Pertengahan Tahun' => 'Pertengahan Tahun', 'Akhir Tahun' => 'Akhir Tahun', ], 
    [
        'prompt' => '',
        'onchange'=>'$.post( "'.Yii::$app->urlManager->createUrl(['catatan-kemajuaan/change','umur'=>$umur,'id_pelajar'=>$id,'exam'=>'']).'"+$(this).val(), function( data ) {$( "div#stupid" ).html( data );});',
        ]) ?>

    <div id="stupid"></div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
