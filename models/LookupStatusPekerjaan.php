<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_status_pekerjaan".
 *
 * @property integer $id
 * @property string $status_pekerjaan
 */
class LookupStatusPekerjaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_status_pekerjaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status_pekerjaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status_pekerjaan' => 'Status Pekerjaan',
        ];
    }
}
