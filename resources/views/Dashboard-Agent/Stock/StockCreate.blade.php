@extends('layouts.app')

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
                    <!-- Create Stock Form -->
                    <div class="card mb-4" style="height: 100%;">
                        <div class="card-body">
                            <h3 class="mb-4">Create New Stock</h3>

                            <!-- Display Validation Errors -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <form action="{{ route('stocks.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="franchise_id">Franchise</label>
                                    <select name="franchise_id" class="form-control" required>
                                        @foreach($franchises as $franchise)
                                            <option value="{{ $franchise->id }}">{{ $franchise->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="food_id">Food</label>
                                    <select name="food_id" class="form-control" required>
                                        @foreach($foods as $food)
                                            <option value="{{ $food['id'] }}">{{ $food['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input type="number" name="quantity" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="expiration_date">Expiration Date</label>
                                    <input type="date" name="expiration_date" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label for="image">Stock Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success">Create Stock</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Footer Agent -->
@include('layouts.footer-agent')
