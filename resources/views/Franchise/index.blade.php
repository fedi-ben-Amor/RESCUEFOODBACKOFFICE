@extends('layouts.app')
<!-- Wrapper -->
<div id="db-wrapper">
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
                    <div class="border-bottom pb-4 mb-4 d-flex justify-content-between align-items-center">
                        <div class="mb-2 mb-lg-0">
                            <h1 class="mb-1 h2 font-weight-bold">
                                Franchises
                                <span class="font-size-sm text-muted">({{ $franchises->count() }} Total)</span>
                            </h1>
                            <!-- Breadcrumb  -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">Franchise</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Franchises
                                    </li>
                                </ol>
                            </nav>
                        </div>
                        <div class="nav btn-group" role="tablist">
                            <button class="btn btn-outline-white active" data-toggle="tab" data-target="#tabPaneGrid" role="tab"
                                    aria-controls="tabPaneGrid" aria-selected="true">
                                <span class="fe fe-grid"></span>
                            </button>
                            <button class="btn btn-outline-white" data-toggle="tab" data-target="#tabPaneList" role="tab"
                                    aria-controls="tabPaneList" aria-selected="false">
                                <span class="fe fe-list"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Tab -->
                    <div class="tab-content">
                        <!-- Tab Pane -->
                        <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                            <div class="mb-4">
                                <input type="search" class="form-control" placeholder="Search Franchises" />
                            </div>
                            <div class="row">
                                @foreach($franchises as $franchise)
                                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                        <!-- Card -->
                                        <div class="card mb-4">
                                            <!-- Card body -->
                                            <div class="card-body">
                                                <div class="text-center">
                                                    <div class="position-relative">
                                                        <!-- Placeholder Image -->
                                                        <img src="{{ asset('path/to/default/image.jpg') }}" class="rounded-circle avatar-xl mb-3" alt="Franchise Image" />
                                                        <a href="#!" class="position-absolute mt-10 ml-n5">
                                                            <span class="status bg-success"></span>
                                                        </a>
                                                    </div>
                                                    <h4 class="mb-0">{{ $franchise->name }}</h4>
                                                    <p class="mb-0">
                                                        <i class="fe fe-map-pin mr-1 font-size-xs"></i>{{ $franchise->location }}
                                                    </p>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                    <span>Manager</span>
                                                    <span class="text-dark">{{ $franchise->manager_name }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between border-bottom py-2">
                                                    <span>Contact</span>
                                                    <span>{{ $franchise->contact_number }}</span>
                                                </div>
                                                <div class="d-flex justify-content-between pt-2">
                                                    <span>Email</span>
                                                    <span class="text-dark">{{ $franchise->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <!-- Tab Pane -->
                        <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card Header -->
                                <div class="card-header">
                                    <input type="search" class="form-control" placeholder="Search Franchises" />
                                </div>
                                <!-- Table -->
                                <div class="table-responsive">
                                    <table class="table mb-0 text-nowrap">
                                        <thead>
                                        <tr>
                                            <th scope="col" class="border-0">Name</th>
                                            <th scope="col" class="border-0">Location</th>
                                            <th scope="col" class="border-0">Manager</th>
                                            <th scope="col" class="border-0">Contact</th>
                                            <th scope="col" class="border-0">Email</th>
                                            <th scope="col" class="border-0"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($franchises as $franchise)
                                            <tr>
                                                <td class="align-middle">{{ $franchise->name }}</td>
                                                <td class="align-middle">{{ $franchise->location }}</td>
                                                <td class="align-middle">{{ $franchise->manager_name }}</td>
                                                <td class="align-middle">{{ $franchise->contact_number }}</td>
                                                <td class="align-middle">{{ $franchise->email }}</td>
                                                <td class="align-middle">
                                                    <a href="{{ route('franchises.show', $franchise->id) }}" class="fe fe-eye text-muted" data-toggle="tooltip" data-placement="top" title="View"></a>
                                                    <a href="{{ route('franchises.edit', $franchise->id) }}" class="fe fe-edit text-muted" data-toggle="tooltip" data-placement="top" title="Edit"></a>
                                                    <form action="{{ route('franchises.destroy', $franchise->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="fe fe-trash text-muted btn btn-link" data-toggle="tooltip" data-placement="top" title="Delete" style="padding: 0; border: none; background: none;"></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <nav>
                                        <ul class="pagination justify-content-center pb-3 pt-4">
                                            <!-- Pagination links go here -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
