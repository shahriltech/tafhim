<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajar */

$this->title = $model->nama_pelajar;
$this->params['breadcrumbs'][] = ['label' => 'Maklumat Pelajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Maklumat Terperinci </h3>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-user font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Maklumat Pelajar </span>
                </div>
                <div class="actions">
                    <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-circle btn-icon-only green-meadow','title'=>'Tambah Pelajar']) ?>
                    <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id' => $model->id_pelajar], ['class' => 'btn btn-circle btn-icon-only blue','title'=>'Kemaskini Pelajar']) ?>
                    <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id_pelajar], [
                        'class' => 'btn btn-circle btn-icon-only btn-danger',
                        'title'=>'Hapus',
                        'data' => [
                            'confirm' => 'Adakah anda pasti untuk padam maklumat pelajar ini ?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="maklumat-pelajar-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'nama_pelajar',
                            'jantina',
                            'tarikh_lahir',
                            'tempat_lahir:ntext',
                            'no_surat_beranak',
                            'no_my_kid',
                            'pengajian.pusat_pengajian',
                            'sesi_pengajian',
                            'tarikh_masuk',
                            'tahun_mula',
                            'no_tel_rumah',
                            'alamat_rumah:ntext',
                            'SPRA',
                            'PSRA',
                            'status',
                            'warganegara',
                            'tahun_lewat',
                            'alumni',
                            'date_create',
                            'date_update',
                            'enter_by',
                            'update_by',
                            'tarikh_daftar',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>