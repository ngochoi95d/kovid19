        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

          <!-- Sidebar - Brand -->
          <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
              <i class="fas fa-virus"></i>
            </div>
            <div class="sidebar-brand-text mx-3">KOVID 19<br /> USER</div>
          </a>

          <!-- Divider -->
          <hr class="sidebar-divider my-0">
          <?php if ($_SESSION['aid']) : ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="live-test-updates.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tổng xét nghiệm<br />Tỉnh | Thành Phố</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Xét nghiệm Kovid 19
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Xét nghiệm</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="new-user-testing.php">Người dùng mới</a>
                  <a class="collapse-item" href="registered-user-testing.php">Người dùng đã <br /> được Đăng ký</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="patient-search-report.php">
                <i class="fas fa-fw fa-file"></i>
                <span>Kết quả báo cáo<br /> xét nghiệm</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="login.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span></a>
            </li>

          <?php else :    ?>

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
              <a class="nav-link" href="live-test-updates.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Tổng xét nghiệm<br /> Tỉnh| Thành Phố</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
              Xét nghiệm Kovid 19
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
              <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Xét nghiệm</span>
              </a>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                  <a class="collapse-item" href="new-user-testing.php">Người dùng mới</a>
                  <a class="collapse-item" href="registered-user-testing.php">Người dùng đã <br />được Đăng ký</a>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="patient-search-report.php">
                <i class="fas fa-fw fa-file"></i>
                <span>Kết quả báo cáo<br /> xét nghiệm</span></a>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="login.php">
                <i class="fas fa-fw fa-user"></i>
                <span>Admin</span></a>
            </li>

          <?php endif;    ?>

          <!-- Divider -->
          <hr class="sidebar-divider d-none d-md-block">

          <!-- Sidebar Toggler (Sidebar) -->
          <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
          </div>

        </ul>
        <!-- End of Sidebar -->