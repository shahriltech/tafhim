<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LookupKwsp8;

/**
 * LookupKwsp8Search represents the model behind the search form about `app\models\LookupKwsp8`.
 */
class LookupKwsp8Search extends LookupKwsp8
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kwsp'], 'integer'],
            [['dari', 'hingga', 'oleh_majikan', 'oleh_pekerja', 'jumlah_caruman'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LookupKwsp8::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_kwsp' => $this->id_kwsp,
            'dari' => $this->dari,
            'hingga' => $this->hingga,
            'oleh_majikan' => $this->oleh_majikan,
            'oleh_pekerja' => $this->oleh_pekerja,
            'jumlah_caruman' => $this->jumlah_caruman,
        ]);

        return $dataProvider;
    }
}
