<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian_amali".
 *
 * @property integer $id
 * @property integer $id_pelajar
 * @property string $peperiksaan
 * @property integer $darjah
 */
class PenilaianAmali extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penilaian_amali';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajar', 'darjah'], 'integer'],
            [['peperiksaan'], 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_pelajar' => 'Id Pelajar',
            'peperiksaan' => 'Peperiksaan',
            'darjah' => 'Darjah',
        ];
    }


    public function getNames()
    {
        return $this->hasOne(MaklumatPelajar::className(), ['id_pelajar' => 'id_pelajar']);
    }
}
