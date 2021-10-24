<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?=base_url("public/avatar/".$userinfo->file_name)?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$userinfo->name?></p>
          <?=$userinfo->name_bi?>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php
          foreach ($menus as $menu) {
            if (((isset($_SESSION['menu'])) ? $_SESSION['menu'] : 0 ) == $menu->id) {
              echo '<li class="treeview active menu-open">';
            }else{
              echo '<li class="treeview">';
            }
        ?>
            <a href="#">
              <i class="fa fa-th"></i> <span><?=$menu->nama_menu?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
            <?php
              foreach ($menu->menulvl1 as $menulvl1) {
                if ($menulvl1->parent == $menu->id) {
            ?>
                <li <?=((isset($_SESSION['menulvl1'])) ? $_SESSION['menulvl1'] : 0 ) == $menulvl1->id ? "class='active'" : ''  ?>>
                  <a href="<?=site_url('navigation/navigate/'.$menulvl1->parent.'/'.$menulvl1->id)?>">
                    <i class="fa fa-gg"></i > <span><?=$menulvl1->menu_name?></span>
                  </a>
                </li>
            <?php
                }
              }
            ?>
            </ul>
          </li>
        <?php
          }
        ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>