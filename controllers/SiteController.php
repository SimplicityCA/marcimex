<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SiteContents;
use app\models\Users;
use app\models\Questions;
use app\models\Scores;
use yii\web\Response;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
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
    public function actionFind(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        if(isset($_POST['number_id'])){
           $user=Users::find()->where(['number_id'=>$_POST['number_id']])->one(); 
           return ['user' => $user];
        }else{
            echo "no post";
        }
    }
    public function actionIndex()
    {
        
        $content= SiteContents::find()->where(['name'=>'home'])->one();
        return $this->render('index',['content'=>$content]);
    }
        public function actionFinish($id)
    {
        
        $content= SiteContents::find()->where(['name'=>'felicidades'])->one();
        $user=Users::find()->where(['id'=>$id])->one();
        $score=Scores::find()->where(['user_id'=>$user->id])->one();
        $questions_aux=Questions::find()->count();
        $questions=Questions::find()->count();
        return $this->render('finish',['content'=>$content,'user'=>$user,'questions'=>$questions,'score'=>$score]);
    }
        public function actionAwards()
    {
        
        $content= SiteContents::find()->where(['name'=>'premios'])->one();
        return $this->render('awards',['content'=>$content]);
    }
    public function actionUser(){
             $model = new Users();
             $model->creation_date= date('Y-m-d H:i:s');
        if (Yii::$app->request->post()) {
            if($_POST['action']=='UPDATE'){
                $model=Users::find()->where(['number_id'=>$_POST['Users']['number_id']])->one();
                
            }
                 if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['questions', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
      
        } else {
            return $this->render('user', [
                'model' => $model,
            ]);
        }
    }
    public function actionQuestions($id){
        $model=Questions::find()->all();
         if (Yii::$app->request->post()) {
            foreach($model as $question){
                 $score+=$_POST["question_".$question->id];
            }
            $scores= New Scores();
            $scores->user_id=$id;
            $scores->score=$score;
            $scores->date=date('Y-m-d H:i:s');;
            if($scores->save()){
             return $this->redirect(['finish','id' => $id]);   
            }
         }else{
        return $this->render('questions', [
                'model' => $model,
            ]);
    }
    }
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

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

    public function actionAbout()
    {
        return $this->render('about');
    }
}
