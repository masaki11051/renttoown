@extends('R2O.index')
<style>


</style>
@section('title', 'Customer Information')

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
        <div class="p-1 mb-2 bg-secondary text-white">Customer info</div>
        <form class="p-2" method="post" action="/detail_customer_info_for_repayment" enctype="multipart/form-data">
            @csrf
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
                @if (isset($data))
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
            @endif
            <br>
            @foreach($uploads as $upload)
                <div class="flex-shrink-0 m-2" style="width: 18rem;height: 12rem;">
                    <img src="{{Storage::url($upload->file_path)}}"  alt=""/>
                    <p>{{ $upload->file_name }}</p>
                </div>
            @endforeach
            <br>
            <input type="hidden" id="customer_id" name="customer_id" value="{{$data->id}}">
            <button id="calculation_4" type="submit" class="btn btn-outline-danger">More Details</button>
        </form>
        <script>
        </script>
@endsection







