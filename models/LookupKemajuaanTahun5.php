<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_kemajuaan_tahun_5".
 *
 * @property integer $id
 * @property string $mata_pelajaran
 * @property string $sesi
 * @property integer $id_catatan_pelajaran
 */
class LookupKemajuaanTahun5 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_kemajuaan_tahun_5';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sesi'], 'string'],
            [['id_catatan_pelajaran'], 'integer'],
            [['mata_pelajaran'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mata_pelajaran' => 'Mata Pelajaran',
            'sesi' => 'Sesi',
            'id_catatan_pelajaran' => 'Id Catatan Pelajaran',
        ];
    }
}
