<?php

namespace app\controllers;

use Yii;
use app\models\MaklumatPembayaran;
use app\models\MaklumatPembayaranSearch;
use app\models\YuranTahun1;
use app\models\MaklumatPelajar;
use app\models\MaklumatPelajarSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaklumatPembayaranController implements the CRUD actions for MaklumatPembayaran model.
 */
class MaklumatPembayaranController extends Controller
{
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
     * Lists all MaklumatPembayaran models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaklumatPelajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionYuran($id)
    {
        return $this->render('yuran',[
            'id' => $id
            ]);
    }


    /**
     * Displays a single MaklumatPembayaran model.
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
     * Creates a new MaklumatPembayaran model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT YEAR(CURDATE()) - YEAR(tarikh_masuk) AS tahun,tahun_mula FROM maklumat_pelajar WHERE id_pelajar = "'.$id.'"');
        $model = $sql->queryAll();

        foreach ($model as $key => $value) {
            $tahun = $value['tahun'];
            $tahun_mula = $value['tahun_mula'];
        }
        if ($tahun_mula == 1) {
            $model = new MaklumatPembayaran();
            //$yuran1 = new YuranTahun1();
            $yuran1 = YuranTahun1::find()->all();

            if ($model->load(Yii::$app->request->post())) {

                //$r = $model->yuran = json_encode($_POST['MaklumatPembayaran']['yuran']);
                $model->yuran = serialize($_POST['MaklumatPembayaran']['yuran']);

                 $model->save();
                return $this->redirect(['view', 'id' => $model->id_pembayaran]);
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                    'yuran1' => $yuran1
                ]);
            }
        }

    }

    /**
     * Updates an existing MaklumatPembayaran model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_pembayaran]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing MaklumatPembayaran model.
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
     * Finds the MaklumatPembayaran model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaklumatPembayaran the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaklumatPembayaran::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
