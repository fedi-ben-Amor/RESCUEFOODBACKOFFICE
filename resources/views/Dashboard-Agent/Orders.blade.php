@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            @include('layouts.navbar-agent')
            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navbar -->
                    @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card mb-4 shadow-sm">
                        <!-- Card header -->
                        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                            <h3 class="mb-0"><i class="fas fa-shopping-cart"></i> Orders</h3>
                            <span class="font-weight-light">Quick overview of all current orders.</span>
                        </div>
                        
                        <!-- Formulaire de recherche -->
                        <div class="card-body">
                            <form method="GET" action="{{ route('orders.index') }}">
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="city" class="form-control border rounded-pill" placeholder="Search by city" value="{{ request('city') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <input type="text" name="adresse" class="form-control border rounded-pill" placeholder="Search by address" value="{{ request('adresse') }}">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <button type="submit" class="btn btn-primary rounded-pill w-100"><i class="fas fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table mb-0 text-nowrap table-hover table-centered">
                                <thead class="table-primary">
                                    <tr>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">City</th>
                                        <th class="text-center">Address</th>
                                        <th class="text-center">Phone</th>
                                        <th class="text-center">Cart Items</th>
                                        <th class="text-center">Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr class="align-middle">
                                        <td class="text-center"><span class="badge badge-info">{{ $order->status }}</span></td>
                                        <td class="text-center">{{ $order->city }}</td>
                                        <td class="text-center">{{ $order->adresse }}</td>
                                        <td class="text-center">{{ $order->user->tel_mobile }}</td>
                                        <td class="text-center">
                                            @foreach($order->cart as $item)
                                            <div class="mb-2">
                                                <strong>{{ $item['name'] }}</strong><br>
                                                <small>Price: {{ $item['sellPrice'] }} | Quantity: {{ $item['quantity'] }}</small><br>
                                                <strong>Ingredients:</strong> 
                                                <ul class="list-unstyled">
                                                    @foreach($item['ingredients'] as $ingredient)
                                                    - {{ $ingredient }}
                                                    @endforeach
                                                </ul>
                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" class="img-fluid rounded shadow-sm" width="50">
                                            </div>
                                            @endforeach
                                        </td>
                                        <td class="text-center">
                                            <strong>{{ $order->total_amount }} TND</strong>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="card-footer">
                            <nav aria-label="Page navigation" class="d-flex justify-content-center">
                                {{ $orders->links('pagination::bootstrap-4') }} <!-- Use this line for Bootstrap 4 pagination -->
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer-agent')
@endsection
