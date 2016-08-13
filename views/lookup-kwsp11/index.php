<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LookupKwsp11Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KWSP 11%';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<!-- END PAGE TITLE-->
    <div class="portlet light ">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-equalizer font-dark hide"></i>
                <span class="caption-subject font-dark bold uppercase">Carian</span>
        
            </div>
            <div class="tools">
                <a href="" class="expand" data-original-title="" title=""> </a>
            </div>
        </div>
        <div class="portlet-body" style="display: none;">
            <div class="row">
                <div class="col-md-12 col-sm-6">
                    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>
                </div>
            </div>
        </div>
    </div>


<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">

                    <span class="caption-subject bold uppercase">Senarai KWSP 11%</span>
                </div>
                <div class="actions">
                <?= Html::a('<i class="fa fa-plus"></i> Tambah', ['create'], ['class' => 'btn btn-primary','title'=>'Tambah Maklumat KWSP 11%']) ?>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                         <?php Pjax::begin(); ?> 
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'dari',
                        'hingga',
                        'oleh_majikan',
                        'oleh_pekerja',
                        // 'jumlah_caruman',
                        [
                            'header' => 'Action',
                            'class' => 'yii\grid\ActionColumn',
                            'template'=>'{view}  {edit}  {delete}',
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        return Html::a('<span class="btn btn-xs blue-hoki"><i class="fa fa-search"></i>Lihat</span>',$url, [
                                                    'title' => Yii::t('app', 'Lihat'),

                                        ]);

                                    },

                                    'edit' => function ($url, $model) {
                                        return Html::a('<span class="btn btn-xs yellow-mint"><i class="fa fa-edit"></i>Kemaskini</span>',$url, [
                                                    'title' => Yii::t('app', 'Kemaskini'),
                                        ]);
                                    },

                                    'delete' => function ($url, $model) {
                                        return Html::a('<span class="btn btn-xs red-mint"><i class="fa fa-trash"></i>Buang</span>',$url, [
                                                    'title' => Yii::t('app', 'Buang'),
                                                    'data-confirm'=>"Adakah Anda Pasti Mahu Hapuskan Item Ini ?",
                                                    'data-method'=>'post',
                                        ]);

                                    },

                                ],
                                'urlCreator' => function ($action, $model, $key, $index) {
                                    if ($action === 'view') {
                                        $url = ['lookup-kwsp11/view','id'=>$model->id_kwsp];
                                        return $url;
                                    }
                                    if ($action === 'edit') {
                                        $url = ['lookup-kwsp11/update','id'=>$model->id_kwsp];
                                        return $url;
                                    }
                                    if ($action === 'delete') {
                                        $url = ['lookup-kwsp11/delete','id'=>$model->id_kwsp];
                                        return $url;
                                    }
                                }
                        ],
                    ],
                    'tableOptions' =>['class' => 'table table-striped table-hover'],
                ]); ?>
                <?php Pjax::end(); ?>
            </div>
        </div>
    </div>
</div>
