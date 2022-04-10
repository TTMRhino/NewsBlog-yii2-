<?php
use app\assets\AdminAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\widgets\Alert;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">
<head>
    <base href="/adminlte/">
    <meta charset="<?= Yii::$app->charset ?>">

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <?php $this->head() ?>
</head>


<body class="hold-transition sidebar-mini">
<?php $this->beginBody() ?>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= Url::to('/admin')?>" class="nav-link">Home</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
     

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link"  href="<?= Url::to('/admin/customers/index')  ?>">
        <i class="fas fa-shopping-cart"></i>
          <span class="badge badge-danger navbar-badge"><?= isset($this->params['new']) ? $this->params['new'] : '0' ?></span>
        </a>
       
      </li>
      <!-- Notifications Dropdown Menu -->      
     
    </ul>
  </nav>
  <!-- /.navbar -->

  <?= $this->render('/layouts/inc/sidebar') ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0"><?= $this->title ?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <span class=" float-sm-right">
              <?= Breadcrumbs::widget([
                'homeLink' => ['label' => 'Главная', 'url' => '/admin/'],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [], 
               
                ]) ?>
                
              <?= Alert::widget() ?>
            </span>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
         
         <?= $content ?>
         
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->




<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
