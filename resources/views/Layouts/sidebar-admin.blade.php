 <!-- Sidebar -->


<nav class="navbar-vertical navbar">
    <div class="nav-scroller">
      <!-- Brand logo -->
      <a class="navbar-brand" href="../index.html"><img src="../assets/images/brand/logo/logo-inverse.svg" alt="" /></a>
      <!-- Navbar nav -->
      <ul class="navbar-nav flex-column" id="sideNavbar">
        <!-- Nav item -->
        <li class="nav-item">
          <a class="nav-link " href="{{route('Dashboard')}}">
            <i class="nav-icon fe fe-home mr-2"></i>Dashboard
          </a>
        </li>
        <!-- Nav item -->
        <li class="nav-item">
          <a class="nav-link " href="#!" data-toggle="collapse" data-target="#navCourses" aria-expanded="false"
            aria-controls="navCourses">
            <i class="nav-icon fe fe-book mr-2"></i>Restaurant
          </a>
          <div id="navCourses" class="collapse" data-parent="#sideNavbar">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="{{url ('restaurants')}}">All Restaurant
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url ('category')}}">Food Category
                </a>
              </li>
              
            </ul>
          </div>
        </li>
        <!-- Nav item -->
        <li class="nav-item">
          <a class="nav-link " href="#!" data-toggle="collapse" data-target="#navProfile" aria-expanded="false"
            aria-controls="navProfile">
            <i class="nav-icon fe fe-user mr-2"></i>User
          </a>
          <div id="navProfile" class="collapse " data-parent="#sideNavbar">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="{{ route('Dashboard-Admin.UserList', ['role' => 'agent']) }}">Agents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Dashboard-Admin.UserList', ['role' => 'client']) }}">Clients</a>
            </li>
            
            </ul>
          </div>
        </li>
        <!-- Nav item -->
        <li class="nav-item">
          <a class="nav-link " href="#!" data-toggle="collapse" data-target="#navCMS" aria-expanded="false"
            aria-controls="navCMS">
            <i class="nav-icon fe fe-book-open mr-2"></i>CMS
          </a>
          <div id="navCMS" class="collapse " data-parent="#sideNavbar">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="admin-cms-post.html">All Post
                </a>
              </li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{route('contactList')}}">
            <i class="nav-icon fe fe-mail  mr-2"></i>Contacts
          </a>
        </li>
        <!-- Nav item -->
    
        <!-- Nav item -->
        <li class="nav-item ">
          <div class="nav-divider">
          </div>
        </li>
    
        <!-- Nav item -->
        <li class="nav-item">
          <a class="nav-link " href="#!" data-toggle="collapse" data-target="#navSiteSetting" aria-expanded="false"
            aria-controls="navSiteSetting">
            <i class="nav-icon fe fe-settings mr-2"></i>Site Setting
          </a>
          <div id="navSiteSetting" class="collapse" data-parent="#sideNavbar">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="setting-general.html">General
                </a>
              </li>
           
            </ul>
          </div>
        </li>
    
    </div>
  </nav>
      <!-- sidebar -->