<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Perkeso */

$this->title = $model->id_perkeso;
$this->params['breadcrumbs'][] = ['label' => 'Perkesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perkeso-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_perkeso], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_perkeso], [
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
            'id_perkeso',
            'dari',
            'hingga',
            'syer_majikan',
            'syer_pekerja',
            'jumlah_caruman',
            'jumlah_caruman_majikan',
        ],
    ]) ?>

</div>
