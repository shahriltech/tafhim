<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "maklumat_penjaga".
 *
 * @property integer $id
 * @property string $nama_bapa
 * @property string $no_kad_pengenalan_bapa
 * @property string $pekerjaan_bapa
 * @property string $no_telefon_bapa
 * @property string $alamat_majikan
 * @property integer $gaji_bapa
 * @property string $nama_ibu
 * @property string $no_kad_pengenalan_ibu
 * @property string $pekerjaan_ibu
 * @property string $no_telefon_ibu
 * @property string $alamat_majikan_ibu
 * @property string $gaji_ibu
 * @property string $id_pelajar
 */
class MaklumatPenjaga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maklumat_penjaga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['alamat_majikan', 'alamat_majikan_ibu'], 'string'],
            [['gaji_bapa'], 'integer'],
            [['nama_bapa', 'nama_ibu', 'no_telefon_ibu', 'gaji_ibu', 'id_pelajar'], 'string', 'max' => 255],
            [['no_kad_pengenalan_bapa', 'no_telefon_bapa', 'no_kad_pengenalan_ibu'], 'string', 'max' => 15],
            [['pekerjaan_bapa', 'pekerjaan_ibu'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_bapa' => 'Nama Bapa',
            'no_kad_pengenalan_bapa' => 'No Kad Pengenalan Bapa',
            'pekerjaan_bapa' => 'Pekerjaan Bapa',
            'no_telefon_bapa' => 'No Telefon Bapa',
            'alamat_majikan' => 'Alamat Majikan',
            'gaji_bapa' => 'Gaji Bapa',
            'nama_ibu' => 'Nama Ibu',
            'no_kad_pengenalan_ibu' => 'No Kad Pengenalan Ibu',
            'pekerjaan_ibu' => 'Pekerjaan Ibu',
            'no_telefon_ibu' => 'No Telefon Ibu',
            'alamat_majikan_ibu' => 'Alamat Majikan Ibu',
            'gaji_ibu' => 'Gaji Ibu',
            'id_pelajar' => 'Id Pelajar',
        ];
    }
}
