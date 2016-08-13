<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catatan_kemajuaan".
 *
 * @property integer $id
 * @property integer $id_pelajar
 * @property string $peperiksaan
 * @property string $markah_dan_gred
 * @property integer $create_by
 * @property integer $update_by
 * @property string $date_create
 * @property string $date_update
 */
class CatatanKemajuaan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catatan_kemajuaan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajar', 'create_by', 'update_by','darjah'], 'integer'],
            [['peperiksaan'], 'string'],
            [['date_create', 'date_update'], 'string', 'max' => 20],
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
            'create_by' => 'Create By',
            'update_by' => 'Update By',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'darjah' => 'Darjah',
        ];
    }

    public function getNames()
    {
        return $this->hasOne(MaklumatPelajar::className(), ['id_pelajar' => 'id_pelajar']);
    }
}
