<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\MaklumatPelajar;

use app\models\MaklumatPenjaga;
use app\models\MaklumatPilihanPusatPengajian;
class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','signup'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
         $this->layout = 'login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionSignup()
    {
        $this->layout = 'signup';
        $model = new MaklumatPelajar();
        $model2 = new MaklumatPenjaga();
        $model3 = new MaklumatPilihanPusatPengajian();

        if ($model->load(Yii::$app->request->post()) && $model2->load(Yii::$app->request->post()) && $model3->load(Yii::$app->request->post())) 
        {
            $model->status="Pending";
            $model->date_create = date('Y/m/d');

            if($model->save()){

                $last_id = Yii::$app->db->getLastInsertID();
                
                $model2->id_pelajar = $last_id;
                $model3->id_pelajar = $last_id;

                $model2->save();
                $model3->save();

            }
            Yii::$app->getSession()->setFlash('create', 'Maklumat Pelajar <b>('.$model->nama_pelajar.')</b> Berjaya Di Simpan');
            return $this->redirect(['signup']);
        } else {
            return $this->render('signup', [
                'model' => $model,
                'model2' => $model2,
                'model3' => $model3,
            ]);
        }
        
    
    }


    public function actionAbout()
    {
        return $this->render('about');
    }
}
