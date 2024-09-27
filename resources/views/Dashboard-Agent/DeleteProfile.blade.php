@extends('layouts.app')
@section('content')
<main>
    <section class="pt-5 pb-5">
        <div class="container">
            @include('layouts.navbar-agent')
            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navabar -->
                        @include('layouts.sidebar-agent')
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card mb-4">
              <!-- Card header -->
              <div class="card-header">
                <h3 class="mb-0">Delete your account</h3>
                <p class="mb-0">Delete or Close your account permanently.</p>
              </div>
              <!-- Card body -->
              <div class="card-body p-4">
                <span class="text-danger h4">Warning</span>
                <p>If you close your account, you will be unsubscribed from all your 0 courses, and will lose access forever.</p>
                <a href="../index.html" class="btn btn-danger">Close My Account</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@include('layouts.footer-agent')
@endsection
