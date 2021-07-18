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
      <h1>Registration Form</h1>
     
      <form action="/application_add" method="POST" class="row g-3 needs-validation">
        @csrf
        <div class="col-md-6">
          <label for="inputapply_date" class="form-label" >apply_date</label>
          <input type="date" class="form-control" id="apply_date" name="apply_date" placeholder="YYYY-MM-DD" required value="{{ old('apply_date') }}" min="2022-01-01" max="2080-12-31" is-invalid　required>
        </div><br>
        <div class="col-md-6">
          <label for="inputcompany" class="form-label" >Company</label>
          <select class="form-select" id="company_id" name="company_id[]">
            <option selected>Select one company from the menu</option>
            @foreach ($items as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
          </select>
        </div>

        <div class="col-12 row-3" style="line-height:4rem">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      <script src="{{ asset('/js/plan_add.js') }}">
      </script>
      @endsection
