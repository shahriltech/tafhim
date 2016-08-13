<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatatanKemajuaanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catatan Kemajuaans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catatan-kemajuaan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php 
        Pjax::begin(); ?> 
         <?= GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

            
                    'nama_pelajar',

                    'no_surat_beranak',
                    'no_my_kid',

                    [
                        'header' => 'Catatan Kemajuaan',
                        'class' => 'yii\grid\ActionColumn',
                        'template'=>'{catatan}',
                            'buttons' => [
                                'catatan' => function ($url, $model) {
                                    return Html::a('<i class="fa fa-hand-o-right"></i>', 
                                            $url,['title'=> Yii::t('app','Catatan Kemajuaan'),'class'=>'btn btn-circle btn-icon-only green-meadow']);

                                },

                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'catatan') {
                                    $url = ['catatan-kemajuaan/catatan','id'=>$model->id_pelajar];
                                    return $url;
                                }

                            }
                    ],
                    //['class' => 'yii\grid\ActionColumn'],
                ],
            'tableOptions' =>['class' => 'table table-hover'],
            ]); ?>
        <?php Pjax::end(); ?>
</div>
