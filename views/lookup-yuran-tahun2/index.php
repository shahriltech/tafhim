<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lookup Yuran Tahun2s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-yuran-tahun2-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lookup Yuran Tahun2', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'jenis_bayaran',
            'jumlah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
