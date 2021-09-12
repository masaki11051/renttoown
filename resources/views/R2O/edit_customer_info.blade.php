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
        <div class="col-md-6">
            <form action="/update_customer_info" method="post" class="needs-validation">
                @csrf
                <div class="col-md-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$customer->name}}"
                           required>
                </div>
                <div class="col-md-6">
                    <label for="age" class="form-label">age</label>
                    <input type="number" class="form-control" id="age" min="21" max="60" name="age"
                           value="{{$customer->age}}" required>
                </div>
                <div class="col-md-6">
                    <label for="mail" class="form-label">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail" value="{{$customer->mail}}"
                           required>
                </div>
                <div class="col-md-6">
                    <label for="phone_number" class="form-label">phone number</label>
                    <input type="text" class="form-control" id="phone_number" placeholder="09771231234"
                           name="phone_number" value="{{$customer->phone_number}}" required>
                </div>
                <div class="col-md-6">
                    <label for="City" class="form-label">City</label>
                    <input type="text" class="form-control" id="City" placeholder="manila, cebu, or " name="city"
                           value="{{$customer->city}}" required>
                </div>
                <input type="hidden" id="id" name="id" value="{{$customer->id}}">
                <div class="m-2 col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <br>
    </div>
@endsection
