<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupBorangPenilaianAmaliTahun2 */

$this->title = 'Create Lookup Borang Penilaian Amali Tahun2';
$this->params['breadcrumbs'][] = ['label' => 'Lookup Borang Penilaian Amali Tahun2s', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lookup-borang-penilaian-amali-tahun2-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
