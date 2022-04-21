<?php
use yii\helpers\Url;
?>
<div class="card mb-3">

  <img class="card-img-top img-fluid mx-auto" src="<?= "/pic/".$img ?>" alt="logo">
  <div class="card-body">
    <h5 class="card-title"><?= $post->title ?></h5>
    <p class="card-text"><?= $post->news ?></p>
    <p class="card-text"><small class="text-muted"><?= $post->date_public ?></small></p>
    <a   href="<?= Url::to(['index']) ?>">на главную</a>
  </div>

</div>