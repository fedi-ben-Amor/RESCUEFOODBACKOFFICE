<!-- Navbar for authenticated users -->
@auth
<header class="navbar d-block navbar-sticky navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand d-none d-sm-block me-4 order-lg-1" href="{{ url('/') }}">
      <img src="/img/logo-dark.png" width="142" alt="Cartzilla">
    </a>
    <a class="navbar-brand d-sm-none me-2 order-lg-1" href="index.html">
      <img src="/img/logo-icon.png" width="74" alt="Cartzilla">
    </a>
    <div class="navbar-toolbar d-flex align-items-center order-lg-3">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-tool d-none d-lg-flex" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#searchBox" role="button" aria-expanded="false" aria-controls="searchBox">
        <span class="navbar-tool-tooltip">Search</span>
        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-search"></i></div>
      </a>
      <div class="dropdown ml-2">
        <a class="rounded-circle " href="#!" role="button" id="dropdownUser" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-md avatar-indicators avatar-online">
            <img alt="avatar" src="{{ asset('storage/' . Auth::user()->picture) }}" class="rounded-circle" style="width: 45px; height: 45px;">
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownUser">
          <div class="dropdown-item">
            <div class="d-flex">
      
              <div class="ml-3 lh-1">
                <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                <p class="mb-0 text-muted">{{ Auth::user()->email }}</p>
              </div>
            </div>
          </div>
          <div class="dropdown-divider"></div>
          <ul class="list-unstyled">
            <li>
              <a class="dropdown-item" href="../pages/profile-edit.html">
                <i class="fe fe-user mr-2"></i>Profile
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="../pages/student-subscriptions.html">
                <i class="fe fe-star mr-2"></i>Subscription
              </a>
            </li>
            <li>
              <a class="dropdown-item" href="#!">
                <i class="fe fe-settings mr-2"></i>Settings
              </a>
            </li>
          </ul>
          <div class="dropdown-divider"></div>
          <ul class="list-unstyled">
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
      <div class="navbar-tool dropdown ms-3">
        <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="{{ route('order') }}">
          <span class="navbar-tool-label">0</span>
          <i class="navbar-tool-icon ci-cart"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end" id="cartDropdown">
          <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
            <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false" id="cartItemsContainer">
              <!-- Cart items will be inserted dynamically here -->
            </div>
            <div class="d-flex justify-content-between pt-2">
              <a class="btn btn-outline-secondary btn-sm" href="{{ route('order') }}">View Cart</a>
              <a class="btn btn-primary btn-sm" href="{{ route('checkout') }}">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
      <div class="d-lg-none py-3">
        <div class="input-group"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
          <input class="form-control rounded-start" type="text" placeholder="What do you need?">
        </div>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ url('foodmarkets') }}">All Food Market</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('Frontoffice.Blogs.index') }}">Blogs</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('myreviews') }}">My Reviews</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
       
      </ul>
    </div>
  </div>
  <div class="search-box collapse" id="searchBox">
    <div class="container py-2">
      <div class="input-group"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
        <input class="form-control rounded-start" type="text" placeholder="What do you need?">
      </div>
    </div>
  </div>
</header>
@endauth

<!-- Navbar for guests (not authenticated) -->
@guest
<header class="navbar d-block navbar-sticky navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand d-none d-sm-block me-4 order-lg-1" href="{{ url('/') }}">
      <img src="/img/logo-dark.png" width="142" alt="Cartzilla">
    </a>
    <a class="navbar-brand d-sm-none me-2 order-lg-1" href="index.html">
      <img src="/img/logo-icon.png" width="74" alt="Cartzilla">
    </a>
    <div class="navbar-toolbar d-flex align-items-center order-lg-3">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-tool d-none d-lg-flex" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#searchBox" role="button" aria-expanded="false" aria-controls="searchBox">
        <span class="navbar-tool-tooltip">Search</span>
        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-search"></i></div>
      </a>
      <a class="navbar-tool ms-2" href="#signin-modal" data-bs-toggle="modal">
        <span class="navbar-tool-tooltip">Account</span>
        <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
      </a>
      <div class="navbar-tool dropdown ms-3">
        <div class="dropdown-menu dropdown-menu-end" id="cartDropdown">
          <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
            <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false" id="cartItemsContainer">
              <!-- Cart items will be inserted dynamically here -->
            </div>
            <div class="d-flex justify-content-between pt-2">
              <a class="btn btn-outline-secondary btn-sm" href="{{ route('order') }}">View Cart</a>
              <a class="btn btn-primary btn-sm" href="{{ route('checkout') }}">Checkout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="collapse navbar-collapse me-auto order-lg-2" id="navbarCollapse">
      <div class="d-lg-none py-3">
        <div class="input-group"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
          <input class="form-control rounded-start" type="text" placeholder="What do you need?">
        </div>
      </div>
      <ul class="navbar-nav">
        <li class="nav-item"><a class="nav-link" href="{{ url('foodmarkets') }}">All Food Market</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('Frontoffice.Blogs.index') }}">Blogs</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ url('agent/dashboard') }}">Dashboard Agent</a></li>
      </ul>
    </div>
  </div>
  <div class="search-box collapse" id="searchBox">
    <div class="container py-2">
      <div class="input-group"><i class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
        <input class="form-control rounded-start" type="text" placeholder="What do you need?">
      </div>
    </div>
  </div>
</header>
@endguest

<script>
  function updateCartView() {
    const cartCountElement = document.querySelector('.navbar-tool-label');
    const cartItemsContainer = document.getElementById('cartItemsContainer');
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = cartItems.length;

    cartCountElement.textContent = cartCount;

    // Clear the cart items container
    cartItemsContainer.innerHTML = '';

    // Loop through the cart items and create the HTML structure for each one
    cartItems.forEach((item, index) => {
      const cartItemHTML = `
        <div class="widget-cart-item pb-2 border-bottom" data-index="${index}">
          <button class="btn-close text-danger remove-btn" type="button" aria-label="Remove">&times;</button>
          <div class="d-flex align-items-center">
            <a class="d-block" href="/order"><img src="${item.image}" width="64" alt="${item.name}"></a>
            <div class="ps-2">
              <h6 class="widget-product-title"><a href="/order">${item.name}</a></h6>
              <div class="widget-product-meta"><span class="text-accent me-2">$${item.sellPrice}</span><span class="text-muted">x ${item.quantity}</span></div>
            </div>
          </div>
        </div>
      `;

      // Insert the cart item HTML into the container
      cartItemsContainer.insertAdjacentHTML('beforeend', cartItemHTML);
    });

    // Attach click event to remove buttons
    const removeButtons = document.querySelectorAll('.remove-btn');
    removeButtons.forEach(button => {
      button.addEventListener('click', (event) => {
        const cartItemIndex = event.target.closest('.widget-cart-item').dataset.index;
        removeFromCart(cartItemIndex);
      });
    });
  }

  function removeFromCart(index) {
    const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
    cartItems.splice(index, 1);
    localStorage.setItem('cart', JSON.stringify(cartItems));
    updateCartView();
  }

  // Call the function to update the cart view on page load
  updateCartView();
</script>
