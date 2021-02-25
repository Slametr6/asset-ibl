			<header class="main-header">
				<a href="<?= base_url('admin');?>">
          <img src="<?= base_url('assets/');?>images/icon/logoibl.png" />
     	 </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?= base_url('assets/images/profile/'). $user['image'];?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?= $user['username'];?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="dropdown">
										<a href="#!" onclick="changePassword('<?= base_url('admin/changePassword/'. $user['user_id']);?>')" ><i class="fa fa-key"></i> Change Password</a>
										<a href="<?= base_url('auth/logout');?>" ><i class="fa fa-sign-out"></i> Sign out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <aside class="main-sidebar">
        <section class="sidebar">
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview"><a href="<?= base_url('user/manager');?>"><i class="fa fa-dashboard"></i> <span>Home</span></i></a></li>
						<li class="treeview">
              <a href="#">
                <i class="fa fa-database"></i> <span>Master Asset</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('asset');?>"><i class="fa fa-desktop"></i> Assets</a></li>
                <li><a href="<?= base_url('asset/userasset');?>"><i class="fa fa-desktop"></i> User Assets</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-edit"></i> <span>Master Forms</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="<?= base_url('request');?>"><i class="fa fa-arrow-circle-right"></i> Request Form</a></li>
                <li><a href="<?= base_url('returnn');?>"><i class="fa fa-arrow-circle-right"></i> Return Form</a></li>
              </ul>
						</li>
            <li class="header">EXIT</li>
            <li><a href="<?= base_url('auth/logout');?>"><i class="fa fa-sign-out"></i> <span>Sign out</span></a></li>
          </ul>
        </section>
      </aside>
