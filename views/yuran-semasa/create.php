<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YuranSemasa */

$this->title = 'Yuran'.' - '.$title_yuran;
$this->params['breadcrumbs'][] = ['label' => 'Yuran Semasas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuran-semasa-create">

    <h1><?= Html::encode($this->title) ?></h1>
    

    <?= $this->render('_form', [
        'model' => $model,
        'yuran' => $yuran,
        //'title_yuran' => $title_yuran
    ]) ?>

</div>
