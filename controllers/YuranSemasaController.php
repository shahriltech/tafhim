<?php

namespace app\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use app\models\YuranSemasa;
use app\models\YuranSemasaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaklumatPelajar;
use app\models\MaklumatPelajarSearch;
use app\models\LookupPusatPengajian;
use app\models\LookupYuranTahun1;
use app\models\LookupYuranTahun2;
use app\models\LookupYuranTahun3;
use app\models\LookupYuranTahun4;
use app\models\LookupYuranTahun5;
use app\models\LookupYuranTahun6;

use app\models\TransaksiYuran;
/**
 * YuranSemasaController implements the CRUD actions for YuranSemasa model.
 */
class YuranSemasaController extends Controller
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
     * Lists all YuranSemasa models.
     * @return mixed
     */
    public function actionIndex()
    {
        $tahfiz = new ActiveDataProvider([
            'query' => LookupPusatPengajian::find(),
        ]);


        $searchModel = new MaklumatPelajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tahfiz' => $tahfiz,
        ]);


    }

    public function actionYuran($id)
    {
        $yuran_semasa = YuranSemasa::find()->where(['id_pelajar'=>$id])->all();
        return $this->render('yuran',[
            'id' => $id,
            'yuran_semasa' => $yuran_semasa,
            ]);
    }

    public function actionPelajar($id)
    {

        $searchModel = new MaklumatPelajarSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider->query->where(['id_pusat_pengajian'=>$id]);

        $tahfiz = LookupPusatPengajian::find()->where(['id'=>$id])->one();

        return $this->render('pelajar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tahfiz' => $tahfiz,
        ]);


    }


    /**
     * Displays a single YuranSemasa model.
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
     * Creates a new YuranSemasa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT YEAR(CURDATE()) - YEAR(tarikh_masuk) AS tahun_join,YEAR(CURDATE()) - YEAR(tarikh_lahir) AS umur FROM maklumat_pelajar WHERE id_pelajar = "'.$id.'"');
        $model = $sql->queryAll();

        foreach ($model as $key => $value) {
            $tahun_join = $value['tahun_join'];
            $umur = $value['umur'];
        }
        // tahun =0 = pelajar baru if not old student

        ####################//darjah 1
        if ($umur == 7) {
            $model = new YuranSemasa();
            $yuran = LookupYuranTahun1::find()->all();
            $title_yuran = "Tahun 1 (Pelajar Baru)";

            if ($model->load(Yii::$app->request->post()) ) {

                $model->tahun = 1;
                $model->id_pelajar = $id;
                $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
            
                    $array=  unserialize($model->jenis_yuran);

                    $arrayTemp = implode(',', $array);

                    $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_1 WHERE id IN ('.$arrayTemp.')');
                    $yuran_tahun_1 = $sql2->queryAll();

                    $total =0;
                    foreach ($yuran_tahun_1 as $key => $value) {
                        $total += $value['jumlah'];
                        if ($value['id'] ==3) {
                           $bulanan =  $value['jumlah'];
                        }



                    }

                    $bulanan;
                    $sum = $total - $bulanan;
                    $bulan = date('F'); 
        
                    if ($bulan == "January") {
                         $yb = $bulanan * 10;
                    } elseif ($bulan == "February") {
                         $yb = $bulanan * 9;
                    } elseif ($bulan == "March") {
                          $yb =$bulanan * 8;
                    } elseif ($bulan == "April") {
                          $yb =$bulanan * 7;
                    } elseif ($bulan == "May") {
                          $yb =$bulanan * 6;
                    } elseif ($bulan == "June") {
                          $yb =$bulanan * 5;
                    } elseif ($bulan == "July") {
                          $yb =$bulanan * 4;
                    } elseif ($bulan == "August") {
                          $yb =$bulanan * 3;
                    } elseif ($bulan == "September") {
                          $yb =$bulanan * 2;
                    } elseif ($bulan == "October") {
                          $yb =$bulanan * 1;
                    }


                    $jumlahKeseluruhan = $sum + $yb;

                    

                $model->jumlah_yuran = $jumlahKeseluruhan;
                $model->date_create = date('d/m/Y');
                $model->bulan = $bulan;


                
                $model->save();

                return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
            } else {
                return $this->renderAjax('create', [
                    'model' => $model,
                    'yuran' => $yuran,
                    'title_yuran' => $title_yuran
                ]);
            }
           ######################### //darjah 2
        } elseif ($umur == 8) {
            if ($tahun_join == 0) {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun2::find()->all();
                $title_yuran = "Tahun 2 (Pelajar Baru)";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 2;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_2 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

               
            } else {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun2::find()->where(['id'=>[3,4,5,6,7]])->all();
                $title_yuran = "Tahun 2";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 2;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_2 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

            }
            ################################//darjah 3
        } elseif ($umur == 9) {
            if ($tahun_join == 0) {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun3::find()->all();
                $title_yuran = "Tahun 3 (Pelajar Baru)";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 3;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_3 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

               
            } else {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun3::find()->where(['id'=>[3,4,5,6,7]])->all();
                $title_yuran = "Tahun 3";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 3;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_3 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

            }

            ######################### darjah 4
        } elseif($umur == 10) {
            if ($tahun_join == 0) {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun4::find()->all();
                 $title_yuran = "Tahun 4 (Pelajar Baru)";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 4;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_4 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

               
            } else {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun4::find()->where(['id'=>[3,4,5,6,7]])->all();
                 $title_yuran = "Tahun 4";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 4;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_4 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

            }
            ##################### darjah 5
        } elseif ($umur == 11) {
            if ($tahun_join == 0) {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun5::find()->all();
                $title_yuran = "Tahun 5 (Pelajar Baru)";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 5;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_5 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

               
            } else {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun5::find()->where(['id'=>[3,4,5,6,7,8,9,10]])->all();
                $title_yuran = "Tahun 5";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 5;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_5 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

            }
            ############# darjah 6
        } elseif ($umur == 12) {
            if ($tahun_join == 0) {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun6::find()->all();
                $title_yuran = "Tahun 6 (Pelajar Baru)";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 6;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_6 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

               
            } else {
                $model = new YuranSemasa();
                $yuran = LookupYuranTahun6::find()->where(['id'=>[3,4,5,6,7,8,9,10,11,12]])->all();
                $title_yuran = "Tahun 6";

                if ($model->load(Yii::$app->request->post()) ) {

                    $model->tahun = 6;
                    $model->id_pelajar = $id;
                    $model->jenis_yuran = serialize($_POST['YuranSemasa']['jenis_yuran']);
                
                        $array=  unserialize($model->jenis_yuran);

                        $arrayTemp = implode(',', $array);

                        $sql2 = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_6 WHERE id IN ('.$arrayTemp.')');
                        $yuran_tahun_1 = $sql2->queryAll();

                        $total =0;
                        foreach ($yuran_tahun_1 as $key => $value) {
                            $total += $value['jumlah'];
                        }
                        $total;

                    $model->jumlah_yuran = $total;
                    $model->date_create = date('d/m/Y');
                    $model->save();

                    return $this->redirect(['yuran', 'id' => $model->id_pelajar]);
                } else {
                    return $this->renderAjax('create', [
                        'model' => $model,
                        'yuran' => $yuran,
                        'title_yuran' => $title_yuran
                    ]);
                }

            }
        }
    }

    public function actionDetails($id)
    {
        $yuran_semasa = YuranSemasa::find()->where(['id_yuran'=>$id])->all();
        $transaksi = TransaksiYuran::find()->where(['id_yuran'=>$id])->all();

        foreach ($yuran_semasa as $key => $value) {
            $tahun = $value['tahun'];
           $jenis_yuran= $value['jenis_yuran'];
        } 


        $array=  unserialize($jenis_yuran);

        $arrayTemp = implode(',', $array);

        if ($tahun == 1) {
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_1 WHERE id IN ('.$arrayTemp.')');
            $jenis_yuran = $sql->queryAll();

            return $this->render('details',[
                'yuran_semasa' => $yuran_semasa,
                'jenis_yuran' => $jenis_yuran,
                'transaksi' => $transaksi,
                
            ]);

        } elseif($tahun == 2) {
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_2 WHERE id IN ('.$arrayTemp.')');
            $jenis_yuran = $sql->queryAll();

            return $this->render('details',[
                'yuran_semasa' => $yuran_semasa,
                'jenis_yuran' => $jenis_yuran,
                'transaksi' => $transaksi,
                
            ]);
        } elseif ($tahun == 3) {
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_3 WHERE id IN ('.$arrayTemp.')');
            $jenis_yuran = $sql->queryAll();

            return $this->render('details',[
                'yuran_semasa' => $yuran_semasa,
                'jenis_yuran' => $jenis_yuran,
                'transaksi' => $transaksi,
                
            ]);
        } elseif ($tahun == 4) {
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_4 WHERE id IN ('.$arrayTemp.')');
            $jenis_yuran = $sql->queryAll();

            return $this->render('details',[
                'yuran_semasa' => $yuran_semasa,
                'jenis_yuran' => $jenis_yuran,
                'transaksi' => $transaksi,
                
            ]);
        } elseif ($tahun == 5) {
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_5 WHERE id IN ('.$arrayTemp.')');
            $jenis_yuran = $sql->queryAll();

            return $this->render('details',[
                'yuran_semasa' => $yuran_semasa,
                'jenis_yuran' => $jenis_yuran,
                'transaksi' => $transaksi,
                
            ]);
        } elseif ($tahun == 6) {
            $connection = \Yii::$app->db;
            $sql = $connection->createCommand('SELECT * FROM lookup_yuran_tahun_6 WHERE id IN ('.$arrayTemp.')');
            $jenis_yuran = $sql->queryAll();

            return $this->render('details',[
                'yuran_semasa' => $yuran_semasa,
                'jenis_yuran' => $jenis_yuran,
                'transaksi' => $transaksi,
                
            ]);
        }
   
    }

    public function actionBayar($id)
    {
        $model = new TransaksiYuran();

        $model2 = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $model->id_yuran = $id;

            $model->save();

            $yuran_semasa = YuranSemasa::find()->where(['id_yuran'=>$id])->one();

            $ys = $yuran_semasa->jumlah_yuran;

            $transaksi = TransaksiYuran::find()->where(['id_yuran'=>$id])->all();

            $sumTran = 0;

            foreach ($transaksi as $key => $value) {
               $sumTran += $value['jumlah_bayaran'];
            }
            
            if ($sumTran >= $ys) {

                $model2->status_yuran = "Selesai";
                $model2->save();
                
            } else {

                $model2->status_yuran = "Belum Selesai";
                $model2->save();
            }

            return $this->redirect(['details', 'id' => $model->id_yuran]);
        } else {
            return $this->renderAjax('bayar', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing YuranSemasa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_yuran]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing YuranSemasa model.
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
     * Finds the YuranSemasa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return YuranSemasa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = YuranSemasa::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
