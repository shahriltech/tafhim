<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp11 */

$this->title = 'Dari '.$model->dari;
$this->params['breadcrumbs'][] = ['label' => 'Senarai KWPS 11%', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= Html::encode($this->title) ?> </h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    

                    <span class="caption-subject bold uppercase"><?= Html::encode($this->title) ?></span>
                </div>
                <div class="actions">
                <?= Html::a('<i class="fa fa-edit"></i> Kemaskini',['update', 'id' => $model->id_kwsp], ['class' => 'btn btn-success','title'=>'Kemaskini Maklumat KWSP 11%']) ?>
                <?= Html::a('<i class="fa fa-trash-o"></i> Buang', ['delete', 'id' => $model->id_kwsp], [
                    'class' => 'btn btn-danger',
                    'title'=>'Buang Maklumat KWSP 11%',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="lookup-kwsp11-view">

                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
                            'dari',
                            'hingga',
                            'oleh_majikan',
                            'oleh_pekerja',
                            'jumlah_caruman',
                        ],
                    ]) ?>

                </div>
            </div>
        </div>
    </div>
</div>

