@extends('layouts.app')

<main>
    <section class="pt-5 pb-5">
        <div class="container">
            @include('layouts.navbar-agent')
            <!-- Content -->
            <div class="row mt-0 mt-md-4">
                <div class="col-lg-3 col-md-4 col-12">
                    <!-- Side navabar -->
                        @include('layouts.sidebar-agent')
                      
                </div>
                <div class="col-lg-9 col-md-8 col-12">
                    <!-- Card -->
                    <div class="card mb-4">
                    <!-- Card header -->
                    <div class="card-header d-lg-flex align-items-center justify-content-between">
                        <div class="mb-3 mb-lg-0">
                            <h3 class="mb-0">Reviews</h3>
                            <span>You have full control to manage your own account setting.</span>
                        </div>
                        <div>
                            <a href="#" class="btn btn-outline-primary btn-sm">Export To CSV...</a>
                        </div>
                    </div>
                    <!-- Card body -->
                    <div class="card-body">
                        <!-- Form -->
                        <form class="row mb-4 gx-2">
                            <div class="col-xl-7 col-lg-6 col-md-4 col-12 mb-2 mb-lg-0">
                                <select class="form-select" data-choices="">
                                    <option value="">ALL</option>
                                    <option value="How to easily create a website">How to easily create a website</option>
                                    <option value="Grunt: The JavaScript Task...">Grunt: The JavaScript Task...</option>
                                    <option value="Vue js: The JavaScript Task...">Vue js: The JavaScript Task...</option>
                                </select>
                            </div>
                            <div class="col-xl-2 col-lg-2 col-md-4 col-12 mb-2 mb-lg-0">
                                <!-- Custom select -->
                                <select class="form-select" data-choices="">
                                    <option value="">Rating</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-2 mb-lg-0">
                                <!-- Custom select -->
                                <select class="form-select" data-choices="">
                                    <option value="">Sort by</option>
                                    <option value="Newest">Newest</option>
                                    <option value="Oldest">Oldest</option>
                                </select>
                            </div>
                        </form>
                        <!-- List group -->
                        <ul class="list-group list-group-flush border-top">
                            <!-- List group item -->
                            <li class="list-group-item px-0 py-4">
                                <div class="d-flex">
                                    <img src="../assets/images/avatar/avatar-9.jpg" alt="avatar" class="rounded-circle avatar-lg" >
                                    <div class="ms-3 mt-2">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div>
                                                <h4 class="mb-0">Eleanor Pena</h4>
                                                <span>2 hour ago</span>
                                            </div>
                                            <div>
                                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Report Abuse"><i class="fe fe-flag"></i></a>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            <span class="fs-6 me-1 align-top">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                    <path
                                                        d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                </svg>
                                            </span>

                                            <span class="me-1">for</span>
                                            <span class="h5">How to easily create a website with WordPress</span>
                                            <p class="mt-2">
                                                The course is very interesting and insightful. I think it should have more downloadable resources for 'points to remember' or 'key
                                                learnings' kind of document for later reference after finishing each section.
                                            </p>
                                            <a href="#" class="btn btn-outline-secondary btn-sm">Respond</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                         
                           
                        </ul>
                    </div>
                </div>
          </div>
        </div>
      </div>
    </section>
  </main>

    @include('layouts.footer-agent')

