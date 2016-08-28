<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use app\models\MaklumatKakitangan;
use app\models\LookupCuti;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatCuti */
/* @var $form yii\widgets\ActiveForm */
$nama = ArrayHelper::map(MaklumatKakitangan::find()->asArray()->orderBy(['nama'=>SORT_ASC])->all(),'id_staf','nama'); //retrieve data for dropdown
$cuti = ArrayHelper::map(LookupCuti::find()->asArray()->orderBy(['id'=>SORT_ASC])->all(),'id','jenis_cuti');
?>

<div class="maklumat-cuti-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-12">
            <div class='form-group form-md-line-input'>
                <?= Html::activeDropDownList($model, 'id_staff', $nama, 
                    [
                        'prompt'=>'--Sila Pilih--',
                        'class'=>'form-control',

                    ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'id_staff'); ?> <span class="required">*</span></label>
                        <span class="help-block"><?= Html::error($model,'id_staff'); ?></span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class='form-group form-md-line-input'>
                <?= Html::activeDropDownList($model, 'jenis_cuti', $cuti, 
                    [
                        'prompt'=>'--Sila Pilih--',
                        'class'=>'form-control',

                    ]); ?>
                        <label for="form_control_1"><?= Html::activeLabel($model,'jenis_cuti'); ?> <span class="required">*</span></label>
                        <span class="help-block"><?= Html::error($model,'jenis_cuti'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-md-line-input">
                <?= Html::activeTextInput($model,'tahun',['class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'tahun'); ?></label>
                    <span class="help-block"><?= Html::error($model,'tahun'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-md-line-input">
                <?= Html::activeTextInput($model,'bulan',['class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'bulan'); ?></label>
                    <span class="help-block"><?= Html::error($model,'bulan'); ?></span>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group form-md-line-input">
                <?= Html::activeTextInput($model,'bilangan_cuti',['class'=>'form-control']); ?>
                    <label for="form_control_1"><?= Html::activeLabel($model,'bilangan_cuti'); ?></label>
                    <span class="help-block"><?= Html::error($model,'bilangan_cuti'); ?></span>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
