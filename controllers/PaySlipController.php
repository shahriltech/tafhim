<?php

namespace app\controllers;

use Yii;
use app\models\PaySlip;
use app\models\LookupKwsp11;
use app\models\LookupKwsp8;
use app\models\Perkeso;
use app\models\PaySlipSearch;
use yii\web\Controller;
use yii\db\Query;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PaySlipController implements the CRUD actions for PaySlip model.
 */
class PaySlipController extends Controller
{
    private $kwsp11;
    private $kwsp8;
    private $perkeso;
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all PaySlip models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PaySlipSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PaySlip model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new PaySlip model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PaySlip();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pay_slip_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PaySlip model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->pay_slip_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PaySlip model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the PaySlip model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PaySlip the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PaySlip::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionLaporan_gaji()
    {
        return $this->render('laporan_gaji');
    }

    public function actionLaporan_epf()
    {
        return $this->render('laporan_epf');
    }

    public function actionLaporan_socso()
    {
        return $this->render('laporan_socso');
    }

    public function actionLaporan_tabung_kebajikan()
    {
        return $this->render('laporan_tabung_kebajikan');
    }

    public function actionLaporan_tabung_guru()
    {
        return $this->render('laporan_tabung_guru');
    }

    public function actionLaporan_ctg()
    {
        return $this->render('laporan_ctg');
    }

    public function actionLaporan_sewa()
    {
        return $this->render('laporan_sewa');
    }

    public function actionLaporan_kksk()
    {
        return $this->render('laporan_kksk');
    }

    public function actionLaporan_tbghaji()
    {
        return $this->render('laporan_tbghaji');
    }

    public function actionLaporan_bank()
    {
        return $this->render('laporan_bank');
    }

    public function getKwsp11()
    {
        $this->kwsp11 = LookupKwsp11::find()
                      ->all();

        return $this->kwsp11;
    }

    public function getKwsp8()
    {
        $this->kwsp8 = LookupKwsp8::find()
                      ->all();

        return $this->kwsp8;
    }

    public function getPerkeso()
    {
        $this->perkeso = Perkeso::find()
                        ->all();

        return $this->perkeso;
    }

    public function actionGaji_bersih($tahun, $bulan)
    {

        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $gaji_asas[$key] = $value['gaji_asas'];
            $elaun_asas[$key] = $value['elaun_asas'];
            $elaun_rumah[$key] = $value['elaun_rumah'];
            $sewa_rumah[$key] = $value['sewa_rumah'];
            $tabung_haji[$key] = $value['tabung_haji'];
            $ctg[$key] = $value['ctg'];
            $kksk[$key] = $value['kksk'];
            $loan[$key] = $value['loan'];
            $peratus_kwsp[$key] = $value['peratus_kwsp'];
            $bonus[$key] = $value['bonus'];
            $staff_id[$key] = $value['staff_id'];

            if ($value['peratus_kwsp'] == 8) {
                $kwsp = $this->getKwsp8();
            }
            else{
                $kwsp = $this->getKwsp11();
            }

            $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

            //determine kwsp
            foreach ($kwsp as $value2) {
                if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                {
                    
                    $oleh_pekerja = $value2['oleh_pekerja'];
                    $oleh_majikan = $value2['oleh_majikan'];
                }
            }

            $perkeso = $this->getPerkeso();
            //determine socso
            foreach ($perkeso as $value3)
            {
                if ($gaji_kasar >= $value3['dari'] && $gaji_kasar <= $value3['hingga']) {
                    $syer_pekerja = $value3['syer_pekerja'];
                }
            }

             $epf[$key] = $oleh_pekerja;
             $socso[$key] = $syer_pekerja;

            $tarikhmasa = $value['tarikhmasa'];
            $total_days = date("t",strtotime($value['tarikhmasa']));
            $total_gaji[$key] = $gaji_kasar;
            //$data['oleh_majikan'][$i] = 0-$oleh_majikan;
            $tabung_guru[$key] = $value['tabung_guru'];
            // $tempat_kerja[$key] = strtoupper(0-$value['tah']);
            $gaji_tahan[$key] = $value['gaji_tahan'];
            $hibah[$key] = $value['hibah'];
            $bonus[$key] = $value['bonus'];
            $lain[$key] = $value['lain'];
            $lain_tambahan[$key] = $value['lain_tambahan'];

            if($value['memo_ctg'] == "")
            {
                $memo_ctg[$key] = "";
            }else
            {
                $memo_ctg[$key] = "<em>(".$value['memo_ctg'].")</em>";
            }
            $pelarasan[$key] =  ($value['hibah'] + $value['bonus'] + $value['lain_tambahan']) - ($value['tabung_haji'] + $value['tabung_guru'] + $value['sewa_rumah'] + $value['kksk'] + $value['gaji_tahan'] + $value['lain'] + $value['loan']);

            $lain_jumlah[$key] = $lain_tambahan[$key] - $lain[$key];
            $gaji_bersih[$key] = ($gaji_kasar + $pelarasan[$key] - $oleh_pekerja - $syer_pekerja - ((($total_gaji[$key] + $gaji_tahan[$key]) / $total_days) * $ctg[$key]));
            $i++;
        }
        //exit();
        $bil = $i;
        return $this->render('gaji_bersih', [
            'gaji_asas' => $gaji_asas,
            'nama' => $nama,
            'elaun_asas' => $elaun_asas,
            'elaun_rumah' => $elaun_rumah,
            'sewa_rumah' => $sewa_rumah,
            'tabung_haji' => $tabung_haji,
            'ctg' => $ctg,
            'kksk' => $kksk,
            'loan' => $loan,
            'kwsp' =>$kwsp,
            'gaji_kasar' => $gaji_kasar,
            'epf'=>$epf,
            'socso' => $socso,
            'tahun' => $_GET['tahun'],
            'bulan' => $_GET['bulan'],
            'tarikhmasa' => $tarikhmasa,
            'total_days' => $total_days,
            'total_gaji' => $total_gaji,
            'tabung_guru' => $tabung_guru,
            'tabung_haji' => $tabung_haji,
            'bonus' => $bonus,
            'lain_jumlah' => $lain_jumlah,
            'memo_ctg' =>$memo_ctg,
            'gaji_bersih' => $gaji_bersih,
            'gaji_tahan' => $gaji_tahan,
            'bil' => $bil,
        ]);
    }

    public function actionLihat_laporan_epf($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp','maklumat_kakitangan.no_kp','maklumat_kakitangan.no_kwsp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $gaji_asas[$key] = $value['gaji_asas'];
            $elaun_asas[$key] = $value['elaun_asas'];
            $elaun_rumah[$key] = $value['elaun_rumah'];
            $peratus_kwsp[$key] = $value['peratus_kwsp'];
            $no_kwsp[$key] = $value['no_kwsp'];
            $bonus[$key] = $value['bonus'];
            $tarikhmasa = $value['tarikhmasa'];

            if ($value['peratus_kwsp'] == 8) {
                $kwsp = $this->getKwsp8();
            }
            else{
                $kwsp = $this->getKwsp11();
            }

            $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

            //determine kwsp
            foreach ($kwsp as $value2) {
                if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                {
                    
                    $oleh_pekerja = $value2['oleh_pekerja'];
                    $oleh_majikan = $value2['oleh_majikan'];
                    $jumlah_caruman = $value2['jumlah_caruman'];
                }
            }

            $epf[$key] = $oleh_pekerja;
            $contribution[$key] = $oleh_majikan;
            $jumlah[$key] = $jumlah_caruman;
            $gaji[$key] = $gaji_kasar;

            $i++;
        }
        $bil = $i;

        return $this->render('lihat_laporan_epf', [
            'nama' => $nama,
            'no_kp' => $no_kp,
            'no_kwsp' => $no_kwsp,
            'epf'=>$epf,
            'contribution' => $contribution,
            'tahun' => $_GET['tahun'],
            'bulan' => $_GET['bulan'],
            'tarikhmasa' => $tarikhmasa,
            'jumlah' => $jumlah,
            'gaji' => $gaji,
            'bil' => $bil,
        ]);
    }

    public function actionLihat_laporan_socso($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>date("Y-n-t",strtotime($_GET['tahun']."-".$_GET['bulan']."-1"))])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $gaji_asas[$key] = $value['gaji_asas'];
            $elaun_asas[$key] = $value['elaun_asas'];
            $elaun_rumah[$key] = $value['elaun_rumah'];
            $tarikhmasa = $value['tarikhmasa'];

            $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

            $perkeso = $this->getPerkeso();
            //determine socso
            foreach ($perkeso as $value3)
            {
                if ($gaji_kasar >= $value3['dari'] && $gaji_kasar <= $value3['hingga']) {
                    $syer_pekerja = $value3['syer_pekerja'];
                    $syer_majikan = $value3['syer_majikan'];
                    $jumlah_caruman = $value3['jumlah_caruman'];
                }
            }

            $socso[$key] = $syer_pekerja;
            $contribution[$key] = $syer_majikan;
            $jumlah[$key] = $jumlah_caruman;
            $gaji[$key] = $gaji_kasar;

            $i++;
        }
        $bil = $i;

        return $this->render('lihat_laporan_socso', [
            'nama' => $nama,
            'no_kp' => $no_kp,
            'socso'=>$socso,
            'contribution' => $contribution,
            'tahun' => $_GET['tahun'],
            'bulan' => $_GET['bulan'],
            'tarikhmasa' => $tarikhmasa,
            'jumlah' => $jumlah,
            'gaji' => $gaji,
            'bil' => $bil,
        ]);
    }

    public function actionLihat_laporan_tabung_kebajikan($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.loan','pay_slip.tarikhmasa', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.loan',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $loan[$key] = $value['loan'];
            $tarikhmasa = $value['tarikhmasa'];

            $i++;
        }

        $bil = $i;

        return $this->render('lihat_laporan_tabung_kebajikan',[
                'nama' => $nama,
                'no_kp' => $no_kp,
                'loan'=>$loan,
                'tahun' => $_GET['tahun'],
                'bulan' => $_GET['bulan'],
                'tarikhmasa' => $tarikhmasa,
                'bil' =>$bil,

            ]);
    }

    public function actionLihat_laporan_tabung_guru($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.tabung_guru','pay_slip.tarikhmasa', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.tabung_guru',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $tabung_guru[$key] = $value['tabung_guru'];
            $tarikhmasa = $value['tarikhmasa'];

            $i++;
        }

        $bil = $i;

        return $this->render('lihat_laporan_tabung_guru',[
                'nama' => $nama,
                'no_kp' => $no_kp,
                'tabung_guru'=>$tabung_guru,
                'tahun' => $_GET['tahun'],
                'bulan' => $_GET['bulan'],
                'tarikhmasa' => $tarikhmasa,
                'bil' =>$bil,

            ]);
    }

    public function actionLihat_laporan_ctg($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.ctg',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $tarikhmasa = $value['tarikhmasa'];
            $gaji_asas[$key] = $value['gaji_asas'];
            $elaun_asas[$key] = $value['elaun_asas'];
            $elaun_rumah[$key] = $value['elaun_rumah'];
            $total_days = date("t",strtotime($value['tarikhmasa']));

            $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

            $ctg[$key] = (($gaji_kasar - $value['gaji_tahan'])/ $total_days) * $value['ctg'];

            $i++;
        }

        $bil = $i;

        return $this->render('lihat_laporan_ctg',[
                'nama' => $nama,
                'no_kp' => $no_kp,
                'ctg'=>$ctg,
                'tahun' => $_GET['tahun'],
                'bulan' => $_GET['bulan'],
                'tarikhmasa' => $tarikhmasa,
                'bil' =>$bil,
            ]);
    }

    public function actionLihat_laporan_sewa($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.sewa_rumah',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $tarikhmasa = $value['tarikhmasa'];
            $sewa_rumah[$key] = $value['sewa_rumah'];
            $total_days = date("t",strtotime($value['tarikhmasa']));

            $i++;
        }

        $bil = $i;

        return $this->render('lihat_laporan_sewa',[
                'nama' => $nama,
                'no_kp' => $no_kp,
                'tahun' => $_GET['tahun'],
                'bulan' => $_GET['bulan'],
                'sewa_rumah' => $sewa_rumah,
                'tarikhmasa' => $tarikhmasa,
                'bil' => $bil,
            ]);
    }

    public function actionLihat_laporan_kksk($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.kksk',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $tarikhmasa = $value['tarikhmasa'];
            $kksk[$key] = $value['kksk'];
            $total_days = date("t",strtotime($value['tarikhmasa']));

            $i++;
        }

        $bil = $i;

        return $this->render('lihat_laporan_kksk',[
                'nama' => $nama,
                'no_kp' => $no_kp,
                'tahun' => $_GET['tahun'],
                'bulan' => $_GET['bulan'],
                'kksk' => $kksk,
                'tarikhmasa' => $tarikhmasa,
                'bil' => $bil,
            ]);
    }

    public function actionLihat_laporan_tbghaji($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.no_kp','maklumat_kakitangan.acc_tabung_haji'])  
                ->from('pay_slip')
                ->rightJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->andWhere(['!=','pay_slip.tabung_haji',0])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $tarikhmasa = $value['tarikhmasa'];
            $tbghaji[$key] = $value['tabung_haji'];
            $acchaji[$key] = $value['acc_tabung_haji'];
            $total_days = date("t",strtotime($value['tarikhmasa']));

            $i++;
        }

        $bil = $i;

        return $this->render('lihat_laporan_tbghaji',[
                'nama' => $nama,
                'no_kp' => $no_kp,
                'tahun' => $_GET['tahun'],
                'bulan' => $_GET['bulan'],
                'tbghaji' => $tbghaji,
                'tarikhmasa' => $tarikhmasa,
                'acchaji' => $acchaji,
                'bil' => $bil,
            ]);
    }

    public function actionLihat_laporan_bank($tahun, $bulan)
    {
        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp','maklumat_kakitangan.acc_bimb','maklumat_kakitangan.no_kp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh])
                ->orderBy('maklumat_kakitangan.nama',SORT_ASC);
                
        $command = $query->createCommand();
        $data = $command->queryAll();

        $i = 0;

        foreach ($data as $key => $value) {
            $nama[$key] = $value['nama'];
            $no_kp[$key] = $value['no_kp'];
            $acc_bimb[$key] = $value['acc_bimb'];
            $gaji_asas[$key] = $value['gaji_asas'];
            $elaun_asas[$key] = $value['elaun_asas'];
            $elaun_rumah[$key] = $value['elaun_rumah'];
            $sewa_rumah[$key] = $value['sewa_rumah'];
            $tabung_haji[$key] = $value['tabung_haji'];
            $ctg[$key] = $value['ctg'];
            $kksk[$key] = $value['kksk'];
            $loan[$key] = $value['loan'];
            $peratus_kwsp[$key] = $value['peratus_kwsp'];
            $bonus[$key] = $value['bonus'];
            $staff_id[$key] = $value['staff_id'];

            if ($value['peratus_kwsp'] == 8) {
                $kwsp = $this->getKwsp8();
            }
            else{
                $kwsp = $this->getKwsp11();
            }

            $gaji_kasar = $value['gaji_asas'] + $value['elaun_asas'] + $value['elaun_rumah'];

            //determine kwsp
            foreach ($kwsp as $value2) {
                if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                {
                    
                    $oleh_pekerja = $value2['oleh_pekerja'];
                    $oleh_majikan = $value2['oleh_majikan'];
                }
            }

            $perkeso = $this->getPerkeso();
            //determine socso
            foreach ($perkeso as $value3)
            {
                if ($gaji_kasar >= $value3['dari'] && $gaji_kasar <= $value3['hingga']) {
                    $syer_pekerja = $value3['syer_pekerja'];
                }
            }

             $epf[$key] = $oleh_pekerja;
             $socso[$key] = $syer_pekerja;

            $tarikhmasa = $value['tarikhmasa'];
            $total_days = date("t",strtotime($value['tarikhmasa']));
            $total_gaji[$key] = $gaji_kasar;
            //$data['oleh_majikan'][$i] = 0-$oleh_majikan;
            $tabung_guru[$key] = $value['tabung_guru'];
            // $tempat_kerja[$key] = strtoupper(0-$value['tah']);
            $gaji_tahan[$key] = $value['gaji_tahan'];
            $hibah[$key] = $value['hibah'];
            $bonus[$key] = $value['bonus'];
            $lain[$key] = $value['lain'];
            $lain_tambahan[$key] = $value['lain_tambahan'];

            if($value['memo_ctg'] == "")
            {
                $memo_ctg[$key] = "";
            }else
            {
                $memo_ctg[$key] = "<em>(".$value['memo_ctg'].")</em>";
            }
            $pelarasan[$key] =  ($value['hibah'] + $value['bonus'] + $value['lain_tambahan']) - ($value['tabung_haji'] + $value['tabung_guru'] + $value['sewa_rumah'] + $value['kksk'] + $value['gaji_tahan'] + $value['lain'] + $value['loan']);

            $lain_jumlah[$key] = $lain_tambahan[$key] - $lain[$key];
            $gaji_bersih[$key] = ($gaji_kasar + $pelarasan[$key] - $oleh_pekerja - $syer_pekerja - ((($total_gaji[$key] + $gaji_tahan[$key]) / $total_days) * $ctg[$key]));
            $i++;
        }

        $bil = $i;
        return $this->render('lihat_laporan_bank', [
            'gaji_asas' => $gaji_asas,
            'nama' => $nama,
            'tahun' => $_GET['tahun'],
            'bulan' => $_GET['bulan'],
            'tarikhmasa' => $tarikhmasa,
            'total_days' => $total_days,
            'gaji_bersih' => $gaji_bersih,
            'acc_bimb' => $acc_bimb,
            'no_kp' => $no_kp,
            'bil' => $bil,
        ]);
    }

}

