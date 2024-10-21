@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            <!-- navbar-agent -->
            @include('layouts.navbar-agent')

            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    @include('layouts.sidebar-agent')
                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <!-- Card -->
                            <div class="card border-0 mb-4">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h4 class="mb-0">Create Food</h4>
                                </div>

                                <!-- Card body -->
                                <div class="card-body">
                                    <!-- Food Image Upload --> 
                                    <label for="foodImage" class="form-label">Food Image</label>
                       

                                    <!-- Food Form -->
                                    <div class="mt-4">
                                        <form action="{{ route('food.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <!-- Form Elements -->
                                            <div class="row">
                                                <div>
                                                    <label for="image">Food Image:</label>
                                                    <input type="file" name="image" id="image" class="form-control">
                                                    @error('image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                <!-- Title -->
                                                <div class="form-group col-md-9">
                                                    <label for="foodName" class="form-label">Food Name</label>
                                                    <input type="text" name="foodName" id="foodName" class="form-control text-dark" placeholder="Food Name"  />
                                                    @error('foodName')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>

                                                <!-- Ingredients -->
                                                <div class="form-group col-md-9">
                                                    <label for="ingredients" class="form-label">Ingredients</label>
                                                    <input type="text" name="ingredients" id="ingredients" class="form-control text-dark" placeholder="Separate ingredients by commas"  />
                                                    @error('ingredients')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>

                                                <!-- Description -->
                                                <div class="form-group col-md-9">
                                                    <label for="description" class="form-label">Description</label>
                                                    <textarea name="description" id="description" rows="3" class="form-control text-dark" placeholder="Food Description" ></textarea>
                                                    @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>

                                                <!-- Category -->
                                                <div class="form-group col-md-9">
                                                    <label class="form-label">Category</label>
                                                    <select name="category_id" class="selectpicker form-control" data-width="100%" >
                                                        <option value="">Select Category</option>
                                                        @foreach($categories as $category)
                                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <!-- Stock Total -->
                                                <div class="form-group col-md-9">
                                                    <label for="stockTotal" class="form-label">Stock Total</label>
                                                    <input type="number" name="stockTotal" id="stockTotal" class="form-control text-dark" placeholder="Stock Total"  />
                                                    @error('stockTotal')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="BasePrice" class="form-label">Sell Price</label>
                                                    <input type="number" name="BasePrice" id="BasePrice" class="form-control text-dark" placeholder="Stock Total"  />
                                                    @error('BasePrice')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                                <div class="form-group col-md-9">
                                                    <label for="SellPrice" class="form-label">Buy Price</label>
                                                    <input type="number" name="SellPrice" id="SellPrice" class="form-control text-dark" placeholder="Stock Total"  />
                                                    @error('SellPrice')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>

                                            <!-- Submit Button -->
                                            <button type="submit" class="btn btn-primary">Publish</button>
                                            <a href="#!" class="btn btn-outline-white">Save to Draft</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


    @include('layouts.footer-agent')

@endsection

