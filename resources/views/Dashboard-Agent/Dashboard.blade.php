@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            @include('layouts.navbar-agent')

            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="fs-6 text-uppercase fw-semibold">Revenue</span>
                                    <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">${{ number_format($totalRevenue, 2) }}</h2>
                                    <span class="d-flex justify-content-between align-items-center">
                                        <span>Earning this month</span>
                                        <span class="badge bg-success ms-2">${{ number_format($monthlyRevenue, 2) }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="fs-6 text-uppercase fw-semibold">Stock</span>
                                    <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">{{ $stock}}</h2>
                                    <span class="d-flex justify-content-between align-items-center">
                                     The number of existing food
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="fs-6 text-uppercase fw-semibold">Restaurent Rating</span>
                                    <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">4.00</h2>
                                    <span class="d-flex justify-content-between align-items-center">
                                        <span>Rating for all your Restaurent</span>
                                   
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card mb-4">
                      <div class="card-header">
                          <h3 class="h4 mb-0">Most Available Food Items</h3>
                      </div>
                      <div class="card-body">
                          <ul class="list-group">
                              @foreach($mostSoldFoods as $food)
                                  <li class="list-group-item d-flex justify-content-between align-items-center">
                                      {{ $food['foodName'] }} <!-- Displaying food name -->
                                      <span class="badge bg-info">{{ $food['total_sales'] }}</span> <!-- Displaying total stock -->
                                  </li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="h4 mb-0">Order</h3>
                        </div>
                        <div class="card-body">
                            <div id="orderColumn" class="apex-charts"></div>
                        </div>
                    </div>


            
                  
                </div>
            </div>
        </div>
    </section>
</main>
@include('layouts.footer-agent')
@endsection

