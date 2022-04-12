<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="news-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
    <div class="col-sm-12">
        <?php if( Yii::$app->session->hasFlash('success_update') ): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('success_update'); ?>
            </div>
        <?php elseif(Yii::$app->session->hasFlash('error_update')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo Yii::$app->session->getFlash('error_update'); ?>
            </div>

        <?php endif;?>
    </div>
</div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'announce',
            //'pic',
            [
                'attribute'=> 'pic',
                'format' => 'raw',
                'value'=> function($model)
                {
                    
                    $img = $model->pic ;
                   
                    return "<div class='pro-img'>
                            <a href='/pic/". $img . "' data-toggle='lightbox'>
                                <img style='height:70px;'class='img-fluid mb-2' 
                                src= '/pic/". $img ."' alt='white sample' data-gallery='gallery'/>
                            </a>
                          </div>";                          
                }
            ],
            'news:ntext',
            'date_public',
            'active',
        ],
    ]) ?>

</div>
