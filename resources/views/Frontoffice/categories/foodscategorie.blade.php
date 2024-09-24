@extends('FrontOfficeLayout.app')
@section('foodsCategorie')

@include('Frontoffice.shared.nav')
@extends('Frontoffice.shared.sign')


<section class="bg-darker bg-size-cover bg-position-center py-5" style="background-image: url(img/food-delivery/category/pt-bg.jpg);">
    <div class="container py-md-4">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
          <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
          <li class="breadcrumb-item text-nowrap"><a href="#">Foods by {{$category->name}}</a>
          </li>
        </ol>
      </nav>
      <h1 class="text-light text-center text-lg-start pt-3">Foods by {{$category->name}}</h1>
    </div>
  </section>


  <section class="container py-4 py-sm-5">
    <div class="row pt-3 pt-sm-0">
  @foreach ($foods as $food)
      {{-- Modal Details  --}}
      <div class="modal-quick-view modal fade" id={{"quick-view".$food->id}} tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">{{$food->foodName}}</h4>
              <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="row">
                <!-- Product gallery-->
                <div class="col-lg-7 col-md-6 pe-lg-0"><img src={{ asset('storage/' . $food->image) }} alt="Pizza"></div>
                <!-- Product details-->
                <div class="col-lg-5 col-md-6 pt-4 pt-lg-0">
                  <div class="product-details ms-auto pb-3">
                    <div class="mb-3"><span class="h3 fw-normal text-accent me-1">{{$food->SellPrice}}<small>DT</small></span></div>
                    <form class="mb-grid-gutter">
                      <div class="row mx-n2">
                        <div class="col-6 px-2">
                          <div class="mb-3">
                            <label class="form-label" for="pizza-size">Franchise:</label>
                            <select class="form-select" id="pizza-size">
                              <option value="small">Small</option>
                              <option value="medium">Medium</option>
                              <option value="large">Large</option>
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
                    <p class="fs-sm">{{$food->ingredients}}</p>
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



  <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
    <div class="card product-card border pb-2">
      <span class="badge badge-end badge-shadow bg-success fs-md fw-medium"
      data-bs-toggle="tooltip" title="Average meal cost">Restaurant</span>
      <a class="d-block" href={{"#quick-view".$food->id}} data-bs-toggle="modal">
        <img class="card-img-top" src={{ asset('storage/' . $food->image) }} alt="Pizza"></a>
      <div class="card-body pt-1 pb-2">
        <h3 class="product-title fs-md"><a href={{"#quick-view".$food->id}} data-bs-toggle="modal">{{$food->foodName}}</a></h3>
        <p class="fs-ms text-muted">{{$food->ingredients}}</p>
  
        <div class="d-flex align-items-center justify-content-between">
          <div class="product-price"><span class="text-accent">{{$food->SellPrice}}<sup>DT</sup></span></div>
          <button class="btn btn-primary btn-sm" type="button">+<i class="ci-cart fs-base ms-1"></i></button>
        </div>
      </div>
    </div>
  </div>
@endforeach
</div>
</section>
</div>




@endsection