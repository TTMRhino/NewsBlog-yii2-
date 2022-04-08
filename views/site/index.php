<?php

/** @var yii\web\View $this */

$this->title = 'News Blog';
?>

<h1>News</h1>

<div class="site-index">
    <div class="row">

    <?php  foreach($news_posts as $post):?>
        <div class="col-2">       

            <div class="card " style="width: 10rem;">
                <img src="pic/logo.jpg" class="card-img-top img-responsive" alt="photo-news">
                <div class="card-body">
                    <h5 class="card-title"><?= $post->title ?></h5>
                    <p class="card-text"><?= $post->announce ?></p>
                    <a href="#" class="btn btn-primary">ссылко</a>
                </div>
            </div>

        </div>
        <?php endforeach ?>


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
