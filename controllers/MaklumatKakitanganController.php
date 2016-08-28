<?php

namespace app\controllers;

use Yii;
use app\models\MaklumatKakitangan;
use app\models\MaklumatKakitanganSearch;
use app\models\PengurusanGajiSearch;
use app\models\MaklumatKakitanganResign;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MaklumatKakitanganController implements the CRUD actions for MaklumatKakitangan model.
 */
class MaklumatKakitanganController extends Controller
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
     * Lists all MaklumatKakitangan models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MaklumatKakitanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MaklumatKakitangan model.
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
     * Creates a new MaklumatKakitangan model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MaklumatKakitangan();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing MaklumatKakitangan model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }



    /**
     * Deletes an existing MaklumatKakitangan model.
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
     * Finds the MaklumatKakitangan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return MaklumatKakitangan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = MaklumatKakitangan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /* Display maklumak kakitangan yang dah resign */
    public function actionResign()
    {
        $searchModel = new MaklumatKakitanganResign();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('resign', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdd_resign($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_staf]);
        } else {
            return $this->render('add_resign', [
                'model' => $model,
            ]);
        }
    }

    public function actionSurat()
    {
        $searchModel = new MaklumatKakitanganSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('surat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSurat_tawaran($id)
    {
        return $this->renderPartial('surat_tawaran', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSurat_tawaran_pentadbiran($id)
    {
        return $this->renderPartial('surat_tawaran_pentadbiran',[
            'model' => $this->findModel($id),
        ]);
    }

    public function actionSurat_perjanjian($id)
    {
        return $this->renderPartial('surat_perjanjian',[
            'model' => $this->findModel($id),
        ]);
    }

    //Payroll Modul - Pengurusan Gaji
    public function actionPengurusan_gaji()
    {
        $searchModel = new PengurusanGajiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('pengurusan_gaji', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

}
