<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-pelajar-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pelajar') ?>

    <?= $form->field($model, 'nama_pelajar') ?>

    <?= $form->field($model, 'jantina') ?>

    <?= $form->field($model, 'tarikh_lahir') ?>

    <?= $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'no_surat_beranak') ?>

    <?php // echo $form->field($model, 'no_my_kid') ?>

    <?php // echo $form->field($model, 'id_pusat_pengajian') ?>

    <?php // echo $form->field($model, 'sesi_pengajian') ?>

    <?php // echo $form->field($model, 'tarikh_masuk') ?>

    <?php // echo $form->field($model, 'tahun_mula') ?>

    <?php // echo $form->field($model, 'no_tel_rumah') ?>

    <?php // echo $form->field($model, 'alamat_rumah') ?>

    <?php // echo $form->field($model, 'SPRA') ?>

    <?php // echo $form->field($model, 'PSRA') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'warganegara') ?>

    <?php // echo $form->field($model, 'tahun_lewat') ?>

    <?php // echo $form->field($model, 'alumni') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'enter_by') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'tarikh_daftar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
