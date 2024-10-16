@extends('layouts.app')
@section('content')
  <!-- Page content -->
  <div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center no-gutters min-vh-100">
      <div class="col-lg-5 col-md-8 py-8 py-xl-0">
        <!-- Card -->
        <div class="card shadow ">
          <!-- Card body -->
          <div class="card-body p-6">
            <div class="mb-4">
              <a href="../index.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt=""></a>
              <h1 class="mb-1 font-weight-bold">Sign in</h1>
              <span>Don’t have an account? <a href="{{ route('signup') }}" class="ml-1">Sign up</a></span>
            </div>
            <!-- Form -->
            <form method="POST" action="{{ route('signin') }}">
              @csrf
              	<!-- Username -->
              <div class="form-group">
                <label for="email" class="form-label">Username or email</label>
                <input type="email" id="email" class="form-control" name="email" placeholder="Email address here" >
                @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
              </div>
              	<!-- Password -->
                <div class="form-group">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" class="form-control" name="password" placeholder="**************" >
                  @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
              	<!-- Checkbox -->
              <div class="d-lg-flex justify-content-between align-items-center mb-4">
                <div class="custom-control custom-checkbox">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                  <label class="form-check-label" for="remember">
                      {{ __('Remember Me') }}
                  </label>
                </div>
                <div>
                  
                
                  @if (Route::has('password.request'))
                  <a class="btn btn-link" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                  </a>
              @endif
                </div>
              </div>
              <div>
                	<!-- Button -->
                  <button type="submit" class="btn btn-primary">Sign in</button>
              </div>
              <hr class="my-4">
              <div class="mt-4 text-center">
                <!--Facebook-->
                <a href="#!" class="btn-social btn-social-outline btn-facebook">
                  <i class="fab fa-facebook"></i>
                </a>
                <!--Twitter-->
                <a href="#!" class="btn-social btn-social-outline btn-twitter">
                  <i class="fab fa-twitter"></i>
                </a>
                <!--LinkedIn-->
                <a href="#!" class="btn-social btn-social-outline btn-linkedin">
                  <i class="fab fa-linkedin"></i>
                </a>
                <!--GitHub-->
                <a href="#!" class="btn-social btn-social-outline btn-github">
                  <i class="fab fa-github"></i>
                </a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


 