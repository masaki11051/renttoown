@extends('R2O.index')
<style>

</style>
@section('main_content')
      @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
              <h1><font color="red">{{$error}}</font></h1>
            @endforeach
          </ul>
      @endif
      <h1>Company Registration Form</h1>
      <form action="/company_add" method="POST" class="row g-3 needs-validation">
        @csrf
        <div class="col-md-6">
          <label for="inputname" class="form-label">Company name</label>
          <input type="text" class="form-control" id="inputname" name="name" required value="{{ old('name') }}" required>
        </div>
        <div class="col-md-6">
          <label for="inputphone_number" class="form-label">phone number</label>
          <input type="text" class="form-control" id="phone_number" placeholder="09771231234" name="phone_number" required value="{{ old('phone_number') }}" is-invalid required>
        </div>
        <div class="col-md-6">
          <label for="inputaddress" class="form-label">Address</label>
          <input type="text" class="form-control" id="inputaddress" placeholder="manila, cebu, or " name="address" required value="{{ old('address') }}"required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      <script>
      </script>
      @endsection
