<?php 
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;


foreach ($yuran_semasa as $key => $value) {
	$tahun = $value['tahun'];
	$tarikh_akhir_bayaran = $value['tarikh_akhir_bayaran'];
	$id_yuran = $value['id_yuran'];
	$jumlah_yuran = $value['jumlah_yuran'];
} 



$this->title = 'Yuran - Tahun'.$tahun;
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
                 	<?php foreach ($yuran_semasa as $key => $value) { ?>
		<?php if ($value['status_yuran'] == "Selesai") { ?>
			
		<?php } else { ?>
			<?= Html::a('Pembayaran', FALSE, ['value' => Url::to(['/yuran-semasa/bayar','id'=>$id_yuran]), 'class' => 'bayar btn btn-primary']); ?>

		<?php } ?>

	<?php } ?>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-bordered">
					<?php  $sum_jenis_yuran=0 ; foreach ($jenis_yuran as $key => $value) { ?>
					<tr>
						<td><?php echo $value['jenis_bayaran']; ?></td>
						<td><?php $sum_jenis_yuran += $value['jumlah']; ?><?php echo $value['jumlah']; ?></td>
					</tr>

					<?php
					    if ($value['id'] ==3) {
					       $bulanan =  $value['jumlah'];
					    }

					 ?>

					<?php } ?>
					<tfoot>

				            <?php $bulan = date('F'); 


				            if ($bulan == "January") {
				                 $yb = $bulanan * 10;
				            } elseif ($bulan == "February") {
				                 $yb = $$bulanan * 9;
				            } elseif ($bulan == "March") {
				                  $yb =$bulanan * 8;
				            } elseif ($bulan == "April") {
				                  $yb =$bulanan * 7;
				            } elseif ($bulan == "May") {
				                  $yb =$bulanan * 6;
				            } elseif ($bulan == "June") {
				                  $yb =$bulanan * 5;
				            } elseif ($bulan == "July") {
				                  $yb =$bulanan * 4;
				            } elseif ($bulan == "August") {
				                  $yb =$bulanan * 3;
				            } elseif ($bulan == "September") {
				                  $yb =$bulanan * 2;
				            } elseif ($bulan == "October") {
				                  $yb =$bulanan * 1;
				            }

				            ?>


					<tr>
						<td>Jumlah Yuran</td>
						<td>RM <?php echo $jum_tot =  $sum_jenis_yuran -$bulanan; ?></td>

					</tr>
					<tr>
						<td>Jumlah Yuran Bulanan : (Bulan Mula : <?php foreach ($yuran_semasa as $key => $value) {
							echo $value['bulan'];
						}?>)</td>
						<td>RM <?php echo $yb; ?></td>
					</tr>

					</tfoot>
				</table>

			<div class="note note-success right"><b>Jumlah Keseluruhan Yuran : RM <?php echo $jumlah_yuran; ?></b></div>


				<table class="table table-striped table-bordered">
					<tr>
						<th>No Resit</th>
						<th>Bayar</th>
					</tr>
					<?php $sum_jumlah_bayaran =0; foreach ($transaksi as $key => $value) { ?>
					<tr>
						<td><?php echo $value['no_resit']; ?></td>
						<td><?php $sum_jumlah_bayaran += $value['jumlah_bayaran']; ?>
							<?php  echo $value['jumlah_bayaran']; ?></td>
					</tr>
					<?php } ?>
					<tfoot>
						<td>Jumlah</td>
						<td>RM <?php echo $sum_jumlah_bayaran; ?></td>
					</tfoot>
				</table>
				<div class="note note-warning">Baki : RM <?php echo $jumlah_yuran - $sum_jumlah_bayaran; ?></div>
            </div>
        </div>
    </div>
</div>