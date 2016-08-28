<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_slip".
 *
 * @property integer $pay_slip_id
 * @property integer $staff_id
 * @property string $gaji_asas
 * @property double $elaun_rumah
 * @property double $elaun_asas
 * @property double $ctg
 * @property double $kksk
 * @property double $tabung_guru
 * @property double $tabung_haji
 * @property double $cuti_ehsan
 * @property double $cuti_sakit
 * @property double $pelarasan
 * @property double $potongan
 * @property double $kwsp
 * @property double $socso
 * @property double $gaji_tahan
 * @property double $sewa_rumah
 * @property double $loan
 * @property string $tarikhmasa
 * @property string $memo_ctg
 * @property double $hibah
 * @property double $bonus
 * @property double $lain
 * @property double $lain_tambahan
 */
class PaySlip extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pay_slip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['staff_id', 'gaji_asas', 'elaun_rumah', 'elaun_asas', 'ctg', 'kksk', 'tabung_guru', 'tabung_haji', 'cuti_ehsan', 'cuti_sakit', 'pelarasan', 'potongan', 'kwsp', 'socso', 'gaji_tahan', 'sewa_rumah', 'loan', 'tarikhmasa', 'memo_ctg', 'hibah', 'bonus', 'lain', 'lain_tambahan'], 'required'],
            [['staff_id'], 'integer'],
            [['gaji_asas', 'elaun_rumah', 'elaun_asas', 'ctg', 'kksk', 'tabung_guru', 'tabung_haji', 'cuti_ehsan', 'cuti_sakit', 'pelarasan', 'potongan', 'kwsp', 'socso', 'gaji_tahan', 'sewa_rumah', 'loan', 'hibah', 'bonus', 'lain', 'lain_tambahan'], 'number'],
            [['tarikhmasa'], 'safe'],
            [['memo_ctg'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pay_slip_id' => 'Pay Slip ID',
            'staff_id' => 'Staff ID',
            'gaji_asas' => 'Gaji Asas',
            'elaun_rumah' => 'Elaun Rumah',
            'elaun_asas' => 'Elaun Asas',
            'ctg' => 'Ctg',
            'kksk' => 'Kksk',
            'tabung_guru' => 'Tabung Guru',
            'tabung_haji' => 'Tabung Haji',
            'cuti_ehsan' => 'Cuti Ehsan',
            'cuti_sakit' => 'Cuti Sakit',
            'pelarasan' => 'Pelarasan',
            'potongan' => 'Potongan',
            'kwsp' => 'Kwsp',
            'socso' => 'Socso',
            'gaji_tahan' => 'Gaji Tahan',
            'sewa_rumah' => 'Sewa Rumah',
            'loan' => 'Loan',
            'tarikhmasa' => 'Tarikhmasa',
            'memo_ctg' => 'Memo Ctg',
            'hibah' => 'Hibah',
            'bonus' => 'Bonus',
            'lain' => 'Lain',
            'lain_tambahan' => 'Lain Tambahan',
        ];
    }
}
