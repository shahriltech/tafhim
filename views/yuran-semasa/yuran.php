   <?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatPelajarSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yuran Semasa';
$this->params['breadcrumbs'][] = ['label' => 'Kewangan - Yuran Pendaftaran', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">

                    <span class="caption-subject bold uppercase"><?= Html::encode($this->title) ?></span>
                </div>
                 <div class="actions">
                 		<?= Html::a('Jana Yuran', FALSE, ['value' => Url::to(['/yuran-semasa/create','id'=>$id]), 'class' => 'btn btn-primary yuran']); ?>
  
                </div>
            </div>
            <div class="portlet-body">
                

            	<table class="table table-hover">
	            	<thead>
		            	<tr>
						
							<th>Tahun</th>
							<th>Bulan (Yuran)</th>
							<th>Jumlah Yuran</th>
							<th>Tarikh Akhir Bayaran</th>
							<th>Status Yuran</th>
							<th>Lihat Terperinci</th>
						</tr>
	            	</thead>

					<?php foreach ($yuran_semasa as $key => $value) { ?>
					<tbody>
						<tr>
							<td><?php echo $value['tahun']; ?></td>
							<td><?php echo $value['bulan']; ?></td>
							<td><?php echo $value['jumlah_yuran']; ?></td>
							<td><?php echo $value['tarikh_akhir_bayaran']; ?></td>
							<td><?php echo $value['status_yuran']; ?></td>
							<td><?= Html::a('<span class="btn btn-xs blue-hoki"><i class="fa fa-search"></i>Lihat</span', ['/yuran-semasa/details', 'id' => $value['id_yuran']]) ?></td>
						</tr>

					</tbody>

					<?php }?>
				</table>
            </div>
        </div>
    </div>
</div>
