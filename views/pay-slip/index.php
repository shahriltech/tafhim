<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\PaySlipSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pay Slips';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-slip-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pay Slip', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pay_slip_id',
            'staff_id',
            'gaji_asas',
            'elaun_rumah',
            'elaun_asas',
            // 'ctg',
            // 'kksk',
            // 'tabung_guru',
            // 'tabung_haji',
            // 'cuti_ehsan',
            // 'cuti_sakit',
            // 'pelarasan',
            // 'potongan',
            // 'kwsp',
            // 'socso',
            // 'gaji_tahan',
            // 'sewa_rumah',
            // 'loan',
            // 'tarikhmasa',
            // 'memo_ctg',
            // 'hibah',
            // 'bonus',
            // 'lain',
            // 'lain_tambahan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
