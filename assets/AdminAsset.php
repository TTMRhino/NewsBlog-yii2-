<?php

namespace app\assets;

use yii\web\AssetBundle;


class AdminAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback',
        'adminlte/plugins/fontawesome-free/css/all.min.css',
        'adminlte/dist/css/adminlte.min.css',
    ];
    public $js = [
        //'adminlte/plugins/jquery/jquery.min.js',
        'adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js',
        'adminlte/dist/js/adminlte.min.js',
        'adminlte/dist/js/electro74_main.js',
        'https://cdn.jsdelivr.net/npm/js-cookie@3.0.1/dist/js.cookie.min.js',
        '../js/mScrypt.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
                
    ];
}
