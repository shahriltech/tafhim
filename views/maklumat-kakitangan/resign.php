<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pengurusan Kakitangan';

$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Pengurusan Kakitangan <small>Maklumat Kakitangan Yang Telah Berhenti</small></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-users"></i>Senarai Kakitangan Yang Telah Berhenti
                </div>
            </div>
            <div class="portlet-body">
                <div class="maklumat-kakitangan-index">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        //'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            [
                                'attribute' => 'Foto',
                                'format' => 'html',    
                                'value' => function ($data) {
                                    return Html::img(Yii::getAlias('@web').'/uploads/'. $data['foto'],
                                        ['width' => '70px']);
                                },
                            ],

                            'nama',
                            'no_kp',
                            'jawatan_sekarang',
                            'tarikh_resign',
                            'nama_tahfiz.pusat_pengajian',
                            'no_pekerja',
                            [
                                'header' => 'Tindakan',
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>'{view} {update} {delete}',
                                'buttons' => [
                                    'add_resign' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-sign-out"></i>', 
                                            $url,['title'=> Yii::t('app','Resign'),'class'=>'btn btn-circle btn-icon-only purple']);

                                    },
                                    'view' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-eye"></i>', 
                                            $url,['title'=> Yii::t('app','Lihat'),'class'=>'btn btn-circle btn-icon-only green-meadow']);

                                    },
                                    'update' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-pencil"></i>', 
                                            $url,['title'=> Yii::t('app','Kemaskini'),'class'=>'btn btn-circle btn-icon-only btn-primary']);

                                    },
                                    'delete' => function ($url, $model) {
                                        return Html::a('<i class="fa fa-trash"></i>', 
                                            $url,['title'=> Yii::t('app','Hapus'),'class'=>'btn btn-circle btn-icon-only btn-danger','data-confirm'=>"Adakah Anda Pasti Mahu Hapuskan Item Ini ?",'data-method' => 'post']);

                                    },

                                ],
                            ],

                            //['class' => 'yii\grid\ActionColumn'],
                        ],
                        'tableOptions' =>['class' => 'table table-striped table-hover'],
                    ]); ?>
                    <?php Pjax::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>

