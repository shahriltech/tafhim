<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Lihat Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kewangan', 'url' => ['laporan_gaji']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Laporan Kewangan<small> Lihat Laporan</small></h3>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-calendar"></i>Laporan Gaji Bersih <?php echo date("F Y",strtotime($tarikhmasa)); ?>
                </div>
            </div>
            <center>
            <?php $form = ActiveForm::begin([
            	'action' => ['gaji_bersih'],
            	'method' => 'GET',
            	'options' => [
                'class' => 'form-horizontal'
             ]
            ]); ?>
            	<div class="row">
				    <div class="portlet-body form">
				        <div class="form-body">
					        <div class="form-group">
	                            <label class="col-md-3 control-label">Tahun</label>
	                            <div class="col-md-6">
	                                <select class="form-control" name="tahun">
	                                <?php
	                                	$year = date("Y",time());
							                for($y=$year;$y>=2012;$y--)
							                { 
								                 // $options[$y] = $y;
								    ?>
	                                    <option value="<?= $y ?>" <?php if ($tahun == $y){ echo 'selected';} ?> ><?= $y ?></option>
	                                <?php 
	                                		}
	                                ?>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-3 control-label">Bulan</label>
	                            <div class="col-md-6">
	                                <select class="form-control" name="bulan">
	                                <?php
	                                	$month = date("n",time());
	                                	
							                for($m=1;$m<=12;$m++)
							                { 
								                 // $options[$m] = $m;
								    ?>
	                                    <option value="<?= $m ?>" <?php if ($bulan == $m){ echo 'selected';} ?> ><?= $m ?></option>
	                                <?php 
	                                		}
	                                ?>
	                                </select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-sm-2 control-label"></label>
	                            <div class="col-md-3">
	                                <input type="submit" class="btn btn-primary" value="Lihat Laporan">
	                            </div>
	                        </div>
				        </div>
				    </div>
				</div>
			<?php ActiveForm::end(); ?>
            </center>
            
        </div>
    </div>
</div>

<!-- result -->

<div class="row">
    <div class="col-md-12">
    	<div class="portlet light bordered ">
    		<div class="portlet-body">
    			<table data-toggle="table" data-height='600'>
                <thead>
                    <tr>
                        <th>Bil</th>
                        <th>Nama Kakitangan</th>
                        <th>Gaji Kasar</th>
                        <th>Sewa Rumah</th>
                        <th>EPF</th>
                        <th>Socso</th>
                        <th>Tabung Guru</th>
                        <th>Tabung Haji</th>
                        <th>KKSK</th>
                        <th>Bonus <?php echo $tahun; ?></th>
                        <th>Loan</th>
                        <th>CTG</th>
                        <th>Lain-Lain</th>
                        <th>Gaji Bersih</th>
                    </tr>
                </thead>
                <?php 
                    $total_gaji_kasar = 0;
                    $total_gaji_bersih = 0;
                    $total_sewa_rumah = 0;
                    $total_oleh_pekerja = 0;
                    $total_socso = 0;
                    $total_tabung_guru = 0;
                    $total_tabung_haji = 0;
                    $total_kksk = 0;
                    $total_gaji_tahan = 0;
                    $total_bonus = 0;
                    $total_loan = 0;
                    $total_ctg = 0;
                    $total_lain_jumlah = 0;
                    $total_lainlain = 0;
                    $total_days = date("t",strtotime($tarikhmasa));

                    for($i=0;$i<$bil;$i++)
                    {
                        $total_gaji_kasar = $total_gaji_kasar + round($total_gaji[$i],2);
                        $total_sewa_rumah = $total_sewa_rumah + (round($sewa_rumah[$i],2));
                        $total_gaji_bersih = $total_gaji_bersih + round($gaji_bersih[$i],2);
                        $total_oleh_pekerja = $total_oleh_pekerja + round($epf[$i],2);
                        $total_socso = $total_socso + $socso[$i];
                        $total_tabung_guru = $total_tabung_guru + round($tabung_guru[$i],2);
                        $total_tabung_haji = $total_tabung_haji + round($tabung_haji[$i],2);
                        $total_kksk = $total_kksk + round($kksk[$i],2);
                        $total_bonus = $total_bonus + round($bonus[$i],2);
                        $total_gaji_tahan = $total_gaji_tahan + round($gaji_tahan[$i],2);
                        $total_loan = $total_loan + round($loan[$i],2);
                        $total_ctg = $total_ctg + (((round($total_gaji[$i],2) + round($gaji_tahan[$i],2)) / $total_days) * round($ctg[$i],2));
                        $total_lain_jumlah = $total_lain_jumlah + round($lain_jumlah[$i],2);

                    }
                ?>
                <tfoot>
                    <tr>
                        <td colspan="2" style="font-weight:bold;">JUMLAH KESELURUHAN</td>
                        <td style="font-weight:bold;"><?= number_format($total_gaji_kasar,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0 - $total_sewa_rumah,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0 - $total_oleh_pekerja,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0 - $total_socso,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0 - $total_tabung_guru,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0 - $total_tabung_haji,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0 - $total_kksk,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format($total_bonus,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0 - $total_loan,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format(0-$total_ctg,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format($total_lain_jumlah,2) ?></td>
                        <td style="font-weight:bold;"><?= number_format($total_gaji_bersih,2) ?></td>
                    </tr>
                </tfoot>
                    <tbody>
                        <?php 

                        for($i=0;$i<$bil;$i++)
                        {
                    ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $nama[$i] ?></td>
                        <td><?= number_format($total_gaji[$i],2) ?></td>
                        <td><?= number_format(0-$sewa_rumah[$i],2)?></td>
                        <td><?= number_format(0 - $epf[$i],2) ?></td>
                        <td><?= number_format(0 - $socso[$i],2) ?></td>
                        <td><?= number_format(0 - $tabung_guru[$i],2) ?></td>
                        <td><?= number_format(0 - $tabung_haji[$i],2) ?></td>
                        <td><?= number_format(0 - $kksk[$i],2) ?></td>
                        <td><?= number_format($bonus[$i],2) ?></td>
                        <td><?= number_format(0 - $loan[$i],2) ?></td>
                        <td><?= number_format(0-((($total_gaji[$i]) / $total_days) * $ctg[$i]),2) ?></td>
                        <td><?= number_format($lain_jumlah[$i],2) ?></td>
                        <td><?= number_format($gaji_bersih[$i],2) ?></td>
                    </tr>

                    <?php }?>
                    
                    </tbody>
                </table>
    		</div>
    	</div>
    </div>
</div>