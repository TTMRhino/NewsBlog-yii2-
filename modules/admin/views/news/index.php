<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\widgets\PageSize\PageSize;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

    <h1>
        <?= Html::encode($this->title) ?>
    </h1>

    <?php if(\Yii::$app->user->can('createPost',[])): ?>
    <p>
        <?= Html::a('Create News', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php endif; ?>

    <?php //echo $this->render('_search', ['model' => $searchModel, 'pageSize' => $pageSize]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'title',
            //'announce',
            //'pic',
            //'news:ntext',
            'date_public',
            //'active',
            [
                'class' => ActionColumn::className(),
            
                'template' => '{view} {update} {delete} ',
                'buttons' => [
                    'update' => function ($url,$model) {
                        return Html::a('<i class="fas fa-pencil-alt"></i>', $url);
                    },
                    'view' => function ($url,$model) {
                        return Html::a('<i class="far fa-eye"></i>', $url);
                    },
                    'delete' => function ($url,$model) {
                        return Html::a('<i class="far fa-trash-alt"></i>', $url,['data'=>[
                            'confirm' => 'Вы уверены  что хотите удалить запись?',
                            'method' => 'post',]
                            ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
<div class="row">
    <div class="col-1">
        <?= PageSize::widget() ?>
    </div>
</div>
