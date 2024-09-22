@extends('FrontOfficeLayout.app')
@section('foodMarket')

@include('Frontoffice.shared.nav')
@extends('Frontoffice.shared.sign')
<div class="modal-quick-view modal fade" id="quick-view" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Pizza with Salami and Olives</h4>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <!-- Product gallery-->
            <div class="col-lg-7 col-md-6 pe-lg-0"><img src="/img/food-delivery/restaurants/single/large-preview.jpg" alt="Pizza"></div>
            <!-- Product details-->
            <div class="col-lg-5 col-md-6 pt-4 pt-lg-0">
              <div class="product-details ms-auto pb-3">
                <div class="mb-3"><span class="h3 fw-normal text-accent me-1">$15.<small>99</small></span></div>
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
                    <div class="col-6 px-2">
                      <div class="mb-3">
                        <label class="form-label" for="pizza-base">Base:</label>
                        <select class="form-select" id="pizza-base">
                          <option value="standard">Standard</option>
                          <option value="thin">Thin</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 d-flex align-items-center">
                    <select class="form-select me-3" style="width: 5rem;">
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                    </select>
                    <button class="btn btn-primary btn-shadow d-block w-100" type="submit"><i class="ci-cart fs-lg me-2"></i>Add to Cart</button>
                  </div>
                </form>
                <h5 class="h6 mb-3 pb-3 border-bottom"><i class="ci-announcement text-muted fs-lg align-middle mt-n1 me-2"></i>Product info</h5>
                <h6 class="fs-sm mb-2">Ingredients:</h6>
                <p class="fs-sm">Salami, Olives, Bell pepper, Mushrooms, Mozzarella, Parmesan</p>
                <h6 class="fs-sm mb-2">Allergies</h6>
                <p class="fs-sm">Gluten, Dairy</p>
                <h6 class="fs-sm mb-2">Calories</h6>
                <p class="fs-sm mb-0">811</p>
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
        <div class="card product-card border pb-2"><a class="d-block" href="#quick-view" data-bs-toggle="modal"><img class="card-img-top" src="/img/food-delivery/restaurants/single/01.jpg" alt="Pizza"></a>
          <div class="card-body pt-1 pb-2">
            <h3 class="product-title fs-md"><a href="#quick-view" data-bs-toggle="modal">Pizza Vegano Delux</a></h3>
            <p class="fs-ms text-muted">Broccoli, Mushrooms, Bell pepper, Corn, Onion, Mozzarella, Parmesan</p>
            <div class="d-flex mb-1">
              <div class="form-check form-option form-check-justified mb-2">
                <input class="form-check-input" type="radio" name="size1" id="s1" checked>
                <label class="form-option-label" for="s1">Small</label>
              </div>
              <div class="form-check form-option form-check-justified mb-2">
                <input class="form-check-input" type="radio" name="size1" id="m1">
                <label class="form-option-label" for="m1">Medium</label>
              </div>
              <div class="form-check form-option form-check-justified mb-2">
                <input class="form-check-input" type="radio" name="size1" id="l1">
                <label class="form-option-label" for="l1">Large</label>
              </div>
            </div>
            <div class="d-flex mb-3">
              <div class="form-check form-option form-check-justified mb-2">
                <input class="form-check-input" type="radio" name="base1" id="standard1" checked>
                <label class="form-option-label" for="standard1">Standard</label>
              </div>
              <div class="form-check form-option form-check-justified mb-2">
                <input class="form-check-input" type="radio" name="base1" id="thin1">
                <label class="form-option-label" for="thin1">Thin</label>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <div class="product-price"><span class="text-accent">$12.99</span></div>
              <button class="btn btn-primary btn-sm" type="button">+<i class="ci-cart fs-base ms-1"></i></button>
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

  @endsection
  