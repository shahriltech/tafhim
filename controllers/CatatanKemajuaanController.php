<?php

namespace app\controllers;

use Yii;
use app\models\CatatanKemajuaan;
use app\models\CatatanKemajuanDetails;
use app\models\CatatanKemajuaanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\MaklumatPelajar;
use app\models\MaklumatPelajarSearch;
use yii\data\ActiveDataProvider;
use app\models\LookupKemajuaanTahun1;
/**
 * CatatanKemajuaanController implements the CRUD actions for CatatanKemajuaan model.
 */
class CatatanKemajuaanController extends Controller
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
     * Lists all CatatanKemajuaan models.
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
     * Displays a single CatatanKemajuaan model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {

        $connection = \Yii::$app->db;
        $sql = $connection->createCommand('SELECT * FROM catatan_kemajuaan WHERE id = "'.$id.'"');
        $model = $sql->queryAll();

        foreach ($model as $key => $value) {
            $darjah = $value['darjah'];
           
        }

        if ($darjah == 1) {
            $sql2 = $connection->createCommand('SELECT *,catatan_kemajuan_details.markah AS markah FROM catatan_kemajuaan RIGHT JOIN catatan_kemajuan_details ON catatan_kemajuaan.id = catatan_kemajuan_details.id_catatan INNER JOIN lookup_kemajuaan_tahun_1 ON catatan_kemajuan_details.id_pelajaran = lookup_kemajuaan_tahun_1.id INNER JOIN lookup_markah ON catatan_kemajuan_details.id_gred = lookup_markah.id WHERE catatan_kemajuaan.id = "'.$id.'" ORDER BY catatan_kemajuan_details.id_pelajaran ASC ');
            $details = $sql2->queryAll();
        } elseif ($darjah == 2) {
            $sql2 = $connection->createCommand('SELECT *,catatan_kemajuan_details.markah AS markah FROM catatan_kemajuaan RIGHT JOIN catatan_kemajuan_details ON catatan_kemajuaan.id = catatan_kemajuan_details.id_catatan INNER JOIN lookup_kemajuaan_tahun_2 ON catatan_kemajuan_details.id_pelajaran = lookup_kemajuaan_tahun_2.id INNER JOIN lookup_markah ON catatan_kemajuan_details.id_gred = lookup_markah.id WHERE catatan_kemajuaan.id = "'.$id.'" ORDER BY catatan_kemajuan_details.id_pelajaran ASC ');
            $details = $sql2->queryAll();
        } elseif ($darjah == 3) {
            $sql2 = $connection->createCommand('SELECT *,catatan_kemajuan_details.markah AS markah FROM catatan_kemajuaan RIGHT JOIN catatan_kemajuan_details ON catatan_kemajuaan.id = catatan_kemajuan_details.id_catatan INNER JOIN lookup_kemajuaan_tahun_3 ON catatan_kemajuan_details.id_pelajaran = lookup_kemajuaan_tahun_3.id INNER JOIN lookup_markah ON catatan_kemajuan_details.id_gred = lookup_markah.id WHERE catatan_kemajuaan.id = "'.$id.'" ORDER BY catatan_kemajuan_details.id_pelajaran ASC ');
            $details = $sql2->queryAll();
        } elseif ($darjah == 4) {
            $sql2 = $connection->createCommand('SELECT *,catatan_kemajuan_details.markah AS markah FROM catatan_kemajuaan RIGHT JOIN catatan_kemajuan_details ON catatan_kemajuaan.id = catatan_kemajuan_details.id_catatan INNER JOIN lookup_kemajuaan_tahun_4 ON catatan_kemajuan_details.id_pelajaran = lookup_kemajuaan_tahun_4.id INNER JOIN lookup_markah ON catatan_kemajuan_details.id_gred = lookup_markah.id WHERE catatan_kemajuaan.id = "'.$id.'" ORDER BY catatan_kemajuan_details.id_pelajaran ASC ');
            $details = $sql2->queryAll();
        } elseif ($darjah == 5) {
            $sql2 = $connection->createCommand('SELECT *,catatan_kemajuan_details.markah AS markah FROM catatan_kemajuaan RIGHT JOIN catatan_kemajuan_details ON catatan_kemajuaan.id = catatan_kemajuan_details.id_catatan INNER JOIN lookup_kemajuaan_tahun_5 ON catatan_kemajuan_details.id_pelajaran = lookup_kemajuaan_tahun_5.id INNER JOIN lookup_markah ON catatan_kemajuan_details.id_gred = lookup_markah.id WHERE catatan_kemajuaan.id = "'.$id.'" ORDER BY catatan_kemajuan_details.id_pelajaran ASC ');
            $details = $sql2->queryAll();
        } elseif ($darjah == 6) {
            $sql2 = $connection->createCommand('SELECT *,catatan_kemajuan_details.markah AS markah FROM catatan_kemajuaan RIGHT JOIN catatan_kemajuan_details ON catatan_kemajuaan.id = catatan_kemajuan_details.id_catatan INNER JOIN lookup_kemajuaan_tahun_6 ON catatan_kemajuan_details.id_pelajaran = lookup_kemajuaan_tahun_6.id INNER JOIN lookup_markah ON catatan_kemajuan_details.id_gred = lookup_markah.id WHERE catatan_kemajuaan.id = "'.$id.'" ORDER BY catatan_kemajuan_details.id_pelajaran ASC ');
            $details = $sql2->queryAll();
        }

        return $this->render('view', [
            'details' => $details,
        
        ]);



    }

    /**
     * Creates a new CatatanKemajuaan model.
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

        $model = new CatatanKemajuaan();
        $model2 = new CatatanKemajuanDetails();

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post()) ) {

            /*print_r($_POST);
            exit();*/

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

                $record = count($_POST['CatatanKemajuanDetails']['markah']);
            
                for ($i=0; $i < $record; $i++) { 
                    $model2 =new CatatanKemajuanDetails;
                    $model2->markah = $_POST['CatatanKemajuanDetails']['markah'][$i];
                    $model2->id_gred = $_POST['CatatanKemajuanDetails']['id_gred'][$i];
                    $model2->id_pelajaran = $_POST['CatatanKemajuanDetails']['id_pelajaran'][$i];
                    $model2->id_catatan = $last_id;
                    $model2->save();
                }
             
            }
            //$model->markah_dan_gred = serialize($_POST['CatatanKemajuaan']['markah_dan_gred']);

            
            return $this->redirect(['catatan', 'id' => $id]);
        } else {
            return $this->renderAjax('create', [
                'id' => $id,
                'model' => $model,
                'umur' => $umur,
                'model2' => $model2
            ]);
        }

           

    }

    public function actionCatatan($id){

        $dataProvider = new ActiveDataProvider([
            'query' => CatatanKemajuaan::find()->where(['id_pelajar'=>$id]),
        ]);


        return $this->render('catatan',[
            'id' => $id,
            'dataProvider' => $dataProvider,
            ]);
    }


    public function actionChange($exam,$umur,$id_pelajar)
    {

        $connection = \Yii::$app->db;


        if ($umur == 7) {
            if ($exam == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_1 WHERE sesi IN ("Kedua dua","Tengah Tahun") AND id != 12 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();


                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Gred</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';

                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][5]" value="12" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][5]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][5]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_1 WHERE sesi IN ("Kedua dua","Akhir Tahun") AND id != 12 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();

                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';
                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][9]" value="12" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][9]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][9]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
                
            }


            ##### tahun 2

        } elseif ($umur == 8) {
            if ($exam == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_2 WHERE sesi IN ("Kedua dua","Tengah Tahun") AND id != 10 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();


                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Gred</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';

                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][9]" value="10" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][9]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][9]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_2 WHERE sesi IN ("Kedua dua","Akhir Tahun") AND id != 10 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();

                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';
                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][9]" value="10" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][9]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][9]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
                
            }

            ##### tahun 3

        } elseif ($umur == 9) {
            if ($exam == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_3 WHERE sesi IN ("Kedua dua","Tengah Tahun") AND id != 9 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();


                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Gred</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';

                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][8]" value="9" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][8]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][8]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_3 WHERE sesi IN ("Kedua dua","Akhir Tahun") AND id != 9 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();

                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';
                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][8]" value="9" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][8]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][8]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
                
            }

            ######## tahun 4
        } elseif ($umur == 10) {
            if ($exam == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_4 WHERE sesi IN ("Kedua dua","Tengah Tahun") AND id != 13 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();


                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Gred</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';

                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][12]" value="13" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][12]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][12]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_4 WHERE sesi IN ("Kedua dua","Akhir Tahun") AND id != 13 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();

                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';
                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][12]" value="13" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][12]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][12]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
                
            }

            #### tahun 5
        } elseif ($umur == 11) {
            if ($exam == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_5 WHERE sesi IN ("Kedua dua","Tengah Tahun") AND id != 13 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();


                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Gred</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';

                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][12]" value="13" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][12]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][12]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_5 WHERE sesi IN ("Kedua dua","Akhir Tahun") AND id != 13 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();

                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';
                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][12]" value="13" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][12]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][12]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
                
            }

            ### tahun 6
        } elseif ($umur == 12) {
            if ($exam == "Pertengahan Tahun") {
                
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_6 WHERE sesi IN ("Kedua dua","Tengah Tahun") AND id != 13 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();


                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th><th>Gred</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                            echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';

                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][12]" value="13" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][12]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][12]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
               

                
                
            } else {
                $sql = $connection->createCommand('SELECT * FROM lookup_kemajuaan_tahun_6 WHERE sesi IN ("Kedua dua","Akhir Tahun") AND id != 13 ');
                $model = $sql->queryAll();

                $sql2 = $connection->createCommand('SELECT * FROM penilaian_amali 
                    RIGHT JOIN penilaian_amali_details ON penilaian_amali.id = penilaian_amali_details.id_penilaian_amali WHERE penilaian_amali.id_pelajar = "'.$id_pelajar.'" AND penilaian_amali.peperiksaan = "'.$exam.'"');
                $model2 = $sql2->queryAll();

                $sum=0; foreach ($model2 as $key => $value) {
                    $sum += $value['markah'];
                }

                echo '<table class="table">';
                echo '<tr><th>Mata Pelajaran</th><th>Markah</th></tr>';
                
                foreach ($model as $key => $value) {
                    echo '<tr>';
                        echo '<td>';
                        echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][]" value="'.$value['id'].'" >';
                            echo $value['mata_pelajaran'];
                        echo '</td>';
                        echo '<td>';
                            echo '<input type="text" name="CatatanKemajuanDetails[markah][]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                        echo '</td>';
                        echo '<td>';
                        echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                                </select>';
                        echo '</td>';
                    echo '</tr>';
                  
                }
                echo '<tr>';
                echo '<input type="hidden" name="CatatanKemajuanDetails[id_pelajaran][12]" value="13" >';
                    echo '<td>Amali Wuduk</td>';
                    echo '<td>';
                    echo '<input type="text" value="'.$sum.'" name="CatatanKemajuanDetails[markah][12]" class="form-control input-xsmall" id="catatankemajuaan-markah">';
                    echo '</td>';
                    echo '<td>';
                    echo '<select id="catatankemajuaan-peperiksaan" class="form-control" name="CatatanKemajuanDetails[id_gred][12]" >
                                <option value=""></option>
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                                <option value="5">E</option>
                            </select>';
                    echo '</td>';
                echo '</tr>';
                
                echo '</table>';
                
            }

         
        }




    }

    /**
     * Updates an existing CatatanKemajuaan model.
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
     * Deletes an existing CatatanKemajuaan model.
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
     * Finds the CatatanKemajuaan model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CatatanKemajuaan the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CatatanKemajuaan::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
