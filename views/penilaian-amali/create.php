<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PenilaianAmali */

$this->title = 'Create Penilaian Amali';
$this->params['breadcrumbs'][] = ['label' => 'Penilaian Amalis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="penilaian-amali-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'umur' => $umur,
        'model2' => $model2
    ]) ?>

</div>
