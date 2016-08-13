<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupBorangPenilaianAmaliTahun2 */

$this->title = 'Update Lookup Borang Penilaian Amali Tahun2: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Borang Penilaian Amali Tahun2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-borang-penilaian-amali-tahun2-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
