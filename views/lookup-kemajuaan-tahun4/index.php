<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lookup Kemajuaan Tahun4s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-kemajuaan-tahun4-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lookup Kemajuaan Tahun4', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'mata_pelajaran',
            'sesi',
            'id_catatan_pelajaran',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
