<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_kwsp_8".
 *
 * @property integer $id_kwsp
 * @property string $dari
 * @property string $hingga
 * @property string $oleh_majikan
 * @property string $oleh_pekerja
 * @property string $jumlah_caruman
 */
class LookupKwsp8 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_kwsp_8';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dari', 'hingga', 'oleh_majikan', 'oleh_pekerja', 'jumlah_caruman'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kwsp' => 'Id Kwsp',
            'dari' => 'Dari',
            'hingga' => 'Hingga',
            'oleh_majikan' => 'Oleh Majikan',
            'oleh_pekerja' => 'Oleh Pekerja',
            'jumlah_caruman' => 'Jumlah Caruman',
        ];
    }
}
