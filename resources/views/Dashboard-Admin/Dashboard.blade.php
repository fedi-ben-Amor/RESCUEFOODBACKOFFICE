@extends('layouts.app')
@section('content')
  <div id="db-wrapper">
    <!-- Sidebar -->
    @include('Layouts.sidebar-admin')
    <!-- sidebar -->
    <!-- Page Content -->
    <div id="page-content"> 
      <div class="header">
        <!-- navbar -->
        @include('Layouts.navbar-admin')
      </div> 
      <!-- Page Header -->
      <!-- Container fluid -->
      <div class="container-fluid p-4">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom pb-4 mb-4 d-lg-flex justify-content-between align-items-center">
              <div>
                <h1 class="mb-0 h2 font-weight-bold">Dashboard</h1>
                
              </div>
            </div>
          </div>
        </div>

        <!-- Stats Cards -->
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                  <div>
                    <span class="font-size-xs text-uppercase font-weight-semi-bold">Agent</span>
                  </div>
                  <div>
                    <span class="fe fe-shopping-bag font-size-lg text-primary"></span>
                  </div>
                </div>
                <h2 class="font-weight-bold mb-1">{{$Agent}}</h2>
                <span class="text-success font-weight-semi-bold">{{$AgentCountbyWeek}}</span>
                <span class="ml-1 font-weight-medium">in this week</span>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                  <div>
                    <span class="font-size-xs text-uppercase font-weight-semi-bold">Client</span>
                  </div>
                  <div>
                    <span class="fe fe-book-open font-size-lg text-primary"></span>
                  </div>
                </div>
                <h2 class="font-weight-bold mb-1">{{$Client}}</h2>
                <span class="text-danger font-weight-semi-bold">{{$ClientCountbyWeek}}</span>
                <span class="ml-1 font-weight-medium">in this week</span>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                  <div>
                    <span class="font-size-xs text-uppercase font-weight-semi-bold">Restaurant</span>
                  </div>
                  <div>
                    <span class="fe fe-users font-size-lg text-primary"></span>
                  </div>
                </div>
                <h2 class="font-weight-bold mb-1">{{$totalRestaurants}}</h2>
                <span class="text-success font-weight-semi-bold">{{$restaurantsThisWeek}}</span>
                <span class="ml-1 font-weight-medium">in this week</span>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6 col-md-12 col-12">
            <div class="card mb-4">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                  <div>
                    <span class="font-size-xs text-uppercase font-weight-semi-bold">Orders</span>
                  </div>
                  <div>
                    <span class="fe fe-user-check font-size-lg text-primary"></span>
                  </div>
                </div>
                <h2 class="font-weight-bold mb-1">{{$totalOrders}}</h2>
                <span class="text-success font-weight-semi-bold">{{$ordersThisWeek}}</span>
                <span class="ml-1 font-weight-medium"> in this week</span>
              </div>
            </div>
          </div>
        </div>

        <!-- Graphique -->
        <div class="row">
          <div class="col-xl-8 col-lg-12 col-md-12 col-12">
            <div class="card mb-4">
              <div class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Statistiques</h4>
              </div>
              <div class="card-body">
                <canvas id="statsChart"></canvas>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-lg-12 col-md-12 col-12">
            <div class="card mb-4">
              <div class="card-header align-items-center card-header-height  d-flex justify-content-between align-items-center">
                <div>
                  <h4 class="mb-0">Traffic</h4>
                </div>
                <div>
                  <div class="dropdown dropleft">
                    <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown2"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="courseDropdown2">
                      <span class="dropdown-header">Settings</span>
                      <a class="dropdown-item" href="#!"><i
                          class="fe fe-external-link dropdown-item-icon "></i>Export</a>
                      <a class="dropdown-item" href="#!"><i class="fe fe-mail dropdown-item-icon "></i>Email
                        Report</a>
                      <a class="dropdown-item" href="#!"><i
                          class="fe fe-download dropdown-item-icon "></i>Download</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div id="traffic" class="apex-charts d-flex justify-content-center"></div>
              </div>
            </div>
          </div>
        </div>

        <!-- Autres Sections -->
        <div class="row">
          <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between card-header-height">
                <h4 class="mb-0">Agent of the Week</h4>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  @foreach ($AgentbyWeek as $agent)
                    <li class="list-group-item px-0 pt-0 ">
                      <div class="row">
                        <div class="col-auto">
                          <div class="avatar avatar-md">
                            <img alt="avatar" src="{{ asset('storage/' . $agent->picture) }}" class="rounded-circle" style="width: 50px; height: 50px;">
                          </div>
                        </div>
                        <div class="col ml-2">
                          <h4 class="mb-0 h5">{{ $agent->name }}</h4>
                          <span class="mr-2 font-size-xs">
                            <span class="text-dark mr-1 font-weight-semi-bold">{{ $agent->email }}</span> 
                          </span>
                          <br>
                          <span class="font-size-xs">
                            <span class="text-dark mr-1 font-weight-semi-bold">{{ $agent->tel_mobile }}</span>
                          </span>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

          <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
            <div class="card h-100">
              <div class="card-header d-flex align-items-center justify-content-between card-header-height">
                <h4 class="mb-0">Restaurant of the Week</h4>
              </div>
              <div class="card-body">
                <ul class="list-group list-group-flush">
                  @foreach ($RestaurantsByWeek as $restaurant)
                    <li class="list-group-item px-0 pt-0">
                      <div class="row">
                        <div class="col-auto">
                          <a href="#!">
                            <img src="{{ asset('storage/' . $restaurant->logo) }}" alt="{{ $restaurant->name }}" class="img-fluid rounded img-4by3-lg" />
                          </a>
                        </div>
                        <div class="col ml-2">
                          <h4 class="mb-0 h5">{{ $restaurant->name }}</h4>
                          <span class="mr-2 font-size-xs">
                            <span class="text-dark mr-1 font-weight-semi-bold">{{ $restaurant->email }}</span> 
                          </span>
                        </div>
                      </div>
                    </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

       
        </div>
      </div>
      <!-- End Container -->
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      const ctx = document.getElementById('statsChart').getContext('2d');
      const statsChart = new Chart(ctx, {
          type: 'line',
          data: {
              labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'], // Labels for the last 4 weeks
              datasets: [{
                  label: 'Orders Count',
                  data: [{{ $lastFourWeeksOrders[0] }}, {{ $lastFourWeeksOrders[1] }}, {{ $lastFourWeeksOrders[2] }}, {{ $lastFourWeeksOrders[3] }}], // Using the data from the last 4 weeks
                  backgroundColor: 'rgba(75, 192, 192, 0.2)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1,
                  fill: true,
              }]
          },
          options: {
              responsive: true,
              plugins: {
                  legend: {
                      position: 'top',
                  },
                  title: {
                      display: true,
                      text: 'Order Statistics for the Last 4 Weeks'
                  }
              }
          }
      });
  </script>
  
@endsection




