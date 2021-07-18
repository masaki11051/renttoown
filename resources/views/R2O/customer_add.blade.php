@extends('R2O.index')
<style>

</style>
@section('main_content')
      @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
              <h3><font color="red">{{$error}}</font></h3>
            @endforeach
          </ul>
      @endif
      <h1>Customer Registration Form</h1>
      <form action="/add" method="POST" class="row g-3 needs-validation">
        @csrf
        <div class="col-md-6">
          <label for="inputname" class="form-label">Name</label>
          <input type="text" class="form-control" id="inputname" name="name" required value="{{ old('name') }}" required>
        </div>
        <div class="col-md-6">
          <label for="inputage" class="form-label">age</label>
          <input type="number" class="form-control" id="inputage" min="21" max="60" name="age" required value="{{ old('age') }}" is-invalid required>
          <div class="invalid-feedback">Please confirm customer's age </div>
        </div>
        <div class="col-md-6">
          <label for="inputmail" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputmail" name="mail" required value="{{ old('mail') }}" is-invalid required>
          <div class="invalid-feedback">Invalid mail address "@" is nesseary</div>
        </div>
        <div class="col-md-6">
          <label for="inputphone_number" class="form-label">phone number</label>
          <input type="text" class="form-control" id="phone_number" placeholder="09771231234" name="phone_number" required value="{{ old('phone_number') }}" is-invalid required>
          <div class="invalid-feedback">Please provide a valid Phone Number</div>
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">City</label>
          <input type="text" class="form-control" id="inputCity" placeholder="manila, cebu, or " name="city" required value="{{ old('city') }}"required>
        </div>
        <div class="input-group mb-3">
          <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon03">Application Form</button>
          <input type="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      <script>
      </script>
      @endsection
