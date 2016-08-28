<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupMarkah */

$this->title = 'Create Lookup Markah';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Markahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-markah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
