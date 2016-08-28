<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp11 */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lookup-kwsp11-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'dari',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'dari'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'dari'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'hingga',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'hingga'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'hingga'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'oleh_majikan',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'oleh_majikan'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'oleh_majikan'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'oleh_pekerja',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'oleh_pekerja'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'oleh_pekerja'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'jumlah_caruman',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'jumlah_caruman'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'jumlah_caruman'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
