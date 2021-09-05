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
            <form action="/update_customer_info" method="post">
                @csrf
                <div class="col-md-6">
                    <label for="inputname" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputname" name="name" value="{{$customer->name}}" required>
                </div>
                <div class="col-md-6">
                    <label for="inputage" class="form-label">age</label>
                    <input type="number" class="form-control" id="inputage" min="21" max="60" name="age" required value="{{$customer->age}}" is-invalid required>
                    <div class="invalid-feedback">Please confirm customer's age </div>
                </div>
                <div class="col-md-6">
                    <label for="inputmail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputmail" name="mail" value="{{$customer->mail}}" is-invalid required>
                    <div class="invalid-feedback">Invalid mail address "@" is nesseary</div>
                </div>
                <div class="col-md-6">
                    <label for="inputphone_number" class="form-label">phone number</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="09771231234" name="phone_number" value="{{$customer->phone_number}}" is-invalid required>
                    <div class="invalid-feedback">Please provide a valid Phone Number</div>
                </div>
                <div class="col-md-6">
                    <label for="inputCity" class="form-label">City</label>
                    <input type="text" class="form-control" id="inputCity" placeholder="manila, cebu, or " name="city" value="{{$customer->city}}"required>
                </div>
                <input type="hidden" id="id" name="id" value="{{$customer->id}}">
                <div class="m-2 col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div><br>
    </div>
@endsection
