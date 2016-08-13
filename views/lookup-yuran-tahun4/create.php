<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupYuranTahun4 */

$this->title = 'Create Lookup Yuran Tahun4';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Yuran Tahun4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-yuran-tahun4-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
