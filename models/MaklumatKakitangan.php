<?php

namespace app\models;

use Yii;
use app\models\LookupPusatPengajian;
use app\models\LookupStatusPekerjaan;
use app\models\LookupTanggaGaji;
use app\models\LookupPeringkatGaji;
/**
 * This is the model class for table "maklumat_kakitangan".
 *
 * @property integer $id_staf
 * @property integer $status_pekerjaan
 * @property string $tarikh_resign
 * @property string $foto
 * @property string $nama
 * @property string $no_kp
 * @property integer $umur
 * @property string $tarikh_mula_kerja
 * @property string $jawatan_sekarang
 * @property string $no_pekerja
 * @property string $tahfiz
 * @property string $alamat_tempat_kerja
 * @property string $warganegara
 * @property string $tarikh_lahir
 * @property string $tempat_lahir
 * @property string $alamat_surat_menyurat
 * @property string $alamat_tetap
 * @property string $no_tel_rumah
 * @property string $no_tel_bimbit
 * @property string $tahap_kesihatan
 * @property string $pengesahan_kesihatan
 * @property string $kecacatan
 * @property string $nyatakan_kecacatan
 * @property integer $tinggi_cm
 * @property integer $berat_kg
 * @property string $kumpulan_usrah
 * @property string $nama_ketua_usrah
 * @property string $unit_usrah
 * @property string $no_ahli_abim
 * @property string $gaji_asas
 * @property string $elaun_asas
 * @property string $elaun_rumah
 * @property string $tabung_gaji
 * @property string $tabung_guru
 * @property string $sewa_rumah
 * @property string $kksk
 * @property string $loan
 * @property string $gaji_tahan
 * @property string $acc_tabung_haji
 * @property string $no_kwsp
 * @property string $acc_bimb
 * @property string $rujukan_tawaran
 * @property string $peringkat_gaji
 * @property string $tangga_gaji
 * @property string $skim_gaji
 * @property string $skim_gaji_awal
 * @property string $nama_waris
 * @property string $hubungan_waris
 * @property string $no_tel_waris
 * @property string $kelulusan_tertinggi
 * @property integer $peratus_kwsp
 */
class MaklumatKakitangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maklumat_kakitangan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
           /* [['status_pekerjaan', 'tarikh_resign', 'foto', 'nama', 'no_kp', 'umur', 'tarikh_mula_kerja', 'jawatan_sekarang', 'no_pekerja', 'tahfiz', 'alamat_tempat_kerja', 'warganegara', 'tarikh_lahir', 'tempat_lahir', 'alamat_surat_menyurat', 'alamat_tetap', 'no_tel_rumah', 'no_tel_bimbit', 'tahap_kesihatan', 'pengesahan_kesihatan', 'kecacatan', 'nyatakan_kecacatan', 'tinggi_cm', 'berat_kg', 'kumpulan_usrah', 'nama_ketua_usrah', 'unit_usrah', 'no_ahli_abim', 'gaji_asas', 'elaun_asas', 'elaun_rumah', 'tabung_gaji', 'tabung_guru', 'sewa_rumah', 'kksk', 'loan', 'gaji_tahan', 'acc_tabung_haji', 'no_kwsp', 'acc_bimb', 'rujukan_tawaran', 'peringkat_gaji', 'tangga_gaji', 'skim_gaji', 'skim_gaji_awal', 'nama_waris', 'hubungan_waris', 'no_tel_waris', 'kelulusan_tertinggi', 'peratus_kwsp'], 'required'],*/
            [['status_pekerjaan', 'tinggi_cm', 'berat_kg', 'peratus_kwsp'], 'integer'],
            [['alamat_tempat_kerja', 'tempat_lahir', 'alamat_surat_menyurat', 'alamat_tetap'], 'string'],
            [['gaji_asas', 'elaun_asas', 'elaun_rumah', 'tabung_gaji', 'tabung_guru', 'sewa_rumah', 'gaji_tahan'], 'number'],
            [['tarikh_resign', 'tarikh_mula_kerja', 'warganegara', 'tarikh_lahir', 'kecacatan', 'no_ahli_abim', 'no_kwsp', 'acc_bimb'], 'string', 'max' => 50],
            [['foto', 'nama', 'kksk', 'loan', 'peringkat_gaji', 'tangga_gaji', 'skim_gaji', 'skim_gaji_awal', 'nama_waris'], 'string', 'max' => 255],
            [['no_kp'], 'string', 'max' => 15],
            [['jawatan_sekarang', 'no_pekerja', 'tahap_kesihatan', 'pengesahan_kesihatan', 'nyatakan_kecacatan', 'kumpulan_usrah', 'nama_ketua_usrah', 'unit_usrah', 'acc_tabung_haji', 'rujukan_tawaran', 'hubungan_waris', 'kelulusan_tertinggi'], 'string', 'max' => 100],
            [['tahfiz'], 'string', 'max' => 200],
            [['no_tel_rumah', 'no_tel_bimbit', 'no_tel_waris'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_staf' => 'Id Staf',
            'status_pekerjaan' => 'Status Pekerjaan',
            'tarikh_resign' => 'Tarikh Resign',
            'foto' => 'Foto',
            'nama' => 'Nama',
            'no_kp' => 'No Kp',
            'tarikh_mula_kerja' => 'Tarikh Mula Kerja',
            'jawatan_sekarang' => 'Jawatan Sekarang',
            'no_pekerja' => 'No Pekerja',
            'tahfiz' => 'Tahfiz',
            'alamat_tempat_kerja' => 'Alamat Tempat Kerja',
            'warganegara' => 'Warganegara',
            'tarikh_lahir' => 'Tarikh Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'alamat_surat_menyurat' => 'Alamat Surat Menyurat',
            'alamat_tetap' => 'Alamat Tetap',
            'no_tel_rumah' => 'No Tel Rumah',
            'no_tel_bimbit' => 'No Tel Bimbit',
            'tahap_kesihatan' => 'Tahap Kesihatan',
            'pengesahan_kesihatan' => 'Pengesahan Kesihatan',
            'kecacatan' => 'Kecacatan',
            'nyatakan_kecacatan' => 'Nyatakan Kecacatan',
            'tinggi_cm' => 'Tinggi Cm',
            'berat_kg' => 'Berat Kg',
            'kumpulan_usrah' => 'Kumpulan Usrah',
            'nama_ketua_usrah' => 'Nama Ketua Usrah',
            'unit_usrah' => 'Unit Usrah',
            'no_ahli_abim' => 'No Ahli Abim',
            'gaji_asas' => 'Gaji Asas',
            'elaun_asas' => 'Elaun Asas',
            'elaun_rumah' => 'Elaun Rumah',
            'tabung_gaji' => 'Tabung Gaji',
            'tabung_guru' => 'Tabung Guru',
            'sewa_rumah' => 'Sewa Rumah',
            'kksk' => 'Kksk',
            'loan' => 'Loan',
            'gaji_tahan' => 'Gaji Tahan',
            'acc_tabung_haji' => 'Acc Tabung Haji',
            'no_kwsp' => 'No Kwsp',
            'acc_bimb' => 'Acc Bimb',
            'rujukan_tawaran' => 'Rujukan Tawaran',
            'peringkat_gaji' => 'Peringkat Gaji',
            'tangga_gaji' => 'Tangga Gaji',
            'skim_gaji' => 'Skim Gaji',
            'skim_gaji_awal' => 'Skim Gaji Awal',
            'nama_waris' => 'Nama Waris',
            'hubungan_waris' => 'Hubungan Waris',
            'no_tel_waris' => 'No Tel Waris',
            'kelulusan_tertinggi' => 'Kelulusan Tertinggi',
            'peratus_kwsp' => 'Peratus Kwsp',
        ];
    }

    public function getNama_tahfiz()
    {
        return $this->hasOne(LookupPusatPengajian::className(),['id' =>'tahfiz']);
    }

    public function getStatuskerja()
    {
        return $this->hasOne(LookupStatusPekerjaan::className(),['id'=>'status_pekerjaan']);
    }

    public function getPeringkatgaji()
    {
        return $this->hasOne(LookupPeringkatGaji::className(),['id'=>'peringkat_gaji']);
    }

    public function getTanggagaji()
    {
        return $this->hasOne(LookupTanggaGaji::className(),['id'=>'tangga_gaji']);
    }

}
