<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajar */

$this->title = 'Tambah Maklumat Pelajar';
$this->params['breadcrumbs'][] = ['label' => 'Maklumat Pelajar', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class='row'>
	<div class="col-md-12">
		<div class="note note-danger">
            <p> NOTA: Ruangan Yang Bertanda * Wajib Di Isi.</p>
        </div>
		<div class="portlet light bordered">
			<div class="portlet-title">
	            <div class="caption font-green-haze">
	                <i class="icon-user font-green-haze"></i>
	                <span class="caption-subject bold uppercase">Tambah Pelajar </span>
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
