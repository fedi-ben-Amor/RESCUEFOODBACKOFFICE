
	@extends('layouts.app')
	@section('content')
    <div class="container d-flex flex-column">
		<div class="row align-items-center justify-content-center no-gutters min-vh-100">
			<div class="col-lg-5 col-md-8 py-8 py-xl-0">
				<!-- Card -->
				<div class="card shadow">
					<!-- Card body -->
					<div class="card-body p-6">
						<div class="mb-4">
							<a href="../index.html"><img src="../assets/images/brand/logo/logo-icon.svg" class="mb-4" alt="" /></a>
							<h1 class="mb-1 font-weight-bold">Forgot Password</h1>
							<p>Fill the form to reset your password.</p>
						</div>
							<!-- Form -->
						<form>
								<!-- Email -->
							<div class="form-group">
								<label for="email" class="form-label">Email</label>
								<input type="email" id="email" class="form-control" name="email" placeholder="Enter Your Email "
									required />
							</div>
								<!-- Button -->
							<div class="mb-3">
								<button type="submit" class="btn btn-primary btn-block">
									Send Resest Link
								</button>
							</div>
							<span>Return to <a href="sign-in.html">sign in</a></span>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endsection