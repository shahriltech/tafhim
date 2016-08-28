<?php

namespace app\controllers;

use Yii;
use app\models\PaySlip;
use app\models\LookupKwsp11;
use app\models\LookupKwsp8;
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

    public function actionGaji_bersih($tahun, $bulan)
    {
        $a = $this->getKwsp11();

        $tarikh = date("Y-n-t",strtotime($tahun."-".$bulan."-1"));

        $query = new Query;
        $query  ->select(['pay_slip.*', 'maklumat_kakitangan.nama','maklumat_kakitangan.peratus_kwsp'])  
                ->from('pay_slip')
                ->leftJoin('maklumat_kakitangan', 'maklumat_kakitangan.id_staf = pay_slip.staff_id')
                ->where(['pay_slip.tarikhmasa'=>$tarikh]);
                
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

            foreach ($kwsp as $value2) {
                if(($gaji_kasar + $value['bonus']) >= $value2['dari'] && ($gaji_kasar + $value['bonus']) <= $value2['hingga'])
                {
                    
                    $oleh_pekerja = $value2['oleh_pekerja'];
                    $oleh_majikan = $value2['oleh_majikan'];
                }
            }

             $epf[$key] = $oleh_pekerja;
            //print($oleh_pekerja."<br>");


            $i++;
            //print($key."<br>");
            //$bil = $i;
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
            'staff_id'=>$staff_id,
            'epf'=>$epf,
            'bil' => $bil,
        ]);
    }
}

