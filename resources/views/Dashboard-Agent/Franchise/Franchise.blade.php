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
                        <!-- Page Header -->
                        <div class="border-bottom pb-4 mb-4 d-flex justify-content-between align-items-center">
                            <div class="mb-2 mb-lg-0">
                                <h1 class="mb-1 h2 font-weight-bold">
                                    Franchises
                                    <span class="font-size-sm text-muted">({{ $franchises->total() }} Total)</span>
                                </h1>
                            </div>
                            <div class="d-flex align-items-center">
                                <!-- Add New Franchise Button -->
                                <a href="{{ route('franchises.create') }}" class="btn btn-primary mr-3">
                                    <i class="fe fe-plus"></i> Add New Franchise
                                </a>
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

                        <!-- Franchises Grid/List -->
                        <div class="tab-content">
                            <!-- Grid View -->
                            <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                                <div class="mb-4">
                                    <input type="search" class="form-control" placeholder="Search Franchises" />
                                </div>
                                <div class="row">
                                    @foreach($franchises as $franchise)
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                            <!-- Card with link to detailed view -->
                                            <a href="{{ route('franchises.show', $franchise->id) }}" class="card mb-4" style="height: 100%;">
                                                <div class="card-body d-flex flex-column">
                                                    <div class="text-center">
                                                        <div class="position-relative">
                                                            @if($franchise->image_data)
                                                                <!-- Display the base64 image -->
                                                                <img src="data:image/jpeg;base64,{{ $franchise->image_data }}" class="img-fluid mb-3" alt="Franchise Image" style="width: 100%; max-height: 200px; object-fit: cover;" />
                                                            @else
                                                                <!-- Display placeholder if image is not available -->
                                                                <img src="{{ asset('path/to/default/image.jpg') }}" class="img-fluid mb-3" alt="Franchise Image" style="width: 100%; max-height: 200px; object-fit: cover;" />
                                                            @endif
                                                        </div>
                                                        <h4 class="mb-0">{{ $franchise->name }}</h4>
                                                        <p class="mb-0">
                                                            <i class="fe fe-map-pin mr-1 font-size-xs"></i>{{ $franchise->location }}
                                                        </p>
                                                    </div>
                                                    <div class="mt-auto">
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
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center mt-4 mb-4">
                                    {{ $franchises->links() }}
                                </div>
                            </div>

                            <!-- List View -->
                            <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                <div class="card">
                                    <div class="card-header">
                                        <input type="search" class="form-control" placeholder="Search Franchises" />
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0 text-nowrap">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="border-0">Name</th>
                                                <th scope="col" class="border-0">Location</th>
                                                <th scope="col" class="border-0">Manager</th>
                                                <th scope="col" class="border-0">Contact</th>
                                                <th scope="col" class="border-0">Email</th>
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
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                            {{ $franchises->links() }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End of Tab Content -->
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer Agent -->
    @include('layouts.footer-agent')
@endsection
