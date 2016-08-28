<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupPusatPengajian */

$this->title = 'Create Lookup Pusat Pengajian';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Pusat Pengajians', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-pusat-pengajian-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
