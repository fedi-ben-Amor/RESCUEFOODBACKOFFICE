

@extends('layouts.app')

<div class="py-4 py-lg-6 bg-primary">
    <div class="container">
        <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                <div class="d-lg-flex align-items-center justify-content-between">
                    <!-- Content -->
                    <div class="mb-4 mb-lg-0">
                        <h1 class="text-white mb-1">Add New Restaurant</h1>
                        <p class="mb-0 text-white lead">
                            Just fill the form and create your restaurant.
                        </p>
                    </div>
                    <div>
                        <a class="btn btn-white">Back to Restaurants</a>
                        <a href="#" class="btn btn-success" onclick="document.getElementById('restaurantForm').submit();">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="pb-12">
    <div class="container">
        <div id="restaurantForm" class="bs-stepper">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="bs-stepper-content mt-5">
                        <form action="{{ route('resto.store') }}" method="POST" enctype="multipart/form-data" id="restaurantForm">
                            @csrf
                            <!-- Basic Information -->
                            <div id="test-l-1" class="">
                                <div class="card mb-3">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Basic Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <!-- Restaurant Name -->
                                        <div class="form-group">
                                            <label for="name" class="form-label">Restaurant Name</label>
                                            <input id="name" name="name" class="form-control" type="text" placeholder="Enter restaurant name" required>
                                            <small>Provide the restaurant's official name.</small>
                                        </div>
                                        
                                        <!-- Phone Number -->
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input id="phone" name="phone" class="form-control" type="text" placeholder="Enter phone number" required>
                                            <small>Provide the contact phone number.</small>
                                        </div>
                                        
                                        <!-- Cuisine Type -->
                                        <div class="form-group">
                                            <label for="cuisine_type" class="form-label">Cuisine Type</label>
                                            <input id="cuisine_type" name="cuisine_type" class="form-control" type="text" placeholder="e.g., Italian, Mexican" required>
                                            <small>Specify the type of cuisine the restaurant serves.</small>
                                        </div>
                                           <!-- Location -->
                                        <div class="form-group">
                                            <label for="location" class="form-label">Location</label>
                                            <input id="location" name="location" class="form-control" type="text" placeholder="Enter the restaurant's location" required>
                                            <small>Provide the restaurant's location (e.g., address, city).</small>
                                        </div>

                                        
                                        <!-- Description -->
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="description" name="description" class="form-control" rows="4" placeholder="Write a brief description"></textarea>
                                            <small>Provide a short description of the restaurant.</small>
                                        </div>
                                        
                                        <!-- Logo Upload -->
                                        <div class="form-group">
                                            <label for="logo" class="form-label">Upload Logo</label>
                                            <input id="logo" name="logo" class="form-control" type="file" onchange="previewImage(event, 'logoPreview')">
                                            <small>Upload the restaurant's logo (JPEG, PNG, GIF).</small>
                                            <img id="logoPreview" src="#" alt="Logo Preview" style="display:none; width: 100px; margin-top: 10px;">
                                        </div>

                                        <!-- Picture Upload -->
                                        <div class="form-group">
                                            <label for="picture" class="form-label">Upload Picture</label>
                                            <input id="picture" name="picture" class="form-control" type="file" onchange="previewImage(event, 'picturePreview')">
                                            <small>Upload a representative picture of the restaurant (JPEG, PNG, GIF).</small>
                                            <img id="picturePreview" src="#" alt="Picture Preview" style="display:none; width: 100px; margin-top: 10px;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Submit Button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-success">Create Restaurant</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(event, previewId) {
        const file = event.target.files[0];
        const reader = new FileReader();
        reader.onload = function(e) {
            const imgPreview = document.getElementById(previewId);
            imgPreview.src = e.target.result;
            imgPreview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
</script>
