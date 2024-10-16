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
                            <h3 class="mb-0">Edit Stock</h3>
                            <p class="mb-0">
                                Update stock details and manage your inventory.
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
                                <div>
                                    <a href="#!" class="btn btn-outline-white btn-sm">Update Image</a>
                                    <a href="#!" class="btn btn-outline-danger btn-sm">Delete Image</a>
                                </div>
                            </div>
                            <hr class="my-5" />

                            <!-- Stock Details Form -->
                            <div>
                                <h4 class="mb-0">Stock Details</h4>
                                <p class="mb-4">
                                    Edit your stock information and quantity.
                                </p>
                                <!-- Form -->
                                <form action="{{ route('stocks.update', $stock->id) }}" method="POST" class="form-row" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- FranchiseUseless -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="franchise_id">Franchise</label>
                                        <select name="franchise_id" id="franchise_id" class="form-control" required>
                                            @foreach($franchises as $franchise)
                                                <option value="{{ $franchise->id }}" {{ $stock->franchise_id == $franchise->id ? 'selected' : '' }}>
                                                    {{ $franchise->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Food -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="food_id">Food</label>
                                        <select name="food_id" id="food_id" class="form-control" required>
                                            @foreach($foods as $food)
                                                <option value="{{ $food->id }}" {{ $stock->food_id == $food->id ? 'selected' : '' }}>
                                                    {{ $food->foodName }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Quantity -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="quantity">Quantity</label>
                                        <input type="number" id="quantity" name="quantity" class="form-control" value="{{ $stock->quantity }}"  />
                                        @error('quantity')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <!-- Expiration Date -->
                                    <div class="form-group col-12 col-md-6">
                                        <label class="form-label" for="expiration_date">Expiration Date</label>
                                        <input type="date" id="expiration_date" name="expiration_date" class="form-control" value="{{ $stock->expiration_date->format('Y-m-d') }}"  />
                                        @error('expiration_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <!-- Image -->
                                    <div class="form-group col-12">
                                        <label class="form-label" for="image">Upload New Image</label>
                                        <input type="file" id="image" name="image" class="form-control" />
                                        @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    </div>

                                    <div class="col-12">
                                        <!-- Button -->
                                        <button class="btn btn-primary" type="submit">Update Stock</button>
                                    </div>
                                </form>
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
