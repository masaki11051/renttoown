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
    <div class="card text-center">
      <div class="card-header">
      </div>
      <div class="card-body">
        <h5 class="card-title">Application Management</h5>
        <p class="card-text">When Receive an application form, Delivery date is fixed and so on</p>
        <a href="{{ url('/application_management_menu') }}" class="btn btn-primary">Go Menu Page</a>
      </div>
      <div class="card-header">
        </div>
        <div class="card-body">
          <h5 class="card-title">Search & Edit Existing Data</h5>
          <p class="card-text">Inquiry from customers, Find the place where a motorcycle is and so on</p>
          <a href="{{ url('/search_and_edit_page_menu') }}" class="btn btn-info">Go SEARCH & EDIT Menu page</a>
        </div>
        <div class="card-header">
        </div>
        <div class="card-body">
            <h5 class="card-title">Bills Management </h5>
            <p class="card-text">manage whether bills are paid not, edit repayment info </p>
            <a href="{{ url('/repayment_management_menu') }}" class="btn btn-dark">Go Menu page</a>
        </div>
      <div class="card-header">
         </div>
          <div class="card-body">
          <h5 class="card-title">Test Calculation</h5>
          <p class="card-text">Calculate expecting repayment amount</p>
          <a href="{{ url('/test_calculation') }}" class="btn btn-secondary">Go TEST calculation page</a>
         </div>
      <div class="card-footer text-muted">
      </div>
    </div>
    </div>
       @endsection

