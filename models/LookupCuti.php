<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_cuti".
 *
 * @property integer $id
 * @property string $jenis_cuti
 */
class LookupCuti extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_cuti';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jenis_cuti'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'jenis_cuti' => 'Jenis Cuti',
        ];
    }
}
