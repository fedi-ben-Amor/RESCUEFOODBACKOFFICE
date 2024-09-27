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
                                        <a href="">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="">Restaurants</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Details
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card rounded-lg">
                        <!-- Card header -->
                        <div class="card-header">
                            <h2 class="font-weight-bold">{{ $restaurent->name }}</h2>
                            <div class="cover-image">
                                <img src="{{ asset('storage/' . $restaurent->picture) }}" class="img-fluid w-100" alt="{{ $restaurent->name }} cover image" style="height: 200px; object-fit: cover;">
                            </div>

                            <!-- Card header -->
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <!-- Restaurant Logo -->
                                <img src="{{ asset('storage/' . $restaurent->logo) }}" alt="Restaurant Logo" class="img-fluid" style="height: 100px; width: auto;">
                            </div>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <p><strong>Description:</strong> {{ $restaurent->description ?? 'Not available' }}</p>

                            <p><strong>Location:</strong> {{ $restaurent->city ?? 'Not available' }}</p>
                            <p><strong>Address:</strong> {{ $restaurent->address ?? 'Not available' }}</p>
                            <p><strong>State:</strong> {{ $restaurent->state ?? 'Not available' }}</p>

                            <p><strong>Created At:</strong> 
                                @if($restaurent->created_at)
                                    {{ $restaurent->created_at->format('d M Y') }}
                                @else
                                    Not available
                                @endif
                            </p>

                            <p><strong>Updated At:</strong> 
                                @if($restaurent->updated_at)
                                    {{ $restaurent->updated_at->format('d M Y') }}
                                @else
                                    Not available
                                @endif
                            </p>
                            <td class="align-middle border-top-0">
                                <!-- Status circle and dropdown -->
                                <span class="status-circle" style="background-color: {{ $restaurent->status === 'pending' ? '#ffc107' : ($restaurent->status === 'approved' ? '#28a745' : '#dc3545') }}; display: inline-block; width: 12px; height: 12px; border-radius: 50%; margin-right: 8px; vertical-align: middle;"></span>
                                <!-- Status with color circle -->
                                <form action="{{ route('restaurants.updateStatus', $restaurent->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="form-control d-inline-block status-select" style="width: auto; display: inline; vertical-align: middle;" onchange="this.form.submit()">
                                        <option value="pending" {{ $restaurent->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="approved" {{ $restaurent->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                        <option value="rejected" {{ $restaurent->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                                    </select>
                                </form>
                            </td>
                            
                        </div>
                      
                       <!-- Card footer -->
                        <div class="card-footer text-right">
                            <a href="{{ route('admin.restaurants') }}" class="btn btn-secondary">Back to List</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
