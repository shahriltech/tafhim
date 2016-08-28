<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yuran_semasa".
 *
 * @property integer $id_yuran
 * @property integer $id_pelajar
 * @property integer $tahun
 * @property string $tarikh_akhir_bayaran
 * @property string $jenis_yuran
 * @property double $jumlah_yuran
 * @property string $date_create
 * @property string $date_update
 * @property integer $enter_by
 * @property integer $update_by
 */
class YuranSemasa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yuran_semasa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajar', 'tahun', 'enter_by', 'update_by'], 'integer'],
            [['jenis_yuran','bulan','status_yuran'], 'string'],
            [['jumlah_yuran'], 'number'],
            [['tarikh_akhir_bayaran', 'date_create', 'date_update'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_yuran' => 'Id Yuran',
            'id_pelajar' => 'Id Pelajar',
            'tahun' => 'Darjah',
            'tarikh_akhir_bayaran' => 'Tarikh Akhir Bayaran',
            'jenis_yuran' => 'Jenis Yuran',
            'jumlah_yuran' => 'Jumlah Yuran',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'enter_by' => 'Enter By',
            'update_by' => 'Update By',
            'bulan' => 'Bulan (Yuran)',
            'status_yuran' => 'Status Yuran',
        ];
    }

        public function getNames()
    {
        return $this->hasOne(MaklumatPelajar::className(), ['id_pelajar' => 'id_pelajar']);
    }
}
