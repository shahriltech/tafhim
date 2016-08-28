<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp11 */

$this->title = 'Dari '.$model->dari;
$this->params['breadcrumbs'][] = ['label' => 'Senarai KWPS 8%', 'url' => ['index']];
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
                    <i class="icon-briefcase font-green-haze"></i>
                    <span class="caption-subject bold uppercase">Maklumat KWSP 8% </span>
                </div>
                <div class="actions">
                    <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-circle btn-icon-only green-meadow','title'=>'Tambah Pelajar']) ?>
                    <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id' => $model->id_kwsp], ['class' => 'btn btn-circle btn-icon-only blue','title'=>'Kemaskini Pelajar']) ?>
                    <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id_kwsp], [
                        'class' => 'btn btn-circle btn-icon-only btn-danger',
                        'title'=>'Hapus',
                        'data' => [
                            'confirm' => 'Adakah anda pasti untuk hapuskan maklumat ini ?',
                            'method' => 'post',
                        ],
                    ]) ?>
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

