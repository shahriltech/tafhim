<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lookup Markahs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-markah-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Lookup Markah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'markah',
            'gred',
            'jenis',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
