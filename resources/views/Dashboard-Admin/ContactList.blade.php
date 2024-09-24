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
                    <h1 class="mb-1 h2 font-weight-bold">Contact</h1>
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                          <a href="admin-dashboard.html">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                          <a href="#!">Contact</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                          All
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
                  <div class="card-header border-bottom-0 p-0 bg-white">
                    <div>
                      <!-- Nav -->
                      <ul class="nav nav-lb-tab" id="tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link {{ request('status') == '' ? 'active' : '' }}" href="{{ route('contactList') }}">All</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('status') == 'approved' ? 'active' : '' }}" href="{{ route('contactList', ['status' => 'approved']) }}">Approved</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request('status') == 'pending' ? 'active' : '' }}" href="{{ route('contactList', ['status' => 'pending']) }}">Pending</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="p-4 row">
                    <!-- Form -->
                    <form method="GET" action="{{ route('contactList') }}" class="d-flex align-items-center col-12 col-md-12 col-lg-12">
                        <span class="position-absolute pl-3 search-icon">
                            <i class="fe fe-search"></i>
                        </span>
                        <input type="search" name="search" class="form-control pl-6" placeholder="Search Contact" value="{{ request('search') }}" />
                    </form>
                  </div>
                  <div>
                    <!-- Table -->
                    <div class="tab-content" id="tabContent">
											<!--Tab pane -->
                      <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                        <div class="table-responsive border-0 overflow-y-hidden">
                          <table class="table mb-0 text-nowrap">
                            <thead>
                              <tr>
                                <th scope="col" class="border-0 text-uppercase">
                                  Contact
                                </th>
                                <th scope="col" class="border-0 text-uppercase">
                                  name
                                </th>
                                <th scope="col" class="border-0 text-uppercase">
                                    email
                                  </th>
                                  <th scope="col" class="border-0 text-uppercase">
                                    phone
                                  </th>
                                <th scope="col" class="border-0 text-uppercase">
                                  STATUS
                                </th>
                                <th scope="col" class="border-0 text-uppercase">
                                  ACTION
                                </th>
                                <th scope="col" class="border-0 text-uppercase"></th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse($contacts as $contact)
                              <tr>
                                <td class="border-top-0">
                                  <a href="#!" class="text-inherit">
                                    <div class="d-lg-flex align-items-center">
                                      <div class="ml-lg-3 mt-2 mt-lg-0">
                                        <h4 class="mb-1 text-primary-hover">
                                        {{$contact->subject}}
                                        </h4>
                                        <span class="text-inherit"> {{$contact->message}}</span>
                                      </div>
                                    </div>
                                  </a>
                                </td>
                                <td class="align-middle border-top-0">
                                  <div class="d-flex align-items-center">
                                    <h5 class="mb-0"> {{$contact->name}}</h5>
                                  </div>
                                </td>
                                <td class="align-middle border-top-0">
                                    <div class="d-flex align-items-center">
                                      <h5 class="mb-0"> {{$contact->email}}</h5>
                                    </div>
                                  </td>
                                  <td class="align-middle border-top-0">
                                    <div class="d-flex align-items-center">
                                      <h5 class="mb-0"> {{$contact->phone}}</h5>
                                    </div>
                                  </td>
                                <td class="align-middle border-top-0">
                                  <span class="badge-dot bg-warning mr-1 d-inline-block align-middle"></span> {{$contact->status}}
                                </td>
                                <td class="align-middle border-top-0">
                                  <a href="#!" class="btn btn-outline-white btn-sm">Reject</a>
                                  <a href="#!" class="btn btn-success btn-sm">Approved</a>
                                </td>
                                <td class="align-middle border-top-0">
                                  <span class="dropdown">
                                  <a class="text-decoration-none" href="#!" role="button" id="courseDropdown1"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                  </a>
                                  <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="#!"><i
                                    class="fe fe-x-circle dropdown-item-icon"></i>Reject with Feedback</a>
                                  </span>
                                  </span>
                                </td>
                              </tr>
                              @empty
                              <tr>
                                  <td colspan="6" class="text-center">No contacts found.</td>
                              </tr>
                          @endforelse
                            </tbody>
                          </table>
                        </div>
											</div>
											<!--Tab pane -->
                  
                        
											</div>
											<!--Tab pane -->
             
                    </div>
									</div>
                  <!-- Card Footer -->
                  <div class="card-footer">
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center mb-0">
                        <li class="page-item disabled">
                          <a class="page-link mx-1 rounded" href="#!" tabindex="-1" aria-disabled="true"><i
                            class="mdi mdi-chevron-left"></i></a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link mx-1 rounded" href="#!">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link mx-1 rounded" href="#!">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link mx-1 rounded" href="#!">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link mx-1 rounded" href="#!"><i class="mdi mdi-chevron-right"></i></a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>