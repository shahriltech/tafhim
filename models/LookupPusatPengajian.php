<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_pusat_pengajian".
 *
 * @property integer $id
 * @property string $pusat_pengajian
 */
class LookupPusatPengajian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_pusat_pengajian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pusat_pengajian'], 'string', 'max' => 225],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pusat_pengajian' => 'Pusat Pengajian',
        ];
    }
}
