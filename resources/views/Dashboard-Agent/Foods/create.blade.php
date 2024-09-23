
@extends('layouts.app')
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                      <!-- Card -->
                      <div class="card border-0 mb-4">
                        <!-- Card header -->
                        <div class="card-header">
                          <h4 class="mb-0">Create Food</h4>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <label for="postTitle" class="form-label">Food Image</label>
                          <form action="#" class="dropzone mt-4 border-dashed">
                          
                            <div class="fallback">
                               
                              <input name="file" type="file" multiple />
                            </div>
                          </form>
                          <div class="mt-4">
                            <form>
                              <!-- Form -->
                              <div class="row">
                              
                                <div class="form-group col-md-9">
                                  <!-- Title -->
                                  <label for="postTitle" class="form-label">Title</label>
                                  <input type="text" id="postTitle" class="form-control text-dark" placeholder="Post Title" />
                                  <small>Keep your post titles under 60 characters. Write
                                    heading that describe the topic content.
                                    Contextualize for Your Audience.</small>
                                </div>
                                <!-- Slug -->
                                <div class="form-group col-md-9">
                                    <!-- Title -->
                                    <label for="postTitle" class="form-label">Ingredients </label>
                                    <input type="text" id="postTitle" class="form-control text-dark" placeholder="Post Title" />
                                    <small>Keep your post titles under 60 characters. Write
                                      heading that describe the topic content.
                                      Contextualize for Your Audience.</small>
                                  </div>
                                <!-- Excerpt -->
                                <div class="form-group col-md-9">
                                  <label for="Excerpt">description </label>
                                  <textarea rows="3" id="Excerpt" class="form-control text-dark"
                                    placeholder="Excerpt"></textarea>
                                  <small>A short extract from writing.</small>
                                </div>
                                <!-- Category -->
                                <div class="form-group col-md-9">
                                  <label class="form-label">Category</label>
                                  <select class="selectpicker" data-width="100%">
                                    <option value="">Course</option>
                                    <option value="Post Category">
                                      Post Category
                                    </option>
                                    <option value="Workshop">Workshop</option>
                                    <option value="Marketing">Marketing</option>
                                  </select>
                                </div>
                              </div>
                            </form>
                          </div>
                       
                          <a href="#!" class="btn btn-primary"> Publish </a>
                          <a href="#!" class="btn btn-outline-white">
                            Save to Draft
                          </a>
                        </div>
                      </div>
                    </div>
         
                  </div>
          </div>
        </div>
      </section>
    </main>
@include('layouts.footer-agent')

    @include('layouts.footer-agent')

