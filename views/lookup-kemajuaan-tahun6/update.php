<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupKemajuaanTahun6 */

$this->title = 'Update Lookup Kemajuaan Tahun6: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Kemajuaan Tahun6s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-kemajuaan-tahun6-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
