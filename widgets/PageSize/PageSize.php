<?php
namespace app\widgets\PageSize;

use yii\base\Widget;
use yii\helpers\Html;

class PageSize extends Widget
{
    public $pageSize;

    public function init()
    {
        parent::init();
        if ($_COOKIE["pageSize"] !== null) {           
            $this->pageSize = htmlspecialchars($_COOKIE["pageSize"]);
        }else{
            $this->pageSize =10;  
        }
    }

    public function run()
    {        
        return $this->render('pageSizeView',['pageSize' => $this->pageSize]);
    }
}