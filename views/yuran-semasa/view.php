<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YuranSemasa */

$this->title = $model->id_yuran;
$this->params['breadcrumbs'][] = ['label' => 'Yuran Semasas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuran-semasa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_yuran], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_yuran], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_yuran',
            'names.nama_pelajar',
            'tahun',
            'tarikh_akhir_bayaran',
            'jenis_yuran:ntext',
            'jumlah_yuran',

        ],
    ]) ?>

    <?php $array = unserialize($model->jenis_yuran);
        print_r($array);
     ?>


</div>
