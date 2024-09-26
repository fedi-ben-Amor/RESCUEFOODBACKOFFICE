@extends('layouts.app')
@section('content')

    <main>
        <section class="pt-5 pb-5">
            <div class="container-fluid">
                <!-- Navbar Agent -->
                @include('layouts.navbar-agent')

                <!-- Content -->
                <div class="row mt-0 mt-md-4">
                    <div class="col-lg-3 col-md-4 col-12">
                        <!-- Sidebar Agent -->
                        @include('layouts.sidebar-agent')
                    </div>

                    <div class="col-lg-9 col-md-8 col-12">
                        <!-- Card -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <h3 class="mb-0">Stock Details</h3>
                                <p class="mb-0">
                                    View the stock details and related information.
                                </p>
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- Image Upload Section -->
                                <div class="d-lg-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center mb-4 mb-lg-0">
                                        @if ($stock->image_data)
                                            <img src="data:image/jpeg;base64,{{ $stock->image_data }}" id="img-uploaded" class="img-fluid rounded" alt="Stock Image" style="width: 150px; height: 150px;" />
                                        @else
                                            <img src="{{ asset('path/to/default/image.jpg') }}" id="img-uploaded" class="img-fluid rounded" alt="Stock Image" style="width: 150px; height: 150px;" />
                                        @endif
                                        <div class="ml-3">
                                            <h4 class="mb-0">Stock Image</h4>
                                            <p class="mb-0">PNG or JPG no bigger than 800px wide and tall.</p>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-5" />

                                <!-- Franchise Information Section -->
                                <div>
                                    <h4 class="mb-0">Franchise Info</h4>
                                    <p class="mb-4">
                                        Information about the associated franchise.
                                    </p>

                                    <!-- Franchise Name -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="franchise_id">Franchise</label>
                                        <input type="text" id="franchise_name" name="franchise_name" class="form-control" value="{{ $stock->franchise->name }}" disabled />
                                    </div>

                                    <!-- Franchise Location -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="franchise_location">Location</label>
                                        <input type="text" id="franchise_location" name="franchise_location" class="form-control" value="{{ $stock->franchise->location }}" disabled />
                                    </div>
                                </div>

                                <!-- Food Information Section -->
                                <hr class="my-5" />
                                <div>
                                    <h4 class="mb-0">Food Info</h4>
                                    <p class="mb-4">
                                        Information about the associated food.
                                    </p>

                                    <!-- Food Name -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="food_id">Food</label>
                                        <input type="text" id="food_name" name="food_name" class="form-control" value="{{ $stock->food->foodName }}" disabled />
                                    </div>

                                    <!-- Food Category -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="category">Category</label>
                                        <input type="text" id="category" name="category" class="form-control" value="{{ $stock->food->category->name }}" disabled />
                                    </div>

                                    <!-- Food Description -->
                                    <div class="form-group col-12">
                                        <label class="form-label" for="description">Description</label>
                                        <textarea id="description" name="description" class="form-control" disabled>{{ $stock->food->description }}</textarea>
                                    </div>

                                    <!-- Ingredients -->
                                    <div class="form-group col-12">
                                        <label class="form-label" for="ingredients">Ingredients</label>
                                        <textarea id="ingredients" name="ingredients" class="form-control" disabled>{{ implode(', ', json_decode($stock->food->ingredients, true)) }}</textarea>
                                    </div>
                                </div>

                                <!-- Stock Information Section -->
                                <hr class="my-5" />
                                <div>
                                    <h4 class="mb-0">Stock Details</h4>
                                    <p class="mb-4">
                                        View the stock information and quantity.
                                    </p>

                                    <!-- Quantity -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="quantity">Quantity</label>
                                        <div class="d-flex align-items-center">
                                            <button class="btn btn-outline-primary" type="button">-</button>
                                            <input type="number" id="quantity" name="quantity" class="form-control text-center mx-3" value="{{ $stock->quantity }}" disabled style="font-size: 2rem; font-weight: bold; border-radius: 15px; width: 100px;" />
                                            <button class="btn btn-outline-primary" type="button">+</button>
                                        </div>
                                    </div>

                                    <!-- Expiration Date -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="expiration_date">Expiration Date</label>
                                        <input type="date" id="expiration_date" name="expiration_date" class="form-control" value="{{ $stock->expiration_date->format('Y-m-d') }}" disabled />
                                    </div>

                                    <div class="col-12">
                                        <!-- Button -->
                                        <div class="d-flex justify-content-end mt-4">
                                            <a href="{{ route('stocks.edit', $stock->id) }}" class="btn btn-primary">Edit Stock</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End of card -->
                    </div> <!-- End of column -->
                </div> <!-- End of row -->
            </div> <!-- End of container-fluid -->
        </section>
    </main>

    <!-- Footer Agent -->
    @include('layouts.footer-agent')

@endsection
