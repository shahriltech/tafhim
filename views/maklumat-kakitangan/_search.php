<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatKakitanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-kakitangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_staf') ?>

    <?= $form->field($model, 'status_pekerjaan') ?>

    <?= $form->field($model, 'tarikh_resign') ?>

    <?= $form->field($model, 'foto') ?>

    <?= $form->field($model, 'nama') ?>

    <?php // echo $form->field($model, 'no_kp') ?>

    <?php // echo $form->field($model, 'umur') ?>

    <?php // echo $form->field($model, 'tarikh_mula_kerja') ?>

    <?php // echo $form->field($model, 'jawatan_sekarang') ?>

    <?php // echo $form->field($model, 'no_pekerja') ?>

    <?php // echo $form->field($model, 'tahfiz') ?>

    <?php // echo $form->field($model, 'alamat_tempat_kerja') ?>

    <?php // echo $form->field($model, 'warganegara') ?>

    <?php // echo $form->field($model, 'tarikh_lahir') ?>

    <?php // echo $form->field($model, 'tempat_lahir') ?>

    <?php // echo $form->field($model, 'alamat_surat_menyurat') ?>

    <?php // echo $form->field($model, 'alamat_tetap') ?>

    <?php // echo $form->field($model, 'no_tel_rumah') ?>

    <?php // echo $form->field($model, 'no_tel_bimbit') ?>

    <?php // echo $form->field($model, 'tahap_kesihatan') ?>

    <?php // echo $form->field($model, 'pengesahan_kesihatan') ?>

    <?php // echo $form->field($model, 'kecacatan') ?>

    <?php // echo $form->field($model, 'nyatakan_kecacatan') ?>

    <?php // echo $form->field($model, 'tinggi_cm') ?>

    <?php // echo $form->field($model, 'berat_kg') ?>

    <?php // echo $form->field($model, 'kumpulan_usrah') ?>

    <?php // echo $form->field($model, 'nama_ketua_usrah') ?>

    <?php // echo $form->field($model, 'unit_usrah') ?>

    <?php // echo $form->field($model, 'no_ahli_abim') ?>

    <?php // echo $form->field($model, 'gaji_asas') ?>

    <?php // echo $form->field($model, 'elaun_asas') ?>

    <?php // echo $form->field($model, 'elaun_rumah') ?>

    <?php // echo $form->field($model, 'tabung_gaji') ?>

    <?php // echo $form->field($model, 'tabung_guru') ?>

    <?php // echo $form->field($model, 'sewa_rumah') ?>

    <?php // echo $form->field($model, 'kksk') ?>

    <?php // echo $form->field($model, 'loan') ?>

    <?php // echo $form->field($model, 'gaji_tahan') ?>

    <?php // echo $form->field($model, 'acc_tabung_haji') ?>

    <?php // echo $form->field($model, 'no_kwsp') ?>

    <?php // echo $form->field($model, 'acc_bimb') ?>

    <?php // echo $form->field($model, 'rujukan_tawaran') ?>

    <?php // echo $form->field($model, 'peringkat_gaji') ?>

    <?php // echo $form->field($model, 'tangga_gaji') ?>

    <?php // echo $form->field($model, 'skim_gaji') ?>

    <?php // echo $form->field($model, 'skim_gaji_awal') ?>

    <?php // echo $form->field($model, 'nama_waris') ?>

    <?php // echo $form->field($model, 'hubungan_waris') ?>

    <?php // echo $form->field($model, 'no_tel_waris') ?>

    <?php // echo $form->field($model, 'kelulusan_tertinggi') ?>

    <?php // echo $form->field($model, 'peratus_kwsp') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
