@extends('layouts.app')

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
                                        <a class="nav-link active" id="courses-tab" data-toggle="pill" href="#courses" role="tab" aria-controls="courses" aria-selected="true">All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="approved-tab" data-toggle="pill" href="#approved" role="tab" aria-controls="approved" aria-selected="false">Approved</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="pending-tab" data-toggle="pill" href="#pending" role="tab" aria-controls="pending" aria-selected="false">Pending</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="p-4 row">
                            <!-- Form -->
                            <form class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                                <span class="position-absolute pl-3 search-icon">
                                    <i class="fe fe-search"></i>
                                </span>
                                <input type="search" class="form-control pl-6" placeholder="Search Restaurant" />
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
                                                    <th scope="col" class="border-0 text-uppercase">Description</th>
                                                    <th scope="col" class="border-0 text-uppercase">Type de cuisine</th>
                                                    <th scope="col" class="border-0 text-uppercase">Status</th>

                                                    <th scope="col" class="border-0 text-uppercase">ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                              @foreach($restaurants as $restaurant)
                                              <tr>
                                                  <td class="border-top-0">{{ $restaurant->id }}</td>
                                                  <td class="align-middle border-top-0">{{ $restaurant->name }}</td>
                                                  <td class="align-middle border-top-0">{{ $restaurant->description }}</td>
                                                  <td class="align-middle border-top-0">{{ $restaurant->cuisine_type }}</td>
                                                  <td class="align-middle border-top-0">
                                                    <!-- Circle representing the status -->
                                                    <span class="status-circle" style="background-color: {{ $restaurant->status === 'Pending' ? '#ffc107' : ($restaurant->status === 'Approved' ? '#28a745' : '#dc3545') }}; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px; vertical-align: middle;"></span>
                                                    
                                                    <!-- Form for updating the status -->
                                                    <form action="{{ route('restaurants.updateStatus', $restaurant->id) }}" method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('PUT')
                                                        
                                                        <!-- Styled select for status update -->
                                                        <select name="status" onchange="this.form.submit()" style="border: 1px solid #ccc; border-radius: 4px; padding: 5px 10px; background-color: #f8f9fa; cursor: pointer;">
                                                            <option value="Pending" {{ $restaurant->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="Approved" {{ $restaurant->status === 'Approved' ? 'selected' : '' }}>Approved</option>
                                                            <option value="Refused" {{ $restaurant->status === 'Refused' ? 'selected' : '' }}>Refused</option>
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
                                                            <span class="dropdown-header">Settings</span>
                                                            <a class="dropdown-item" href="#!"><i class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>
                                                            <!-- Add the delete action -->
                                                            <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger" onclick="return confirm('Are you sure you want to delete this restaurant?');">
                                                                    <i class="fe fe-trash dropdown-item-icon"></i> Delete
                                                                </button>
                                                            </form>
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
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link mx-1 rounded" href="#!" tabindex="-1" aria-disabled="true"><i class="mdi mdi-chevron-left"></i></a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link mx-1 rounded" href="#!">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link mx-1 rounded" href="#!">2</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link mx-1 rounded" href="#!">3</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link mx-1 rounded" href="#!"><i class="mdi mdi-chevron-right"></i></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
