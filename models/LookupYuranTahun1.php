<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_yuran_tahun_1".
 *
 * @property integer $id
 * @property string $jenis_bayaran
 * @property double $jumlah
 */
class LookupYuranTahun1 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_yuran_tahun_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah'], 'number'],
            [['jenis_bayaran'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_bayaran' => 'Jenis Bayaran',
            'jumlah' => 'Jumlah',
        ];
    }
}
