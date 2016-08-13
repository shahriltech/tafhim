<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatPelajarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Maklumat Pelajar';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Pentadbiran <small>Senarai Maklumat Pelajar</small></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-users"></i>Senarai Pelajar
                </div>
                <div class="actions">
                    <?= Html::a('<i class="fa fa-plus"></i><span class="hidden-xs">Tambah Pelajar </span>', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="maklumat-pelajar-index">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            //'id_pelajar',
                            'nama_pelajar',
                            'jantina',
                            'tarikh_lahir',
                            'tempat_lahir:ntext',
                            // 'no_surat_beranak',
                            // 'no_my_kid',
                            // 'id_pusat_pengajian',
                            // 'sesi_pengajian',
                            // 'tarikh_masuk',
                            // 'tahun_mula',
                            // 'no_tel_rumah',
                            // 'alamat_rumah:ntext',
                            // 'SPRA',
                            // 'PSRA',
                            // 'status',
                            // 'warganegara',
                            // 'tahun_lewat',
                            // 'alumni',
                            // 'date_create',
                            // 'date_update',
                            // 'enter_by',
                            // 'update_by',
                            // 'tarikh_daftar',

                            ['class' => 'yii\grid\ActionColumn'],
                        ],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>

