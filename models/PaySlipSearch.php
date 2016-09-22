<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PaySlip;

/**
 * PaySlipSearch represents the model behind the search form about `app\models\PaySlip`.
 */
class PaySlipSearch extends PaySlip
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pay_slip_id', 'staff_id'], 'integer'],
            [['gaji_asas', 'elaun_rumah', 'elaun_asas', 'ctg', 'kksk', 'tabung_guru', 'tabung_haji', 'cuti_ehsan', 'cuti_sakit', 'pelarasan', 'potongan', 'kwsp', 'socso', 'gaji_tahan', 'sewa_rumah', 'loan', 'hibah', 'bonus', 'lain', 'lain_tambahan'], 'number'],
            [['tarikhmasa', 'memo_ctg'], 'safe'],
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
        $query = PaySlip::find();

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
            'pay_slip_id' => $this->pay_slip_id,
            'staff_id' => $this->staff_id,
            'gaji_asas' => $this->gaji_asas,
            'elaun_rumah' => $this->elaun_rumah,
            'elaun_asas' => $this->elaun_asas,
            'ctg' => $this->ctg,
            'kksk' => $this->kksk,
            'tabung_guru' => $this->tabung_guru,
            'tabung_haji' => $this->tabung_haji,
            'cuti_ehsan' => $this->cuti_ehsan,
            'cuti_sakit' => $this->cuti_sakit,
            'pelarasan' => $this->pelarasan,
            'potongan' => $this->potongan,
            'kwsp' => $this->kwsp,
            'socso' => $this->socso,
            'gaji_tahan' => $this->gaji_tahan,
            'sewa_rumah' => $this->sewa_rumah,
            'loan' => $this->loan,
            'tarikhmasa' => $this->tarikhmasa,
            'hibah' => $this->hibah,
            'bonus' => $this->bonus,
            'lain' => $this->lain,
            'lain_tambahan' => $this->lain_tambahan,
        ]);

        $query->andFilterWhere(['like', 'memo_ctg', $this->memo_ctg]);

        return $dataProvider;
    }
}
