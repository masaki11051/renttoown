@extends('R2O.index')
<style>

</style>
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
      <h1>SAMPLE Repayment Amount</h1>
        <div class="col-md-6">
        <form class="row g-3 needs-validation" novalidate>
          <label for="inputstart_date" class="form-label" >Start_Date</label>
          <input id="start_date" type="date" class="form-control" id="start_date" name="start_date" placeholder="YYYY-MM-DD" required value="{{ old('start_date') }}" min="2022-01-01" max="2080-12-31" is-invalid　required>
        </div><br>
        <div class="col-md-6">
          <label for="inputprice" class="form-label" >Price</label>
          <input id="price" type="price" class="form-control" name="price" placeholder="60000" required value="{{ old('price') }}" is-invalid　required>
        </div><br>
         <label for="interest_rate" class="form-label">Interest Rate</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="interest_rate" id="3percent" value="3"  required>
          <label class="form-check-label">3%</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="interest_rate" id="4percent" value="4"  required>
          <label class="form-check-label" >4%</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="interest_rate" id="5percent" value="5"  required>
          <label class="form-check-label" >5%</label>
        </div><br>
        <div>
        <label for="tenure" class="form-label">Tenure</label><br>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tenure" id="2years" value="2"  required>
          <label class="form-check-label">2years</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tenure" id="3years" value="3"  required>
          <label class="form-check-label">3years</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="tenure" id="4years" value="4"  required>
          <label class="form-check-label">4years</label>
        </div>
        </form>
        <div class="col-12 row-3" style="line-height:4rem">
        </div>
     <button id="calculation_1"　type="button" class="btn btn-outline-danger">Repayment Amount Calculation</button>
     <!--<button id="calculation_2"　type="button" class="btn btn-outline-warning">First Payment Amount Calculation</button>-->
     <button id="calculation_3"　type="button" class="btn btn-outline-info">Repayment Schedule Calculation</button>
     <div id="hidden1">
      <div id="div1">Repayment Amount（PHP） </div>
     <!--<div id="div2">First Repayment Amount（PHP） </div>-->
      <table id='data-table' class="table table-hover" >
            <thead>
              <tr>
                <th scope="col">NO of </th>
                <th scope="col">Date</th>
                <th scope="col">Balance</th>
              </tr>
            </thead>
          <tbody class="table table-hover">
            </table>
            </div>
      </div>
      <script src="{{ asset('/js/test_calculation.js') }}">
      </script>
      @endsection
