@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }

</style>
@section('title', 'Customer Infomation')

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
  <div class="p-1 mb-2 bg-secondary text-white table table-bordered">Customer info</div>
  <table class="table table-hover table table-bordered">
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
<div class="p-1 mt-2 mb-2 bg-secondary text-white">Active Application Info</div>
    @if (isset($active_application))
    <form action="/edit_company" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
            <button type="submit" class="btn btn-primary">Edit Company Info</button>
        </div>
    </form>
      <table class="table table-hover table table-bordered">
        <thead>
          <tr>
            <th scope="col">Company name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
          </tr>
        </thead>
        <tbody>
          <tr>
              @if (isset($active_application))
                  <td>{{ $active_application->getcompanyname() }}</th>
                  <td>{{ $active_application->getcompanyphonenumber() }}</td>
                  <td>{{ $active_application->getcompanyaddress() }}</td>
              @endif
          </tr>
        </tbody>
      </table>
    <form action="/edit_application" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
            <button type="submit" class="btn btn-primary">Edit Application Info</button>
        </div>
    </form>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">Application ID</th>
        <th scope="col">Apply Date</th>
        <th scope="col">Start Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @if (isset($active_application))
              <td>{{ $active_application->id}}</th>
              <td>{{ $active_application->apply_date }}</td>
              <td>{{ $active_application->start_date}}</td>
          @endif
      </tr>
    </tbody>
  </table>
    <form action="/restore_selected_motorcycle" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
            <button type="submit" class="btn btn-primary">Edit Motorcycle Info</button>
        </div>
    </form>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">unit id</th>
        <th scope="col">motorcycle certificate</th>
        <th scope="col">motorcycle registration number</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @if (isset($active_application))
              <td>{{ $active_application->getmotorcycleid()}}</th>
              <td>{{ $active_application->getmotorcycleunit_id() }}</td>
              <td>{{ $active_application->getmotorcyclemotorcycle_certificate() }}</td>
              <td>{{ $active_application->getmotorcyclemotorcycle_registration_number() }}</td>
          @endif
      </tr>
    </tbody>
  </table>
    <form action="/edit_plan" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
            <button type="submit" class="btn btn-primary">Edit Plan Info</button>
        </div>
    </form>
  <table class="table table-hover table table-bordered" >
    <thead>
      <tr>
        <th scope="col">Amount</th>
        <th scope="col">Interest Rate(%/monthly)</th>
        <th scope="col">Tenure(years)</th>
        <th scope="col">Start date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @if (isset($active_application))
              <td>{{ $active_application->getmotorcycleprice() }}</th>
              <td>{{ $active_application->getinterest_rate() }}</td>
              <td>{{ $active_application->gettenure() }}</td>
              <td>{{ $active_application->start_date}} </td>
          @endif
      </tr>
    </tbody>
  </table>
    <form action="/repayments_info_of_application" method="post">
        @csrf
        <div class="card-body">
                <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
                <input type="hidden" id="id" name="id" value="{{$active_application->id}}">
                <button type="submit" class="btn btn-primary">View bills </button>
        </div>
    </form>
@endif
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="p-1 mt-2 mb-2 bg-dark text-white">First Application Info(already terminated)</div>
    @if (isset($non_active_applications))
    <button type="button" class="btn btn-outline-dark"><-company-></button>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">Company name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @if (isset($non_active_applications))
              @foreach ($non_active_applications as $companyinfo)
            @if ($loop->index == 0)
                      <td>{{ $companyinfo->getcompanyname() }}</th>
                      <td>{{ $companyinfo->getcompanyphonenumber() }}</td>
                      <td>{{ $companyinfo->getcompanyaddress() }}</td>
            @endif
          @endforeach
          @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-dark"><-Date-></button>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">Application ID</th>
        <th scope="col">Apply Date</th>
        <th scope="col">Start Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @if (isset($non_active_applications))
          @foreach ($non_active_applications as $applicationinfo)
            @if ($loop->index == 0)
                      <td>{{ $applicationinfo->id}}</th>
                      <td>{{ $applicationinfo->apply_date }}</td>
                      <td>{{ $applicationinfo->start_date}}</td>
            @endif
          @endforeach
          @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-dark"><-Motorcycle-></button>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">unit id</th>
        <th scope="col">motorcycle certificate</th>
        <th scope="col">motorcycle registration number</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @if (isset($non_active_applications))
          @foreach ($non_active_applications as $motorcycleinfo)
            @if ($loop->index == 0)
                      <td>{{ $motorcycleinfo->getmotorcycleid()}}</th>
                      <td>{{ $motorcycleinfo->getmotorcycleunit_id() }}</td>
                      <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_certificate() }}</td>
                      <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_registration_number() }}</td>
            @endif
          @endforeach
          @endif
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn btn-outline-dark"><-Plan-></button>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">Amount</th>
        <th scope="col">Interest Rate(%/monthly)</th>
        <th scope="col">Tenure(years)</th>
        <th scope="col">Start date</th>
      </tr>
    </thead>
    <tbody id="calculation2">
      <tr>
          @if (isset($non_active_applications))
          @foreach ($non_active_applications as $planinfo)
            @if ($loop->index == 0)
                      <td>{{ $planinfo->getmotorcycleprice() }}</td>
                      <td>{{ $planinfo->getinterest_rate() }}</td>
                      <td>{{ $planinfo->gettenure() }}</td>
                      <td>{{ $planinfo->start_date}} </td>
            @endif
          @endforeach
          @endif
      </tr>
    </tbody>
  </table>
    <form action="/repayments_info_of_application" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
            @if (isset($non_active_applications))
                @foreach ($non_active_applications as $applicationinfo)
                    @if ($loop->index == 0)
                        <input type="hidden" id="id" name="id" value="{{$applicationinfo->id}}">
                    @endif
                @endforeach
            @endif
            <button type="submit" class="btn btn-secondary btn-lg">View bills </button>
        </div>
    </form>
<!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="p-1 mt-2 mb-2 bg-dark text-white">Second Application Info(already terminated)</div>
<button type="button" class="btn btn-outline-dark"><-Company-></button>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">Company name</th>
        <th scope="col">Phone Number</th>
        <th scope="col">Address</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @foreach ($non_active_applications as $companyinfo)
            @if ($loop->index == 1)
                      <td>{{ $companyinfo->getcompanyname() }}</th>
                      <td>{{ $companyinfo->getcompanyphonenumber() }}</td>
                      <td>{{ $companyinfo->getcompanyaddress() }}</td>
            @endif
          @endforeach
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-dark"><-Date-></button>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">Application ID</th>
        <th scope="col">Apply Date</th>
        <th scope="col">Start Date</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @foreach ($non_active_applications as $applicationinfo)
            @if ($loop->index == 1)
                      <td>{{ $applicationinfo->id}}</th>
                      <td>{{ $applicationinfo->apply_date }}</td>
                      <td>{{ $applicationinfo->start_date}}</td>
            @endif
          @endforeach
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-dark"><-Motorcycle-></button>
  <table class="table table-hover table table-bordered">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">unit id</th>
        <th scope="col">motorcycle certificate</th>
        <th scope="col">motorcycle registration number</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          @foreach ($non_active_applications as $motorcycleinfo)
            @if ($loop->index == 1)
                      <td>{{ $motorcycleinfo->getmotorcycleid()}}</th>
                      <td>{{ $motorcycleinfo->getmotorcycleunit_id() }}</td>
                      <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_certificate() }}</td>
                      <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_registration_number() }}</td>
            @endif
          @endforeach
      </tr>
    </tbody>
  </table>
<button type="button" class="btn btn-outline-dark"><-plan-></button>
  <table class="table table-hover table table-bordered" >
    <thead>
      <tr>
        <th scope="col">Amount</th>
        <th scope="col">Interest Rate(%/monthly)</th>
        <th scope="col">Tenure(years)</th>
        <th scope="col">Start date</th>
      </tr>
    </thead>
    <tbody id="calculation3">
      <tr>
          @foreach ($non_active_applications as $planinfo)
            @if ($loop->index == 1)
                      <td>{{ $planinfo->getmotorcycleprice() }}</th>
                      <td>{{ $planinfo->getinterest_rate() }}</td>
                      <td>{{ $planinfo->gettenure() }}</td>
                      <td>{{ $planinfo->start_date}} </td>
            @endif
          @endforeach
      </tr>
    </tbody>
  </table>
    <form action="/repayments_info_of_application" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
                @foreach ($non_active_applications as $applicationinfo)
                    @if ($loop->index == 1)
                        <input type="hidden" id="id" name="id" value="{{$applicationinfo->id}}">
                    @endif
                @endforeach
            <button type="submit" class="btn btn-secondary btn-lg">View bills </button>
        </div>
    </form>
    <!--///////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
    <div class="p-1 mt-2 mb-2 bg-dark text-white">third Application Info(already terminated)</div>
    <button type="button" class="btn btn-outline-dark"><-Company-></button>
    <table class="table table-hover table table-bordered">
        <thead>
        <tr>
            <th scope="col">Company name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Address</th>
        </tr>
        </thead>
        <tbody>
        <tr>
                @foreach ($non_active_applications as $companyinfo)
                    @if ($loop->index == 2)
                        <td>{{ $companyinfo->getcompanyname() }}</th>
                        <td>{{ $companyinfo->getcompanyphonenumber() }}</td>
                        <td>{{ $companyinfo->getcompanyaddress() }}</td>
                    @endif
                @endforeach
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-outline-dark"><-Date-></button>
    <table class="table table-hover table table-bordered">
        <thead>
        <tr>
            <th scope="col">Application ID</th>
            <th scope="col">Apply Date</th>
            <th scope="col">Start Date</th>
        </tr>
        </thead>
        <tbody>
        <tr>
                @foreach ($non_active_applications as $applicationinfo)
                    @if ($loop->index == 2)
                        <td>{{ $applicationinfo->id}}</th>
                        <td>{{ $applicationinfo->apply_date }}</td>
                        <td>{{ $applicationinfo->start_date}}</td>
                    @endif
                @endforeach
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-outline-dark"><-Motorcycle-></button>
    <table class="table table-hover table table-bordered">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">unit id</th>
            <th scope="col">motorcycle certificate</th>
            <th scope="col">motorcycle registration number</th>
        </tr>
        </thead>
        <tbody>
        <tr>
                @foreach ($non_active_applications as $motorcycleinfo)
                    @if ($loop->index == 2)
                        <td>{{ $motorcycleinfo->getmotorcycleid()}}</th>
                        <td>{{ $motorcycleinfo->getmotorcycleunit_id() }}</td>
                        <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_certificate() }}</td>
                        <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_registration_number() }}</td>
                    @endif
                @endforeach
        </tr>
        </tbody>
    </table>
    <button type="button" class="btn btn-outline-dark"><-plan-></button>
    <table class="table table-hover table table-bordered" >
        <thead>
        <tr>
            <th scope="col">Amount</th>
            <th scope="col">Interest Rate(%/monthly)</th>
            <th scope="col">Tenure(years)</th>
            <th scope="col">Start date</th>
        </tr>
        </thead>
        <tbody id="calculation3">
        <tr>
                @foreach ($non_active_applications as $planinfo)
                    @if ($loop->index == 2)
                        <td>{{ $planinfo->getmotorcycleprice() }}</th>
                        <td>{{ $planinfo->getinterest_rate() }}</td>
                        <td>{{ $planinfo->gettenure() }}</td>
                        <td>{{ $planinfo->start_date}} </td>
                    @endif
                @endforeach
        </tr>
        </tbody>
    </table>
    <form action="/repayments_info_of_application" method="post">
        @csrf
        <div class="card-body">
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
                @foreach ($non_active_applications as $applicationinfo)
                    @if ($loop->index == 2)
                        <input type="hidden" id="id" name="id" value="{{$applicationinfo->id}}">
                    @endif
                @endforeach
            <button type="submit" class="btn btn-secondary btn-lg">View bills </button>
        </div>
    </form>
    @endif
</div>
<script>
</script>
@endsection







