<?php 
use yii\helpers\Html;
?>
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>News</b>Blog</a>
  </div>
 
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <?php $form = \yii\widgets\ActiveForm::begin(); ?>
      
        
        <?= $form->field($model,'username',['template' =>"
            <div class='input-group mb-3'>
              {input}
              <div class='input-group-append'>
                <div class='input-group-text'>
                  <span class='fa fa-user'></span></div>
                </div>              
              </div>
            {error}
        "])->textInput(['class'=>'form-control', 'placeholder'=>'UserName']); ?>

        

        <?= $form->field($model, 'password',['template' =>"
            <div class='input-group mb-3'>            
            {input}
            <div class='input-group-append'>            
              <div class='input-group-text'>
                <span class='fas fa-lock'></span>
              </div>
            </div>
          </div>
          {error}
        "])->passwordInput(['class'=>'form-control','placeholder'=>'Password'])?>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
            </div>
          </div>
          
        
          <div class="col-4">
            
            <?= Html::submitButton('Login',['class'=>'btn btn-primary btn-block']) ?>
           
          </div>
         
        </div>
     
      <?php \yii\widgets\ActiveForm::end() ?> 
     

      
    </div>
   
  </div>
</div>