<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;


/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin([
        'options' => ['enctype' => 'multipart/form-data']
    ]); ?>

  <?php if(\Yii::$app->user->can('updatePost',[])): ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'announce')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
    <?= $form->field($picModel, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'news')->widget(CKEditor::className(),[
    'editorOptions' => [
        'preset' => 'full', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
        'inline' => false, //по умолчанию false
        ],
    ]); 
    ?>

     <?php endif; ?>

    <?= $form->field($model, 'date_public')->widget(\yii\jui\DatePicker::classname(), [
    //'language' => 'ru',
  
    'dateFormat' => 'yyyy-MM-dd',   
    
]) ?>

     <?php if(\Yii::$app->user->can('activePost',[])): ?>
        <?= $form->field($model, 'active')->dropDownList([1 =>'Да', 0 =>'Нет']); ?>
    <?php endif; ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
