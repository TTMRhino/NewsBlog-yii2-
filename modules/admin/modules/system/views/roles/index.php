<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modules\system\models\RolesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="roles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Roles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'item_name',
            //'user_id',
            //'user',
            [
                'attribute' => 'user_id',
                
                'value' => function($data){
                       $user = User::findOne(['id'=> $data->user_id]);                    
                        return $user->username;
                    }             
                ],
            'created_at',
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
