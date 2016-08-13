<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lookup_borang_penilaian_amali_tahun_3".
 *
 * @property integer $id
 * @property string $perkara
 * @property string $sesi
 * @property string $markah
 */
class LookupBorangPenilaianAmaliTahun3 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lookup_borang_penilaian_amali_tahun_3';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sesi'], 'string'],
            [['perkara'], 'string', 'max' => 255],
            [['markah'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'perkara' => 'Perkara',
            'sesi' => 'Sesi',
            'markah' => 'Markah',
        ];
    }
}
