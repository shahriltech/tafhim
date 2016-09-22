<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatKakitanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Laporan Kewangan';
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- BEGIN PAGE TITLE-->
<h3 class="page-title">Laporan <small>Kewangan</small></h3>
<!-- END PAGE TITLE-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">
                    <i class="icon-calendar"></i>Laporan Tabung Kebajikan
                </div>
            </div>
            <center>
            <?php $form = ActiveForm::begin([
            	'action' => ['lihat_laporan_tabung_kebajikan'],
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
	                                	$tahun = date("Y",time());
							                for($y=$tahun;$y>=2012;$y--)
							                { 
								                 // $options[$y] = $y;
								    ?>
	                                    <option value="<?= $y ?>"><?= $y ?></option>
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
	                                	$bulan = date("n",time());
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