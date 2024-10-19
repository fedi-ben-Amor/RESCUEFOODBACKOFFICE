<div class="modal fade" id="signin-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header bg-secondary">
          <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item"><a class="nav-link fw-medium active" href="#signin-tab" data-bs-toggle="tab" role="tab" aria-selected="true"><i class="ci-unlocked me-2 mt-n1"></i>Sign in</a></li>
            <li class="nav-item"><a class="nav-link fw-medium" href="#signup-tab" data-bs-toggle="tab" role="tab" aria-selected="false"><i class="ci-user me-2 mt-n1"></i>Sign up</a></li>
          </ul>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body tab-content py-4">
          <form method="POST" action="{{ route('signin') }}" class="needs-validation tab-pane fade show active" autocomplete="off" novalidate id="signin-tab">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="email">Email address</label>
              <input class="form-control" type="email" id="email" name="email" placeholder="johndoe@example.com" required>
              <div class="invalid-feedback">Please provide a valid email address.</div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <div class="password-toggle">
                <input class="form-control" type="password" id="password" name ="password" required>
                <label class="password-toggle-btn" aria-label="Show/hide password">
                  <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                </label>
              </div>
            </div>
            <div class="mb-3 d-flex flex-wrap justify-content-between">
              <div class="form-check mb-2">
                <input class="form-check-input" type="checkbox" id="si-remember">
                <label class="form-check-label" for="si-remember">Remember me</label>
              </div>   @if (Route::has('password.request'))
              <a class="btn btn-link" href="{{ route('password.request') }}">
                  {{ __('Forgot Your Password?') }}
              </a>
          @endif
            </div>
            <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign In</button>
          </form>
          <form method="POST" action="{{ route('signupClient') }}" enctype="multipart/form-data" class="needs-validation tab-pane fade" autocomplete="off" novalidate id="signup-tab">
            @csrf
            
            <!-- Profile Picture -->
            <div class="mb-3">
                <label for="picture" class="form-label">Profile Picture</label>
                <div class="mt-2">
                    <img id="preview" src="#" alt="Image Preview" class="rounded-circle" style="display:none; width: 100px; height: 100px;" />
                </div>
                <input type="file" id="picture" name="picture" class="form-control" accept="image/*" required onchange="previewImage(event)" />
                @error('picture')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- User Name -->
            <div class="mb-3">
                <label class="form-label" for="name">User Name</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="John Doe" value="{{ old('name') }}" required>
                <div class="invalid-feedback">Please fill in your name.</div>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Adresse -->
            <div class="mb-3">
                <label for="adresse" class="form-label">Adresse</label>
                <input type="text" id="adresse" class="form-control" name="adresse" placeholder="Adresse" value="{{ old('adresse') }}" required />
                @error('adresse')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
       
            
            <!-- Tel Mobile -->
            <div class="mb-3">
                <label for="tel_mobile" class="form-label">Tel Mobile </label>
                <input type="text" id="tel_mobile" class="form-control" name="tel_mobile" placeholder="Tel Mobile" value="{{ old('tel_mobile') }}" required />
                @error('tel_mobile')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
        
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="johndoe@example.com" value="{{ old('email') }}" required>
                <div class="invalid-feedback">Please provide a valid email address.</div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Password -->
            <div class="mb-3">
                <label class="form-label" for="password">Password</label>
                <div class="password-toggle">
                    <input class="form-control" type="password" id="password" name="password" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            
            <!-- Confirm Password -->
            <div class="mb-3">
                <label class="form-label" for="password_confirmation">Confirm Password</label>
                <div class="password-toggle">
                    <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required>
                    <label class="password-toggle-btn" aria-label="Show/hide password">
                        <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                    </label>
                </div>
            </div>
            
      
            
            <!-- Submit Button -->
            <button class="btn btn-primary btn-shadow d-block w-100" type="submit">Sign Up</button>
        </form>
        </div>
      </div>
    </div>
  </div>
  <script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var output = document.getElementById('preview');
            output.src = reader.result;
            output.style.display = 'block';
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>