<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupYuranTahun2 */

$this->title = 'Create Lookup Yuran Tahun2';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Yuran Tahun2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-yuran-tahun2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
