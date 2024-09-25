<nav class="navbar navbar-expand-md shadow-sm mb-4 mb-lg-0 sidenav">
    <!-- Menu -->
    <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Menu</a>
    <!-- Button -->
    <button
        class="navbar-toggler d-md-none icon-shape icon-sm rounded bg-primary text-light"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#sidenav"
        aria-controls="sidenav"
        aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="fe fe-menu"></span>
    </button>
    <!-- Collapse -->
    <div class="collapse navbar-collapse" id="sidenav">

      <div class="navbar-nav flex-column">
        <span class="navbar-header">Dashboard</span>
        <ul class="list-unstyled ms-n2 mb-4">
          <!-- Nav item -->
          <li class="nav-item active">
            <a class="nav-link" href="dashboard-instructor.html">
              <i class="fe fe-home nav-icon"></i>
              My Dashboard
            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-products') }}">
              <i class="fe fe-book nav-icon"></i>
              My Foods
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.blogs') }}">
              <i class="fe fe-book nav-icon"></i>
              My Blogs
            </a>
          </li>

          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-reviews') }}">
              <i class="fe fe-star nav-icon"></i>
              Reviews
            </a>
          </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard-agent.my-franchise') }}">
                    <i class="fe fe-pie-chart nav-icon"></i>
                    Franchise
                </a>
            </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-stock') }}">
              <i class="fe fe-pie-chart nav-icon"></i>
              Stock
            </a>
          </li>
            <!-- Nav item -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('restaurents.index') }}">
                    <i class="fe fe-pie-chart nav-icon"></i>
                    Restaurents
                </a>
            </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-orders') }}">
              <i class="fe fe-shopping-bag nav-icon"></i>
              Orders
            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-categories') }}">
              <i class="fe fe-users nav-icon"></i>
              Categories
            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="instructor-payouts.html">
              <i class="fe fe-dollar-sign nav-icon"></i>
              Gain
            </a>
          </li>

        </ul>
        <!-- Navbar header -->
        <span class="navbar-header">Account Settings</span>
        <ul class="list-unstyled ms-n2 mb-0">
          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-profileDetails') }}">
              <i class="fe fe-settings nav-icon"></i>
              Edit Profile
            </a>
          </li>

          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-profileDetails') }}">
              <i class="fe fe-bell nav-icon"></i>
              Notifications
            </a>
          </li>

          <!-- Nav item -->
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard-agent.my-deleteProfile') }}">
              <i class="fe fe-trash nav-icon"></i>
              Delete Profile
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('') }}">
              <i class="fe fe-trash nav-icon"></i>
              Back To RescueFood
            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fe fe-power nav-icon"></i>
                Sign Out
            </a>
        </li>
        </ul>
      </div>
    </div>
</nav>
