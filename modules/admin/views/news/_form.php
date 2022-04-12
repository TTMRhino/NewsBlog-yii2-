<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'announce')->textInput(['maxlength' => true]) ?>

    <?php //echo $form->field($model, 'pic')->textInput(['maxlength' => true]) ?>
    <?= $form->field($picModel, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'news')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'date_public')->textInput() ?>

    <?= $form->field($model, 'active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
