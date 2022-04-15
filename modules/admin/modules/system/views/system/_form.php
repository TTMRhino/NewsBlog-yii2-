<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

   

    <? //echo $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password_repeat')->passwordInput()->label('Password') ?>
    <?= $form->field($model, 'password_hash')->passwordInput()->label('repeat password') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->dropDownList([1 =>'enable', 0 =>'disable']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
