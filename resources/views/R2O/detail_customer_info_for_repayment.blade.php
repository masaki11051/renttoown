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
        <div class="p-1 mt-2 mb-2 bg-secondary text-white">Application Info</div>
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
                @if ($data->applications != null)
                    @foreach ($data->applications as $motorcycleinfo)
                        @if ($loop->index == 0)
                            <th scope="row">{{ $motorcycleinfo->getmotorcycleid()}}</th>
                            <td>{{ $motorcycleinfo->getmotorcycleunit_id() }}</td>
                            <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_certificate() }}</td>
                            <td>{{ $motorcycleinfo->getmotorcyclemotorcycle_registration_number() }}</td>
                        @endif
                    @endforeach
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
            <tbody id="calculation">
            <tr>
                @if ($data->applications != null)
                    @foreach ($data->applications as $planinfo)
                        @if ($loop->index == 0)
                            <td scope="row">{{ $planinfo->getmotorcycleprice() }}</td>
                            <td>{{ $planinfo->getinterest_rate() }}</td>
                            <td>{{ $planinfo->gettenure() }}</td>
                            <td>{{ $planinfo->start_date}} </td>
                        @endif
                    @endforeach
                @endif
            </tr>
            </tbody>
        </table>
        <form action="/register_repayment_info" method="post" name="myForm">
            @csrf
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
            <input type="hidden" id="application_id" name="application_id" value="{{$info->id}}">
            <input type="hidden" id="start_date" name="start_date" value="{{$info->start_date}}">
            <button id="calculation_1" type="button" class="btn btn-outline-danger">Repayment Amount/schedule Calculation</button>
            <div class='m-2' id="hidden1">
                <button id="myForm" type="submit" class="btn btn-primary">Generate Bills</button>
                <div id="div1">Repayment Amount（PHP） </div>
                <!--<div id="div2">First Repayment Amount（PHP） </div>-->
                <table id='data-table' class="table table-hover" >
                    <thead>
                        <tr>
                            <th scope="col">NO of payment</th>
                            <th scope="col">payment_date</th>
                            <th scope="col">payment amount</th>
                            <th scope="col">Balance</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </form>
    </div>
    <script src="{{ asset('/js/repayment_info.js') }}">
    </script>
@endsection















