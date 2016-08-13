<?php

namespace app\controllers;

use Yii;
use app\models\PenilaianAmali;
use app\models\PenilaianAmaliDetails;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaklumatPelajar;
use app\models\MaklumatPelajarSearch;
/**
 * PenilaianAmaliController implements the CRUD actions for PenilaianAmali model.
 */
class PenilaianAmaliController extends Controller
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
     * Lists all PenilaianAmali models.
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

    /**
     * Displays a single PenilaianAmali model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT * FROM penilaian_amali WHERE id = "'.$id.'"');
        $model = $sql->queryAll();

        foreach ($model as $key => $value) {
            $darjah = $value['darjah'];
           
        }
        if ($darjah == 1) {
            $sql2 = $connection->createCommand('SELECT *,penilaian_amali_details.markah AS markah_penuh FROM 
                    penilaian_amali RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali
                    INNER JOIN lookup_borang_penilaian_amali_tahun_1 ON lookup_borang_penilaian_amali_tahun_1.id = penilaian_amali_details.id_perkara
                    WHERE penilaian_amali.id = "'.$id.'"');
            $details = $sql2->queryAll();
        } elseif ($darjah == 2) {
            $sql2 = $connection->createCommand('SELECT *,penilaian_amali_details.markah AS markah_penuh FROM 
                    penilaian_amali RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali
                    INNER JOIN lookup_borang_penilaian_amali_tahun_2 ON lookup_borang_penilaian_amali_tahun_2.id = penilaian_amali_details.id_perkara
                    WHERE penilaian_amali.id = "'.$id.'"');
            $details = $sql2->queryAll();
        } elseif ($darjah == 3) {
            $sql2 = $connection->createCommand('SELECT *,penilaian_amali_details.markah AS markah_penuh FROM 
                    penilaian_amali RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali
                    INNER JOIN lookup_borang_penilaian_amali_tahun_3 ON lookup_borang_penilaian_amali_tahun_2.id = penilaian_amali_details.id_perkara
                    WHERE penilaian_amali.id = "'.$id.'"');
            $details = $sql2->queryAll();
        } elseif ($darjah == 4) {
            $sql2 = $connection->createCommand('SELECT *,penilaian_amali_details.markah AS markah_penuh FROM 
                    penilaian_amali RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali
                    INNER JOIN lookup_borang_penilaian_amali_tahun_4 ON lookup_borang_penilaian_amali_tahun_2.id = penilaian_amali_details.id_perkara
                    WHERE penilaian_amali.id = "'.$id.'"');
            $details = $sql2->queryAll();
        } elseif ($darjah == 5) {
            $sql2 = $connection->createCommand('SELECT *,penilaian_amali_details.markah AS markah_penuh FROM 
                    penilaian_amali RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali
                    INNER JOIN lookup_borang_penilaian_amali_tahun_5 ON lookup_borang_penilaian_amali_tahun_2.id = penilaian_amali_details.id_perkara
                    WHERE penilaian_amali.id = "'.$id.'"');
            $details = $sql2->queryAll();
        } elseif ($darjah == 6) {
            $sql2 = $connection->createCommand('SELECT *,penilaian_amali_details.markah AS markah_penuh FROM 
                    penilaian_amali RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali
                    INNER JOIN lookup_borang_penilaian_amali_tahun_6 ON lookup_borang_penilaian_amali_tahun_2.id = penilaian_amali_details.id_perkara
                    WHERE penilaian_amali.id = "'.$id.'"');
            $details = $sql2->queryAll();
        }


        return $this->render('view', [
            'details' => $details,
        ]);



    }

    /**
     * Creates a new PenilaianAmali model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT YEAR(CURDATE()) - YEAR(tarikh_lahir) AS umur FROM maklumat_pelajar WHERE id_pelajar = "'.$id.'"');
        $model = $sql->queryAll();

        foreach ($model as $key => $value) {
            $umur = $value['umur'];
        }

        $model = new PenilaianAmali();
        $model2 = new PenilaianAmaliDetails();

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post()) ) {


            if ($umur == 7 ) {
                $model->darjah = 1;
            } elseif ($umur == 8) {
                $model->darjah = 2;
            } elseif ($umur == 9) {
                $model->darjah = 3;
            } elseif ($umur == 10) {
                $model->darjah = 4;
            } elseif ($umur == 11) {
                $model->darjah = 5;
            } elseif ($umur == 12) {
                $model->darjah = 6;
            }

            $model->id_pelajar = $id;

            if ($model->save()) {

                $last_id = Yii::$app->db->getLastInsertID();

                $record = count($_POST['PenilaianAmaliDetails']['markah']);
            
                for ($i=0; $i < $record; $i++) { 
                    $model2 =new PenilaianAmaliDetails;
                    $model2->markah = $_POST['PenilaianAmaliDetails']['markah'][$i];
                    $model2->id_perkara = $_POST['PenilaianAmaliDetails']['id_perkara'][$i];
                    $model2->id_penilaian_amali = $last_id;
                    $model2->save();
                }
             
            }
            //$model->markah_dan_gred = serialize($_POST['CatatanKemajuaan']['markah_dan_gred']);

            
            return $this->redirect(['catatan', 'id' => $id]);
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'umur' => $umur,
                'model2' => $model2
            ]);
        }
    }
    public function actionCatatan($id){

        $dataProvider = new ActiveDataProvider([
            'query' => PenilaianAmali::find()->where(['id_pelajar'=>$id]),
        ]);


        return $this->render('catatan',[
            'id' => $id,
            'dataProvider' => $dataProvider,
            ]);
    }


    public function actionChange($id,$umur)
    {
        $connection = \Yii::$app->db;
        if ($umur == 7) {
            if ($id == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_1 WHERE sesi IN ("Tengah Tahun")');
                $model = $sql->queryAll();

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';


                    echo '</tr>';
                  
                }
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_1 WHERE sesi IN ("Akhir Tahun")');
                $model = $sql->queryAll();

                echo '<table class="table">';
               echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';
                    echo '</tr>';
                  
                }
                
                echo '</table>';
                
            }

        } elseif ($umur == 8) {
            if ($id == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_2 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';


                    echo '</tr>';
                  
                }
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_2 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
               echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';
                    echo '</tr>';
                  
                }
                
                echo '</table>';
                
            }
        } elseif ($umur == 9) {
            if ($id == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_3 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';


                    echo '</tr>';
                  
                }
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_3 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
               echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';
                    echo '</tr>';
                  
                }
                
                echo '</table>';
                
            }
        } elseif ($umur == 10) {
            if ($id == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_4 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';


                    echo '</tr>';
                  
                }
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_4 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
               echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';
                    echo '</tr>';
                  
                }
                
                echo '</table>';
                
            }
        } elseif ($umur == 11) {
            if ($id == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_5 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';


                    echo '</tr>';
                  
                }
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_5 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
               echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';
                    echo '</tr>';
                  
                }
                
                echo '</table>';
                
            }
        } elseif ($umur == 12) {
            if ($id == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_6 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';


                    echo '</tr>';
                  
                }
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_borang_penilaian_amali_tahun_6 WHERE sesi IN ("Kedua dua")');
                $model = $sql->queryAll();

                echo '<table class="table">';
               echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Markah Penuh</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="PenilaianAmaliDetails[id_perkara][]" value="'.$value['id'].'" >';
                            echo $value['perkara'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="PenilaianAmaliDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo $value['markah'];
                        echo '</td>';
                    echo '</tr>';
                  
                }
                
                echo '</table>';
                
            }
        }




    }




    /**
     * Updates an existing PenilaianAmali model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing PenilaianAmali model.
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
     * Finds the PenilaianAmali model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PenilaianAmali the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PenilaianAmali::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
