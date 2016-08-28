<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupYuranTahun6 */

$this->title = 'Create Lookup Yuran Tahun6';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Yuran Tahun6s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-yuran-tahun6-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
