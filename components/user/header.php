<header class="app-header">
  <nav class="navbar navbar-expand-lg">
    <ul class="navbar-nav">
      <li class="nav-item d-block d-xl-none">
        <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
          <i class="ti ti-menu-2 text-primary"></i>
        </a>
      </li>
    </ul>
    <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
      <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
        <div class="btn-group" style="margin-right: 20px;">
        <!-- <a class="nav-link nav-icon-hover cursor-pointer" title="Notifications" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="ti ti-bell fs-5"></i>
          <span class="badge bg-danger position-absolute top-0 start-100 translate-middle rounded-circle" style="font-size: 0.75rem;">5</span>
        </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" style="max-height: 400px; width: 400px; overflow-y: auto;">
          <li>
            <div class="dropdown-item">
              <div class="notification-content">
                <h4 class="notification-title">Hello</h4>
                <h5 class="notification-body">Hello World!</h5>
                <h6 class="notification-date" style="text-align: right;">Date & Time</h6>
              </div>
            </div>
          </li>
        </ul> -->
      </div>

      <div class="btn-group" style="margin-right: 20px;">
          <a class="nav-link nav-icon-hover cursor-pointer" data-bs-toggle="dropdown" aria-expanded="false" title="More Settings">
              <img src="../assets/images/person.jpg" width="35" height="35" class="rounded-circle">
          </a>
        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up">
          <li>
            <button class="d-flex align-items-center gap-2 dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#update-modal">
              <i class="ti ti-mail fs-6"></i>
              <p class="mb-0 fs-5" title="Profile">My Account</p>
            </button>
          </li>

          <li>
            <a href="../pages/index.php" title="Logout" class="btn btn-outline-primary mx-3 mt-2 d-block"><i class="ti ti-logout me-2"></i> Logout</a>
          </li>
        </ul>
      </div>
  </nav>
</header>

