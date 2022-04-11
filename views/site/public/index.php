<?php
use yii\helpers\Url;

use \yii\widgets\ActiveForm;


/** @var yii\web\View $this */

$this->title = 'News Blog';
?>

<h1>News</h1>

<form method="get" action="<?=  \yii\helpers\Url::to(['search'])?>">
  <div class="form-row align-items-center">
    <div class="col-11">
      <label class="sr-only" for="searchInput">Search</label>
      <input type="text" class="form-control mb-2" id="searchInput" name="q"placeholder="Type search word.." >
    </div>
    
    <div class="col-auto">
        <button type ="submit" class="btn btn-primary mb-2">Search</button>
     
    </div>
  </div>
</form>



<div class="row">
<?php  foreach($news_posts as $post):?>
        
        <div class="card text-center">
       
                <div class="card-header">
                    <?= $post->title ?>
                </div>
                <div class="card-body">
                <a href="<?= Url::to(['view','id'=> $post->id]) ?>">
                    <p class="card-text">
                        <?= $post->announce ?>
                    </p>
                    </a>

                </div>
                <div class="card-footer text-muted">
                    <?= $post->date_public ?>
                </div>
               
            </div>
       
            
        
       
        <?php  endforeach ?>



        <div class="pagination-box fix">

            <ul class="pagination ">
                <?= \yii\widgets\LinkPager::widget(['pagination'=> $pages,'class'=>'page-link']); ?>
            </ul>



            <div class="toolbar-sorter-footer">
                <label>Показать:</label>
                <select class="sorter" name="sorter">
                    <option value="Position" selected="selected">12</option>
                    <option value="Product Name">15</option>
                    <option value="Price">30</option>
                </select>
                <span>страниц</span>
            </div>
        </div>

       

    </div>
</div>