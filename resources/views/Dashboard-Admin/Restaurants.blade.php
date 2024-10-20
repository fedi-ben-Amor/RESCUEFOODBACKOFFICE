@extends('layouts.app')
@section('content')
<div id="db-wrapper">
    <!-- Sidebar -->
    @include('layouts.sidebar-admin')

    <!-- Page Content -->
    <div id="page-content">
        <div class="header">
            <!-- Navbar -->
            @include('layouts.navbar-admin')
        </div>

        <!-- Container fluid -->
        <div class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page Header -->
                    <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                        <div class="mb-2 mb-lg-0">
                            <h1 class="mb-1 h2 font-weight-bold">Restaurant</h1>
                            <!-- Breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="admin-dashboard.html">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#!">Restaurant</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        All
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="add-course.html" class="btn btn-primary">Add New Restaurant</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card rounded-lg">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0 p-0 bg-white">
                            <div>
                                <!-- Nav -->
                                  <ul class="nav nav-lb-tab" id="tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link {{ request('status') == '' ? 'active' : '' }}" href="{{ route('admin.restaurants') }}">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request('status') == 'approved' ? 'active' : '' }}" href="{{ route('admin.restaurants', ['status' => 'approved']) }}">Approved</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request('status') == 'pending' ? 'active' : '' }}" href="{{ route('admin.restaurants', ['status' => 'pending']) }}">Pending</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link {{ request('status') == 'rejected' ? 'active' : '' }}" href="{{ route('admin.restaurants', ['status' => 'rejected']) }}">Rejected</a>
                                    </li>
                                </ul>
                                
                            </div>
                        </div>
                        <div class="p-4 row">
                            <!-- Form -->
                            <form method="GET" action="{{ route('admin.restaurants') }}" class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                                <span class="position-absolute pl-3 search-icon">
                                    <i class="fe fe-search"></i>
                                </span>
                                <input type="search" name="search" class="form-control pl-6" placeholder="Search Restaurant" value="{{ request('search') }}" />
                                <button type="submit" class="btn btn-primary ml-2">Search</button>
                            </form>
                        </div>
                        
                        
                        <div>
                            <!-- Table -->
                            <div class="tab-content" id="tabContent">
                                <!--Tab pane -->
                                <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                    <div class="table-responsive border-0 overflow-y-hidden">
                                        <table class="table mb-0 text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="border-0 text-uppercase">Restaurant ID</th>
                                                    <th scope="col" class="border-0 text-uppercase">Name</th>
                                                    <th scope="col" class="border-0 text-uppercase">Location</th>
                                                    <th scope="col" class="border-0 text-uppercase">Type de cuisine</th>
                                                    <th scope="col" class="border-0 text-uppercase">Status</th>

                                                    <th scope="col" class="border-0 text-uppercase">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($restaurants as $restaurant)
                                              <tr>
                                                <td class="border-top-0">
                                                    @if($restaurant->logo)
                                                        <img src="{{ asset('storage/' . $restaurant->logo) }}" class="img-fluid mb-3" alt="Restaurant Logo" style="width: 50%; max-height: 80px; object-fit: cover;">

                                                        @else
                                                        <p>No logo available</p>
                                                    @endif
                                                </td>
                                                
                                                                                                  <td class="align-middle border-top-0">{{ $restaurant->name }}</td>
                                                  <td class="align-middle border-top-0">{{ $restaurant->city }}</td>
                                                  <td class="align-middle border-top-0">{{ $restaurant->cuisine_type }}</td>
                                              
                                            



                                                  <td class="align-middle border-top-0">
                                                    <!-- Status circle and dropdown -->
                                                    <span class="status-circle" style="background-color: {{ $restaurant->status === 'pending' ? '#ffc107' : ($restaurant->status === 'approved' ? '#28a745' : '#dc3545') }}; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px; vertical-align: middle;"></span>
                                                    <!-- Status with color circle -->
                                                    <form action="{{ route('restaurants.updateStatus', $restaurant->id) }}" method="POST" class="d-inline-block">
                                                        @csrf
                                                        @method('PATCH')
                                                        <select name="status" class="form-control d-inline-block status-select" style="width: auto; display: inline; vertical-align: middle;" onchange="this.form.submit()">
                                                            <option value="pending" {{ $restaurant->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="approved" {{ $restaurant->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                                            <option value="rejected" {{ $restaurant->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                





                                                
                                                
                                                  <td class="align-middle border-top-0">
                                                    <span class="dropdown">
                                                        <a class="text-decoration-none" href="#!" role="button" id="courseDropdown{{ $restaurant->id }}"
                                                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fe fe-more-vertical"></i>
                                                        </a>
                                                        <span class="dropdown-menu" aria-labelledby="courseDropdown{{ $restaurant->id }}">
                                                            <span class="dropdown-header">Actions</span>
                                                            <a class="dropdown-item" href="#!"><i class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>
                                                            <!-- Add the delete action -->
                                                            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this restaurant?');">
                                                                    <i class="fe fe-trash dropdown-item-icon"></i> Delete
                                                                </button>
                                                            </form>
                                                            <a class="dropdown-item" href="{{ route('restaurants.showAdmin', $restaurant->id) }}">
                                                                <i class="fe fe-eye dropdown-item-icon"></i> View Details
                                                            </a>
                                                            
                                                        </span>
                                                    </span>
                                                </td>
                                                
                                              </tr>
                                              @endforeach
                                          </tbody>
                                          
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- Card Footer -->
                       <div class="card-footer">
                        <nav aria-label="Page navigation example" class="d-flex justify-content-center">
                            {{ $restaurants->links('pagination::bootstrap-4') }} <!-- Use this line for Bootstrap 4 pagination -->
                        </nav>
                    </div>
                    

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
