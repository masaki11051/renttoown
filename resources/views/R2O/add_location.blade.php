@extends('R2O.index')
<style>

</style>
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
      @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
              <h1><font color="red">{{$error}}</font></h1>
            @endforeach
          </ul>
      @endif
      <h1>Branch Registration Form</h1>
      <form action="/register_location" method="POST" class="row g-3 needs-validation">
        @csrf
        <div class="col-md-6">
          <label for="ML_branch_id" class="form-label">Branch Id</label>
          <input type="text" class="form-control" id="ML_branch_id" name="ML_branch_id" placeholder="011" required value="{{ old('ML_branch_id') }}" required>
        </div>
        <div class="col-md-6">
          <label for="location_name" class="form-label">location Name</label>
          <input type="text" class="form-control" id="location_name" name="location_name" required value="{{ old('location_name') }}" required>
        </div>
        <div class="col-md-6">
          <label for="branch_address" class="form-label">Branch Address</label>
          <input type="text" class="form-control" id="branch_address" placeholder="manila, cebu, or " name="branch_address" required value="{{ old('branch_address') }}"required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      </div>
      <script>
      </script>
      @endsection
