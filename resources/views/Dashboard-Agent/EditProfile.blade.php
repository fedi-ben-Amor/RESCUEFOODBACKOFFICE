@extends('layouts.app')
@section('content')
	<div class="pt-5 pb-5">
		<div class="container">
				<!-- User info -->
			@include('layouts.navbar-agent')

	<!-- Content -->

			<div class="row mt-4">
				<div class="col-lg-3 col-md-4 col-12">
					<!-- Side navbar -->
					@include('layouts.sidebar-agent')
				</div>
				<div class="col-lg-9 col-md-8 col-12">
					<!-- Card -->
					<div class="card">
						<!-- Card header -->
						<div class="card-header">
							<h3 class="mb-0">Profile Details</h3>
							<p class="mb-0">
								You have full control to manage your own account setting.
							</p>
						</div>
						<!-- Card body -->
						<div class="card-body">
							<div class="d-lg-flex align-items-center justify-content-between">
								<div class="d-flex align-items-center mb-4 mb-lg-0">
									<img src="../assets/images/avatar/avatar-3.jpg" id="img-uploaded" class="avatar-xl rounded-circle" alt="" />
									<div class="ml-3">
										<h4 class="mb-0">Your avatar</h4>
										<p class="mb-0">
											PNG or JPG no bigger than 800px wide and tall.
										</p>
									</div>
								</div>
								<div>
									<a href="#!" class="btn btn-outline-white btn-sm">Update</a>
									<a href="#!" class="btn btn-outline-danger btn-sm">Delete</a>
								</div>
							</div>
							<hr class="my-5" />
							<div>
								<h4 class="mb-0">Personal Details</h4>
								<p class="mb-4">
									Edit your personal information and address.
								</p>
								<!-- Form -->
								<form class="form-row">
									<!-- First name -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="fname">First Name</label>
										<input type="text" id="fname" class="form-control" placeholder="First Name" required />
									</div>
									<!-- Last name -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="lname">Last Name</label>
										<input type="text" id="lname" class="form-control" placeholder="Last Name" required />
									</div>
									<!-- Phone -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="phone">Phone</label>
										<input type="text" id="phone" class="form-control" placeholder="Phone" required />
									</div>
									<!-- Birthday -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="birth">Birthday</label>
										<input class="form-control flatpickr" type="text" placeholder="Birth of Date" id="birth"
											name="birth" />
									</div>
									<!-- Address -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="address">Address Line 1</label>
										<input type="text" id="address" class="form-control" placeholder="Address" required />
									</div>
									<!-- Address -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label" for="address2">Address Line 2</label>
										<input type="text" id="address2" class="form-control" placeholder="Address" required />
									</div>
									<!-- State -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label">State</label>
										<select class="selectpicker" data-width="100%">
											<option value="">Select State</option>
											<option value="1">Gujarat</option>
											<option value="2">Rajasthan</option>
											<option value="3">Maharashtra</option>
										</select>
									</div>
									<!-- Country -->
									<div class="form-group col-12 col-md-6">
										<label class="form-label">Country</label>
										<select class="selectpicker" data-width="100%">
											<option value="">Select Country</option>
											<option value="1">India</option>
											<option value="2">UK</option>
											<option value="3">USA</option>
										</select>
									</div>
									<div class="col-12">
										<!-- Button -->
										<button class="btn btn-primary" type="submit">
											Update Profile
										</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
	
<div class="footer">
    <div class="container">
        <div class="row align-items-center no-gutters border-top py-2">
            <!-- Desc -->
            <div class="col-md-6 col-12 text-center text-md-left">
                <span>© 2020 Geeks. All Rights Reserved.</span>
            </div>
              <!-- Links -->
            <div class="col-12 col-md-6">
                <nav class="nav nav-footer justify-content-center justify-content-md-end">
                    <a class="nav-link active pl-0" href="#!">Privacy</a>
                    <a class="nav-link" href="#!">Terms </a>
                    <a class="nav-link" href="#!">Feedback</a>
                    <a class="nav-link" href="#!">Support</a>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection