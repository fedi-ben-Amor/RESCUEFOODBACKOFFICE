
@extends('layouts.app')
@section('content')
<main>
      <section class="pt-5 pb-5">
        <div class="container">
          <!-- navbar-agent -->
        @include('layouts.navbar-agent')

          <!-- Content -->

          <div class="row mt-0 mt-md-4">
            <div class="col-lg-3 col-md-4 col-12">
              @include('layouts.sidebar-agent')
            
            </div>
            <div class="col-lg-9 col-md-8 col-12">
              <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
            <!-- Card -->
         
          </div>
        </div>
      </div>
    </section>
  </main>

    @include('layouts.footer-agent')
@endsection
