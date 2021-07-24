@extends('R2O.index')
<style>


</style>
@section('title', 'Customer Infomation')

@section('main_content')
<div class="p-4">
<nav class="navbar navbar-dark bg-primary mt-2 mb-2">
        <div class="container-fluid ">
          <a class="navbar-brand" href="toppage">Top page</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <div class="p-1 mb-2 bg-secondary text-white">Customer info</div>
  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">name</th>
      <th scope="col">age</th>
      <th scope="col">Phone number</th>
      <th scope="col">city</th>
      <th scope="col">mail</th>
    </tr>
  </thead>
    <tbody>
    @if (isset($data))
    <tr>
      <td>
      {{$data->id}}
    </td>
    <td>
      {{$data->name}}
    </td>
    <td>
      {{$data->age}}
    </td>
    <td>
      {{$data->phone_number}}
    </td>
    <td>
      {{$data->city}}
    </td>
    <td>
      {{$data->mail}}
    </td>
    </tr>
  </table>
  @endif
  <br>
<div class="p-1 mb-2 bg-secondary text-white">#1 Application Info</div>
<button type="button" class="btn btn-outline-primary"><-Company-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Company name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $companyinfo)
            @if ($loop->index == 0)
              <th scope="row">{{ $companyinfo->getcompanyname() }}</th>
              <td>{{ $companyinfo->getcompanyphonenumber() }}</td>
              <td>{{ $companyinfo->getcompanyaddress() }}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Date-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Application ID</th>
        <th scope="col">Apply Date</th>
        <th scope="col">Start Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $applicationinfo)
            @if ($loop->index == 0)
              <th scope="row">{{ $applicationinfo->id}}</th>
              <td>{{ $applicationinfo->apply_date }}</td>
              <td>{{ $applicationinfo->start_date}}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Motorcycle-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">unit id</th>
        <th scope="col">Price</th>
        <th scope="col">motorcycle certificate</th>
        <th scope="col">motorcycle registration number</th>
      </tr>
    </thead>
    <tbody id="calculation_2">
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $motorcycleinfo)
            @if ($loop->index == 0)
              <th scope="row">{{ $motorcycleinfo->getmotorcycleid()}}</th>
              <td>{{ $motorcycleinfo->getmotorcycleunit_id() }}</td>
              <td>{{ $motorcycleinfo->getmotorcycleprice() }}</td>
              <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_certificate() }}</td>
              <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_registration_number() }}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Rent to own plan-></button>
  <table class="table table-hover" >
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Interest Rate(%/monthly)</th>
        <th scope="col">Tenure(years)</th>
        <th scope="col">Start date</th>
      </tr>
    </thead>
    <tbody id="calculation_1">
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $planinfo)
            @if ($loop->index == 0)
              <th scope="row">{{ $planinfo->getplan_id() }}</th>
              <td name="interest">{{ $planinfo->getinterest_rate() }}</td>
              <td name="tenure">{{ $planinfo->gettenure() }}</td>
              <td >{{ $planinfo->start_date}} </td>
            @endif
          @endforeach
        @endif
      </tr>
      <button id="calculation"　type="button" class="btn btn-outline-danger">Schedule Calculation</button>
    </tbody>
  </table>
  <div id="hidden">
    <p id="p1">Reepayment Amount is </p>
    <table class="table table-hover" >
      <thead>
        <tr>
          <th scope="col">NO of </th>
          <th scope="col">Date</th>
          <th scope="col">Balance</th>
        </tr>
      </thead>
    <tbody>
      <tr>
          <th scope="row"></th>
          <td name="interest">{{ $planinfo->getinterest_rate() }}</td>
          <td name="tenure">{{ $planinfo->gettenure() }}</td>
          <td {{ $planinfo->start_date}} </td>
      </tr>
      </div>

<!--
<div class="p-1 mb-2 bg-secondary text-white">#2 Application Info</div>
<button type="button" class="btn btn-outline-primary"><-Company-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Company name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $companyinfo)
            @if ($loop->index == 1)
              <th scope="row">{{ $companyinfo->getcompanyname() }}</th>
              <td>{{ $companyinfo->getcompanyphonenumber() }}</td>
              <td>{{ $companyinfo->getcompanyaddress() }}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Date-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Application ID</th>
        <th scope="col">Apply Date</th>
        <th scope="col">Start Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $applicationinfo)
            @if ($loop->index == 1)
              <th scope="row">{{ $applicationinfo->id}}</th>
              <td>{{ $applicationinfo->apply_date }}</td>
              <td>{{ $applicationinfo->start_date}}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Motorcycle-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">unit id</th>
        <th scope="col">Price</th>
        <th scope="col">motorcycle certificate</th>
        <th scope="col">motorcycle registration number</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $motorcycleinfo)
            @if ($loop->index == 1)
              <th scope="row">{{ $motorcycleinfo->getmotorcycleid()}}</th>
              <td>{{ $motorcycleinfo->getmotorcycleunit_id() }}</td>
              <td>PHP {{ $motorcycleinfo->getmotorcycleprice() }}</td>
              <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_certificate() }}</td>
              <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_registration_number() }}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Rent to own plan-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Interest Rate</th>
        <th scope="col">Tenure</th>
        <th scope="col">Start date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $planinfo)
            @if ($loop->index == 1)
              <th scope="row">{{ $planinfo->getplan_id() }}</th>
              <td>{{ $planinfo->getinterest_rate() }}% monthly</td>
              <td>{{ $planinfo->gettenure() }} years</td>
              <td>{{ $planinfo->start_date}}</td>
              <td><button type="button" class="btn btn-outline-danger">Schedule Calculation</button></td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>

<div class="p-1 mb-2 bg-secondary text-white">#3 Application Info</div>
<button type="button" class="btn btn-outline-primary"><-Company-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Company name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $companyinfo)
            @if ($loop->index == 2)
              <th scope="row">{{ $companyinfo->getcompanyname() }}</th>
              <td>{{ $companyinfo->getcompanyphonenumber() }}</td>
              <td>{{ $companyinfo->getcompanyaddress() }}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><---Date-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">Application ID</th>
        <th scope="col">Apply Date</th>
        <th scope="col">Start Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $applicationinfo)
            @if ($loop->index == 2)
              <th scope="row">{{ $applicationinfo->id}}</th>
              <td>{{ $applicationinfo->apply_date }}</td>
              <td>{{ $applicationinfo->start_date}}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Motorcycle-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">unit id</th>
        <th scope="col">Price</th>
        <th scope="col">motorcycle certificate</th>
        <th scope="col">motorcycle registration number</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $motorcycleinfo)
            @if ($loop->index == 2)
              <th scope="row">{{ $motorcycleinfo->getmotorcycleid()}}</th>
              <td>{{ $motorcycleinfo->getmotorcycleunit_id() }}</td>
              <td>PHP {{ $motorcycleinfo->getmotorcycleprice() }}</td>
              <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_certificate() }}</td>
              <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_registration_number() }}</td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-primary"><-Rent to own plan-></button>
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Interest Rate</th>
        <th scope="col">Tenure</th>
        <th scope="col">Start date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        @if ($data->applications != null)
          @foreach ($data->applications as $planinfo)
            @if ($loop->index == 2)
              <th scope="row">{{ $planinfo->getplan_id() }}</th>
              <td>{{ $planinfo->getinterest_rate() }}% monthly</td>
              <td>{{ $planinfo->gettenure() }} years</td>
              <td>{{ $planinfo->start_date}}</td>
              <td><button type="button" class="btn btn-outline-danger">Schedule Calculation</button></td>
            @endif
          @endforeach
        @endif
      </tr>
    </tbody>
  </table>-->
</div>
<script src="{{ asset('/js/customer_info.js') }}">
</script>
@endsection







