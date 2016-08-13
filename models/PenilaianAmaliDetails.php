<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "penilaian_amali_details".
 *
 * @property integer $id
 * @property string $markah
 * @property integer $id_perkara
 * @property integer $id_penilaian_amali
 */
class PenilaianAmaliDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'penilaian_amali_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perkara', 'id_penilaian_amali'], 'integer'],
            [['markah'], 'string', 'max' => 20],
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
            'id_perkara' => 'Id Perkara',
            'id_penilaian_amali' => 'Id Penilaian Amali',
        ];
    }
}
