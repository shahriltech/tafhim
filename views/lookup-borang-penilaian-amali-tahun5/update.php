<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LookupBorangPenilaianAmaliTahun5 */

$this->title = 'Update Lookup Borang Penilaian Amali Tahun5: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Lookup Borang Penilaian Amali Tahun5s', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lookup-borang-penilaian-amali-tahun5-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
