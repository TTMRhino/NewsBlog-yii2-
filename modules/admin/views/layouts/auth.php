<?php
use app\assets\AuthAsset;
use yii\helpers\Html;
use yii\helpers\Url;

AuthAsset::register($this);
?>
<?php $this->beginPage() ?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>

<base href="/adminlte">
<meta charset="<?= Yii::$app->charset ?>">

<?php $this->registerCsrfMetaTags() ?>
<title><?= Html::encode($this->title) ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<?php $this->head() ?>

</head>
<body class="hold-transition login-page">
<?php $this->beginBody() ?>

<?= $content ?>

<!-- /.login-box -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
