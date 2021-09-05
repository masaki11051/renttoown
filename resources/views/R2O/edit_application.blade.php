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
        <div class="col-md-6">
            <form action="/update_application" method="post">
                @csrf
                <div class="col-md-6">
                    <label for="inputapply_date" class="form-label" >Apply_Date</label>
                    <input type="date" class="form-control" id="apply_date" name="apply_date" placeholder="YYYY-MM-DD" required value="{{$applications->apply_date}}" min="2022-01-01" max="2080-12-31" is-invalid　required>
                </div><br>
                <div class="col-md-6">
                    <label for="inputstart_date" class="form-label" >Start_Date</label>
                    <input type="date" class="form-control" id="start_date" name="start_date" placeholder="YYYY-MM-DD" required value="{{$applications->start_date}}" min="2022-01-01" max="2080-12-31" is-invalid　required>
                </div><br>
                <input type="hidden" id="id" name="id" value="{{$applications->id}}">
                <input type="hidden" id="customer_id" name="customer_id" value="{{$applications->customer_id}}">
                <input type="hidden" id="company_id" name="company_id" value="{{$applications->company_id}}">
                <input type="hidden" id="motorcycle_id" name="motorcycle_id" value="{{$applications->motorcycle_id}}">
                <input type="hidden" id="plan_id" name="plan_id" value="{{$applications->plan_id}}">
                <input type="hidden" id="status" name="status" value="{{$applications->status}}">
                <div class="m-2 col-12">
                    <button type="submit" class="btn btn-primary">Select</button>
                </div>
            </form>
        </div><br>
    </div>
@endsection
