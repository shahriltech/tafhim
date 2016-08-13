<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaklumatCuti;

/**
 * MaklumatCutiSearch represents the model behind the search form about `app\models\MaklumatCuti`.
 */
class MaklumatCutiSearch extends MaklumatCuti
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_staff', 'jenis_cuti', 'tahun', 'bulan'], 'integer'],
            [['bilangan_cuti'], 'safe'],
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
        $query = MaklumatCuti::find();

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
            'id_staff' => $this->id_staff,
            'jenis_cuti' => $this->jenis_cuti,
            'tahun' => $this->tahun,
            'bulan' => $this->bulan,
        ]);

        $query->andFilterWhere(['like', 'bilangan_cuti', $this->bilangan_cuti]);

        return $dataProvider;
    }
}
