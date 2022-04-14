<?php

namespace app\modules\admin;

use yii\filters\AccessControl;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }

    public function behaviors()
    {
       
           /* return [
                'access' => [
                    'class' => AccessControl::class,                
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['login'],
                            'roles' => ['?'],
                        ],
                        [
                            'allow' => true,                       
                            'roles' => ['@'],
                            'matchCallback' => function ($rule, $action) {
                                
                                if (\Yii::$app->user->identity->username == 'admin' ) {
                                    return true;
                                }
                                return false;
                            }
                        ],
                    ],
                ],
            ];*/
            return [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index'],
                            'roles' => ['@'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['admin','manager','mainAdmin','moderator'],
                        ],
                        
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['admin','manager','mainAdmin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['update'],
                            'roles' => ['admin','manger','moderator','mainAdmin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['delete'],
                            'roles' => ['admin','mainAdmin'],
                        ],
                    ],
                ],
            ];
        
    }
}
