@extends('FrontOfficeLayout.app')
@section('foodsCategorie')

@include('Frontoffice.shared.nav')
@extends('Frontoffice.shared.sign')


<section class="bg-darker bg-size-cover bg-position-center py-5" style="background-image: url(img/food-delivery/category/pt-bg.jpg);">
    <div class="container py-md-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Foods by {{$category}}</a>
          </li>
        </ol>
      </nav>
      <h1 class="text-light text-center text-lg-start pt-3">Foods by {{$category}}</h1>
    </div>
  </section>

<section class="container py-4 py-sm-5">
    <div class="row pt-3 pt-sm-0">
      <div class="col-md-4 col-sm-6 mb-grid-gutter">
        <a class="card product-card h-100 border-0 shadow pb-2" href="food-delivery-single.html">
            <span class="badge badge-end badge-shadow bg-success fs-md fw-medium"
             data-bs-toggle="tooltip" title="Average meal cost">AMC: $17.<small>00</small></span>
             <img class="card-img-top" src="/img/food-delivery/restaurants/01.jpg" alt="McDonald's">
          <div class="bg-white rounded-3 pt-1 px-2 mx-auto mt-n5" style="width: 175px;">
            <img class="d-block rounded-3 mx-auto" src="/img/food-delivery/restaurants/logos/01.png" width="150" alt="Brand"></div>
          <div class="card-body text-center pt-3 pb-4">
            <h3 class="h5 mb-2">McDonald's</h3>
            <div class="fs-ms text-muted">Burgers, Salads, French fries, Drinks</div>
          </div></a></div>
    </div>
  </section>


@endsection