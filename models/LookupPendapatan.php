<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_pendapatan".
 *
 * @property integer $id
 * @property string $pendapatan
 */
class LookupPendapatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_pendapatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pendapatan'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pendapatan' => 'Pendapatan',
        ];
    }
}
