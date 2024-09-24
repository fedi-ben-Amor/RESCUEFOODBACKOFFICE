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
                        <a  class="btn btn-white ">Back to Restaurants</a>
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
                                <!-- Card -->
                                <div class="card mb-3">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Basic Information</h4>
                                    </div>
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <!-- Restaurant Name -->
                                        <div class="form-group">
                                            <label for="name" class="form-label">Restaurant Name</label>
                                            <input id="name" name="name" class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter restaurant name" required>
                                            <small>Provide the restaurant's official name.</small>
                                            @error('name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Phone Number -->
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Phone Number</label>
                                            <input id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" type="text" placeholder="Enter phone number" required>
                                            <small>Provide the contact phone number.</small>
                                            @error('phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Cuisine Type -->
                                        <div class="form-group">
                                            <label for="cuisine_type" class="form-label">Cuisine Type</label>
                                            <input id="cuisine_type" name="cuisine_type" class="form-control @error('cuisine_type') is-invalid @enderror" type="text" placeholder="e.g., Italian, Mexican" required>
                                            <small>Specify the type of cuisine the restaurant serves.</small>
                                            @error('cuisine_type')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Description -->
                                        <div class="form-group">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="4" placeholder="Write a brief description"></textarea>
                                            <small>Provide a short description of the restaurant.</small>
                                            @error('description')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        
                                        <!-- Logo Upload -->
                                       

                                        <!-- Picture Upload -->
                                      
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
