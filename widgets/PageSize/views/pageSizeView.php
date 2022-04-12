<?php
use yii\helpers\Html;
?>


        
            <div class="form-group">

                <?= Html::label('Page Size', ['class' => 'control-label']) ?>
                <?= Html::dropDownList('pageSize', $pageSize, 
                    [ 10 => '10', 20 => '20', 50 => '50', 100 => '100'],
                    ['class' => 'form-control','id'=>'page_size']) 
                ?>

        
    </div>