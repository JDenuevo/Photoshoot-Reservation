<!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar bg-primary">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a type="button" onclick="window.location.reload()" class="logo-img w-100">
            <div class="text-center">
                <div style="display: inline-block; vertical-align: middle;">
                  <img src="../assets/images/logo.png" alt="logo" class="img-fluid"/>
                </div>
            </div>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8 text-light"></i>
          </div>
        </div>

        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">

            <hr style="color: #fff; border-width: 1px;">

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu text-light">GENERAL</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" type="button" id="dashboard_label" onclick="window.location.reload()">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" type="button" id="rooms_label" onclick="dispContent('rooms')">
                <span>
                  <i class="ti ti-square"></i>
                </span>
                <span class="hide-menu">Rooms</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" type="button" id="packages_label" onclick="dispContent('packages')">
                <span>
                  <i class="ti ti-packages"></i>
                </span>
                <span class="hide-menu">Packages</span>
              </a>
            </li>
            <!-- <li class="sidebar-item">
              <a class="sidebar-link" type="button" id="packages_label" onclick="dispContent('addons')">
                <span>
                  <i class="ti ti-square-plus-2"></i>
                </span>
                <span class="hide-menu">Add Ons</span>
              </a>
            </li> -->
            <li class="sidebar-item">
              <a class="sidebar-link" type="button" id="reservations_label" onclick="dispContent('reservations')">
                <span>
                  <i class="ti ti-address-book"></i>
                </span>
                <span class="hide-menu">Reservations</span>
                <span class="badge bg-info position-absolute top-50 start-100 translate-middle rounded-circle" id="reservationCount" style="font-size: 0.75rem;">0</span>
              </a>
            </li>

            <hr style="color: #fff; border-width: 1px;">

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">MANAGE</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" type="button" id="accounts_label" onclick="dispContent('accounts')">
                <span>
                  <i class="ti ti-users"></i>
                </span>
                <span class="hide-menu">Accounts</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" type="button" id="reviews_label" onclick="dispContent('reviews')">
                <span>
                  <i class="ti ti-sparkles"></i>
                </span>
                <span class="hide-menu">Reviews</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

<script>
  var swiper = new Swiper(".slide-content",{
    slidesPerView: 8,
    spaceBetween: 10,
    loop: true,
    centeredSlides: 'true',
    fade: 'true',
    grabCursor: 'true',
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
      dynamicBullets: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 2000,
      },
    breakpoints:{
        0: {
            slidesPerView: 1,
        },
        640: {
            slidesPerView: 1,
        },
        768: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 5,
        },
        1200: {
            slidesPerView: 7,
        },
    },
  });
</script>

<script>
   $.ajax({
    url: "../api/count/getReservationCount.php",
    type: "POST",
    dataType: "json",
    success: function (response) {
     $('#reservationCount').text(response);
    }
  });
  // Function to add active class to the sidebar item on page load
  function addActiveClass() {
    const dashboardLink = document.getElementById('dashboard_label');
    const currentPage = window.location.pathname; // Get the current page URL path
    // Check if the current page is admin.php
    if (currentPage.includes('admin.php')) {
      dashboardLink.classList.add('active'); // Add the active class if on admin.php
    }
  }
  // Call the function when the page finishes loading
  window.addEventListener('load', addActiveClass);
</script>