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
                        <div class="card-header">
                            <h3 class="mb-0">Courses</h3>
                            <span>Manage your courses and its update like live, draft and insight.</span>
                        </div>
                        <!-- Card body -->
                        <div class="card-body">
                            <!-- Form -->
                            <form class="row gx-3">
                                <div class="col-lg-9 col-md-7 col-12 mb-lg-0 mb-2">
                                    <input type="search" class="form-control" placeholder="Search Your Courses">
                                </div>
                                <div class="col-lg-3 col-md-5 col-12">
                                    <select class="form-select" data-choices="">
                                        <option value="">Date Created</option>
                                        <option value="Newest">Newest</option>
                                        <option value="High Rated">High Rated</option>
                                        <option value="Law Rated">Law Rated</option>
                                        <option value="High Earned">High Earned</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- Table -->
                        <div class="table-responsive overflow-y-hidden">
                            <table class="table mb-0 text-nowrap table-hover table-centered text-nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Courses</th>
                                        <th>Students</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#">
                                                        <img src="../assets/images/course/course-wordpress.jpg" alt="course" class="rounded img-4by3-lg">
                                                    </a>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="mb-1 h5">
                                                        <a href="#" class="text-inherit">Create a Website with WordPress</a>
                                                    </h4>
                                                    <ul class="list-inline fs-6 mb-0">
                                                        <li class="list-inline-item">
                                                            <span class="align-text-bottom">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>1h 30m</span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                                            </svg>
                                                            Beginner
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>11,200</td>
                                        <td>
                                            <span class="lh-1">
                                                <span class="text-warning">4.5</span>
                                                <span class="mx-1 align-text-top">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                    </svg>
                                                </span>
                                                (3,250)
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Live</span>
                                        </td>
                                        <td>
                                            <span class="dropdown dropstart">
                                                <a
                                                    class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                    href="#"
                                                    role="button"
                                                    id="courseDropdown"
                                                    data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20"
                                                    aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu" aria-labelledby="courseDropdown">
                                                    <span class="dropdown-header">Setting</span>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Remove
                                                    </a>
                                                </span>
                                            </span>
                                        </td>
                                       
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#">
                                                        <img src="../assets/images/course/course-node.jpg" alt="course" class="rounded img-4by3-lg">
                                                    </a>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="mb-1 h5">
                                                        <a href="#" class="text-inherit">Learn Node.js - Tutorials Courses</a>
                                                    </h4>
                                                    <ul class="list-inline fs-6 mb-0">
                                                        <li class="list-inline-item">
                                                            <span class="align-text-bottom">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>3h 40m</span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                                            </svg>
                                                            Intermediate
                                                        </li>
                                                    </ul>
                                                    <div class="progress mt-2" style="height: 3px">
                                                        <div
                                                            class="progress-bar bg-success"
                                                            role="progressbar"
                                                            style="width: 25%"
                                                            aria-valuenow="25"
                                                            aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>0</td>
                                        <td>
                                            <span class="lh-1">
                                                <span class="text-warning">4.5</span>
                                                <span class="mx-1 align-text-top">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                    </svg>
                                                </span>
                                                (5,300)
                                            </span>
                                        </td>
                                        <td><span class="badge bg-info">Darft</span></td>
                                        <td>
                                            <span class="dropdown dropstart">
                                                <a
                                                    class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                    href="#"
                                                    role="button"
                                                    id="courseDropdown1"
                                                    data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20"
                                                    aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                                                    <span class="dropdown-header">Setting</span>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Remove
                                                    </a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#">
                                                        <img src="../assets/images/course/course-laravel.jpg" alt="course" class="rounded img-4by3-lg">
                                                    </a>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="mb-1 h5">
                                                        <a href="#" class="text-inherit">The Ultimate Advanced Laravel..</a>
                                                    </h4>
                                                    <ul class="list-inline fs-6 mb-0">
                                                        <li class="list-inline-item">
                                                            <span class="align-text-bottom">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>3h 40m</span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#754FFE"></rect>
                                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#754FFE"></rect>
                                                            </svg>
                                                            Advance
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>3200</td>
                                        <td>
                                            <span class="lh-1">
                                                <span class="text-warning">4.5</span>
                                                <span class="mx-1 align-text-top">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                    </svg>
                                                </span>
                                                (6,380)
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-success">Live</span>
                                        </td>
                                        <td>
                                            <span class="dropdown dropstart">
                                                <a
                                                    class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                    href="#"
                                                    role="button"
                                                    id="courseDropdown2"
                                                    data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20"
                                                    aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>

                                                <span class="dropdown-menu" aria-labelledby="courseDropdown2">
                                                    <span class="dropdown-header">Setting</span>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Remove
                                                    </a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                  
                                    <tr>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div>
                                                    <a href="#"><img src="../assets/images/course/course-gatsby.jpg" alt="course" class="rounded img-4by3-lg"></a>
                                                </div>
                                                <div class="ms-3">
                                                    <h4 class="mb-1 h5">
                                                        <a href="#" class="text-inherit">Gatsby Tutorial - Fast Website</a>
                                                    </h4>
                                                    <ul class="list-inline fs-6 mb-0">
                                                        <li class="list-inline-item">
                                                            <span class="align-text-bottom">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                                                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"></path>
                                                                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"></path>
                                                                </svg>
                                                            </span>
                                                            <span>4h 10m</span>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <svg class="me-1 mt-n1" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <rect x="3" y="8" width="2" height="6" rx="1" fill="#754FFE"></rect>
                                                                <rect x="7" y="5" width="2" height="9" rx="1" fill="#DBD8E9"></rect>
                                                                <rect x="11" y="2" width="2" height="12" rx="1" fill="#DBD8E9"></rect>
                                                            </svg>
                                                            Beginner
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </td>
                                        <td>23</td>
                                        <td>
                                            <span class="lh-1">
                                                <span class="text-warning">4.5</span>
                                                <span class="mx-1 align-text-top">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="11" height="11" fill="currentColor" class="bi bi-star-fill text-warning" viewBox="0 0 16 16">
                                                        <path
                                                            d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.282.95l-3.522 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" >
                                                    </svg>
                                                </span>
                                                (9,200)
                                            </span>
                                        </td>
                                        <td>
                                            <span class="badge bg-danger">Deleted</span>
                                        </td>
                                        <td>
                                            <span class="dropdown dropstart">
                                                <a
                                                    class="btn-icon btn btn-ghost btn-sm rounded-circle"
                                                    href="#"
                                                    id="courseDropdown5"
                                                    data-bs-toggle="dropdown"
                                                    data-bs-offset="-20,20"
                                                    aria-expanded="false">
                                                    <i class="fe fe-more-vertical"></i>
                                                </a>
                                                <span class="dropdown-menu" aria-labelledby="courseDropdown5">
                                                    <span class="dropdown-header">Setting</span>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-edit dropdown-item-icon"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fe fe-trash dropdown-item-icon"></i>
                                                        Remove
                                                    </a>
                                                </span>
                                            </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layouts.footer-agent')
