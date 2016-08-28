<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\YuranSemasa */
/* @var $form yii\widgets\ActiveForm */

//$datebulan = ['January','February','March','April','May','June','July','August','September','October']
?>

<div class="yuran-semasa-form">

    <?php $form = ActiveForm::begin(); ?>


   <?php  echo '<label class="control-label">Tarikh Akhir Bayaran</label>';
    echo DatePicker::widget([
        'name' => 'YuranSemasa[tarikh_akhir_bayaran]',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy'
        ]
    ]); ?>

            <br>
            <br>
    <div class="form-group">
        <label><b>Senarai Yuran</b></label>
        <div class="mt-checkbox-list">
            <?php $sum = 0; foreach ($yuran as $key => $value) { ?>
            <label class="mt-checkbox">
            <?php echo $value['jenis_bayaran'];?> - RM<?php echo number_format((float)$value['jumlah'],2,'.','');?> 
                <input type="checkbox" value="<?php echo $value['id'];?>" name="YuranSemasa[jenis_yuran][]" disabled checked />
                <input type="hidden" value="<?php echo $value['id'];?>" name="YuranSemasa[jenis_yuran][]" />
                <span></span>
            </label>

            <?php 
            if ($value['id'] ==3) {
               $bulanan =  $value['jumlah'];
            }
            $sum += $value['jumlah']; ?>
        
            <?php } ?>

            <?php $bulan = date('F'); 


            if ($bulan == "January") {
                 $yb = $bulanan * 10;
            } elseif ($bulan == "February") {
                 $yb = $bulanan * 9;
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
            <br>
            <br>
            <span><b>Yuran : </b></span>RM <?php $tot = $sum - $bulanan; echo number_format((float)$tot,2,'.',''); ?>
            <br>
            <br>
            <span><b>Yuran Bulanan : </b></span>RM <?php echo number_format((float)$yb,2,'.',''); ?>
            <br>
            <br>
            <span><b>Jumlah Yuran : </b></span>RM <?php echo number_format((float)$tot + $yb,2,'.',''); ?>

        </div>
    </div>
    <div class="modal-footer">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Kemaskini', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-success']) ?>
        <button type="button" data-dismiss="modal" class="btn dark btn-outline">Tidak</button>
    </div>

    <?php ActiveForm::end(); ?>

</div>
