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
      <h1>Motorcycle Registration Form</h1>
      <form action="/motorcycle_add" method="POST" class="needs-validation"　novalidate>
        @csrf
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="brand" id="Honda" value="Honda" onchange="myfunc(this.value)" required>
          <label class="form-check-label" for="Honda">Honda</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="brand" id="Kawasaki" value="Kawasaki" onchange="myfunc(this.value)" required>
          <label class="form-check-label" for="Kawasaki">Kawasaki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="brand" id="Suzuki" value="Suzuki" onchange="myfunc(this.value)" required>
          <label class="form-check-label" for="Suzuki">Suzuki</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="brand" id="Yamaha" value="Yamaha" onchange="myfunc(this.value)" required>
          <label class="form-check-label" for="Yamaha">Yamaha</label>
        </div>
        <div class="invalid-feedback">More example invalid feedback text</div>

        <div id="hidden1">
          <h3 style="line-height:4rem">HONDA : Please choose a motorcycle model</h3>
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx" required>
          <label class="form-check-label" for="xxx">xxx</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"  required>
          <label class="form-check-label" for="yyy">yyy</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz" required>
          <label class="form-check-label" for="zzz">zzz</label>
        </div>
        </div>

        <div id="hidden2">
          <h3 style="line-height:4rem">KAWASAKI : Please choose a motorcycle model</h3>
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx" required>
          <label class="form-check-label" for="xxx">xxx</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"  required>
          <label class="form-check-label" for="yyy">yyy</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz" required>
          <label class="form-check-label" for="zzz">zzz</label>
        </div>
        </div>

        <div id="hidden3">
          <h3 style="line-height:4rem">Suzuki : Please choose a motorcycle model</h3>
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx" required>
          <label class="form-check-label" for="xxx">xxx</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"  required>
          <label class="form-check-label" for="yyy">yyy</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz" required>
          <label class="form-check-label" for="zzz">zzz</label>
        </div>
        </div>

        <div id="hidden4">
          <h3 style="line-height:4rem">Yamaha : Please choose a motorcycle model</h3>
          <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx" required>
          <label class="form-check-label" for="xxx">xxx</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"  required>
          <label class="form-check-label" for="yyy">yyy</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz" required>
          <label class="form-check-label" for="zzz">zzz</label>
        </div>
        </div>

        <div class="col-md-6">
          <label for="inputprice" class="form-label" >Price</label>
          <input type="price" class="form-control" id="inputprice" name="price" placeholder="60000" required value="{{ old('price') }}" is-invalid　required>
        </div>
        <div class="col-md-6">
          <label for="inputphone_number" class="form-label">Motorcycle_certificate</label>
          <input type="text" class="form-control" id="motorcycle_certificate" name="motorcycle_certificate" required value="{{ old('motorcycle_certificate') }}" required>
        </div>
        <div class="col-md-6">
          <label for="inputmotorcycle_registration_number" class="form-label">Motorcycle_registration_number</label>
          <input type="text" class="form-control" id="inputCity" name="motorcycle_registration_number" required value="{{ old('motorcycle_registration_number') }}"required>
        </div>
        <div class="col-12 row-3" style="line-height:4rem">
          <button type="submit" class="btn btn-primary">Register</button>
        </div>
      </form>
      <script src="{{ asset('/js/motorcycle_add.js') }}">
      </script>
      @endsection
