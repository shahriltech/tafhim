<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LookupKwsp8Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KWSP 8%';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Tetapan <small> KWSP 8%</small></h3>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="fa fa-briefcase font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Senarai KWSP 8%</span>
                </div>
                <div class="actions">
                    <?= Html::a('<i class="fa fa-plus"></i><span class="hidden-xs">Tambah </span>', ['create'], ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <div class="portlet-body">
            <?php Pjax::begin(); ?>
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    //'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'dari',
                        'hingga',
                        'oleh_majikan',
                        'oleh_pekerja',
                        // 'jumlah_caruman',
                        [
                            'header' => 'Tindakan',
                            'class' => 'yii\grid\ActionColumn',
                            'template'=>'{view} {update} {delete}',
                            'buttons' => [
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
                    ],
                    'tableOptions' =>['class' => 'table table-striped table-hover'],
                ]); ?>
            <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
