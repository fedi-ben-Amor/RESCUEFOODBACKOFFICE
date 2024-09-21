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
              <div class="card-header border-bottom-0">
                <h3 class="mb-0">Orders</h3>
                <span>Order Dashboard is a quick overview of all current orders.</span>
              </div>
              <!-- Table -->
              <div class="table-responsive">
                <table class="table mb-0 text-nowrap table-hover table-centered">
                  <thead class="table-light">
                    <tr>
                      <th>Courses</th>
                      <th>Amount</th>
                      <th>Invoice</th>
                      <th>Date</th>
                      <th>Method</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <h5 class="mb-0">
                          <a href="#" class="text-inherit">Building Scalable APIs with GraphQL</a>
                        </h5>
                      </td>
                      <td>$89</td>
                      <td>#10023</td>
                      <td>June 9, 2020</td>
                      <td>Amex</td>
                     
                    </tr>
                    <tr>
                      <td>
                        <h5 class="mb-0">
                          <a href="#" class="text-inherit">HTML5 Web Front End Development</a>
                        </h5>
                      </td>
                      <td>$129</td>
                      <td>#10020</td>
                      <td>June 9, 2020</td>
                      <td>Mastercard</td>
                     
                    </tr>
                    <tr>
                      <td>
                        <h5 class="mb-0">
                          <a href="#" class="text-inherit">Learn BasicJavaScript Courses</a>
                        </h5>
                      </td>
                      <td>$29</td>
                      <td>#10018</td>
                      <td>June 8, 2020</td>
                      <td>PayPal</td>
                      
                    </tr>
                    <tr>
                      <td>
                        <h5 class="mb-0">
                          <a href="#" class="text-inherit">Get Started: React Js Courses</a>
                        </h5>
                      </td>
                      <td>$59</td>
                      <td>#10003</td>
                      <td>June 9, 2020</td>
                      <td>Visa</td>
                      
                    </tr>
                    <tr>
                      <td>
                        <h5 class="mb-0">
                          <a href="#" class="text-inherit">Building Scalable APIs with GraphQL</a>
                        </h5>
                      </td>
                      <td>$129</td>
                      <td>#10020</td>
                      <td>June 7, 2020</td>
                      <td>Mastercard</td>
                      
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

