<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Setup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setup-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'pageSize')->dropDownList([10 =>'10', 20=>'20', 50 => '50', 100 => '100']); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
