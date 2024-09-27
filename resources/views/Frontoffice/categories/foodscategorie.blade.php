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
          {{-- Modal Details --}}
          <div class="modal-quick-view modal fade" id={{"quick-view".$food->id}} tabindex="-1">
            <div class="modal-dialog modal-dialog-centered modal-xl">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title">{{$food->foodName}}</h4>
                  <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-7 col-md-6 pe-lg-0"><img src={{ asset('storage/' . $food->image) }} alt="Pizza"></div>
                    <div class="col-lg-5 col-md-6 pt-4 pt-lg-0">
                      <div class="product-details ms-auto pb-3">
                        <div class="mb-3">
                          <span class="h3 fw-normal text-accent me-1" id="price{{$food->id}}">$ {{ $food->SellPrice }}</span>
                        </div>
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
                            <select class="form-select me-3" style="width: 5rem;" id="quantity{{$food->id}}">
                              <option value="1">1</option>
                              <option value="2">2</option>
                              <option value="3">3</option>
                              <option value="4">4</option>
                              <option value="5">5</option>
                          </select>
                          <button class="btn btn-primary btn-shadow d-block w-100" id="addToCartBtn{{$food->id}}" type="button"
                            data-food-id="{{ $food->id }}"
                            data-food-name="{{ $food->foodName }}"
                            data-food-price="{{ $food->SellPrice }}"
                            data-food-image="{{ asset('storage/' . $food->image) }}"
                            data-food-ingredients="{{ json_encode($food->ingredients) }}">
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

      <div class="col-lg-3 col-md-4 col-sm-6 mb-grid-gutter">
        <div class="card product-card border pb-2">
          <span class="badge badge-end badge-shadow bg-success fs-md fw-medium" data-bs-toggle="tooltip" title="Average meal cost">Restaurant</span>
          <a class="d-block" href={{"#quick-view".$food->id}} data-bs-toggle="modal">
            <img class="card-img-top" src={{ asset('storage/' . $food->image) }} alt="Pizza"></a>
          <div class="card-body pt-1 pb-2">
            <h3 class="product-title fs-md"><a href={{"#quick-view".$food->id}} data-bs-toggle="modal">{{$food->foodName}}</a></h3>
            <p class="fs-ms text-muted">{{$food->description  }}</p>
            <div class="d-flex align-items-center justify-content-between">
              <div class="product-price"><span class="text-accent">{{$food->SellPrice}}<sup>DT</sup></span></div>
            </div>
          </div>
        </div>
      </div>

      <script>
          document.addEventListener('DOMContentLoaded', function() {
    const addToCartBtn = document.getElementById('addToCartBtn{{$food->id}}');
    
    addToCartBtn.addEventListener('click', function() {
        // Récupérer les données depuis les attributs data-*
        const foodid = this.getAttribute('data-food-id');
        const foodName = this.getAttribute('data-food-name');
        const foodPrice = parseFloat(this.getAttribute('data-food-price'));
        const foodImage = this.getAttribute('data-food-image');
        const foodIngredients = JSON.parse(this.getAttribute('data-food-ingredients'));

        const quantitySelect = document.getElementById('quantity{{$food->id}}');
        const quantity = parseInt(quantitySelect.value);
        const totalPrice = (foodPrice * quantity).toFixed(2);
        
        const cartItem = {
            foodid: foodid,
            name: foodName,
            price: totalPrice,
            sellPrice: foodPrice,
            quantity: quantity,
            image: foodImage,
            ingredients: foodIngredients
        };

        // Ajouter l'article au panier
        addToCart(cartItem);
    });

    function addToCart(item) {
        let cart = localStorage.getItem('cart');
        cart = cart ? JSON.parse(cart) : [];

        const existingItemIndex = cart.findIndex(cartItem => cartItem.foodid === item.foodid);

        if (existingItemIndex !== -1) {
            cart[existingItemIndex].quantity += item.quantity;
            cart[existingItemIndex].price = (parseFloat(cart[existingItemIndex].price) + parseFloat(item.price)).toFixed(2);
        } else {
            cart.push(item);
        }

        localStorage.setItem('cart', JSON.stringify(cart));
        updateCartView();
    }
});

      </script>
      @endforeach
    </div>
  </section>
</div>

@endsection
