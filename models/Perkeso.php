<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "perkeso".
 *
 * @property integer $id_perkeso
 * @property double $dari
 * @property double $hingga
 * @property double $syer_majikan
 * @property double $syer_pekerja
 * @property double $jumlah_caruman
 * @property double $jumlah_caruman_majikan
 */
class Perkeso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perkeso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dari', 'hingga', 'syer_majikan', 'syer_pekerja', 'jumlah_caruman', 'jumlah_caruman_majikan'], 'required'],
            [['dari', 'hingga', 'syer_majikan', 'syer_pekerja', 'jumlah_caruman', 'jumlah_caruman_majikan'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_perkeso' => 'Id Perkeso',
            'dari' => 'Dari',
            'hingga' => 'Hingga',
            'syer_majikan' => 'Syer Majikan',
            'syer_pekerja' => 'Syer Pekerja',
            'jumlah_caruman' => 'Jumlah Caruman',
            'jumlah_caruman_majikan' => 'Jumlah Caruman Majikan',
        ];
    }
}
