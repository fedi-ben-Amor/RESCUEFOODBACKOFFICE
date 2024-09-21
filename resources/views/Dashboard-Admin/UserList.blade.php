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
                    Students
                    <span class="font-size-sm text-muted">(1,22,105 )</span>
                  </h1>
                  <!-- Breadcrumb  -->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="admin-dashboard.html">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#!">User</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Students
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
                    <input type="search" class="form-control" placeholder="Search Students" />
                  </div>
                  <div class="row">
                    <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                      <!-- Card -->
                      <div class="card mb-4">
                        <!-- Card body -->
                        <div class="card-body">
                          <div class="text-center">
                            <div class="position-relative">
                              <img src="../assets/images/avatar/avatar-12.jpg" class="rounded-circle avatar-xl mb-3" alt="" />
                              <a href="#!" class="position-absolute mt-10 ml-n5">
                                <span class="status bg-success"></span>
                              </a>
                            </div>
                            <h4 class="mb-0">Esther Howard</h4>
                            <p class="mb-0">
                              <i class="fe fe-map-pin mr-1 font-size-xs"></i>United States
                            </p>
                          </div>
                          <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                            <span>Payments</span>
                            <span class="text-dark">$5,274</span>
                          </div>
                          <div class="d-flex justify-content-between border-bottom py-2">
                            <span>Joined at</span>
                            <span> 17 Aug, 2020 </span>
                          </div>
                          <div class="d-flex justify-content-between pt-2">
                            <span>Courses</span>
                            <span class="text-dark"> 12 </span>
                          </div>
                        </div>
                      </div>
                    </div>
                  
                    
                    <div class="col-lg-12 col-md-12 col-12">
                      <!-- Pagination -->
                      <nav>
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
                <!-- Tab Pane -->
                <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                  <!-- Card -->
                  <div class="card">
                    <!-- Card Header -->
                    <div class="card-header">
                      <input type="search" class="form-control" placeholder="Search Students" />
                    </div>
                    <!-- Table -->
                    <div class="table-responsive">
                      <table class="table mb-0 text-nowrap">
                        <thead>
                          <tr>
                            <th scope="col" class="border-0">Name</th>
                            <th scope="col" class="border-0">Enrolled</th>
                            <th scope="col" class="border-0">Joined At</th>
                            <th scope="col" class="border-0">
                              TotaL PAYMENT
                            </th>
                            <th scope="col" class="border-0">Locations</th>
                            <th scope="col" class="border-0"></th>
                            <th scope="col" class="border-0"></th>
                            <th scope="col" class="border-0"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="align-middle border-top-0">
                              <div class="d-flex align-items-center">
                                <div class="position-relative">
                                  <img src="../assets/images/avatar/avatar-11.jpg" alt=""
                                    class="rounded-circle avatar-md mr-2" />
                                  <a href="#!" class="position-absolute mt-5 ml-n4">
                                    <span class="status bg-success"></span>
                                  </a>
                                </div>
                                <h5 class="mb-0">Guy Hawkins</h5>
                              </div>
                            </td>
                            <td class="align-middle border-top-0">
                              6 Courses
                            </td>
                            <td class="align-middle border-top-0">
                              7 July, 2020
                            </td>
                            <td class="align-middle border-top-0">$5,274</td>
                            <td class="align-middle border-top-0">
                              Los Angeles, CA
                            </td>
                            <td class="align-middle border-top-0">
                              <a href="#!" class="fe fe-mail text-muted" data-toggle="tooltip" data-placement="top"
                                title="Message">
                              </a>
                            </td>
                            <td class="align-middle border-top-0">
                              <a href="#!" class="text-muted" data-toggle="tooltip" data-placement="top"
                                title="Delete"><i class="fe fe-trash"></i></a>
                            </td>
                            <td class="text-muted px-4 py-3 align-middle border-top-0">
                              <span class="dropdown">
                                <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown"
                                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <i class="fe fe-more-vertical"></i>
                                </a>
                                <span class="dropdown-menu" aria-labelledby="courseDropdown">
                                  <span class="dropdown-header">Settings</span>
                                  <a class="dropdown-item" href="#!"><i
                                      class="fe fe-edit dropdown-item-icon"></i>Edit</a>
                                  <a class="dropdown-item" href="#!"><i
                                      class="fe fe-trash dropdown-item-icon"></i>Remove</a>
                                </span>
                              </span>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <nav>
                        <ul class="pagination justify-content-center pb-3 pt-4">
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

    </div>
  </div>
