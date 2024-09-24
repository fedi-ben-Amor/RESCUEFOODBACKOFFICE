@extends('FrontOfficeLayout.app')
@section('categorieList')

@include('Frontoffice.shared.nav')
@extends('Frontoffice.shared.sign')
<section class="bg-darker bg-size-cover bg-position-center py-5" style="background-image: url(img/food-delivery/category/pt-bg.jpg);">
  <div class="container py-md-4">
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
        <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
        <li class="breadcrumb-item text-nowrap"><a href="#">All categories</a>
        </li>
      </ol>
    </nav>
    <h1 class="text-light text-center text-lg-start pt-3">All Categories</h1>
  </div>
</section>

<section class="container py-4 my-lg-3 py-sm-5" id="cuisine">
  <div class="row">
    @foreach ($categories as $category)
      <div class="col-md-4 col-sm-6 mb-grid-gutter">
        <a class="card border-0 shadow" href="{{url('/'.$category->id.'/foods')}}">
          <img class="card-img-top" src={{ asset('storage/' . $category->image) }} alt="Burgers &amp; Fries">
          <div class="card-body py-4 text-center">
            <h3 class="h5 mt-1"> {{ $category->name }}</h3>
          </div>
        </a>
      </div>
    @endforeach
  </div>
</section>
  @endsection