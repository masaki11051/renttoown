@extends('R2O.index')
<style>


</style>
@section('title', 'Customer Search')

@section('main_content')
<nav class="navbar navbar-dark bg-primary">
        <div class="container-fluid">
          <a class="navbar-brand" href="toppage">Top page</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Features</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <form action="/find" method="POST" class="row g-3 needs-validation" novalidate>
        @csrf
        <div class="col-md-4">
          <label for="inputname" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputname" name="input_name"　value="{{$input}}">
        </div>
        <div class="col-md-4">
          <label for="inputage" class="form-label">age</label>
          <input type="number" class="form-control" id="inputage" min="21" max="60" name="input_age" value="{{$input}}">
          <div class="invalid-feedback">Please confirm customer's age </div>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
  </form>
    @endsection