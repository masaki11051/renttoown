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
        @if (count($errors) > 0)
            <ul>
                @foreach ($errors->all() as $error)
                    <h1 class="text-danger">{{$error}}</h1>
                @endforeach
            </ul>
        @endif
        <h1>Company Registration Form</h1>
        <form action="/update_location_info" method="POST" class="row g-3 needs-validation">
            @csrf
            <div class="col-md-6">
                <label for="ML_branch_id" class="form-label">Branch Id</label>
                <input type="number" class="form-control" id="ML_branch_id" name="ML_branch_id" placeholder="011"
                       value="{{$location->ML_branch_id}}" required>
            </div>
            <div class="col-md-6">
                <label for="location_name" class="form-label">location Name</label>
                <input type="text" class="form-control" id="location_name" name="location_name"
                       value="{{$location->location_name}}" required>
            </div>
            <div class="col-md-6">
                <label for="branch_address" class="form-label">Branch Address</label>
                <input type="text" class="form-control" id="branch_address" placeholder="manila, cebu, or "
                       name="branch_address" value="{{$location->branch_address}}" required>
            </div>
            <div class="col-12 row-3" style="line-height:4rem">
                <input type="hidden" id="id" name="id" value="{{$location->id}}">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
    <br>
    </div>
@endsection
