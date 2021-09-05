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
      @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
              <h1><color="red">{{$error}}</h1>
            @endforeach
          </ul>
      @endif
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
        <br>
      <h1>Registration Form</h1>
      <form action="/register_application_info" method="POST" class="needs-validation">
       @csrf
        <div class="col-md-6">
          <label for="inputapply_date" class="form-label" >Apply_Date</label>
          <input type="date" class="form-control" id="apply_date" name="apply_date" placeholder="YYYY-MM-DD" required value="{{ old('apply_date') }}" min="2022-01-01" max="2080-12-31" is-invalid　required>
        </div><br>

        <div class="col-md-6">
          <label for="inputstart_date" class="form-label" >R2O Start_Date</label>
          <input type="date" class="form-control" id="start_date" name="start_date" placeholder="YYYY-MM-DD" required value="{{ old('start_date') }}" min="2022-01-01" max="2080-12-31" is-invalid　required>
        </div><br>

        <div class="col-md-6">
          <label for="inputcompany" class="form-label" >Company</label>
          <select class="form-select" id="company_id" name="company_id">
            <option selected>Select one company from the menu</option>
            @foreach ($companies as $company)
            <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
          </select>
        </div><br>
        <div class="col-md-6">
          <label for="inputmotorcycle" class="form-label" >Motorcycle</label>
          <select class="form-select" id="motorcycle_id" name="motorcycle_id">
            <option selected>Select a purchased motorcycle from the menu</option>
            @foreach ($motorcycles as $motorcycle)
            <option value="{{$motorcycle->id}}">{{$motorcycle->unit_id}}</option>
            @endforeach
          </select>
        </div><br>
        <div class="col-md-6">
          <label for="inputplan" class="form-label" >plan</label>
          <select class="form-select" id="plan_id" name="plan_id">
            <option selected>Select an applied plan from the menu</option>
            @foreach ($plans as $plan)
            <option value="{{$plan->id}}">{{$plan->plan_name}}</option>
            @endforeach
          </select>
        </div><br>
          <input type="hidden" id="status" name="status" value="0">
          <input type="hidden" id="customer_id" name="customer_id" value='{{$data->id}}'>
        <div class="col-12 row-3" style="line-height:4rem">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      </div>
      <script src="{{ asset('/js/application_add.js') }}">
      </script>
      @endsection
