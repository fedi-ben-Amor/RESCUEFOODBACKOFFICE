@extends('layouts.app')

<main>
    <section class="pt-5 pb-5">
        <div class="container-fluid">
            @include('layouts.navbar-agent')

            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    @include('layouts.sidebar-agent')
                </div>

                <div class="col-lg-9 col-md-8 col-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="mb-4">Edit Franchise</h3>
                            <form action="{{ route('franchises.update', $franchise->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="form-group">
                                    <label for="name">Franchise Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $franchise->name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="location">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" value="{{ $franchise->location }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="manager_name">Manager Name</label>
                                    <input type="text" class="form-control" id="manager_name" name="manager_name" value="{{ $franchise->manager_name }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="contact_number">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number" value="{{ $franchise->contact_number }}">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $franchise->email }}">
                                </div>

                                <button type="submit" class="btn btn-success">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@include('layouts.footer-agent')
