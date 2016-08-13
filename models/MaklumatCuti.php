<?php

namespace app\models;

use Yii;
use app\models\MaklumatKakitangan;
use app\models\LookupCuti;
/**
 * This is the model class for table "maklumat_cuti".
 *
 * @property integer $id
 * @property integer $id_staff
 * @property integer $jenis_cuti
 * @property integer $tahun
 * @property integer $bulan
 * @property string $bilangan_cuti
 */
class MaklumatCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maklumat_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_staff', 'jenis_cuti', 'tahun', 'bulan'], 'integer'],
            [['bilangan_cuti'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_staff' => 'Nama Kakitangan',
            'jenis_cuti' => 'Jenis Cuti',
            'tahun' => 'Tahun',
            'bulan' => 'Bulan',
            'bilangan_cuti' => 'Bilangan Cuti',
        ];
    }

    public function getNama_kakitangan()
    {
        return $this->hasOne(MaklumatKakitangan::className(),['id_staf' =>'id_staff']);
    }

    public function getCuti()
    {
        return $this->hasOne(LookupCuti::className(),['id'=>'jenis_cuti']);
    }
}
