<?php

namespace app\assets;

use yii\web\AssetBundle;


class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/main.css',
    ];
    public $js = [
        'https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js',
        'js/mScrypt.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',        
    ];
}
