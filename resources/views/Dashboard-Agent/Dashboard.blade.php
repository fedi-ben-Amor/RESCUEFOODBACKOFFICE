@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container">
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
                                        <span>Revenues this month</span>
                                        <span class="badge bg-success ms-2">${{ number_format($monthlyRevenue, 2) }}</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="fs-6 text-uppercase fw-semibold">Most Available Food Items</span>
                                    <ul class="list-group">
                                      @foreach($mostSoldFoods as $food)
                                          <li class="list-group-item d-flex justify-content-between align-items-center">
                                              {{ $food['foodName'] }} 
                                              <span class="badge bg-info">{{ $food['total_sales'] }}</span> 
                                          </li>
                                      @endforeach
                                  </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-12 col-12">
                            <div class="card mb-4">
                                <div class="p-4">
                                    <span class="fs-6 text-uppercase fw-semibold">Restaurant Rating</span>
                                    <h2 class="mt-4 fw-bold mb-1 d-flex align-items-center h1 lh-1">4.80</h2>
                                    <span class="d-flex justify-content-between align-items-center">
                                        <span>Rating this month</span>
                                        <span class="badge bg-warning ms-2">10+</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                    <div class="card mb-4">
                      <div class="card-header">
                          <h3 class="h4 mb-0">Most Sold Foods</h3>
                      </div>
                      <div class="card-body">
                          <ul>
                              @foreach ($mostSoldFoods as $food)
                                  <li>{{ $food['foodName'] }} - {{ $food['total_sales'] }} sold</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
                  
                  <script>
                      var options = {
                          series: [{
                              name: 'Sales',
                              data: {!! json_encode(array_column($chartData, 'total_sales')) !!}
                          }],
                          chart: {
                              type: 'bar',
                              height: 350
                          },
                          xaxis: {
                              categories: {!! json_encode(array_column($chartData, 'month')) !!}
                          }
                      };
                  
                      var chart = new ApexCharts(document.querySelector("#orderColumn"), options);
                      chart.render();
                  </script>
                  

                  
                
                  
                  
                </div>
            </div>
        </div>
    </section>
</main>
@include('layouts.footer-agent')
@endsection

