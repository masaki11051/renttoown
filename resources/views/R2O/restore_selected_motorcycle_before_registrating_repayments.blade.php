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
        <div class="col-md-12">
            <label for="edit_motorcycle" class="form-label">Restore selected motorcycle by mistake first</label>
            <form action="/update_location_for_selected_motorcycle_before_registrating_repayments" method="post">
                @csrf
                <table class="table table-hover table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">unit id</th>
                        <th scope="col">motorcycle certificate</th>
                        <th scope="col">motorcycle registration number</th>
                        <th scope="col">Stored Branch Name</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <th scope="row">{{ $selected_motorcycles->id}}</th>
                        <td>{{ $selected_motorcycles->unit_id}}</td>
                        <td>{{ $selected_motorcycles->motorcycle_certificate}}</td>
                        <td>{{ $selected_motorcycles->motorcycle_registration_number}}</td>
                        <td>
                            <select class="form-select" id="location_id" name="location_id">
                                <option value="" style="display: none;">Choose right location for wrongly selected
                                    motorcycle
                                </option>
                                @foreach ($locations as $location)
                                    <option value="{{$location->id}}">{{$location->location_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
                <input type="hidden" id="id" name="id" value="{{$selected_motorcycles->id}}">
                <input type="hidden" id="unit_id" name="unit_id" value="{{$selected_motorcycles->unit_id}}">
                <input type="hidden" id="motorcycle_certificate" name="motorcycle_certificate"
                       value="{{$selected_motorcycles->motorcycle_certificate}}">
                <input type="hidden" id="motorcycle_registration_number" name="motorcycle_registration_number"
                       value="{{$selected_motorcycles->motorcycle_registration_number}}">
                <input type="hidden" id="brand" name="brand" value="{{$selected_motorcycles->brand}}">
                <input type="hidden" id="motorcycle_type" name="motorcycle_type"
                       value="{{$selected_motorcycles->motorcycle_type}}">
                <div class="m-2 col-12">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
        <br>
    </div>
@endsection
