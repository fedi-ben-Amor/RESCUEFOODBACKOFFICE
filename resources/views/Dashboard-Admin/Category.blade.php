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
            <!-- Page Header -->
            <div class="col-lg-12 col-md-12 col-12">
              <div class="border-bottom pb-4 mb-4 d-lg-flex align-items-center justify-content-between">
                <div class="mb-2 mb-lg-0">
                  <h1 class="mb-1 h2 font-weight-bold">Foods Category</h1>
                   <!-- Breadcrumb -->
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="admin-dashboard.html">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="#!">Foods</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Foods Category
                      </li>
                    </ol>
                  </nav>
                </div>
                <div>
                  <a href="#!" class="btn btn-primary" data-toggle="modal" data-target="#newCatgory">Add New
                    Category</a>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
              <!-- Card -->
              <div class="card mb-4">
                <!-- Card header -->
                <div class="card-header border-bottom-0">
                  <!-- Form -->
                  <form class="d-flex align-items-center">
                     <span class="position-absolute pl-3 search-icon">
                      <i class="fe fe-search"></i>
                    </span>
                    <input type="search" class="form-control pl-6" placeholder="Search Course Category" />
                  </form>
                </div>
                <!-- Table -->
                <div class="table-responsive border-0 overflow-y-hidden">
                  <table class="table mb-0 text-nowrap">
                    <thead>
                      <tr>
                        <th class="border-0">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="checkAll" />
                            <label class="custom-control-label" for="checkAll"></label>
                          </div>
                        </th>
                        <th class="border-0">CATEGORY</th>
                        <th class="border-0">SLUG</th>
                        <th class="border-0">NB Food</th>
                        <th class="border-0">DATE CREATED</th>
                        <th class="border-0"></th>
                      </tr>
                    </thead>
                    <tbody>
                 
                    
                      <tr>
                        <td class="align-middle">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="categoryCheck3" />
                            <label class="custom-control-label" for="categoryCheck3"></label>
                          </div>
                        </td>
                        <td class="align-middle">
                          <a href="#!" class="text-inherit">
                            <div class="d-lg-flex align-items-center">
                              <div>
                                <img src="../assets/images/course/course-gatsby.jpg" alt="" class="img-4by3-lg rounded" />
                              </div>
                              <div class="ml-lg-3 mt-2 mt-lg-0">
                                <h4 class="mb-1 text-primary-hover">
                                  Revolutionize how you build the web...
                                </h4>
                                <span class="text-inherit">Added on 7 July, 2021</span>
                              </div>
                            </div>
                           
                          </a>
                        </td>
                        <td class="align-middle">Workshop</td>
                        <td class="align-middle">6</td>
                        <td class="align-middle">16 Oct, 2020</td>
                       
                 
                        <td class="text-muted align-middle">
                          <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Action</span>
                              <a class="dropdown-item" href="#!"><i
                                  class="fe fe-send dropdown-item-icon"></i>Edit</a>
                             
                              <a class="dropdown-item" href="#!"><i
                                  class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                            </span>
                          </span>
                        </td>
                      </tr>
                 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
 <!-- Modal -->
 



  <!-- Modal -->
  <div class="modal fade" id="newCatgory" tabindex="-1" role="dialog" aria-labelledby="newCatgoryLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title mb-0" id="newCatgoryLabel">
            Create New Category
          </h4>
          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
        </button>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group mb-2">
              <label class="form-label" for="title">Title<span class="text-danger">*</span></label>
              <input type="text" class="form-control" placeholder="Write a Category" id="title" required>
              <small>Field must contain a unique value</small>
            </div>
            <div class="form-group mb-2">
              <label class="form-label">Slug</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="slug">https://example.com</span>
                </div>
                <input type="text" class="form-control" id="basic-url" aria-describedby="slug"
                  placeholder="designcourses" required>
              </div>
              <small>Field must contain a unique value</small>
            </div>
            <div class="form-group mb-2">
              <label class="form-label">Parent</label>
              <select class="selectpicker" data-width="100%">
                <option value="">Select</option>
                <option value="Course">Course</option>
                <option value="Tutorial">Tutorial</option>
                <option value="Workshop">Workshop</option>
                <option value="Company">Company</option>
              </select>
            </div>
            <div class="form-group mb-3">
              <label class="form-label">Description</label>
              <div id="editor">
                <br>
                <h4>One Ring to Rule Them All</h4>
                <br>
                <p>
                  Three Rings for the
                  <i> Elven-kingsunder</i> the sky,
                  <br> Seven for the
                  <u>Dwarf-lords</u> in halls of stone, Nine for Mortal Men,
                  <br> doomed to die, One for the Dark Lord on his dark throne.
                  <br> In the Land of Mordor where the Shadows lie.
                  <br>
                  <br>
                </p>
              </div>
            </div>
            <div class="mb-2">
              <label class="form-label">Enabled</label>
              <div class="custom-control custom-switch">
                <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                <label class="custom-control-label" for="customSwitch1"></label>
              </div>
            </div>
            <div>
              <button type="submit" class="btn btn-primary">Add New Category</button>
              <button type="button" class="btn btn-outline-white" data-dismiss="modal">
                Close
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>



    <!-- Modal -->


   <!-- Course Modal -->
   <div class="modal fade" id="courseModal" tabindex="-1" aria-labelledby="courseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header py-4 align-items-lg-center">
          <div class="d-lg-flex">
            <div class="mb-3 mb-lg-0">
              <img src="../../assets/images/svg/feature-icon-1.svg" alt=""
                class=" bg-primary icon-shape icon-xxl rounded-circle">
            </div>
            <div class="ml-lg-4">
              <h2 class="font-weight-bold mb-md-1 mb-3">Introduction to JavaScript <span
                  class="badge badge-warning ml-2">Free</span></h2>
              <p class="text-uppercase font-size-xs font-weight-semi-bold mb-0"><span class="text-dark">Foods -
                  1</span> <span class="ml-3">6 Lessons</span> <span class="ml-3">1 Hour 12 Min</span></p>
            </div>
          </div>
          <button type="button " class="close " data-dismiss="modal" aria-label="Close">
           <i class="fe fe-x-circle "></i>
          </button>
        </div>
        <div class="modal-body">
          <h3>In this course you’ll learn:</h3>
          <p class="font-size-md">Vanilla JS is a fast, lightweight, cross-platform framework for building incredible,
            powerful JavaScript applications.</p>
          <ul class="list-group list-group-flush">
            <!-- List group item -->
            <li class="list-group-item pl-0">
              <a href="#!" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                <div class="text-truncate">
                  <span class="icon-shape bg-light text-primary icon-sm rounded-circle mr-2"><i
                      class="mdi mdi-play font-size-md"></i></span>
                  <span>Introduction</span>
                </div>
                <div class="text-truncate">
                  <span>1m 7s</span>
                </div>
              </a>
            </li>
            <!-- List group item -->
            <li class="list-group-item pl-0">
              <a href="#!" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                <div class="text-truncate">
                  <span class="icon-shape bg-light text-primary icon-sm rounded-circle mr-2"><i
                      class="mdi mdi-play font-size-md"></i></span>
                  <span>Installing Development Software</span>
                </div>
                <div class="text-truncate">
                  <span>3m 11s</span>
                </div>
              </a>
            </li>
            <!-- List group item -->
            <li class="list-group-item pl-0">
              <a href="#!" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                <div class="text-truncate">
                  <span class="icon-shape bg-light text-primary icon-sm rounded-circle mr-2"><i
                      class="mdi mdi-play font-size-md"></i></span>
                  <span>Hello World Project from GitHub</span>
                </div>
                <div class="text-truncate">
                  <span>2m 33s</span>
                </div>
              </a>
            </li>
            <!-- List group item -->
            <li class="list-group-item pl-0">
              <a href="#!" class="d-flex justify-content-between align-items-center text-inherit text-decoration-none">
                <div class="text-truncate">
                  <span class="icon-shape bg-light text-primary icon-sm rounded-circle mr-2"><i
                      class="mdi mdi-play font-size-md"></i></span>
                  <span>Our Sample Javascript Files</span>
                </div>
                <div class="text-truncate">
                  <span>22m 30s</span>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
