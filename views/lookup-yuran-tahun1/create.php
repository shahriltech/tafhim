<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupYuranTahun1 */

$this->title = 'Create Lookup Yuran Tahun1';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Yuran Tahun1s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-yuran-tahun1-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
