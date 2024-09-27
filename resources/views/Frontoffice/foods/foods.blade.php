@extends('FrontOfficeLayout.app')
@section('content')

@extends('Frontoffice.shared.sign')
@include('Frontoffice.shared.nav')
<div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">{{ $food->foodName }}</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- Product gallery-->
            <div class="col-lg-7 col-md-6 pe-lg-0"><img src="{{ asset('storage/' . $food->image) }}" alt="Pizza"></div>
            <!-- Product details-->
            <div class="col-lg-5 col-md-6 pt-4 pt-lg-0">
              <div class="product-details ms-auto pb-3">
                <div class="mb-3">
                  <span class="h3 fw-normal text-accent me-1" id="price">$ {{ $food->SellPrice }}</span>
              </div>
                              <form class="mb-grid-gutter">
                  <div class="row mx-n2">
                    <div class="col-6 px-2">
                      <div class="mb-3">
                        <label class="form-label" for="pizza-size">Size:</label>
                        <select class="form-select" id="pizza-size">
                          <option value="small">Small</option>
                          <option value="medium">Medium</option>
                          <option value="large">Large</option>
                        </select>
                      </div>
                    </div>
                
                  </div>
                  <div class="mb-3 d-flex align-items-center">
                    <select class="form-select me-3" style="width: 5rem;" id="quantity">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                  </select>
                  <button class="btn btn-primary btn-shadow d-block w-100" id="addToCartBtn" type="button">
                    <i class="ci-cart fs-lg me-2"></i>Add to Cart
                  </button>
                                    </div>
                </form>
                <h5 class="h6 mb-3 pb-3 border-bottom"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</h5>
                <h6 class="fs-sm mb-2">Ingredients:</h6>
                <p class="fs-sm">{{ implode(', ', $food->ingredients) }}</p>
                <h6 class="fs-sm mb-2">Description</h6>
                <p class="fs-sm">{{ $food->description }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Page title-->
  <section class="bg-darker bg-size-cover bg-position-center py-5" style="background-image: url(img/food-delivery/restaurants/single/pt-bg.jpg);">
    <div class="container py-md-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Restaurants</a>
          </li>
          <li class="breadcrumb-item text-nowrap active" aria-current="page">Domino's Pizza</li>
        </ol>
      </nav>
      <h1 class="text-light text-center text-lg-start py-3">Domino's Pizza</h1>
    </div>
  </section>
  <!-- Page navigation-->
  <nav class="container mt-n5">
    <div class="d-flex align-items-center bg-white rounded-3 shadow-lg py-2 ps-sm-2 pe-4 pe-lg-2"><img class="d-block rounded-3" src="/img/food-delivery/restaurants/logos/02.png" width="150" alt="Brand">
      <div class="ps-lg-3 w-100 text-end">
        <!-- For desktop-->
        <ul class="nav nav-tabs d-none d-lg-flex border-0 mb-0">
          <li class="nav-item"><a class="nav-link active" href="#">Pizza</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Sides</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Drinks</a></li>
          <li class="nav-item"><a class="nav-link" href="#">Dessert</a></li>
        </ul>
        <!-- For mobile-->
        <div class="btn-group dropdown d-lg-none ms-auto">
          <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="ci-menu fs-base me-2"></i>Menu</button>
          <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item fs-base active" href="#">Pizza    </a><a class="dropdown-item fs-base" href="#">Sides    </a><a class="dropdown-item fs-base" href="#">Drinks    </a><a class="dropdown-item fs-base" href="#">Dessert    </a></div>
        </div>
      </div>
    </div>
  </nav>
  <!-- Menu (Products grid)-->
  <section class="container tab-content py-4 py-sm-5">
    <h2 class="text-center pt-2 pt-sm-0 mb-sm-5">Pizza</h2>
    <div class="row pt-3 pt-sm-0">
      <!-- Item-->
      <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
        <div class="card product-card border pb-2"><a class="d-block" href="#quick-view" data-bs-toggle="modal"><img class="card-img-top" src="{{ asset('storage/' . $food->image) }}" alt="Pizza"></a>
          <div class="card-body pt-1 pb-2">
            <h3 class="product-title fs-md"><a href="#quick-view" data-bs-toggle="modal">{{ $food->foodName }}</a></h3>
            <p class="fs-ms text-muted">{{ $food->description }}</p>
         
         
            <div class="d-flex align-items-center justify-content-between">
              <div class="product-price"><span class="text-accent">$ {{ $food->SellPrice }}</span></div>
            
            </div>
          </div>
        </div>
      </div>
  
    </div>
    <!-- Load more button-->
    <nav class="d-md-flex justify-content-between align-items-center text-center text-md-start pt-2 pb-4 mb-md-2" aria-label="Page navigation">
      <div class="d-md-flex align-items-center w-100"><span class="fs-sm text-muted me-md-3">Showing 8 of 24 items</span>
        <div class="progress w-100 my-3 mx-auto mx-md-0" style="max-width: 10rem; height: 4px;">
          <div class="progress-bar bg-dark" role="progressbar" style="width: 18%;" aria-valuenow="18" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
      </div>
      <button class="btn btn-outline-secondary" type="button">Load more items</button>
    </nav>
  </section>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Récupérer les éléments du DOM
        const priceElement = document.getElementById('price');
        const quantitySelect = document.getElementById('quantity');
    
        // Prix de base (converti en nombre)
        const basePrice = parseFloat('{{ $food->SellPrice }}');
    
        // Fonction pour mettre à jour le prix
        function updatePrice() {
            const quantity = parseInt(quantitySelect.value); // Récupérer la quantité sélectionnée
            const totalPrice = (basePrice * quantity).toFixed(2); // Calculer le prix total et limiter à 2 décimales
            priceElement.textContent = `$ ${totalPrice}`; // Mettre à jour le texte du prix
        }
    
        // Écouter les changements de la sélection
        quantitySelect.addEventListener('change', updatePrice);
    });
    </script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const addToCartBtn = document.getElementById('addToCartBtn');
        const priceElement = document.getElementById('price');
        const quantitySelect = document.getElementById('quantity');
    
        // Get food data from blade template
        const foodName = "{{ $food->foodName }}";
        const foodPrice = parseFloat("{{ $food->SellPrice }}");
        const foodImage = "{{ asset('storage/' . $food->image) }}";
    
        addToCartBtn.addEventListener('click', function() {
          const quantity = parseInt(quantitySelect.value);
          const totalPrice = (foodPrice * quantity).toFixed(2);
          const cartItem = {
            name: foodName,
            price: totalPrice,
            quantity: quantity,
            image: foodImage
          };
    
          // Add item to cart
          addToCart(cartItem);
        });
    
        function addToCart(item) {
          let cart = localStorage.getItem('cart');
          cart = cart ? JSON.parse(cart) : [];
    
          cart.push(item);
          localStorage.setItem('cart', JSON.stringify(cart));
    
          updateCartView();
        }
    
        function updateCartView() {
          const cartCountElement = document.querySelector('.navbar-tool-label');
          const cartItems = JSON.parse(localStorage.getItem('cart')) || [];
          const cartCount = cartItems.length;
    
          cartCountElement.textContent = cartCount;
          // You can add more logic here to update the cart dropdown view with items.
        }
    
        // Initialize cart view
        updateCartView();
      });
    </script>
    
  @endsection
  