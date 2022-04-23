<?php   
namespace app\controllers;

use yii\web\Controller;
use app\models\LoginForm;

class AuthController extends Controller
{
    /** 
     * Layout view
     * @property string $layout
     * */
    public $layout = 'auth';

    /**
     * Redirect to admin-panel.
     *
     * @return Redirect|string
     */
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

    /**
     * Logout user.
     *
     * @return object 
     */
    public function actionLogout():object
    {
        \Yii::$app->user->logout();

        return $this->redirect('/admin');
    }

}
