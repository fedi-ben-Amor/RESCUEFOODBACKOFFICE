@extends('categorie.foods.header')
@section('foodpage')
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