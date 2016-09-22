<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Perkeso;

/**
 * PerkesoSearch represents the model behind the search form about `app\models\Perkeso`.
 */
class PerkesoSearch extends Perkeso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_perkeso'], 'integer'],
            [['dari', 'hingga', 'syer_majikan', 'syer_pekerja', 'jumlah_caruman', 'jumlah_caruman_majikan'], 'number'],
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
        $query = Perkeso::find();

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
            'id_perkeso' => $this->id_perkeso,
            'dari' => $this->dari,
            'hingga' => $this->hingga,
            'syer_majikan' => $this->syer_majikan,
            'syer_pekerja' => $this->syer_pekerja,
            'jumlah_caruman' => $this->jumlah_caruman,
            'jumlah_caruman_majikan' => $this->jumlah_caruman_majikan,
        ]);

        return $dataProvider;
    }
}
