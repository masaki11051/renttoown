@extends('R2O.index')
<style>


</style>
@section('title', 'customer Search')

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
        <form action="/basic_application_info" method="POST" class="row g-3 needs-validation">
            @csrf
            <div class="col-md-4">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="input_name" value="{{$input}}" required>
            </div>
            <div class="col-md-4">
                <label for="age" class="form-label">age</label>
                <input type="number" class="form-control" id="age" min="21" max="60" name="input_age"
                       value="{{$input}}" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
    </div>
@endsection
