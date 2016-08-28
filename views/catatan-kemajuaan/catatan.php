<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model app\models\CatatanKemajuaan */
/* @var $form yii\widgets\ActiveForm */
?>

<br>
<div class="catatan-kemajuaan-form">

<?= Html::a('Jana Catatan Kemajuan', FALSE, ['value' => Url::to(['/catatan-kemajuaan/create','id'=>$id]), 'class' => 'btn green-meadow catatan']); ?>
<br>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'names.nama_pelajar',
            'peperiksaan',
            'darjah',
  

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
             

</div>
