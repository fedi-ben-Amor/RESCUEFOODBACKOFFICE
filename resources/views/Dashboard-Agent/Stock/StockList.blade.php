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
                                    Stocks
                                    <span class="font-size-sm text-muted">({{ $stocks->total() }} Total)</span>
                                </h1>
                                <a href="{{ route('stocks.create') }}" class="btn btn-primary">New Stock</a>
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

                        <!-- Stocks Grid/List -->
                        <div class="tab-content">
                            <!-- Grid View -->
                            <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                                <div class="mb-4">
                                    <input type="search" class="form-control" id="search" placeholder="Search Stocks" />
                                </div>
                                <div class="row" id="stocks-grid">
                                    @php
                                        $franchiseColors = []; // Array to store colors assigned to each franchise
                                        $colors = ['#FFFFCC', '#FFCC99', '#CCFFFF', '#FFCCCC', '#CCCCFF']; // Array of light colors
                                        $colorIndex = 0;
                                    @endphp

                                    @foreach($stocks as $stock)
                                        @php
                                            $franchise = $stock->franchise;
                                            // Assign a color to the franchise if not already assigned
                                            if (!isset($franchiseColors[$franchise->id])) {
                                                $franchiseColors[$franchise->id] = $colors[$colorIndex % count($colors)];
                                                $colorIndex++;
                                            }
                                            $cardColor = $franchiseColors[$franchise->id];
                                        @endphp
                                        <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                                            <!-- Card with link to detailed view -->
                                            <a href="{{ route('stocks.show', $stock->id) }}" class="card mb-4" style="background-color: {{ $cardColor }}; height: 100%;">
                                                <div class="card-body d-flex flex-column">
                                                    <div class="text-center">
                                                        <div class="position-relative">
                                                            @if ($stock->image_data)
                                                                <img src="data:image/jpeg;base64,{{ $stock->image_data }}" class="img-fluid mb-3" alt="Stock Image" style="width: 100%; max-height: 200px; object-fit: cover;" />
                                                            @else
                                                                <img src="{{ asset('path/to/default/image.jpg') }}" class="img-fluid mb-3" alt="Stock Image" style="width: 100%; max-height: 200px; object-fit: cover;" />
                                                            @endif
                                                        </div>
                                                        <h4 class="mb-0">{{ $franchise->name }}</h4>
                                                        <p class="mb-0">
                                                            <i class="fe fe-map-pin mr-1 font-size-xs"></i>{{ $franchise->location }}
                                                        </p>
                                                    </div>
                                                    <div class="mt-auto">
                                                        <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                                            <span>Food</span>
                                                            <span class="text-dark">{{ $stock->food->foodName }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between border-bottom py-2">
                                                            <span>Quantity</span>
                                                            <span>{{ $stock->quantity }}</span>
                                                        </div>
                                                        <div class="d-flex justify-content-between pt-2">
                                                            <span>Expires</span>
                                                            <span class="text-dark">{{ $stock->expiration_date->format('Y-m-d') }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex justify-content-center mt-4 mb-4">
                                    {{ $stocks->links() }}
                                </div>
                            </div>

                            <!-- List View -->
                            <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                                <div class="card">
                                    <div class="card-header">
                                        <input type="search" class="form-control" id="search-list" placeholder="Search Stocks" />
                                    </div>
                                    <div class="table-responsive">
                                        <table class="table mb-0 text-nowrap" id="stocks-list">
                                            <thead>
                                            <tr>
                                                <th scope="col" class="border-0">Food</th>
                                                <th scope="col" class="border-0">Quantity</th>
                                                <th scope="col" class="border-0">Expiration Date</th>
                                                <th scope="col" class="border-0">Franchise</th>
                                                <th scope="col" class="border-0">Location</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($stocks as $stock)
                                                <tr style="background-color: {{ $franchiseColors[$stock->franchise->id] }};">
                                                    <td class="align-middle">
                                                        <a href="{{ route('stocks.show', $stock->id) }}">
                                                            {{ $stock->food->foodName }}
                                                        </a>
                                                    </td>
                                                    <td class="align-middle">{{ $stock->quantity }}</td>
                                                    <td class="align-middle">{{ $stock->expiration_date->format('Y-m-d') }}</td>
                                                    <td class="align-middle">{{ $stock->franchise->name }}</td>
                                                    <td class="align-middle">{{ $stock->franchise->location }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <div class="d-flex justify-content-center">
                                            {{ $stocks->links() }}
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
