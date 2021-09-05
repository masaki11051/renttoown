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
      <div class="p-1 mb-2 bg-secondary text-white">Search & Edit existing information</div>
            <div class="d-flex position-relative m-3">
                    <img src="/images/application.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
                        <div>
                         <h5 class="mt-0">Search an application form</h5>
                         <p>View selected existing customer's information</p>
                         <a href="{{ url('/application_search') }}" class="stretched-link">Go to</a>
                        </div>
      </div>
      <div class="d-flex position-relative m-3">
        <img src="/images/customers.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
             <h5 class="mt-0">ALL CUSTOMERS</h5>
             <p>View all existing customer's basic information</p>
             <a href="{{ url('/all_customers_info') }}" class="stretched-link">Go to</a>
            </div>
      </div>
      <div class="d-flex position-relative m-3">
        <img src="/images/motorcycles.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
             <h5 class="mt-0">ALL MOTORCYCLES</h5>
             <p>View all existing motorcycle's basic information</p>
             <a href="{{ url('/all_motorcycles_info') }}" class="stretched-link">Go to</a>
            </div>
      </div>
      <div class="d-flex position-relative m-3">
        <img src="/images/plan.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
            <div>
             <h5 class="mt-0">ALL PLANS</h5>
              <p>View all existing plans</p>
              <a href="{{ url('/all_plans_info') }}" class="stretched-link">Go to</a>
              </div>
            </div>
      <div class="d-flex position-relative m-3">
         <img src="/images/company.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
             <div>
              <h5 class="mt-0">ALL COMPANIES</h5>
              <p>View all registered companies' basic information</p>
              <a href="{{ url('/all_companies_info') }}" class="stretched-link">Go to</a>
             </div>
       </div>
       <div class="d-flex position-relative m-3">
           <img src="/images/bill.jpg" style="width: 9rem;height: 9rem" class="flex-shrink-0 me-3" alt="...">
           <div>
               <h5 class="mt-0">ALL repayments</h5>
               <p>View all rrepayments information</p>
               <a href="{{ url('/all_repayments_info') }}" class="stretched-link">Go to</a>
           </div>
       </div>
       </div>
       @endsection
