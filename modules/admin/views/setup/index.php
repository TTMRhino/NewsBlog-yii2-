<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\SetupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Setups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setup-index">

    <h1><?= Html::encode($this->title) ?></h1>

   
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
       // 'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'pageSize',
            [
                'class' => ActionColumn::className(),
                'template' => '{update} ',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', $url);
                    },
                   
                ],
            ],
        ],
    ]); ?>


</div>
