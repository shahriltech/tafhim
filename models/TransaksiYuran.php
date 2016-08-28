<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_yuran".
 *
 * @property integer $id_transaksi_yuran
 * @property string $tarikh_bayaran
 * @property double $jumlah_bayaran
 * @property string $nota
 * @property integer $id_pembayaran
 */
class TransaksiYuran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_yuran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jumlah_bayaran'], 'number'],
            [['nota'], 'string'],
            [['id_yuran'], 'integer'],
            [['tarikh_bayaran','no_resit'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi_yuran' => 'Id Transaksi Yuran',
            'tarikh_bayaran' => 'Tarikh Bayaran',
            'jumlah_bayaran' => 'Jumlah Bayaran',
            'nota' => 'Nota',
            'id_yuran' => 'Id Yuran',
            'no_resit' => 'No Resit'
        ];
    }
}
