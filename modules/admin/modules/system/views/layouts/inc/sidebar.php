 <?php
 use yii\helpers\Url;
 ?>
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \Yii::$app->homeUrl ?>" target="_blank" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin-system </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <span class="" style="color:#a9a9a9;" ></span>
          <a href=" <?= Url::to(['/auth/logout']) ?>"> : LogOut</a>
          
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a href="<?= Url::to('/system/roles/index') ?>" class="nav-link">
              
              <i class="far fa-chart-bar"></i>
              <p>
                Roles
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/system/system/index')  ?>" class="nav-link">
              
            <i class="fas fa-shopping-cart"></i>
              <p>
                Users               
              </p>
            </a>
          </li>

        

       



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>