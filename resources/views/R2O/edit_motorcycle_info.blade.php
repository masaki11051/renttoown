@extends('R2O.index')
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
        <div class="col-md-6">
            <h1>Update Motorcycle Info</h1>
            <form action="/update_motorcycle_info" method="POST" class="needs-validation">
                @csrf
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="brand" id="Honda" value="Honda"
                           onchange="myfunc(this.value)" required>
                    <label class="form-check-label" for="Honda">Honda</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="brand" id="Kawasaki" value="Kawasaki"
                           onchange="myfunc(this.value)" required>
                    <label class="form-check-label" for="Kawasaki">Kawasaki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="brand" id="Suzuki" value="Suzuki"
                           onchange="myfunc(this.value)" required>
                    <label class="form-check-label" for="Suzuki">Suzuki</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="brand" id="Yamaha" value="Yamaha"
                           onchange="myfunc(this.value)" required>
                    <label class="form-check-label" for="Yamaha">Yamaha</label>
                </div>

                <div id="hidden1">
                    <h3 style="line-height:4rem">HONDA : Please choose a motorcycle model</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx"
                               required>
                        <label class="form-check-label" for="xxx">xxx</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"
                               required>
                        <label class="form-check-label" for="yyy">yyy</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz"
                               required>
                        <label class="form-check-label" for="zzz">zzz</label>
                    </div>
                </div>

                <div id="hidden2">
                    <h3 style="line-height:4rem">KAWASAKI : Please choose a motorcycle model</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx"
                               required>
                        <label class="form-check-label" for="xxx">xxx</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"
                               required>
                        <label class="form-check-label" for="yyy">yyy</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz"
                               required>
                        <label class="form-check-label" for="zzz">zzz</label>
                    </div>
                </div>

                <div id="hidden3">
                    <h3 style="line-height:4rem">Suzuki : Please choose a motorcycle model</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx"
                               required>
                        <label class="form-check-label" for="xxx">xxx</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"
                               required>
                        <label class="form-check-label" for="yyy">yyy</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz"
                               required>
                        <label class="form-check-label" for="zzz">zzz</label>
                    </div>
                </div>

                <div id="hidden4">
                    <h3 style="line-height:4rem">Yamaha : Please choose a motorcycle model</h3>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="xxx" value="xxx"
                               required>
                        <label class="form-check-label" for="xxx">xxx</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="yyy" value="yyy"
                               required>
                        <label class="form-check-label" for="yyy">yyy</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="motorcycle_type" id="zzz" value="zzz"
                               required>
                        <label class="form-check-label" for="zzz">zzz</label>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="unit_id" class="form-label">Unit ID</label>
                    <input type="text" class="form-control" id="unit_id" name="unit_id"
                           placeholder="Honda/xxx/11111(Motorcycle_certificate)"
                           value="{{$motorcycle->unit_id}}" required>
                </div>
                <div class="col-md-6">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="60000"
                           value="{{$motorcycle->price}}" required>
                </div>
                <div class="col-md-6">
                    <label for="phone_number" class="form-label">Motorcycle_certificate</label>
                    <input type="text" class="form-control" id="motorcycle_certificate" name="motorcycle_certificate"
                           value="{{$motorcycle->motorcycle_certificate}}" required>
                </div>
                <div class="col-md-6">
                    <label for="motorcycle_registration_number"
                           class="form-label">Motorcycle_registration_number</label>
                    <input type="text" class="form-control" id="motorcycle_registration_number"
                           name="motorcycle_registration_number"
                           value="{{$motorcycle->motorcycle_registration_number}}" required>
                </div>
                <div class="col-md-6">
                    <label for="location_name" class="form-label">Stored Branch Name</label>
                    <select class="form-select" id="location_id" name="location_id" required>
                        <option value="" style="display: none;"> Select right location</option>
                        @foreach ($locations as $location)
                            <option value="{{$location->id}}">{{$location->location_name}}</option>
                        @endforeach
                    </select>
                </div>
                <br>
                <div class="m-2 col-12">
                    <input type="hidden" id="id" name="id" value="{{$motorcycle->id}}">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <br>
    </div>
    <script src="{{ asset('/js/edit_motorcycle_info.js') }}">
    </script>
@endsection
