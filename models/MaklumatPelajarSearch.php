<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaklumatPelajar;

/**
 * MaklumatPelajarSearch represents the model behind the search form about `app\models\MaklumatPelajar`.
 */
class MaklumatPelajarSearch extends MaklumatPelajar
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajar', 'id_pusat_pengajian', 'tahun_lewat', 'alumni', 'enter_by', 'update_by'], 'integer'],
            [['nama_pelajar', 'jantina', 'tarikh_lahir', 'tempat_lahir', 'no_surat_beranak', 'no_my_kid', 'sesi_pengajian', 'tarikh_masuk', 'tahun_mula', 'no_tel_rumah', 'alamat_rumah', 'status', 'warganegara', 'date_create', 'date_update', 'tarikh_daftar'], 'safe'],
            [['SPRA', 'PSRA'], 'number'],
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
        $query = MaklumatPelajar::find();

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
            'id_pelajar' => $this->id_pelajar,
            'tarikh_lahir' => $this->tarikh_lahir,
            'id_pusat_pengajian' => $this->id_pusat_pengajian,
            'tarikh_masuk' => $this->tarikh_masuk,
            'SPRA' => $this->SPRA,
            'PSRA' => $this->PSRA,
            'tahun_lewat' => $this->tahun_lewat,
            'alumni' => $this->alumni,
            'enter_by' => $this->enter_by,
            'update_by' => $this->update_by,
        ]);

        $query->andFilterWhere(['like', 'nama_pelajar', $this->nama_pelajar])
            ->andFilterWhere(['like', 'jantina', $this->jantina])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'no_surat_beranak', $this->no_surat_beranak])
            ->andFilterWhere(['like', 'no_my_kid', $this->no_my_kid])
            ->andFilterWhere(['like', 'sesi_pengajian', $this->sesi_pengajian])
            ->andFilterWhere(['like', 'tahun_mula', $this->tahun_mula])
            ->andFilterWhere(['like', 'no_tel_rumah', $this->no_tel_rumah])
            ->andFilterWhere(['like', 'alamat_rumah', $this->alamat_rumah])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'warganegara', $this->warganegara])
            ->andFilterWhere(['like', 'date_create', $this->date_create])
            ->andFilterWhere(['like', 'date_update', $this->date_update])
            ->andFilterWhere(['like', 'tarikh_daftar', $this->tarikh_daftar]);

        return $dataProvider;
    }
}
