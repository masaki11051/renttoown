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
        <h1>R2O Plan Registration Form</h1>
        <form action="/register_plan" method="POST" class="needs-validation">
            @csrf
            <div class="col-md-6 mt-2">
                <label for="plan_name" class="form-label">R2O plan name</label>
                <input type="text" class="form-control" id="plan_name" name="plan_name" placeholder="X% / Xyears"
                       value="{{ old('plan_name') }}" required>
            </div>
            <label for="interest_rate" class="form-label mt-2">Interest Rate</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="interest_rate" id="3percent" value="3"
                       onchange="myfunc(this.value)" required>
                <label class="form-check-label" for="Honda">3%</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="interest_rate" id="4percent" value="4"
                       onchange="myfunc(this.value)" required>
                <label class="form-check-label" for="Kawasaki">4%</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="interest_rate" id="5percent" value="5"
                       onchange="myfunc(this.value)" required>
                <label class="form-check-label" for="Suzuki">5%</label>
            </div>
            <br>
            <label for="tenure" class="form-label mt-2">Tenure</label><br>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tenure" id="2years" value="2"
                       onchange="myfunc(this.value)" required>
                <label class="form-check-label" for="2years">2years</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tenure" id="3years" value="3"
                       onchange="myfunc(this.value)" required>
                <label class="form-check-label" for="3years">3years</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="tenure" id="4years" value="4"
                       onchange="myfunc(this.value)" required>
                <label class="form-check-label" for="4years">4years</label>
            </div>

            <div class="col-12 row-3 mt-2" style="line-height:4rem">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>
    <script>
    </script>
@endsection
