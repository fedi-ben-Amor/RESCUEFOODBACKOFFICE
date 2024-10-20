
 @extends('layouts.app')
 @section('content')
 <!-- Page Content -->
 <div class="container d-flex flex-column">
  <div class="row align-items-center justify-content-center no-gutters min-vh-100">
   <!-- Docs -->
   <div class="offset-lg-1 col-lg-4 col-md-12 col-12 text-center text-lg-left">
    <h1 class="display-1 mb-3">Oops!</h1>
    <h3>Sorry, we couldn’t find the page you were looking for.</h3>
    <p class="mb-4 small">Error Code: 404 not found.</p>
    <a href="../index.html" class="btn btn-primary mr-2">Back to Safety</a>
   </div>
   <!-- img -->
   <div class="offset-lg-1 col-lg-6 col-md-12 col-12">
    <img src="../assets/images/error/404-error-img.svg" alt="" class="w-100" />
   </div>
  </div>
 </div>
 @endsection