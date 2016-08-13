<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupKemajuaanTahun4 */

$this->title = 'Create Lookup Kemajuaan Tahun4';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Kemajuaan Tahun4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-kemajuaan-tahun4-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
