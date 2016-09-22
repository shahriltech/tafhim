<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Perkeso */

$this->title = 'Create Perkeso';
$this->params['breadcrumbs'][] = ['label' => 'Perkesos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="perkeso-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
