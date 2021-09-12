@extends('R2O.index')
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
        <div class="col-md-6">
            <form action="/update_company_before_registrating_repayments" method="post">
                @csrf
                <label for="edit_company" class="form-label">Company Update</label>
                <select class="form-select" id="company_id" name="company_id" required>
                    <option value="" style="display: none;">Choose right company name</option>
                    @foreach ($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach
                </select>
                <input type="hidden" id="id" name="id" value="{{$applications->id}}">
                <input type="hidden" id="customer_id" name="customer_id" value="{{$applications->customer_id}}">
                <input type="hidden" id="motorcycle_id" name="motorcycle_id" value="{{$applications->motorcycle_id}}">
                <input type="hidden" id="plan_id" name="plan_id" value="{{$applications->plan_id}}">
                <input type="hidden" id="apply_date" name="apply_date" value="{{$applications->apply_date}}">
                <input type="hidden" id="start_date" name="start_date" value="{{$applications->start_date}}">
                <input type="hidden" id="status" name="status" value="{{$applications->status}}">
                <div class="m-2 col-12">
                    <button type="submit" class="btn btn-primary">Select</button>
                </div>
            </form>
        </div>
        <br>
    </div>
@endsection
