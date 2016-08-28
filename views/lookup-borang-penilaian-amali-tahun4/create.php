<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupBorangPenilaianAmaliTahun4 */

$this->title = 'Create Lookup Borang Penilaian Amali Tahun4';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Borang Penilaian Amali Tahun4s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-borang-penilaian-amali-tahun4-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
