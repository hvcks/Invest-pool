<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="http://www.keita-gaming.com/assets/profile/default-avatar-c5d8ec086224cb6fc4e395f4ba3018c2.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user_data['firstname']; ?></p>
          <a href="#"><i class="fa fa-circle text-primary"></i> Customer</a>
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
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="dashboard.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>

        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Forms</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Post A Project</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Contact Us</a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-info-circle"></i> <span>Information</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="info_basic.php"><i class="fa fa-circle-o"></i> Basic Info</a></li>
            <li><a href="info_contact.php"><i class="fa fa-circle-o"></i> Contacts</a></li>
          </ul>
        </li>
          <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i> <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="change_password.php"><i class="fa fa-circle-o"></i> Change Password</a></li>
            <li><a href="delete_account.php"><i class="fa fa-circle-o"></i> De-activate Account</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> FAQs</a></li>
          </ul>
        </li>
              </ul>
        </li>
    </section>
    <!-- /.sidebar -->
  </aside>
