@extends('layouts.app')
@section('content')
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
                        <th class="border-0">Active</th>
                        <th class="border-0"></th>
                      </tr>
                    </thead>
                    <tbody>
                 
                      @foreach ($categories as $category)
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
                                <img src={{ asset('storage/' . $category->image) }} alt="" class="img-4by3-lg rounded" />
                              </div>
                              <div class="ml-lg-3 mt-2 mt-lg-0">
                                <h4 class="mb-1 text-primary-hover">
                                  {{ $category->name }}
                                </h4>
                                <span class="text-inherit">  {{ $category->created_at  }}</span>
                              </div>
                            </div>
                           
                          </a>
                        </td>
                        <td class="align-middle">        {{ $category->slug }}</td>
                        <td class="align-middle">  {{ $category->nbFood }}</td>
                        <td class="align-middle">16 Oct, 2020</td>
                        <th class="border-0">Active</th>
                 
                        <td class="text-muted align-middle">
                          <span class="dropdown dropleft">
                            <a class="text-muted text-decoration-none" href="#!" role="button" id="courseDropdown3"
                              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown3">
                              <span class="dropdown-header">Action</span>
                              <a class="dropdown-item" href="#!" data-toggle="modal"
                              data-target="#updateCategory{{ $category->id }}">
                              <i class="fe fe-send dropdown-item-icon"></i>Edit
                           </a>
                             
                              <a class="dropdown-item" href="#!"><i
                                  class="fe fe-trash dropdown-item-icon"></i>Delete</a>
                            </span>
                          </span>
                        </td>
                      </tr>

                      {{-- ***************************************************** --}}
                        <div class="modal fade" id="updateCategory{{ $category->id }}" tabindex="-1" role="dialog" 
                        aria-labelledby="updateCategoryLabel"
                        aria-hidden="true">
                          <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title mb-0" id="updateCategoryLabel">
                                  {{ $category->name }} update
                                </h4>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true"><i class="fe fe-x-circle"></i></span>
                              </button>
                              </div>
                              <div class="modal-body">
                                <form action="{{ route('categories.create') }}" method="POST">
                                  @csrf
                                  @method('PUT')
                                  <div class="custom-file-container form-group mb-2" data-upload-id="courseCoverImg" id="courseCoverImg">
                                    <label class="form-label">Course cover image
                                      <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                        title="Clear Image"></a></label>
                                        <div>
                                          <img src={{ asset('storage/' . $category->image) }} alt="" class="img-4by3-lg rounded" />
                                        </div>
                                  </div>
                                  <div>
                                    <label for="image">Category Image:</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>
                                  <div class="form-group mb-2">
                                    <label class="form-label" for="title">Name<span class="text-danger">*</span></label>
                                    <input  class="form-control" placeholder="Write a Category" 
                                    type="text" name="name" id="name" required value="{{ $category->name }}">
                                    <small>Field must contain a unique value</small>
                                  </div>
                                  <div class="form-group mb-2">
                                    <label class="form-label">Slug</label>
                                    <div class="input-group">
                                      <div class="input-group-prepend">
                                        <span class="input-group-text" id="slug">https://example.com</span>
                                      </div>
                                      <input class="form-control" type="text" name="slug" id="slug" required
                                      value="{{ $category->slug }}">
                                    </div>
                                    <small>Field must contain a unique value</small>
                                  </div>
                                  <div>
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                    <button type="button" class="btn btn-outline-white" data-dismiss="modal">
                                      Close
                                    </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>

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
          <form action="{{ route('categories.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="custom-file-container form-group mb-2" data-upload-id="courseCoverImg" id="courseCoverImg">
              <label class="form-label">Course cover image
                <a href="javascript:void(0)" class="custom-file-container__image-clear"
                  title="Clear Image"></a></label>
              {{-- <label class="custom-file-container__custom-file">
                <input type="file" name="image" id="image" 
                class="custom-file-container__custom-file__custom-file-input"
                  accept="image/*" />
                <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                <span class="custom-file-container__custom-file__custom-file-control"></span>
              </label> --}}
              {{-- <small class="mt-3 d-block">Upload your course image here. It must meet
                our
                course image quality standards to be accepted.
                Important guidelines: 750x440 pixels; .jpg, .jpeg,.
                gif, or .png. no text on the image.</small>
              <div class="custom-file-container__image-preview"></div> --}}
            </div>
            <div>
              <label for="image">Category Image:</label>
              <input type="file" name="image" id="image" class="form-control">
          </div>
            <div class="form-group mb-2">
              <label class="form-label" for="title">Name<span class="text-danger">*</span></label>
              <input  class="form-control" placeholder="Write a Category" type="text" name="name" id="name" required>
              <small>Field must contain a unique value</small>
            </div>
            <div class="form-group mb-2">
              <label class="form-label">Slug</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="slug">https://example.com</span>
                </div>
                <input class="form-control" type="text" name="slug" id="slug" required>
              </div>
              <small>Field must contain a unique value</small>
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
@endsection

