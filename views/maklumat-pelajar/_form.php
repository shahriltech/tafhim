<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LookupPusatPengajian;
use yii\helpers\ArrayHelper; 

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajar */
/* @var $form yii\widgets\ActiveForm */
$pusat_pengajian = ArrayHelper::map(LookupPusatPengajian::find()->asArray()->all(),'id','pusat_pengajian'); //retrieve data for dropdown
?>

<div class="maklumat-pelajar-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'nama_pelajar',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'nama_pelajar'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'nama_pelajar'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'jantina',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'jantina'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'jantina'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tarikh_lahir',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_lahir'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'tarikh_lahir'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_surat_beranak',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_surat_beranak'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'no_surat_beranak'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_my_kid',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_my_kid'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'no_my_kid'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextArea($model,'tempat_lahir',['class'=>'form-control','rows'=>3]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tempat_lahir'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'tempat_lahir'); ?></span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextArea($model,'alamat_rumah',['class'=>'form-control','rows'=>3]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'alamat_rumah'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'alamat_rumah'); ?></span>
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
                        <?= Html::activeTextInput($model,'no_tel_rumah',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_tel_rumah'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'no_tel_rumah'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'SPRA',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'SPRA'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'SPRA'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'PSRA',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'PSRA'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'PSRA'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class='col-md-4'>
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'warganegara', 
                            [
                                'Warganegara'=>'Warganegara',
                                'Bukan Warganegara'=>'Bukan Warganegara',
                            ], 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'warganegara'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'warganegara'); ?></span>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'id_pusat_pengajian',$pusat_pengajian,
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'id_pusat_pengajian'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'id_pusat_pengajian'); ?></span>
                    </div>
                </div>
                <div class='col-md-4'>
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'sesi_pengajian', 
                            [
                                'Pagi'=>'Pagi',
                                'Petang'=>'Petang',
                            ], 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'sesi_pengajian'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'sesi_pengajian'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class='col-md-3'>
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'tahun_mula', 
                            [
                                '1'=>'1',
                                '2'=>'2',
                                '3'=>'3',
                                '4'=>'4',
                                '5'=>'5',
                                '6'=>'6',
                            ], 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tahun_mula'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'tahun_mula'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tarikh_masuk',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_masuk'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'tarikh_masuk'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tahun_lewat',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tahun_lewat'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'tahun_lewat'); ?></span>
                    </div>
                </div>
                <div class='col-md-3'>
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'status', 
                            [
                                'Approved'=>'Approved',
                                'Pending'=>'Pending',
                                'Tamat'=>'Tamat',
                            ], 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'status'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'status'); ?></span>
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
