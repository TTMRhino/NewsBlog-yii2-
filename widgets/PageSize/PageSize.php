<?php
namespace app\widgets\PageSize;

use yii\base\Widget;
use yii\helpers\Html;
use app\controllers\SiteController;

class PageSize extends Widget
{
    public  $pageSize;

    public function init()
    {
        parent::init();
        if (isset($_COOKIE["pageSize"]) && is_numeric($_COOKIE["pageSize"])) {           
            $this->pageSize = $_COOKIE["pageSize"];                      
        }else{
            $this->pageSize = \Yii::$app->params['defaultPageSize'];;           
        }
    }

    public function run()
    {        
        return $this->render('pageSizeView',['pageSize' => $this->pageSize]);
    }
}