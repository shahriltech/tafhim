<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lookup Pusat Pengajians';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pusat-pengajian-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lookup Pusat Pengajian', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'pusat_pengajian',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
