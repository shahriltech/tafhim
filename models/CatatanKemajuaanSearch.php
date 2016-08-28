<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CatatanKemajuaan;

/**
 * CatatanKemajuaanSearch represents the model behind the search form about `app\models\CatatanKemajuaan`.
 */
class CatatanKemajuaanSearch extends CatatanKemajuaan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pelajar', 'create_by', 'update_by'], 'integer'],
            [['peperiksaan', 'date_create', 'date_update'], 'safe'],
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
        $query = CatatanKemajuaan::find();

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
            'id' => $this->id,
            'id_pelajar' => $this->id_pelajar,
            'create_by' => $this->create_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'peperiksaan', $this->peperiksaan])
            ->andFilterWhere(['like', 'date_create', $this->date_create])
            ->andFilterWhere(['like', 'date_update', $this->date_update]);

        return $dataProvider;
    }
}
