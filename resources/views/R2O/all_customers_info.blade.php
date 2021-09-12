@extends('R2O.index')
<style>
    table {
        table-layout: fixed;
    }
</style>
@section('title', 'ALL customer Basic Information')

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
        <br>
        <div class="mb-3">
            <label>Search Box</label>
            <input onkeyup='searchTable()' type='text' class="form-control" id='myInput'
                   placeholder="input 'ANY' you want to search ">
        </div>
        <table id="myTable" class="table table-hover table table-bordered">
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>age</th>
                <th>phone_number</th>
                <th>city</th>
                <th>mail</th>
                <th>Edit Button</th>
            </tr>
            @foreach ($customer_items as $customer_item)
                <tr>
                    <form action="/edit_customer_info" method="get" class="row g-3 needs-validation">
                        @csrf
                        <td>
                            {{$customer_item->id}}
                        </td>
                        <td>
                            {{$customer_item->name}}
                        </td>
                        <td>
                            {{$customer_item->age}}
                        </td>
                        <td>
                            {{$customer_item->phone_number}}
                        </td>
                        <td>
                            {{$customer_item->city}}
                        </td>
                        <td>
                            {{$customer_item->mail}}
                        </td>
                        <td>
                            <input type="hidden" id="id" name="id" value="{{$customer_item->id}}">
                            <button type="submit" class="btn btn-primary">Select</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </table>
    </div>
    <script src="{{ asset('/js/filter_function.js') }}">
    </script>

@endsection

