@extends('layouts.app')
@section('content')
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
                 {{$role}}
                  <span class="font-size-sm text-muted">({{ $users->count() }})</span>
                </h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="{{ url('/dashboard') }}">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                      {{$role}}
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
            <!-- Tab Content -->
            <div class="tab-content">
              <!-- Tab Pane Grid View -->
              <div class="tab-pane fade show active" id="tabPaneGrid" role="tabpanel" aria-labelledby="tabPaneGrid">
                <div class="mb-4">
                  <input type="search" class="form-control" placeholder="Search  {{$role}}" />
                </div>
                <div class="row">
                  @foreach($users as $user)
                  <div class="col-xl-3 col-lg-6 col-md-6 col-12">
                      <!-- Card -->
                      <div class="card mb-4">
                          <div class="card-body">
                              <div class="text-center">
                                  <div class="position-relative">
                                      <img src="{{ asset('storage/' . $user->picture) ?? '../assets/images/avatar/avatar-11.jpg' }}" class="rounded-circle avatar-xl mb-3" alt=""/>
                                      <a href="#" class="position-absolute mt-10 ml-n5">
                                          <span class="status bg-success"></span>
                                      </a>
                                  </div>
                                  <h4 class="mb-0">{{ $user->name }}</h4>
                                  <p class="mb-0"><i class="fe fe-map-pin mr-1 font-size-xs"></i>{{ $user->adresse ?? 'Unknown' }}</p>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2 mt-6">
                                  <span>Email</span>
                                  <span class="text-dark">{{ $user->email }}</span>
                              </div>
                              <div class="d-flex justify-content-between border-bottom py-2">
                                  <span>Joined at</span>
                                  <span>{{ $user->created_at->format('d M, Y') }}</span>
                              </div>
                              <div class="d-flex justify-content-between pt-2">
                                  <span>Numero Tel</span>
                                  <span class="text-dark">{{ $user->tel_mobile }}</span>
                              </div>
                  
                              <!-- Centered Delete Button -->
                              <div class="text-center mt-4">
                                  <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline;">
                                      @csrf
                                      @method('DELETE')
                                      <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?');">
                                          delete
                                      </button>
                                  </form>
                              </div>
                          </div>
                      </div>
                  </div>
                  @endforeach
                  
                </div>
              </div>

              <!-- Tab Pane List View -->
              <div class="tab-pane fade" id="tabPaneList" role="tabpanel" aria-labelledby="tabPaneList">
                <!-- Table -->
                <div class="table-responsive">
                  <table class="table mb-0 text-nowrap">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">Joined at</th>
                        <th scope="col">Numero Tel</th>
                        <th scope="col"></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                            <img src="{{ asset('storage/' . $user->picture) ?? '../assets/images/avatar/avatar-11.jpg' }}" alt="" class="rounded-circle avatar-md mr-2"/>
                            <h5 class="mb-0">{{ $user->name }}</h5>
                          </div>
                        </td>
                        <td>{{ $user->email }} </td>
                        <td>{{ $user->adresse }}</td>
                        <td>{{ $user->created_at->format('d M, Y') }}</td>
                        <td>{{ $user->tel_mobile }}</td>
                        <td>
                          <form action="{{ route('user.delete', $user->id) }}" method="POST" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="fe fe-trash" onclick="return confirm('Are you sure you want to delete this user?');"></button>
                          </form>
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
      </div>
    </div>
  </div>
@endsection
