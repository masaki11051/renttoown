@extends('R2O.index')
  @section('main_content')
    <div class="p-4">
       <nav class="navbar navbar-dark bg-primary">
                <div class="container-fluid">
                  <a class="navbar-brand" href="{{ url('/') }}">Top page</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                </div>
              </nav>
      <div class="p-1 mb-2 bg-secondary text-white">Input New Info</div>
       <div class="d-flex position-relative m-3">
         <img src="/images/customer.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
         <div>
           <h5 class="mt-0">When application form received</h5>
           <p>Input customer information based on submitted application form</p>
           <a href="{{ url('/input_customer_info') }}" class="stretched-link">Customer</a>
         </div>
       </div>
       <div class="d-flex position-relative m-3">
         <img src="/images/contract.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
         <div>
           <h5 class="mt-0">When motorcycle's delivery date fixed </h5>
           <p>Add new information such as start date, Motorcycle, plan and so on on the registered customer info </p>
           <a href="{{ url('/customer_search_for_application') }}" class="stretched-link">Application</a>
         </div>
       </div>
        <div class="d-flex position-relative m-3">
            <img src="/images/repayment.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
                <h5 class="mt-0">Register repayment schedule/amount </h5>
                <p>After above "When motorcycle's delivery date fixed" inputted and confirmed if inputted info is right </p>
                <a href="{{ url('/customer_search_for_repayment') }}" class="stretched-link">Repayment</a>
            </div>
        </div>
        <div class="d-flex position-relative m-3">
         <img src="/images/dealer.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
         <div>
           <h5 class="mt-0">After a motorcycle released to the customer </h5>
           <p>Upload promisary note, Loan disclosure and so on.  </p>
           <a href="{{ url('/customer_search_for_supplementalDocs') }}" class="stretched-link">Upload supplemental Docs</a>
         </div>
       </div>
        <div class="d-flex position-relative m-3">
         <img src="/images/return.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
         <div>
           <h5 class="mt-0">When a motorcycle is returned or lost from the customer </h5>
           <p>Upload motorcycle info/location</p>
           <a href="{{ url('/customer_search_for_returned_motorcycle') }}" class="stretched-link">Update Motorcycle info</a>
         </div>
       </div>
       <div class="d-flex position-relative m-3">
         <img src="/images/motorcycle.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
         <div>
           <h5 class="mt-0">When new motorcycle purchased</h5>
           <p>Add motorcycle information before selling </p>
           <a href="{{ url('/add_motorcycle') }}" class="stretched-link">Motorcycle</a>
         </div>
       </div>
       <div class="d-flex position-relative m-3">
         <img src="/images/plan.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
         <div>
           <h5 class="mt-0">When new plan start</h5>
           <p>Add new plan information </p>
           <a href="{{ url('/add_plan') }}" class="stretched-link">Plan</a>
         </div>
       </div>
        <div class="d-flex position-relative m-3">
         <img src="/images/company.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
         <div>
           <h5 class="mt-0">When new company cooperated</h5>
           <p>Add new company information </p>
           <a href="{{ url('/add_company') }}" class="stretched-link">Company</a>
         </div>
       </div>
       <div class="d-flex position-relative m-3">
         <img src="/images/location.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
          <div>
              <h5 class="mt-0">When new location add</h5>
              <p>Add new location information </p>
            <a href="{{ url('/add_location') }}" class="stretched-link">Branch</a>
          </div>
       </div>
      </div>
      </div>
       @endsection
