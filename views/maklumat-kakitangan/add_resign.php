<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LookupStatusPekerjaan;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitangan */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Kemaskini Status Pekerjaan';
$this->params['breadcrumbs'][] = ['label' => 'Pengurusan Kakitangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Senarai Maklumat Kakitangan Yang Telah Berhenti', 'url' => ['resign']];
$this->params['breadcrumbs'][] = $this->title;

$status = ArrayHelper::map(LookupStatusPekerjaan::find()->asArray()->all(),'id','status_pekerjaan'); //retrieve data for dropdown

?>
<div class='row'>
    <div class="col-md-12">
        <div class="note note-danger">
            <p> NOTA: Ruangan Yang Bertanda * Wajib Di Isi.</p>
        </div>
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-briefcase font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Tukar Status Pekerjaan </span>
                </div>
                <div class="actions">
                                    <!---->
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="maklumat-kakitangan-form">

                    <?php $form = ActiveForm::begin(); ?>  
                    <?= $form->errorSummary($model,['class'=>'alert alert-danger','header'=>'']); ?>

                    <div class="row">
                        <div class="portlet-body form">
                            <div class="form-body">
                                <div class="col-md-12">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeTextInput($model,'nama',['class'=>'form-control','disabled'=>'']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'nama'); ?></label>
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
                                    <div class='form-group form-md-line-input'>
                                        <?= Html::activeDropDownList($model, 'status_pekerjaan', $status, 
                                            [
                                                'prompt'=>'--Sila Pilih--',
                                                'class'=>'form-control',

                                            ]); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'status_pekerjaan'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'status_pekerjaan'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-md-line-input">
                                        <?= Html::activeTextInput($model,'tarikh_resign',['class'=>'form-control']); ?>
                                            <label for="form_control_1"><?= Html::activeLabel($model,'tarikh_resign'); ?></label>
                                            <span class="help-block"><?= Html::error($model,'tarikh_resign'); ?></span>
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

            </div>
        </div>
    </div>
</div>

