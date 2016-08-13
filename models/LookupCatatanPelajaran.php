<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_catatan_pelajaran".
 *
 * @property integer $id_catatan_pelajaran
 * @property string $pelajaran
 */
class LookupCatatanPelajaran extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_catatan_pelajaran';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pelajaran'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_catatan_pelajaran' => 'Id Catatan Pelajaran',
            'pelajaran' => 'Pelajaran',
        ];
    }
}
