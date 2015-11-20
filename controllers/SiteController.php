<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\SiteContents;
use app\models\SiteImages;
use app\models\Users;
use app\models\Questions;
use app\models\Scores;
use yii\web\Response;
use yii\helpers\Url;
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
        
        $content1= SiteContents::find()->where(['name'=>'home'])->one();
        $content2= SiteContents::find()->where(['name'=>'home2'])->one();
        $principal_home =SiteImages::find()->where(['name'=>'principal home'])->one();
        $separador=SiteImages::find()->where(['name'=>'separador home'])->one();
        $btn_premios=SiteImages::find()->where(['name'=>'boton premios'])->one();
        $btn_empezar=SiteImages::find()->where(['name'=>'boton empezar'])->one();
        return $this->render('index',['content1'=>$content1,'content2'=>$content2,'separador'=>$separador,'principal_home'=>$principal_home,'btn_premios'=>$btn_premios,'btn_empezar'=>$btn_empezar]);
    }
        public function actionTerms()
    {
        

        return $this->render('terms');
    }
        public function actionFinish($id)
    {
        
        $principal_felicidades=SiteImages::find()->where(['name'=>'principal felicidades'])->one();
        $btn_volverjugar=SiteImages::find()->where(['name'=>'boton volver jugar'])->one();
        $content= SiteContents::find()->where(['name'=>'felicidades'])->one();
        $content2= SiteContents::find()->where(['name'=>'felicidades2'])->one();
        $user=Users::find()->where(['id'=>$id])->one();
        $score=Scores::find()->where(['user_id'=>$user->id]) ->orderBy(['date'=>SORT_DESC])->one();
        $questions_aux=Questions::find()->count();
        $questions=Questions::find()->count();
        $sep=SiteImages::find()->where(['name'=>'separador'])->one();
        return $this->render('finish',['content'=>$content,'content2'=>$content2,'user'=>$user,'questions'=>$questions,'score'=>$score,'sep'=>$sep,'principal_felicidades'=>$principal_felicidades,'btn_volverjugar'=>$btn_volverjugar]);
    }
        public function actionAwards()
    {
        $premios=SiteImages::find()->where(['name'=>'premios'])->one();
        $sep=SiteImages::find()->where(['name'=>'separador'])->one();
        $btn_empezar=SiteImages::find()->where(['name'=>'boton empezar'])->one();
        $content= SiteContents::find()->where(['name'=>'premios'])->one();
        return $this->render('awards',['content'=>$content,'premios'=>$premios,'btn_empezar'=>$btn_empezar,'sep'=>$sep]);
    }
    public function actionUser(){
            $principal_formulario =SiteImages::find()->where(['name'=>'principal formulario'])->one();
            $btn_continuar=SiteImages::find()->where(['name'=>'boton continuar'])->one();
            $btn_premios=SiteImages::find()->where(['name'=>'boton premios'])->one();
            $content= SiteContents::find()->where(['name'=>'formulario'])->one();
            //$background=SiteImages::find()->where(['name'=>'formulario'])->one();
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
                'model' => $model, 'principal_formulario'=>$principal_formulario
            ]);
        }
      
        } else {
            return $this->render('user', [
                'content'=>$content,'model' => $model, 'principal_formulario' => $principal_formulario,'btn_continuar'=>$btn_continuar,'btn_premios'=>$btn_premios
            ]);
        }
    }
    public function actionQuestions($id){
    
                $pregunta1=SiteImages::find()->where(['name'=>'pregunta1'])->one();
                $pregunta2=SiteImages::find()->where(['name'=>'pregunta2'])->one();
                $pregunta3=SiteImages::find()->where(['name'=>'pregunta3'])->one();
                $pregunta4=SiteImages::find()->where(['name'=>'pregunta4'])->one();
                $pregunta5=SiteImages::find()->where(['name'=>'pregunta5'])->one();
        $sep=SiteImages::find()->where(['name'=>'separador'])->one();
        
        $btn_siguiente=SiteImages::find()->where(['name'=>'boton siguiente'])->one();
        $model=Questions::find()->all();
        $score=0;
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
                'model' => $model, 'sep'=>$sep,'pregunta1' => $pregunta1, 'pregunta2' => $pregunta2, 'pregunta3' => $pregunta3, 'pregunta4' => $pregunta4, 'pregunta5' => $pregunta5,'btn_siguiente'=>$btn_siguiente
            ]);
    }
    }
    public function actionLogin()
    {
        $this->layout="admin";
        if (!\Yii::$app->user->isGuest) {
                    return  $this->redirect(['/admin/']);
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['/admin/']);
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
