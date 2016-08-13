<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupYuranTahun3 */

$this->title = 'Update Lookup Yuran Tahun3: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Yuran Tahun3s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-yuran-tahun3-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
