<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\News;
use app\modules\admin\models\Setup;
use yii\data\Pagination;
use app\widgets\PageSize\PageSize;

class SiteController extends Controller
{
       
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
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
     * @return Response|string
     */
    public function actionIndex():string
    {
        $news_posts = News::find()->orderBy(['title' => SORT_ASC]);

        $pages = new Pagination([ 
            'totalCount'=> $news_posts->count(), 
            'pageSize'=>$this->getPageSize(),
            'forcePageParam'=>false, 
            'pageSizeParam'=>false 
        ]);

        $news_posts = $news_posts->offset($pages->offset)->limit($pages->limit)->all();

        return $this->render('public/index',compact('news_posts','pages'));
    }

    /**
     * Displays View news.
     * @property integer $id  The id of the news
     * @return Response|string
     */
    public function actionView(int $id):string
    {
        $post = News::find()->where(['id'=>$id])->one();

        //Empty picture is replaced
        $img = empty($post->pic) ? 'img-nofound.jpg' : $post->pic;
      
        return $this->render('public/view', compact('post','img'));
    }

    /**
     * Displays found news.
     *
     * @return Response|string
     */
    public function actionSearch():string
    {
        $q = trim(\Yii::$app->request->get('q'));
        
        if(!$q){
            return $this->render('search');
        }
        $query = News::find()->where(['like', 'news',$q])->orwhere(['like', 'title',$q]);
        $pages = new Pagination([ 
            'totalCount'=> $query->count(), 
            'pageSize'=>$this->getPageSize(),
            'forcePageParam'=>false, 
            'pageSizeParam'=>false 
        ]);
        $news_posts= $query->offset($pages->offset)->limit($pages->limit)->all();
        return $this->render('public/search',compact('news_posts','pages','q'));
    }    

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin():string
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
     * @return Response|string 
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Helper get page size.
     *
     * @return string page size
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
