@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container">
            @include('layouts.navbar-agent')
            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navbar -->
                    @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card mb-4">
                        <!-- Card header -->
                        <div class="card-header border-bottom-0">
                            <h3 class="mb-0">Orders</h3>
                            <span>Order Dashboard is a quick overview of all current orders.</span>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive">
                            <table class="table mb-0 text-nowrap table-hover table-centered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Status</th>
                                        <th>City</th>
                                        <th>Address</th>
                                        <th>Phone number</th>
                                        <th>Cart Items</th>
                                        <th>Total Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->status }}</td>
                                        <td>{{ $order->city }}</td>
                                        <td>{{ $order->adresse }}</td>
                                     
                                        
                                          <td>{{ $order->user->tel_mobile }}</td>
                                     
                                       
                                        <td>
                                            @foreach($order->cart as $item)
                                            <div>
                                                <strong>{{ $item['name'] }}</strong><br>
                                                Price: {{ $item['sellPrice'] }}<br>
                                                Quantity: {{ $item['quantity'] }}<br>
                                                Ingredients: {{ implode(', ', $item['ingredients']) }}<br>
                                                <img src="{{ $item['image'] }}" alt="{{ $item['name'] }}" width="50">
                                            </div>
                                            @endforeach
                                        </td>
                                        <td>
                                      
                                            {{ $order->total_amount }} TND
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
