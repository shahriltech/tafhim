<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\YuranSemasaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Pelajar Tahfiz : '.$tahfiz->pusat_pengajian;
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">

                    <span class="caption-subject bold uppercase"><?= Html::encode($this->title) ?></span>
                </div>
                 <div class="tools actions">
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                

                    <?php Pjax::begin(); ?>    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'nama_pelajar',
                            'jantina',
                            'no_my_kid',
                            'id_pusat_pengajian',
                            'sesi_pengajian',

                        [
                            'header' => 'Action',
                            'class' => 'yii\grid\ActionColumn',
                            'template'=>'{yuran}',
                                'buttons' => [
                                    'yuran' => function ($url, $model) {
                                        return Html::a('<span class="btn btn-xs purple-plum"><i class="fa fa-info"></i> Yuran</span>',$url, [
                                                    'title' => Yii::t('app', 'Lihat'),

                                        ]);

                                    },

                                ],
                                'urlCreator' => function ($action, $model, $key, $index) {
                                    if ($action === 'yuran') {
                                        $url = ['yuran-semasa/yuran','id'=>$model->id_pelajar];
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