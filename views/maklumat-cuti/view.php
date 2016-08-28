<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatCuti */

$this->title = 'Maklumat Cuti';
$this->params['breadcrumbs'][] = ['label' => 'Senarai Maklumat Cuti', 'url' => ['index']];
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
                    <span class="caption-subject bold uppercase">Maklumat Cuti </span>
                </div>
                <div class="actions">
                    <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-circle btn-icon-only green-meadow','title'=>'Tambah Kakitangan']) ?>
                    <?= Html::a('<i class="fa fa-pencil"></i>', ['update', 'id' => $model->id], ['class' => 'btn btn-circle btn-icon-only blue','title'=>'Kemaskini Kakitangan']) ?>
                    <?= Html::a('<i class="fa fa-trash"></i>', ['delete', 'id' => $model->id], [
                        'class' => 'btn btn-circle btn-icon-only btn-danger',
                        'title'=>'Hapus',
                        'data' => [
                            'confirm' => 'Adakah anda pasti untuk hapuskan maklumat ini ?',
                            'method' => 'post',
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="maklumat-cuti-view">

                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'nama_kakitangan.nama',
                        'cuti.jenis_cuti',
                        'tahun',
                        'bulan',
                        'bilangan_cuti',
                    ],
                ]) ?>

            </div>
        </div>
    </div>
</div>

