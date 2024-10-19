
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
          <div class="row">
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
              <!-- Card -->
              <div class="card mb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                      <span class="font-size-xs text-uppercase font-weight-semi-bold">Agent</span>
                    </div>
                    <div>
                      <span class="fe fe-shopping-bag font-size-lg text-primary"></span>
                    </div>
                  </div>
                  <h2 class="font-weight-bold mb-1">
                  {{$Agent}}
                  </h2>
                  <span class="text-success font-weight-semi-bold">{{$AgentCountbyWeek}}</span>
                  <span class="ml-1 font-weight-medium">in this week</span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
              <!-- Card -->
              <div class="card mb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                      <span class="font-size-xs text-uppercase font-weight-semi-bold">Client</span>
                    </div>
                    <div>
                      <span class=" fe fe-book-open font-size-lg text-primary"></span>
                    </div>
                  </div>
                  <h2 class="font-weight-bold mb-1">
                    {{$Client}}
                  </h2>
                  <span class="text-danger font-weight-semi-bold">{{$ClientCountbyWeek}}</span>
                  <span class="ml-1 font-weight-medium">in this week</span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
              <!-- Card -->
              <div class="card mb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                      <span class="font-size-xs text-uppercase font-weight-semi-bold">Restaurant</span>
                    </div>
                    <div>
                      <span class=" fe fe-users font-size-lg text-primary"></span>
                    </div>
                  </div>
                  <h2 class="font-weight-bold mb-1">
                    {{$totalRestaurants}}
                  </h2>
                  <span class="text-success font-weight-semi-bold">{{$restaurantsThisWeek}}</span>
                  <span class="ml-1 font-weight-medium">in this week</span>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-md-12 col-12">
              <!-- Card -->
              <div class="card mb-4">
                <!-- Card body -->
                <div class="card-body">
                  <div class="d-flex align-items-center justify-content-between mb-3 lh-1">
                    <div>
                      <span class="font-size-xs text-uppercase font-weight-semi-bold">Orders</span>
                    </div>
                    <div>
                      <span class=" fe fe-user-check font-size-lg text-primary"></span>
                    </div>
                  </div>
                  <h2 class="font-weight-bold mb-1">
                    {{$totalOrders}}
                  </h2>
                  <span class="text-success font-weight-semi-bold">{{$ordersThisWeek}}</span>
                  <span class="ml-1 font-weight-medium"> in this week</span>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-8 col-lg-12 col-md-12 col-12">
              <!-- Card -->
              <div class="card mb-4">
                <!-- Card header -->
                <div class="card-header align-items-center card-header-height d-flex justify-content-between align-items-center">
                  <div>
                    <h4 class="mb-0">Earnings</h4>
                  </div>
                  <div>
                    <div class="dropdown dropleft">
                      <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown1"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="courseDropdown1">
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
                <!-- Card body -->
                <div class="card-body">
                  <!-- Earning chart -->
                  <div id="earning" ></div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-12">
              <!-- Card -->
              <div class="card mb-4">
                <!-- Card header -->
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
                <!-- Card body -->
                <div class="card-body">
                  <div id="traffic" class="apex-charts d-flex justify-content-center"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
              <!-- Card -->
              <div class="card h-100">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                  <h4 class="mb-0">Users of week</h4>
                  <a href="#!" class="btn btn-outline-white btn-sm">View all</a>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <!-- List group -->
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0 pt-0 ">
                      <div class="row">
                        <div class="col-auto">
                          <div class="avatar avatar-md avatar-indicators avatar-offline">
                            <img alt="avatar" src="../assets/images/avatar/avatar-1.jpg" class="rounded-circle">
                          </div>
                        </div>
                        <div class="col ml-n3">
                          <h4 class="mb-0 h5">Rob Percival</h4>
                          <span class="mr-2 font-size-xs">
                            <span class="text-dark  mr-1 font-weight-semi-bold">42</span>Courses</span>
                          <span class="mr-2 font-size-xs">
                            <span class="text-dark  mr-1 font-weight-semi-bold">1,10,124</span>Students</span>
                          <span class="font-size-xs">
                            <span class="text-dark  mr-1 font-weight-semi-bold">32,000</span>
                            Reviews
                          </span>
                        </div>
                        <div class="col-auto">
                          <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown7"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown7">
                              <span class="dropdown-header">Settings</span>
                              <a class="dropdown-item" href="#!"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                              <a class="dropdown-item" href="#!"><i class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                            </span>
                          </span>
                        </div>
                      </div>

                    </li>
                  
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-12 col-12 mb-4">
              <!-- Card -->
              <div class="card h-100">
                <!-- Card header -->
                <div class="card-header d-flex align-items-center
                              justify-content-between card-header-height">
                  <h4 class="mb-0">Restaurant of week</h4>
                  <a href="#!" class="btn btn-outline-white btn-sm">View all</a>
                </div>
                <!-- Card body -->
                <div class="card-body">
                  <!-- List group flush -->
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item px-0 pt-0">
                      <div class="row">
                        <!-- Col -->
                        <div class="col-auto">
                          <a href="#!">
                            <img src="../assets/images/course/course-laravel.jpg" alt=""
                              class="img-fluid rounded img-4by3-lg" /></a>
                        </div>
                        <!-- Col -->
                        <div class="col pl-0">
                          <a href="#!">
                            <h5 class="text-primary-hover">
                              Revolutionize how you build the web...
                            </h5>
                          </a>
                          <div class="d-flex align-items-center">
                            <img src="../assets/images/avatar/avatar-7.jpg" alt="" class="rounded-circle avatar-xs mr-2" />
                            <span class="font-size-xs">Brooklyn Simmons</span>
                          </div>
                        </div>
                        <!-- Col auto -->
                        <div class="col-auto">
                          <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Settings</span>
                              <a class="dropdown-item" href="#!"><i class="fe fe-edit dropdown-item-icon "></i>Edit</a>
                              <a class="dropdown-item" href="#!"><i
                                  class="fe fe-trash dropdown-item-icon "></i>Remove</a>
                            </span>
                          </span>
                        </div>
                      </div>
                    </li>
                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12 col-12 mb-4">
              <!-- Card -->
    
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection
 