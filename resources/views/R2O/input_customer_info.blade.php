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
        <h1>Customer Registration Form</h1>
        <form action="/register_customer_info" method="POST" class="row g-3 needs-validation">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            </div>
            <div class="col-md-6">
                <label for="age" class="form-label">age</label>
                <input type="number" class="form-control" id="age" min="21" max="60" name="age" value="{{ old('age') }}"
                       required>
            </div>
            <div class="col-md-6">
                <label for="mail" class="form-label">Email</label>
                <input type="email" class="form-control" id="mail" name="mail" value="{{ old('mail') }}" required>
            </div>
            <div class="col-md-6">
                <label for="phone_number" class="form-label">phone number</label>
                <input type="text" class="form-control" id="phone_number" placeholder="09771231234" name="phone_number"
                       value="{{ old('phone_number') }}" required>
            </div>
            <div class="col-md-6">
                <label for="City" class="form-label">City</label>
                <input type="text" class="form-control" id="City" placeholder="manila, cebu, or " name="city"
                       value="{{ old('city') }}" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
    <script>
    </script>
@endsection
