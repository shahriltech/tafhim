<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupKemajuaanTahun5 */

$this->title = 'Create Lookup Kemajuaan Tahun5';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Kemajuaan Tahun5s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-kemajuaan-tahun5-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
