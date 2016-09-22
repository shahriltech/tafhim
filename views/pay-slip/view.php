<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\PaySlip */

$this->title = $model->pay_slip_id;
$this->params['breadcrumbs'][] = ['label' => 'Pay Slips', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pay-slip-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pay_slip_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pay_slip_id], [
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
            'pay_slip_id',
            'staff_id',
            'gaji_asas',
            'elaun_rumah',
            'elaun_asas',
            'ctg',
            'kksk',
            'tabung_guru',
            'tabung_haji',
            'cuti_ehsan',
            'cuti_sakit',
            'pelarasan',
            'potongan',
            'kwsp',
            'socso',
            'gaji_tahan',
            'sewa_rumah',
            'loan',
            'tarikhmasa',
            'memo_ctg',
            'hibah',
            'bonus',
            'lain',
            'lain_tambahan',
        ],
    ]) ?>

</div>
