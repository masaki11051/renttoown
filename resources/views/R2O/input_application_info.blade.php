@extends('R2O.index')
<style>

</style>
@section('main_content')
    <div class="p-4">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">Top page</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <h1 class="text-danger">{{$error}}</h1>
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
                <label for="apply_date" class="form-label">Apply_Date</label>
                <input type="date" class="form-control" id="apply_date" name="apply_date" placeholder="YYYY-MM-DD"
                       value="{{ old('apply_date') }}" min="2021-01-01" max="2031-12-31" required>
            </div>
            <br>
            <div class="col-md-6">
                <label for="start_date" class="form-label">R2O Start_Date</label>
                <input type="date" class="form-control" id="start_date" name="start_date" placeholder="YYYY-MM-DD"
                       value="{{ old('start_date') }}" min="2021-01-01" max="2032-12-31" required>
            </div>
            <br>
            <div class="col-md-6">
                <label for="company" class="form-label">Company</label>
                <select class="form-select" id="company_id" name="company_id" required>
                    <option value="" style="display: none;">Select one company from the menu</option>
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col-md-6">
                <label for="motorcycle" class="form-label">Motorcycle</label>
                <select class="form-select" id="motorcycle_id" name="motorcycle_id" required>
                    <option value="" style="display: none;">Select a purchased motorcycle from the menu</option>
                    @foreach ($motorcycles as $motorcycle)
                        <option value="{{$motorcycle->id}}">{{$motorcycle->unit_id}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="col-md-6">
                <label for="plan" class="form-label">plan</label>
                <select class="form-select" id="plan_id" name="plan_id" required>
                    <option value="" style="display: none;">Select an applied plan from the menu</option>
                    @foreach ($plans as $plan)
                        <option value="{{$plan->id}}">{{$plan->plan_name}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <input type="hidden" id="status" name="status" value="0">
            <!--detail_customer_info_for_repaymentで返済情報を登録するまでApplicationはActiveではないStatus0-->
            <input type="hidden" id="customer_id" name="customer_id" value='{{$data->id}}'>
            <div class="col-12 row-3" style="line-height:4rem">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
    <script>
    </script>
@endsection
