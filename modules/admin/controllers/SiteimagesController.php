<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\SiteImages;
use app\models\SiteImagesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * SiteImagesController implements the CRUD actions for SiteImages model.
 */
class SiteimagesController extends Controller
{
     public $layout='@app/views/layouts/admin';
    public function behaviors()
    {
        return [
                        'access' => [
                'class' => AccessControl::className(),
                //'only' => ['logout'],
                'rules' => [
                    [
                               //'actions' => ['index','create','update','delete','admin','view','findModel'],
                        'actions' => ['index','update','admin','view','findModel'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all SiteImages models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SiteImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SiteImages model.
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
     * Creates a new SiteImages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SiteImages();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->image_desktop = UploadedFile::getInstance($model, 'image_desktop');
            //$model->image_mobile = UploadedFile::getInstance($model, 'image_mobile');
             $model->image_desktop->saveAs('images/' . $model->image_desktop->baseName . '.' . $model->image_desktop->extension);
            // $model->image_mobile->saveAs('images/' . $model->image_mobile->baseName . '.' . $model->image_mobile->extension);
           
            if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing SiteImages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            $model->image_desktop = UploadedFile::getInstance($model, 'image_desktop');
            //$model->image_mobile = UploadedFile::getInstance($model, 'image_mobile');
             $model->image_desktop->saveAs('images/' . $model->image_desktop->baseName . '.' . $model->image_desktop->extension);
            // $model->image_mobile->saveAs('images/' . $model->image_mobile->baseName . '.' . $model->image_mobile->extension);
           
            if($model->save()){
            return $this->redirect(['view', 'id' => $model->id]);
            }else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing SiteImages model.
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
     * Finds the SiteImages model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SiteImages the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SiteImages::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
