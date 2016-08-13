<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LookupPusatPengajian;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */
/* @var $form yii\widgets\ActiveForm */
$tahfiz = ArrayHelper::map(LookupPusatPengajian::find()->asArray()->all(),'id','pusat_pengajian'); //retrieve data for dropdown

?>

<div class="maklumat-kakitangan-form">

    <?php $form = ActiveForm::begin(); ?>  
    <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>

    <div class="row">
        <div class="portlet-body form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'nama',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'nama'); ?></span>
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
                        <?= Html::activeTextInput($model,'no_kp',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_kp'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'no_kp'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_pekerja',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_pekerja'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'no_pekerja'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
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
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tarikh_mula_kerja',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_mula_kerja'); ?></label>
                            <span class="help-block"><?= Html::error($model,'tarikh_mula_kerja'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tarikh_lahir',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_lahir'); ?></label>
                            <span class="help-block"><?= Html::error($model,'tarikh_lahir'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'jawatan_sekarang',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'jawatan_sekarang'); ?></label>
                            <span class="help-block"><?= Html::error($model,'jawatan_sekarang'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'tahfiz', $tahfiz, 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tahfiz'); ?> <span class="required">*</span></label>
                            <span class="help-block"><?= Html::error($model,'tahfiz'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextArea($model,'alamat_tempat_kerja',['class'=>'form-control','rows'=>3]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'alamat_tempat_kerja'); ?></label>
                            <span class="help-block"><?= Html::error($model,'alamat_tempat_kerja'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextArea($model,'alamat_tetap',['class'=>'form-control','rows'=>3]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'alamat_tetap'); ?></label>
                            <span class="help-block"><?= Html::error($model,'alamat_tetap'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextArea($model,'alamat_surat_menyurat',['class'=>'form-control','rows'=>3]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'alamat_surat_menyurat'); ?></label>
                            <span class="help-block"><?= Html::error($model,'alamat_surat_menyurat'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextArea($model,'tempat_lahir',['class'=>'form-control','rows'=>3]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tempat_lahir'); ?></label>
                            <span class="help-block"><?= Html::error($model,'tempat_lahir'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_tel_rumah',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_tel_rumah'); ?></label>
                            <span class="help-block"><?= Html::error($model,'no_tel_rumah'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_tel_bimbit',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_tel_bimbit'); ?></label>
                            <span class="help-block"><?= Html::error($model,'no_tel_bimbit'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tinggi_cm',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tinggi_cm'); ?></label>
                            <span class="help-block"><?= Html::error($model,'tinggi_cm'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'berat_kg',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'berat_kg'); ?></label>
                            <span class="help-block"><?= Html::error($model,'berat_kg'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'tahap_kesihatan',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'tahap_kesihatan'); ?></label>
                            <span class="help-block"><?= Html::error($model,'tahap_kesihatan'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'pengesahan_kesihatan',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'pengesahan_kesihatan'); ?></label>
                            <span class="help-block"><?= Html::error($model,'pengesahan_kesihatan'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'kecacatan',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'kecacatan'); ?></label>
                            <span class="help-block"><?= Html::error($model,'kecacatan'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'nyatakan_kecacatan',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'nyatakan_kecacatan'); ?></label>
                            <span class="help-block"><?= Html::error($model,'nyatakan_kecacatan'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'nama_ketua_usrah',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'nama_ketua_usrah'); ?></label>
                            <span class="help-block"><?= Html::error($model,'nama_ketua_usrah'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'kumpulan_usrah',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'kumpulan_usrah'); ?></label>
                            <span class="help-block"><?= Html::error($model,'kumpulan_usrah'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'unit_usrah',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'unit_usrah'); ?></label>
                            <span class="help-block"><?= Html::error($model,'unit_usrah'); ?></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_ahli_abim',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_ahli_abim'); ?></label>
                            <span class="help-block"><?= Html::error($model,'no_ahli_abim'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-6">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'rujukan_tawaran',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'rujukan_tawaran'); ?></label>
                            <span class="help-block"><?= Html::error($model,'rujukan_tawaran'); ?></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'skim_gaji_awal',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'skim_gaji_awal'); ?></label>
                            <span class="help-block"><?= Html::error($model,'skim_gaji_awal'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-12">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'nama_waris',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'nama_waris'); ?></label>
                            <span class="help-block"><?= Html::error($model,'nama_waris'); ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="portlet-body-form">
            <div class="form-body">
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'hubungan_waris',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'hubungan_waris'); ?></label>
                            <span class="help-block"><?= Html::error($model,'hubungan_waris'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'no_tel_waris',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'no_tel_waris'); ?></label>
                            <span class="help-block"><?= Html::error($model,'no_tel_waris'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group form-md-line-input">
                        <?= Html::activeTextInput($model,'kelulusan_tertinggi',['class'=>'form-control']); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'kelulusan_tertinggi'); ?></label>
                            <span class="help-block"><?= Html::error($model,'kelulusan_tertinggi'); ?></span>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class='form-group form-md-line-input'>
                        <?= Html::activeDropDownList($model, 'peratus_kwsp', 
                            [
                                '8'=>'8',
                                '11'=>'11',
                            ], 
                            [
                                'prompt'=>'--Sila Pilih--',
                                'class'=>'form-control',

                            ]); ?>
                            <label for="form_control_1"><?= Html::activeLabel($model,'peratus_kwsp'); ?></label>
                            <span class="help-block"><?= Html::error($model,'peratus_kwsp'); ?></span>
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
