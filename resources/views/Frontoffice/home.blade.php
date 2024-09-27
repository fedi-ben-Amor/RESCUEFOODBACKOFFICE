@extends('FrontOfficeLayout.app')
@section('content')
@extends('Frontoffice.shared.sign')
@include('Frontoffice.shared.nav')

<section class="bg-darker bg-size-cover bg-position-center py-5 py-lg-10" style="background-image: url(img/food-delivery/hero-bg.jpg);">
    <div class="container pb-5">
      <div class="row justify-content-center pb-5">
        <div class="col-xl-6 col-lg-7 col-md-8 col-sm-10 text-center">
          <h5 class="text-light fw-light">#1 Rescue Food Project Since 2024</h5>
          <div class="h1 text-light mb-3 pb-4">We deliver your favorite food fresh &amp; fast in
            <div class="dropdown d-inline-block ms-1"><a class="dropdown-toggle" href="#" data-bs-toggle="dropdown">New York</a>
              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item fs-base" href="#">Los Angeles</a><a class="dropdown-item fs-base" href="#">Chicago</a><a class="dropdown-item fs-base" href="#">Houston</a><a class="dropdown-item fs-base" href="#">Philadelphia</a><a class="dropdown-item fs-base" href="#">San Diego</a><a class="dropdown-item fs-base" href="#">Miami</a></div>
            </div>
          </div><a class="btn btn-primary" href="{{url('categories')}}"
           data-scroll>What do you want to eat?</a>
        </div>
      </div>
    </div>
  </section>
  <section class="container py-4 my-lg-3 py-sm-5" id="cuisine">
    <h2 class="text-center pt-4 pt-sm-3">Type Of Food Exists in Our Plateforme</h2>
    <p class="text-muted text-center mb-5">Choose what you want and we dilever it to you</p>
    <div class="row">
      <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class="card border-0 shadow" href="food-delivery-category.html"><img class="card-img-top" src="img/food-delivery/category/01.jpg" alt="Burgers &amp; Fries">
          <div class="card-body py-4 text-center">
            <h3 class="h5 mt-1">Burgers &amp; Fries</h3>
          </div></a></div>
      <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class="card border-0 shadow" href="food-delivery-category.html"><img class="card-img-top" src="img/food-delivery/category/02.jpg" alt="Noodles">
          <div class="card-body py-4 text-center">
            <h3 class="h5 mt-1">Noodles</h3>
          </div></a></div>
      <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class="card border-0 shadow" href="food-delivery-category.html"><img class="card-img-top" src="img/food-delivery/category/03.jpg" alt="Sushi &amp; Rolls">
          <div class="card-body py-4 text-center">
            <h3 class="h5 mt-1">Sushi &amp; Rolls</h3>
          </div></a></div>
      <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class="card border-0 shadow" href="food-delivery-category.html"><img class="card-img-top" src="img/food-delivery/category/04.jpg" alt="Pizza &amp; Pasta">
          <div class="card-body py-4 text-center">
            <h3 class="h5 mt-1">Pizza &amp; Pasta</h3>
          </div></a></div>
      <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class="card border-0 shadow" href="food-delivery-category.html"><img class="card-img-top" src="img/food-delivery/category/05.jpg" alt="Coffee &amp; Desserts">
          <div class="card-body py-4 text-center">
            <h3 class="h5 mt-1">Coffee &amp; Desserts</h3>
          </div></a></div>
      <div class="col-md-4 col-sm-6 mb-grid-gutter"><a class="card border-0 shadow" href="food-delivery-category.html"><img class="card-img-top" src="img/food-delivery/category/06.jpg" alt="Healthy &amp; Food">
          <div class="card-body py-4 text-center">
            <h3 class="h5 mt-1">Healthy &amp; Food</h3>
          </div></a></div>
    </div>
  </section>
  <section class="container pb-4 pt-2 pt-sm-0 pt-md-2 pb-sm-5">
    <h2 class="text-center">Popular restaurants in your city</h2>
    <p class="text-muted pb-4 text-center">Check the best restaurants near you</p>
    <div class="row pb-2 pb-sm-0 pb-md-3">
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/01.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/02.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/03.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/04.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/05.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/06.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/07.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/08.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/09.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/10.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/11.png" style="width: 150px;" alt="Brand"></a></div>
      <div class="col-md-3 col-sm-4 col-6"><a class="d-block bg-white shadow-sm rounded-3 py-3 py-sm-4 mb-grid-gutter" href="food-delivery-single.html"><img class="d-block mx-auto" src="img/food-delivery/restaurants/logos/12.png" style="width: 150px;" alt="Brand"></a></div>
    </div>
  </section>    

  @include('Frontoffice.shared.footer') 
@endsection