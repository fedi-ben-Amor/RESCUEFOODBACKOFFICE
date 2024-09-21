@extends('layouts.app')
<div class="container d-flex flex-column">
    <div class="row align-items-center justify-content-center no-gutters min-vh-100">
        <div class="col-lg-5 col-md-8 py-8 py-xl-0">
            <!-- Card -->
            <div class="card shadow">
                <!-- Card body -->
                <div class="card-body p-6">
                    <div class="mb-4">
                        <a href=""><img src="{{ asset('assets/images/brand/logo/logo-icon.svg') }}" class="mb-4" alt="" /></a>
                        <h1 class="mb-1 font-weight-bold">Sign up</h1>
                        <span>Already have an account?
                            <a href="{{ route('signin') }}" class="ml-1">Sign in</a></span>
                    </div>
                    <!-- Form -->
                    <form method="POST" action="{{ route('signup') }}">
                        @csrf <!-- Include CSRF token -->
                        
                        <!-- Username -->
                        <div class="form-group">
                            <label for="name" class="form-label">User Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="User Name"
                                value="{{ old('name') }}" required />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Adresse -->
                        <div class="form-group">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" id="adresse" class="form-control" name="adresse" placeholder="Adresse"
                                value="{{ old('adresse') }}" required />
                            @error('adresse')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tel Fixe -->
                        <div class="form-group">
                            <label for="tel_fixe" class="form-label">Tel Fixe</label>
                            <input type="text" id="tel_fixe" class="form-control" name="tel_fixe" placeholder="Tel Fixe"
                                value="{{ old('tel_fixe') }}" required />
                            @error('tel_fixe')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Tel Mobile -->
                        <div class="form-group">
                            <label for="tel_mobile" class="form-label">Tel Mobile</label>
                            <input type="text" id="tel_mobile" class="form-control" name="tel_mobile" placeholder="Tel Mobile"
                                value="{{ old('tel_mobile') }}" required />
                            @error('tel_mobile')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Email address here"
                                value="{{ old('email') }}" required />
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="**************"
                                required />
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Password Confirmation -->
                        <div class="form-group">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="**************"
                                required />
                        </div>

                        <!-- Checkbox -->
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="agreeCheck" />
                                <label class="custom-control-label" for="agreeCheck"><span>I agree to the <a href="#!">Terms of
                                            Service </a>and
                                        <a href="#!">Privacy Policy.</a></span></label>
                            </div>
                        </div>

                        <div>
                            <!-- Button -->
                            <button type="submit" class="btn btn-primary btn-block">
                                Create Free Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

