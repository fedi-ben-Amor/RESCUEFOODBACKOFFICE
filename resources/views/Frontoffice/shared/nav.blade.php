<header
  class="navbar d-block navbar-sticky navbar-expand-lg navbar-light bg-light">
  <div class="container"><a
      class="navbar-brand d-none d-sm-block me-4 order-lg-1" href="index.html">
      <img src="/img/logo-dark.png" width="142" alt="Cartzilla"></a><a
      class="navbar-brand d-sm-none me-2 order-lg-1" href="index.html"><img
        src="/img/logo-icon.png" width="74" alt="Cartzilla"></a>
    <div class="navbar-toolbar d-flex align-items-center order-lg-3">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse"><span
          class="navbar-toggler-icon"></span></button><a
        class="navbar-tool d-none d-lg-flex" href="javascript:void(0)"
        data-bs-toggle="collapse" data-bs-target="#searchBox" role="button"
        aria-expanded="false" aria-controls="searchBox"><span
          class="navbar-tool-tooltip">Search</span>
        <div class="navbar-tool-icon-box"><i
            class="navbar-tool-icon ci-search"></i></div></a><a
        class="navbar-tool ms-2" href="#signin-modal"
        data-bs-toggle="modal"><span class="navbar-tool-tooltip">Account</span>
        <div class="navbar-tool-icon-box"><i
            class="navbar-tool-icon ci-user"></i></div></a>
            <div class="navbar-tool dropdown ms-3">
              <a class="navbar-tool-icon-box bg-secondary dropdown-toggle" href="food-delivery-cart.html">
                <span class="navbar-tool-label">0</span>
                <i class="navbar-tool-icon ci-cart"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-end" id="cartDropdown">
                <div class="widget widget-cart px-3 pt-2 pb-3" style="width: 20rem;">
                  <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false" id="cartItemsContainer">
                    <!-- Cart items will be inserted dynamically here -->
                  </div>
                  <div class="d-flex justify-content-between pt-2">
                    <a class="btn btn-outline-secondary btn-sm" href="{{route('order')}}">View Cart</a>
                    <a class="btn btn-primary btn-sm" href="{{route('checkout')}}">Checkout</a>
                  </div>
                </div>
              </div>
            </div>
    </div>
    <div class="collapse navbar-collapse me-auto order-lg-2"
      id="navbarCollapse">
      <!-- Search (mobile)-->
      <div class="d-lg-none py-3">
        <div class="input-group"><i
            class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
          <input class="form-control rounded-start" type="text"
            placeholder="What do you need?">
        </div>
      </div>
      <!-- Location dropdown-->
      
      <!-- Primary menu-->
      <ul class="navbar-nav">
        <li class="nav-item dropdown"><a class="nav-link dropdown-toggle"
            href="#" data-bs-toggle="dropdown">Food Categoryies</a>
          <div class="dropdown-menu px-2 ps-0 pb-4">
            <div class="d-flex">
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/burger.svg" width="60"
                      alt="Burgers &amp; Fries">
                    <h6 class="fs-base text-center">Burgers &amp;
                      Fries</h6></a></div>
              </div>
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/noodles.svg" width="60"
                      alt="Noodles">
                    <h6 class="fs-base text-center">Noodles</h6></a></div>
              </div>
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/pizza.svg" width="60"
                      alt="Pizza &amp; Pasta">
                    <h6 class="fs-base text-center">Pizza &amp;
                      Pasta</h6></a></div>
              </div>
            </div>
            <div class="d-flex">
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/steak.svg" width="60"
                      alt="Grill &amp; Steaks">
                    <h6 class="fs-base text-center">Grill &amp;
                      Steaks</h6></a></div>
              </div>
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/fish.svg" width="60"
                      alt="Fish &amp; Seafood">
                    <h6 class="fs-base text-center">Fish &amp;
                      Seafood</h6></a></div>
              </div>
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/healthy.svg" width="60"
                      alt="Healthy Food">
                    <h6 class="fs-base text-center">Healthy Food</h6></a></div>
              </div>
            </div>
            <div class="d-flex">
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/cuisine.svg" width="60"
                      alt="Haute Cuisine">
                    <h6 class="fs-base text-center">Haute Cuisine</h6></a></div>
              </div>
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/chicken.svg" width="60"
                      alt="Chicken &amp; Snaks">
                    <h6 class="fs-base text-center">Chicken &amp;
                      Snaks</h6></a></div>
              </div>
              <div class="mega-dropdown-column pt-4 px-3" style="width: 12rem;">
                <div class="widget mb-3"><a class="d-block"
                    href="food-delivery-category.html"><img
                      class="d-block mx-auto mb-3"
                      src="/img/food-delivery/icons/coffee.svg" width="60"
                      alt="Coffee &amp; Desserts">
                    <h6 class="fs-base text-center">Coffee &amp;
                      Desserts</h6></a></div>
              </div>
            </div>
          </div>
        </li>
        <li class="nav-item"><a class="nav-link" href={{url('foodmarkets')}}>All Food Market</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('Frontoffice.Blogs.index') }}">Blogs</a></li>
        <li class="nav-item"><a class="nav-link" href="{{route('contact')}}">Contact</a></li>
        <li class="nav-item"><a class="nav-link" href={{url('agent/dashboard')}}>Dashboard Agent</a></li>
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
  <!-- Search collapse-->
  <div class="search-box collapse" id="searchBox">
    <div class="container py-2">
      <div class="input-group"><i
          class="ci-search position-absolute top-50 start-0 translate-middle-y ms-3"></i>
        <input class="form-control rounded-start" type="text"
          placeholder="What do you need?">
      </div>
    </div>
  </div>
</header>
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
            <a class="d-block" href="#"><img src="${item.image}" width="64" alt="${item.name}"></a>
            <div class="ps-2">
              <h6 class="widget-product-title"><a href="#">${item.name}</a></h6>
              <div class="widget-product-meta"><span class="text-accent me-2">$${item.sellPrice}</span><span class="text-muted">x ${item.quantity}</span></div>
            </div>
          </div>
        </div>
      `;

      // Insert the cart item HTML into the container
      cartItemsContainer.insertAdjacentHTML('beforeend', cartItemHTML);
    });

    // Attach event listeners to all "remove" buttons
    const removeButtons = document.querySelectorAll('.remove-btn');
    removeButtons.forEach(button => {
      button.addEventListener('click', function() {
        const cartItemElement = this.closest('.widget-cart-item');
        const itemIndex = cartItemElement.getAttribute('data-index');

        // Remove the item from the cart array
        cartItems.splice(itemIndex, 1);

        // Save the updated cart array back to localStorage
        localStorage.setItem('cart', JSON.stringify(cartItems));

        // Update the cart view
        updateCartView();
      });
    });
  }

  // Call this function to initialize cart items in the dropdown
  updateCartView();
</script>
