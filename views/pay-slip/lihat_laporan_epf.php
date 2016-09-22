<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Lihat Laporan';
$this->params['breadcrumbs'][] = ['label' => 'Laporan Kewangan', 'url' => ['laporan_epf']];
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
                    <i class="icon-calendar"></i>Laporan KWSP <?php echo date("F Y",strtotime($tarikhmasa)); ?>
                </div>
            </div>
            <center>
            <?php $form = ActiveForm::begin([
            	'action' => ['lihat_laporan_epf'],
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
                            <th>No. Kad Pengenalan</th>
                            <th>No. KWSP</th>
                            <th>Gaji (RM)</th>
                            <th>Oleh Pekerja (RM)</th>
                            <th>Oleh Majikan (RM)</th>
                            <th>Jumlah (RM)</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                    <?php 
                        $totalgaji = 0;
                        $totalepf = 0;
                        $totalcontribution = 0;
                        $totaljumlah = 0;

                        for($i=0;$i<$bil;$i++)
                        {
                            $totalgaji = $totalgaji + round($gaji[$i],2);
                            $totalepf = $totalepf + (round($epf[$i],2));
                            $totalcontribution = $totalcontribution + round($contribution[$i],2);
                            $totaljumlah = $totaljumlah + round($jumlah[$i],2);
                        }
                    ?>
                        <tr>
                            <td align='right' colspan="4" style="font-weight:bold;">JUMLAH KESELURUHAN</td>
                            <td  style="font-weight:bold;"><?= number_format($totalgaji,2) ?></td>
                            <td style="font-weight:bold;"><?= number_format($totalepf,2) ?></td>
                            <td style="font-weight:bold;"><?= number_format($totalcontribution,2) ?></td>
                            <td style="font-weight:bold;"><?= number_format($totaljumlah,2) ?></td>
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
                            <td><?= $no_kp[$i] ?></td>
                            <td><?= $no_kwsp[$i] ?></td>
                            <td><?= number_format($gaji[$i],2) ?></td>
                            <td><?= number_format($epf[$i],2) ?></td>
                            <td><?= number_format($contribution[$i],2) ?></td>
                            <td><?= number_format($jumlah[$i],2) ?></td>
                        </tr>
                    
                    <?php } ?>
                    </tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>