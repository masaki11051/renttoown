@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }
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
        <div class="p-1 mb-2 bg-secondary text-white">Customer info</div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">name</th>
                <th scope="col">age</th>
                <th scope="col">Phone number</th>
                <th scope="col">city</th>
                <th scope="col">mail</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    {{$data->id}}
                </td>
                <td>
                    {{$data->name}}
                </td>
                <td>
                    {{$data->age}}
                </td>
                <td>
                    {{$data->phone_number}}
                </td>
                <td>
                    {{$data->city}}
                </td>
                <td>
                    {{$data->mail}}
                </td>
            </tr>
        </table>
        <br>
        <h1>Update location Info of the Motorcycle</h1>
        @csrf
        <button type="button" class="btn btn-outline-primary"><-Motorcycle-></button>
        <form action="/update_info_for_lost_motorcycle" method="POST" class="needs-validation">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">unit id</th>
                    <th scope="col">motorcycle certificate</th>
                    <th scope="col">motorcycle registration number</th>
                    <th scope="col">price</th>
                    <th scope="col">Stored Branch Name</th>
                </tr>
                </thead>
                <tbody>
                @csrf
                <tr>
                    <td>
                        {{$motorcycles->id}}
                    </td>
                    <td>
                        {{$motorcycles->unit_id}}
                    </td>
                    <td>
                        {{$motorcycles->motorcycle_certificate}}
                    </td>
                    <td>
                        {{$motorcycles->motorcycle_registration_number}}
                    </td>
                    <td>
                        <input type="number" id='price' name="price" value="{{$motorcycles->price}}" min="1000"
                               max="150000" required>
                    </td>
                    <td>
                        <div>Motorcycle Lost</div>
                        <input type="hidden" id="location_id" name="location_id" value="5">
                    </td>
                </tr>
                <input type="hidden" id="id" name="id" value="{{$motorcycles->id}}">
                <input type="hidden" id="unit_id" name="unit_id" value="{{$motorcycles->unit_id}}">
                <input type="hidden" id="motorcycle_certificate" name="motorcycle_certificate"
                       value="{{$motorcycles->motorcycle_certificate}}">
                <input type="hidden" id="motorcycle_registration_number" name="motorcycle_registration_number"
                       value="{{$motorcycles->motorcycle_registration_number}}">
                <input type="hidden" id="brand" name="brand" value="{{$motorcycles->brand}}">
                <input type="hidden" id="motorcycle_type" name="motorcycle_type"
                       value="{{$motorcycles->motorcycle_type}}">
                </tbody>
            </table>
            <div class="col-12 row-3" style="line-height:4rem">
                <button type="submit" class="btn btn-primary">update</button>
            </div>
        </form>
    </div>
    <script>
    </script>
@endsection
