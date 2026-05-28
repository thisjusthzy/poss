
<!-- sidebar menu -->
            <!-- <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>Point of Sale</h3>
                <ul class="nav side-menu">
  <li><a href="<?= base_url ('Home/dashboard') ?>"><i class="fa fa-home"></i> Home </a> </li>
                  <?php
                  $level=session()->get('level');
                  if ($level==1 || $level ==4 ) {
                  ?>
  <li><a href="<?= base_url ('Home/user') ?>"><i class="fa fa-user"></i>User </a> </li> 
                  <?php }?>  
                  <?php
                  $level=session()->get('level');
                  if ($level==1 || $level ==4 ) {
                  ?>
  <li><a href="<?= base_url ('Home/karyawan') ?>"><i class="fa fa-windows"></i> Karyawan </a></li>
                    <?php }?>

  <li><a><i class="fa fa-edit"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <?php
                      $level=session()->get('level');
                      if ($level==1 || $level ==4 ) {
                      ?>
              <li><a href="<?= base_url ('Home/product') ?>">Product</a></li>
              <li><a href="<?= base_url ('Home/bm') ?>">Product Masuk</a></li>
              <li><a href="<?= base_url ('Home/transaksi') ?>">Transaksi</a></li>
                       <?php }else{ ?>
              <li><a href="<?= base_url ('Home/transaksi') ?>">Transaksi</a></li>
                    <?php } ?>
                      </ul>
                      </li>
                    <?php
                    $level=session()->get('level');
                    if ($level==1 || $level ==4 ) {
                    ?>
     <li><a><i class="fa fa-desktop"></i> Laporan <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
     <li><a href="<?= base_url('/home/l_brg')?>">Product</a></li>
     <li><a href="<?= base_url('/home/l_masuk')?>">Product Masuk</a></li>
     <li><a href="<?= base_url('/home/l_penjualan')?>">Penjualan</a></li>
                  </ul>
                  </li>
                  <?php } ?>
                </ul>
              </div>
            </div>
              
 -->
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <!-- <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('Home/log_out')?>">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div> -->
                      
          

            <!-- /menu footer buttons -->


        <!-- top navigation -->
        <!-- <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                  <img src="<?= base_url('images/duar.jpeg/')?>" alt=""><?= session()->get('username')?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right"> -->
                    <!-- <li><a href="javascript:;"> Profile</a></li>
                    <li>
                      <a href="javascript:;">
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li> -->
                    <!-- <li><a href="<?= base_url('Home/log_out')?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li> -->

                <!-- <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="<?= base_url('images/duar.jpeg/')?>" alt=""><?= session()->get('username')?></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li> -->
              <!-- </ul>
            </nav>
          </div>
        </div> -->
        <!-- /top navigation -->
         <!-- page content -->
        <!-- <div class="right_col" role="main"> -->
          <!-- top tiles -->
        <!--   <div class="row tile_count">
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
              <div class="count">2500</div>
              <span class="count_bottom"><i class="green">4% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Average Time</span>
              <div class="count">123.50</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>3% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Males</span>
              <div class="count green">2,500</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Females</span>
              <div class="count">4,567</div>
              <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Collections</span>
              <div class="count">2,315</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
          </div>
        </div> -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <h3>POINT OF SALE</h3>
    <ul class="nav side-menu">
      <li><a><i class="fa fa-money"></i> Transaksi <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <?php
          $level = session()->get('level');
          if ($level == 1 || $level == 4) {
          ?>
          <li><a href="<?= base_url('/home/product') ?>">Barang</a></li>
          <li><a href="<?= base_url('/home/bm') ?>">Barang Masuk</a></li>
          <li><a href="<?= base_url('/home/transaksi') ?>">Penjualan</a></li>
          <?php } else { ?>
          <li><a href="<?= base_url('/home/transaksi') ?>">Penjualan</a></li>
          <?php } ?>
        </ul>
      </li>
      <?php
      $level = session()->get('level');
      if ($level == 1 || $level == 4) {
      ?>
      <li><a><i class="fa fa-book"></i> Laporan <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">

          <li><a href="<?= base_url('/home/l_brg') ?>">Barang</a></li>
          <li><a href="<?= base_url('/home/l_masuk') ?>">Barang masuk</a></li>
          <li><a href="<?= base_url('/home/l_penjualan') ?>">Penjualan</a></li>
        </ul>
      </li>
      <?php } ?>
      <?php
      $level = session()->get('level');
      if ($level == 1) {
      ?>
      <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
          <li><a href="<?= base_url('/home/user') ?>">user</a></li>
          <li><a href="<?= base_url('/home/karyawan') ?>">Karyawan</a></li>
        </ul>
      </li>
      
   
    </ul>
  </div>
 <!--  <div class="menu_section">
    <h3>Live On</h3>
    <ul class="nav side-menu"> -->
      
      
      <?php } ?>
    </ul>
  </div>

</div>
<!-- /sidebar menu -->

 </menu footer buttons >
<div class="sidebar-footer hidden-small"> 
  <!-- <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a> --> 
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('home/log_out') ?>">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?= base_url('/images/duar.jpeg') ?>" alt="">
            <?= session()->get('username'); ?>
              <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="<?= base_url('/Home/edit_k/'.session()->get('id_user'))?>"> Profile</a></li>
            <li>
              <a href="<?= base_url('/Home/ganti_profil/'.session()->get('id_user'))?>">
                <span> Ganti Profile </span>
              </a>
            </li>
            <!-- <li><a href="javascript:;">Help</a></li> -->
            <li><a href="<?= base_url('home/log_out') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
        <!--   <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-envelope-o"></i>
            <span class="badge bg-green">6</span>
          </a> -->
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>
                    <?= session()->get('username'); ?>
                  </span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <a>
                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                <span>
                  <span>John Smith</span>
                  <span class="time">3 mins ago</span>
                </span>
                <span class="message">
                  Film festivals used to be do-or-die moments for movie makers. They were where...
                </span>
              </a>
            </li>
            <li>
              <div class="text-center">
                <a>
                  <strong>See All Alerts</strong>
                  <i class="fa fa-angle-right"></i>
                </a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
  </div>
</div>
<!-- page content -->
<div class="right_col" role="main">
  
