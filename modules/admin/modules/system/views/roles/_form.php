<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\system\models\Roles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="roles-form">

    <?php $form = ActiveForm::begin(); ?>

    
    <?= $form->field($model, 'item_name')->dropDownList([
        'mainAdmin' =>'mainAdmin', 
        'admin' =>'admin',
        'manager' =>'manager',
        'moderator' =>'moderator'
        ]); ?>

   
    <?= $form->field($model, 'user_id')->dropDownList(\yii\helpers\ArrayHelper::map(User::find()->all(), 
    'id', 'username')); ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
