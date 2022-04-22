<?php

namespace app\modules\admin\controllers;

use yii\filters\AccessControl;
use app\models\News;
use app\models\NewsSearch;
use app\modules\admin\models\UploadForm;
use app\modules\admin\models\Setup;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors():array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
    /**
     * Display view Login .
     *
     * @return string|Redirect
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
 
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Logout .
     *
     * @return Redirect
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
 
        return $this->goHome();
    }

    /**
     * Lists all News models.
     *
     * @return string
     */
    public function actionIndex():string
    {
        $searchModel = new NewsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->pagination->pageSize = $this->getPageSize();//set pagination size from cooki

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            //'pageSize' => $pageSize,
        ]);
    }

    /**
     * Displays a single News model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView(int $id):string
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new News model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new News();
        $picModel = new UploadForm();
        $picModel->imageFile = UploadedFile::getInstance($picModel, 'imageFile');

        //input timestamp to model 
        $date = new \DateTime();      
        $model->date_public =  $date->getTimestamp();
        $model->author_id = \Yii::$app->user->identity->id;

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) &&  ($message = $picModel->upload($model)) && $model->save()) {
                \Yii::$app->session->setFlash('success_update', " News updated! ");
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'picModel' => $picModel,
            //'timestamp' =>$timestamp
        ]);
    }

    /**
     * Updates an existing News model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate(int $id)
    {
        $model = $this->findModel($id);
        $picModel = new UploadForm();
             
        $picModel->imageFile = UploadedFile::getInstance($picModel, 'imageFile');          
       
        isset($picModel->imageFile) ? $picModel->deleteCurrentImage($model->pic):'';

        if ( $model->load($this->request->post()) &&  ($message = $picModel->upload($model)) && $model->save()) {
            
            \Yii::$app->session->setFlash('success_update', " News updated! ");
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'picModel' => $picModel
        ]);
    }

    /**
     * Deletes an existing News model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete(int $id)
    {
        $model = $this->findModel($id);       
        if (file_exists("pic/". $model->pic))
        {
            @unlink("pic/". $model->pic);//удаляем уже имеющуюся картинку
        }     
       $model->delete();
       
        return $this->redirect(['index']);
    }

    /**
     * Finds the News model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return News the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel(int $id)
    {
        if (($model = News::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    /**
     * Get cooki pagination size     
     * 
     * @return string pagesize     
     */
   
    private function getPageSize():string
    {       
        if (isset($_COOKIE["pageSize"]) && is_numeric($_COOKIE["pageSize"]) ) {           
           return $_COOKIE["pageSize"];
        }else{
           // $pageSize = Setup::find()->where(['id' => 1])->one();
            return Setup::find()->where(['id' => 1])->one()->pageSize;//\Yii::$app->params['defaultPageSize'];
        }
    }


}
