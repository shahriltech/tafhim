<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_tangga_gaji".
 *
 * @property integer $id
 * @property string $tangga_gaji
 */
class LookupTanggaGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_tangga_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tangga_gaji'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tangga_gaji' => 'Tangga Gaji',
        ];
    }
}
