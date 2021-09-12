@extends('R2O.index')
<style>


</style>
@section('title', 'Upload files')

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
        <form class="p-2" method="post" action="/upload_scan_copies" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Application Form
                </button>
                <input type="file" name="file[]" class="form-control" id="inputGroupFile03"
                       aria-describedby="inputGroupFileAddon03" aria-label="Upload"
                       accept="image/gif,image/jpeg,image/png,application/pdf" multiple required>
            </div>
            <div class="input-group mb-3">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Customer ID</button>
                <input type="file" name="file[]" class="form-control" aria-describedby="inputGroupFileAddon03"
                       aria-label="Upload" accept="image/gif,image/jpeg,image/png,application/pdf" multiple required>
            </div>
            <button type="submit" value="Upload" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection
