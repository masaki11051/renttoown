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
        <h1>Company Registration Form</h1>
        <form action="/register_company" method="POST" class="row g-3 needs-validation">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Company name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                       required>
            </div>
            <div class="col-md-6">
                <label for="phone_number" class="form-label">phone number</label>
                <input type="text" class="form-control" id="phone_number" placeholder="09771231234" name="phone_number"
                       value="{{ old('phone_number') }}" required>
            </div>
            <div class="col-md-6">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" placeholder="manila, cebu, or " name="address"
                       value="{{ old('address') }}" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
    <script>
    </script>
@endsection
