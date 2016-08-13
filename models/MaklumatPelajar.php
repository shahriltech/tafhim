<?php

namespace app\models;

use Yii;
use app\models\LookupPusatPengajian; 
/**
 * This is the model class for table "maklumat_pelajar".
 *
 * @property integer $id_pelajar
 * @property string $nama_pelajar
 * @property string $jantina
 * @property string $tarikh_lahir
 * @property string $tempat_lahir
 * @property string $no_surat_beranak
 * @property string $no_my_kid
 * @property integer $id_pusat_pengajian
 * @property string $sesi_pengajian
 * @property string $tarikh_masuk
 * @property string $tahun_mula
 * @property string $no_tel_rumah
 * @property string $alamat_rumah
 * @property double $SPRA
 * @property double $PSRA
 * @property string $status
 * @property string $warganegara
 * @property integer $tahun_lewat
 * @property integer $alumni
 * @property string $date_create
 * @property string $date_update
 * @property integer $enter_by
 * @property integer $update_by
 * @property string $tarikh_daftar
 */
class MaklumatPelajar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'maklumat_pelajar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['jantina', 'tempat_lahir', 'sesi_pengajian', 'alamat_rumah', 'status', 'warganegara'], 'string'],
            [['tarikh_lahir', 'tarikh_masuk'], 'safe'],
            [['id_pusat_pengajian', 'tahun_lewat', 'alumni', 'enter_by', 'update_by'], 'integer'],
            [['SPRA', 'PSRA'], 'number'],
            ['nama_pelajar', 'required', 'message' => 'Sila Isi Nama Pelajar'],
            ['no_my_kid', 'required', 'message' => 'Sila Isi No Kad My Kid'],
            [['no_my_kid'], 'string', 'max' => 255],
            [['no_surat_beranak'], 'string', 'max' => 20],
            [['no_my_kid'], 'string', 'max' => 14],
            [['tahun_mula'], 'string', 'max' => 10],
            [['no_tel_rumah', 'tarikh_daftar'], 'string', 'max' => 25],
            [['date_create', 'date_update'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pelajar' => 'Id Pelajar',
            'nama_pelajar' => 'Nama Pelajar',
            'jantina' => 'Jantina',
            'tarikh_lahir' => 'Tarikh Lahir',
            'tempat_lahir' => 'Tempat Lahir',
            'no_surat_beranak' => 'No Surat Beranak',
            'no_my_kid' => 'No My Kid',
            'id_pusat_pengajian' => 'Id Pusat Pengajian',
            'sesi_pengajian' => 'Sesi Pengajian',
            'tarikh_masuk' => 'Tarikh Masuk',
            'tahun_mula' => 'Tahun Mula',
            'no_tel_rumah' => 'No Telefon Rumah',
            'alamat_rumah' => 'Alamat Rumah',
            'SPRA' => 'SPRA',
            'PSRA' => 'PSRA',
            'status' => 'Status',
            'warganegara' => 'Warganegara',
            'tahun_lewat' => 'Tahun Lewat',
            'alumni' => 'Alumni',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'enter_by' => 'Enter By',
            'update_by' => 'Update By',
            'tarikh_daftar' => 'Tarikh Daftar',
        ];
    }

    public function getPengajian(){
         return $this->hasOne(LookupPusatPengajian::className(),['id' =>'id_pusat_pengajian']);
    }
}
