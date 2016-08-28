<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LookupKwsp11 */

$this->title = 'Tambah Senarai Kwsp 11%';
$this->params['breadcrumbs'][] = ['label' => 'Senarai KWSP 11%', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<div class='row'>
    <div class="col-md-12">

        <div class="portlet light bordered">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <span class="caption-subject bold uppercase"><?= Html::encode($this->title) ?> </span>
                </div>
                <div class="actions">
                                    <!---->
                    <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="javascript:;" data-original-title="" title=""></a>
                </div>
            </div>
            <div class="portlet-body form">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>