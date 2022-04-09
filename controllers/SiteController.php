<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use yii\data\Pagination;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
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

    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        $news_posts = News::find()->orderBy(['title' => SORT_ASC]);

        $pages = new Pagination([ 'totalCount'=> $news_posts->count(), 'pageSize'=>12,'forcePageParam'=>false, 'pageSizeParam'=>false ]);
        $news_posts = $news_posts->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('public/index',compact('news_posts','pages'));
    }

    public function actionView(int $id)
    {
        $post = News::find()->where(['id'=>$id])->one();
        return $this->render('public/view', compact('post'));
    }


    public function actionSearch()
    {
      
        $q = trim(\Yii::$app->request->get('q'));
        
        if(!$q){
            return $this->render('search');
        }
        $query = News::find()->where(['like', 'news',$q])->orwhere(['like', 'title',$q]);
        $pages = new Pagination([ 'totalCount'=> $query->count(), 'pageSize'=>12,'forcePageParam'=>false, 'pageSizeParam'=>false ]);
        $news_posts= $query->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('public/search',compact('news_posts','pages','q'));
    }
    

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    
}