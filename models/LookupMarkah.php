<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_markah".
 *
 * @property integer $id
 * @property string $markah
 * @property string $gred
 * @property string $jenis
 */
class LookupMarkah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_markah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['markah'], 'string', 'max' => 20],
            [['gred'], 'string', 'max' => 5],
            [['jenis'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'markah' => 'Markah',
            'gred' => 'Gred',
            'jenis' => 'Jenis',
        ];
    }
}
