

@extends('layouts.app')
@section('content')

<div class="py-4 py-lg-6 bg-primary">
    <div class="container">
      <div class="row">
        <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
          <div class="d-lg-flex align-items-center justify-content-between">
            <!-- Content -->
            <div class="mb-4 mb-lg-0">
              <h1 class="text-white mb-1">Add New Course</h1>
              <p class="mb-0 text-white lead">
                Just fill the form and create your courses.
              </p>
            </div>
            <div>
              <a href="instructor-courses.html" class="btn btn-white ">Back to Course</a>
              <a href="instructor-courses.html" class="btn btn-success ">Save</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="pb-12">
    <div class="container">
      <div id="courseForm" class="bs-stepper">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">

            <div class="bs-stepper-content mt-5">
              <form >
                <!-- Content one -->
                <div id="test-l-1" class=" ">
                  <!-- Card -->
                  <div class="card mb-3 ">
                    <div class="card-header border-bottom px-4 py-3">
                      <h4 class="mb-0">Basic Information</h4>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                      <div class="form-group">
                        <label for="courseTitle" class="form-label">Course Title</label>
                        <input id="courseTitle" class="form-control" type="text" placeholder="Course Title" />
                        <small>Write a 60 character course title.</small>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Courses category</label>
                        <select class="selectpicker" data-width="100%">
                          <option value="">Select category</option>
                          <option value="React">React</option>
                          <option value="Javascript">Javascript</option>
                          <option value="HTML">HTML</option>
                          <option value="Vue">Vue js</option>
                          <option value="Gulp">Gulp js</option>
                        </select>
                        <small>Help people find your courses by choosing
                          categories that represent your course.</small>
                      </div>
                      <div class="form-group">
                        <label class="form-label">Courses level</label>
                        <select class="selectpicker" data-width="100%">
                          <option value="">Select level</option>
                          <option value="intermediate">Intermediate</option>
                          <option value="Beignners">Beignners</option>
                          <option value="Advance">Advance</option>
                        </select>
                      </div>
                     
                    </div>
                  </div>
                </div>
             
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
