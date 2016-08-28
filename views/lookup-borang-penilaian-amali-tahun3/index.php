<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lookup Borang Penilaian Amali Tahun3s';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-borang-penilaian-amali-tahun3-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lookup Borang Penilaian Amali Tahun3', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'perkara',
            'sesi',
            'markah',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
