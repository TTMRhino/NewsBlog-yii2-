 <?php
 use yii\helpers\Url;
 ?>
 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= \Yii::$app->homeUrl ?>" target="_blank" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin-panel </span>
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
          <a href=" <?= Url::to(['auth/logout']) ?>"> : LogOut</a>
          
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <li class="nav-item">
            <a href="<?= Url::to('/admin/news/index') ?>" class="nav-link">              
            <i class="fa fa-globe" aria-hidden="true"></i>
              <p>
                News
                <!--<span class="right badge badge-danger">New</span>-->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/setup/index')  ?>" class="nav-link">
              
            <i class="fa fa-cog" aria-hidden="true"></i>

              <p>
                Setup                
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?= Url::to('/admin/administration/index')  ?>" class="nav-link">
              
            <i class="fa fa-user-plus" aria-hidden="true"></i>

              <p>
                Administration              
              </p>
            </a>
          </li>        

       



        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>