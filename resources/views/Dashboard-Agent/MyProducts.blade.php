@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container-fluid">
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
                            <div class="row gx-3">
                                <div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
                                    <form method="GET" action="{{ route('dashboard-agent.my-products') }}" class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                                        <span class="position-absolute pl-3 search-icon">
                                            <i class="fe fe-search"></i>
                                        </span>
                                        <input type="search" name="search" class="form-control pl-6" placeholder="Search Food" value="{{ request('search') }}" />
                                    </form>
                                </div>
                                <a href="{{ url('agent/dashboard/foods/create')}}" class="btn btn-primary">Create Food </a>
                            </div>
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
                                    <a class="btn-white btn" href="{{url('/foods/'.$food->id.'/edit')}}">
                                                        <i class="fe fe-edit"></i>
                                                    </a> 
                                                </td>
                                                    <td>
                                                        <form action="{{ route('food.delete', $food->id) }}" method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-white" onclick="return confirm('Are you sure you want to delete this food?');">
                                                                <i class="fe fe-trash"></i>   
                                                            </button>
                                                        </form>
                                                       
                                            
                                        </td>
                                    </tr> 
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="card-footer">
                                <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                                    {{ $foods->links('pagination::bootstrap-4') }} <!-- Use this line for Bootstrap 4 pagination -->
                                </nav>
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