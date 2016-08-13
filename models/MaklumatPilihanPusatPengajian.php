<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maklumat_pilihan_pusat_pengajian".
 *
 * @property integer $id
 * @property integer $nama_pusat_pengajian_pertama
 * @property integer $nama_pusat_pengajian_kedua
 * @property integer $nama_pusat_pengajian_ketiga
 * @property string $sessi_pengajian
 * @property string $id_pelajar
 */
class MaklumatPilihanPusatPengajian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maklumat_pilihan_pusat_pengajian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_pusat_pengajian_pertama', 'nama_pusat_pengajian_kedua', 'nama_pusat_pengajian_ketiga'], 'integer'],
            [['sessi_pengajian'], 'string'],
            [['id_pelajar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_pusat_pengajian_pertama' => 'Nama Pusat Pengajian Pertama',
            'nama_pusat_pengajian_kedua' => 'Nama Pusat Pengajian Kedua',
            'nama_pusat_pengajian_ketiga' => 'Nama Pusat Pengajian Ketiga',
            'sessi_pengajian' => 'Sessi Pengajian',
            'id_pelajar' => 'Id Pelajar',
        ];
    }
}
