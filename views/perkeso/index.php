<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PerkesoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perkesos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perkeso-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Perkeso', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_perkeso',
            'dari',
            'hingga',
            'syer_majikan',
            'syer_pekerja',
            // 'jumlah_caruman',
            // 'jumlah_caruman_majikan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
