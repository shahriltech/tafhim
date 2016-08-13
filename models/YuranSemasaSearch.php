<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\YuranSemasa;

/**
 * YuranSemasaSearch represents the model behind the search form about `app\models\YuranSemasa`.
 */
class YuranSemasaSearch extends YuranSemasa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_yuran', 'id_pelajar', 'tahun', 'enter_by', 'update_by'], 'integer'],
            [['tarikh_akhir_bayaran', 'jenis_yuran','bulan','status_yuran', 'date_create', 'date_update'], 'safe'],
            [['jumlah_yuran'], 'number'],
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
        $query = YuranSemasa::find();

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
            'id_yuran' => $this->id_yuran,
            'id_pelajar' => $this->id_pelajar,
            'tahun' => $this->tahun,
            'jumlah_yuran' => $this->jumlah_yuran,
            'enter_by' => $this->enter_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'tarikh_akhir_bayaran', $this->tarikh_akhir_bayaran])
            ->andFilterWhere(['like', 'jenis_yuran', $this->jenis_yuran])
            ->andFilterWhere(['like', 'bulan', $this->bulan])
             ->andFilterWhere(['like', 'status_yuran', $this->status_yuran])
            ->andFilterWhere(['like', 'date_create', $this->date_create])
            ->andFilterWhere(['like', 'date_update', $this->date_update]);

        return $dataProvider;
    }
}
