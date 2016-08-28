<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catatan_kemajuan_details".
 *
 * @property integer $id
 * @property string $markah
 * @property integer $id_gred
 * @property integer $id_pelajaran
 * @property integer $id_catatan
 */
class CatatanKemajuanDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catatan_kemajuan_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_gred', 'id_pelajaran', 'id_catatan'], 'integer'],
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
            'id_gred' => 'Id Gred',
            'id_pelajaran' => 'Id Pelajaran',
            'id_catatan' => 'Id Catatan',
        ];
    }
}
