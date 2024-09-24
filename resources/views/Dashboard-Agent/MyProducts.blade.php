@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container">
            @include('layouts.navbar-agent')
            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navabar -->
                        @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card mb-4">
                        <!-- Card header -->
                        <div class="card-header">
                            <h3 class="mb-0">Food</h3>
                            <span>Manage your Food and its update like live, draft and insight.</span>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="row gx-3">
                                <div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
                                    <input type="search" class="form-control" placeholder="Search Your Food">
                                </div>
                                <a href="{{ url('agent/dashboard/foods/create')}}" class="btn btn-primary">Create Food </a>
                            </form>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive overflow-y-hidden">
                            <table class="table mb-0 text-nowrap ">
                                <thead class="table-light">
                                    <tr>
                                        <th>Food</th>
                                        <th>Stock</th>
                                        <th>Base Price</th>
                                        <th>Sell Price</th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($foods as $food)
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#">
                                                        <img src={{ asset('storage/' . $food->image) }} alt="" class="img-4by3-lg rounded" />
                                                    </a>
                                                </div>
                                                <div class="ml-3">
                                                    <h4 class="mb-1 h5">
                                                        <a href="#" class="text-inherit">
                                                            {{ $food->foodName }} 
                                                        </a>
                                                    </h4>
                                                    <ul class="list-inline fs-6 mb-0">
                                                        <li class="list-inline-item">
                                                            <span>  {{ $food->category->name }} </span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span class="badge bg-success text-white mt-3">{{$food->stockTotal}} qte</span></td>
                                        <td>
                                            <span class="mt-3">{{$food->BasePrice}}<sup> DT </sup></span>
                                        </td>
                                        <td>
                                            <span class="mt-3">{{$food->BasePrice}}<sup> DT </sup></span>
                                        </td>
                                        <td>
                                                    <a class="btn-white btn" href="#">
                                                        <i class="fe fe-edit"></i>
                                                    </a> 
                                                </td>
                                                    <td>
                                                    <a class="btn-white btn" href="#">
                                                        <i class="fe fe-trash"></i>
                                                      
                                                    </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>


@include('layouts.footer-agent')
@endsection