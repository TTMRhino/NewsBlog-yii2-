<?php   
namespace app\controllers;

use yii\web\Controller;
use app\models\LoginForm;

class AuthController extends Controller
{
    public $layout = 'auth';


    public function actionLogin()
    {        
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('/admin');
        }

        $model = new LoginForm();
        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('/admin');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }


    public function actionLogout()
    {
        \Yii::$app->user->logout();

        return $this->redirect('/admin');
    }

}
