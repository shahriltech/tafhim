<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_peringkat_gaji".
 *
 * @property integer $id
 * @property string $peringkat_gaji
 */
class LookupPeringkatGaji extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_peringkat_gaji';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['peringkat_gaji'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'peringkat_gaji' => 'Peringkat Gaji',
        ];
    }
}
