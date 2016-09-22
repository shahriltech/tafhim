<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MaklumatKakitangan;

/**
 * MaklumatKakitanganSearch represents the model behind the search form about `app\models\MaklumatKakitangan`.
 */
class PengurusanGajiSearch extends MaklumatKakitangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_staf', 'status_pekerjaan', 'tinggi_cm', 'berat_kg', 'peratus_kwsp'], 'integer'],
            [['tarikh_resign', 'foto', 'nama', 'no_kp', 'tarikh_mula_kerja', 'jawatan_sekarang', 'no_pekerja', 'tahfiz', 'alamat_tempat_kerja', 'warganegara', 'tarikh_lahir', 'tempat_lahir', 'alamat_surat_menyurat', 'alamat_tetap', 'no_tel_rumah', 'no_tel_bimbit', 'tahap_kesihatan', 'pengesahan_kesihatan', 'kecacatan', 'nyatakan_kecacatan', 'kumpulan_usrah', 'nama_ketua_usrah', 'unit_usrah', 'no_ahli_abim', 'kksk', 'loan', 'acc_tabung_haji', 'no_kwsp', 'acc_bimb', 'rujukan_tawaran', 'peringkat_gaji', 'tangga_gaji', 'skim_gaji', 'skim_gaji_awal', 'nama_waris', 'hubungan_waris', 'no_tel_waris', 'kelulusan_tertinggi'], 'safe'],
            [['gaji_asas', 'elaun_asas', 'elaun_rumah', 'tabung_gaji', 'tabung_guru', 'sewa_rumah', 'gaji_tahan'], 'number'],
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
        $query = MaklumatKakitangan::find()
                ->andWhere(['status_pekerjaan'=>1]);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> ['defaultOrder' => ['nama' => SORT_ASC]],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_staf' => $this->id_staf,
            'status_pekerjaan' => $this->status_pekerjaan,
            'tinggi_cm' => $this->tinggi_cm,
            'berat_kg' => $this->berat_kg,
            'gaji_asas' => $this->gaji_asas,
            'elaun_asas' => $this->elaun_asas,
            'elaun_rumah' => $this->elaun_rumah,
            'tabung_gaji' => $this->tabung_gaji,
            'tabung_guru' => $this->tabung_guru,
            'sewa_rumah' => $this->sewa_rumah,
            'gaji_tahan' => $this->gaji_tahan,
            'peratus_kwsp' => $this->peratus_kwsp,
        ]);

        $query->andFilterWhere(['like', 'tarikh_resign', $this->tarikh_resign])
            ->andFilterWhere(['like', 'foto', $this->foto])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'no_kp', $this->no_kp])
            ->andFilterWhere(['like', 'tarikh_mula_kerja', $this->tarikh_mula_kerja])
            ->andFilterWhere(['like', 'jawatan_sekarang', $this->jawatan_sekarang])
            ->andFilterWhere(['like', 'no_pekerja', $this->no_pekerja])
            ->andFilterWhere(['like', 'tahfiz', $this->tahfiz])
            ->andFilterWhere(['like', 'alamat_tempat_kerja', $this->alamat_tempat_kerja])
            ->andFilterWhere(['like', 'warganegara', $this->warganegara])
            ->andFilterWhere(['like', 'tarikh_lahir', $this->tarikh_lahir])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat_surat_menyurat', $this->alamat_surat_menyurat])
            ->andFilterWhere(['like', 'alamat_tetap', $this->alamat_tetap])
            ->andFilterWhere(['like', 'no_tel_rumah', $this->no_tel_rumah])
            ->andFilterWhere(['like', 'no_tel_bimbit', $this->no_tel_bimbit])
            ->andFilterWhere(['like', 'tahap_kesihatan', $this->tahap_kesihatan])
            ->andFilterWhere(['like', 'pengesahan_kesihatan', $this->pengesahan_kesihatan])
            ->andFilterWhere(['like', 'kecacatan', $this->kecacatan])
            ->andFilterWhere(['like', 'nyatakan_kecacatan', $this->nyatakan_kecacatan])
            ->andFilterWhere(['like', 'kumpulan_usrah', $this->kumpulan_usrah])
            ->andFilterWhere(['like', 'nama_ketua_usrah', $this->nama_ketua_usrah])
            ->andFilterWhere(['like', 'unit_usrah', $this->unit_usrah])
            ->andFilterWhere(['like', 'no_ahli_abim', $this->no_ahli_abim])
            ->andFilterWhere(['like', 'kksk', $this->kksk])
            ->andFilterWhere(['like', 'loan', $this->loan])
            ->andFilterWhere(['like', 'acc_tabung_haji', $this->acc_tabung_haji])
            ->andFilterWhere(['like', 'no_kwsp', $this->no_kwsp])
            ->andFilterWhere(['like', 'acc_bimb', $this->acc_bimb])
            ->andFilterWhere(['like', 'rujukan_tawaran', $this->rujukan_tawaran])
            ->andFilterWhere(['like', 'peringkat_gaji', $this->peringkat_gaji])
            ->andFilterWhere(['like', 'tangga_gaji', $this->tangga_gaji])
            ->andFilterWhere(['like', 'skim_gaji', $this->skim_gaji])
            ->andFilterWhere(['like', 'skim_gaji_awal', $this->skim_gaji_awal])
            ->andFilterWhere(['like', 'nama_waris', $this->nama_waris])
            ->andFilterWhere(['like', 'hubungan_waris', $this->hubungan_waris])
            ->andFilterWhere(['like', 'no_tel_waris', $this->no_tel_waris])
            ->andFilterWhere(['like', 'kelulusan_tertinggi', $this->kelulusan_tertinggi]);

        return $dataProvider;
    }
}
