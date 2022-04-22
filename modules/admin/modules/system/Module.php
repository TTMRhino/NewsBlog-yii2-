<?php

namespace app\modules\admin\modules\system;

use yii\filters\AccessControl;
/**
 * system module definition class
 */
class Module extends \yii\base\Module
{
    
    public $controllerNamespace = 'app\modules\admin\modules\system\controllers';

    /**
     * {@inheritdoc}
     */
    public function behaviors():array 
    {       
            return [
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['index'],
                            'roles' => ['mainAdmin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['view'],
                            'roles' => ['mainAdmin'],
                        ],
                        
                        [
                            'allow' => true,
                            'actions' => ['create'],
                            'roles' => ['mainAdmin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['update'],
                            'roles' => ['mainAdmin'],
                        ],
                        [
                            'allow' => true,
                            'actions' => ['delete'],
                            'roles' => ['mainAdmin'],
                        ],
                       
                    ],
                ],
            ];
        
    }


    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
